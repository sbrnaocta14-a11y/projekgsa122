<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);
        $products = Product::whereIn('id', array_keys($cart))->get();

        $items = $products->map(function ($product) use ($cart) {
            $quantity = (int) ($cart[$product->id] ?? 0);

            return [
                'product' => $product,
                'quantity' => $quantity,
                'subtotal' => $product->price * $quantity,
            ];
        });

        return view('cart.index', [
            'items' => $items,
            'total' => $items->sum('subtotal'),
        ]);
    }

    public function add(Request $request, Product $product)
    {
        $validated = $request->validate([
            'quantity' => ['nullable', 'integer', 'min:1', 'max:99'],
        ]);

        $cart = session('cart', []);
        $id = $product->id;
        $quantity = (int) ($validated['quantity'] ?? 1);

        $cart[$id] = min(99, ($cart[$id] ?? 0) + $quantity);

        session(['cart' => $cart]);

        return redirect()->route('cart.index')
            ->with('success', 'Coffee berhasil ditambahkan ke keranjang.');
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'quantity' => ['required', 'integer', 'min:1', 'max:99'],
        ]);

        $cart = session('cart', []);
        $cart[$product->id] = $validated['quantity'];

        session(['cart' => $cart]);

        return redirect()->route('cart.index')
            ->with('success', 'Keranjang berhasil diperbarui.');
    }

    public function remove(Product $product)
    {
        $cart = session('cart', []);
        unset($cart[$product->id]);

        session(['cart' => $cart]);

        return redirect()->route('cart.index')
            ->with('success', 'Produk dihapus dari keranjang.');
    }
}