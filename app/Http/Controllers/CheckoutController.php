<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')
                ->with('error', 'Keranjang kamu masih kosong.');
        }

        $products = Product::whereIn('id', array_keys($cart))
            ->get()
            ->keyBy('id');

        $items = collect();

        foreach ($cart as $id => $quantity) {
            $product = $products->get($id);

            if (!$product) {
                continue;
            }

            $quantity = filter_var(
                $quantity,
                FILTER_VALIDATE_INT
            );

            if (!$quantity || $quantity < 1 || $quantity > 99) {
                return redirect()->route('cart.index')
                    ->with('error', 'Kuantitas produk tidak valid.');
            }

            $items->push([
                'product' => $product,
                'quantity' => $quantity,
                'subtotal' => $product->price * $quantity,
            ]);
        }

        if ($items->isEmpty()) {
            return redirect()->route('cart.index')
                ->with('error', 'Produk dalam keranjang tidak tersedia.');
        }

        return view('checkout.index', [
            'items' => $items,
            'total' => $items->sum('subtotal'),
            'user' => auth()->user(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => ['required', 'string', 'max:150'],
            'phone' => ['required', 'string', 'max:30'],
            'shipping_address' => ['required', 'string', 'max:2000'],
            'payment_method' => [
                'required',
                'in:bank_transfer,qris',
            ],
        ]);

        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')
                ->with('error', 'Keranjang kamu masih kosong.');
        }

        // Validasi kuantitas sebelum membuat pesanan.
        $quantities = [];

        foreach ($cart as $id => $quantity) {
            $quantity = filter_var(
                $quantity,
                FILTER_VALIDATE_INT
            );

            if (!$quantity || $quantity < 1 || $quantity > 99) {
                return redirect()->route('cart.index')
                    ->with('error', 'Kuantitas produk tidak valid.');
            }

            $quantities[$id] = $quantity;
        }

        $order = DB::transaction(function () use (
            $quantities,
            $validated
        ) {
            $products = Product::whereIn(
                'id',
                array_keys($quantities)
            )
                ->lockForUpdate()
                ->get()
                ->keyBy('id');

            if ($products->count() !== count($quantities)) {
                abort(
                    422,
                    'Ada produk di keranjang yang sudah tidak tersedia.'
                );
            }

            $total = 0;

            foreach ($quantities as $id => $quantity) {
                $product = $products->get($id);

                if (
                    !$product ||
                    !is_numeric($product->price) ||
                    $product->price < 0
                ) {
                    abort(422, 'Data produk tidak valid.');
                }

                $total += $product->price * $quantity;
            }

            $order = Order::create([
                'user_id' => auth()->id(),
                'order_number' => 'CDV-' .
                    Str::upper(Str::random(10)),
                'customer_name' => $validated['customer_name'],
                'customer_email' => auth()->user()->email,
                'phone' => $validated['phone'],
                'shipping_address' => $validated['shipping_address'],
                'total' => $total,
                'payment_method' => $validated['payment_method'],
                'payment_status' => 'pending',
                'order_status' => 'processing',
            ]);

            foreach ($quantities as $id => $quantity) {
                $product = $products->get($id);

                $order->items()->create([
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'price' => $product->price,
                    'weight' => $product->weight,
                    'quantity' => $quantity,
                    'subtotal' => $product->price * $quantity,
                ]);
            }

            return $order;
        });

        session()->forget('cart');

        return redirect()
            ->route('orders.show', $order)
            ->with(
                'success',
                'Pesanan berhasil dibuat. Silakan lakukan pembayaran.'
            );
    }
}
