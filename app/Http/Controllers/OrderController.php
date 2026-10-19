<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    // Daftar pesanan milik customer yang login
    public function index()
    {
        $orders = Order::where('user_id', auth()->id())
            ->latest()
            ->paginate(10);

        return view('orders.index', compact('orders'));
    }

    // Detail pesanan
    public function show(Order $order)
    {
        abort_unless(
            (int) $order->user_id === (int) auth()->id(),
            403
        );

        $order->load('items');

        return view('orders.show', compact('order'));
    }

    // Upload bukti pembayaran
    public function uploadProof(Request $request, Order $order)
    {
        abort_unless(
            (int) $order->user_id === (int) auth()->id(),
            403
        );

        if ($order->payment_status === 'paid') {
            return back()->with(
                'error',
                'Pesanan ini sudah dibayar dan diverifikasi.'
            );
        }

        if ($order->payment_status === 'rejected') {
            // Customer boleh mengirim ulang bukti pembayaran.
        } elseif ($order->payment_status === 'waiting_verification') {
            return back()->with(
                'error',
                'Bukti pembayaran sedang diperiksa admin.'
            );
        }

        $validated = $request->validate([
            'payment_proof' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:3072',
            ],
            'payment_note' => [
                'nullable',
                'string',
                'max:1000',
            ],
        ]);

        $path = $request->file('payment_proof')
            ->store('payment-proofs', 'local');

        // Hapus file baru jika proses penyimpanan ke database gagal.
        try {
            $oldPath = $order->payment_proof;

            $order->update([
                'payment_proof' => $path,
                'payment_note' => $validated['payment_note'] ?? null,
                'payment_status' => 'waiting_verification',
            ]);
        } catch (\Throwable $e) {
            Storage::disk('local')->delete($path);
            throw $e;
        }

        if (!empty($oldPath)) {
            Storage::disk('local')->delete($oldPath);
        }

        return back()->with(
            'success',
            'Bukti pembayaran berhasil dikirim dan menunggu verifikasi admin.'
        );
    }
}
