<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminOrderController extends Controller
{
    /**
     * Menampilkan daftar seluruh pesanan.
     */
    public function index(Request $request)
    {
        $query = Order::with('user')->latest();

        $allowedStatuses = [
            'pending',
            'waiting_verification',
            'paid',
            'rejected',
        ];

        if (
            $request->filled('status') &&
            in_array($request->status, $allowedStatuses, true)
        ) {
            $query->where(
                'payment_status',
                $request->status
            );
        }

        $orders = $query
            ->paginate(15)
            ->withQueryString();

        return view(
            'admin.orders.index',
            compact('orders')
        );
    }

    /**
     * Menampilkan detail pesanan dan keterangan admin.
     */
    public function show(Order $order)
    {
        $order->load(['user', 'items']);

        return view(
            'admin.orders.show',
            compact('order')
        );
    }

    /**
     * Mengubah status pembayaran dan keterangan admin.
     */
    public function updatePayment(
        Request $request,
        Order $order
    ) {
        $validated = $request->validate([
            'payment_status' => [
                'required',
                'in:pending,waiting_verification,paid,rejected',
            ],

            'admin_note' => [
                'nullable',
                'string',
                'max:1000',
            ],
        ]);

        $result = DB::transaction(function () use (
            $order,
            $validated
        ) {
            $lockedOrder = Order::whereKey($order->id)
                ->lockForUpdate()
                ->firstOrFail();

            $newStatus = $validated['payment_status'];

            // Pembayaran yang sudah diverifikasi
            // tidak dapat diubah melalui form ini.
            if ($lockedOrder->payment_status === 'paid') {
                return 'already_paid';
            }

            // Status Paid wajib memiliki file bukti.
            if (
                $newStatus === 'paid' &&
                (
                    !$lockedOrder->payment_proof ||
                    !Storage::disk('local')->exists(
                        $lockedOrder->payment_proof
                    )
                )
            ) {
                return 'no_proof';
            }

            $isPaid = $newStatus === 'paid';

            $lockedOrder->update([
                'payment_status' => $newStatus,

                'admin_note' => $validated['admin_note'] ?? null,

                'paid_at' => $isPaid ? now() : null,

                'order_status' => $isPaid
                    ? 'confirmed'
                    : 'processing',
            ]);

            return 'updated';
        });

        if ($result === 'already_paid') {
            return back()->with(
                'error',
                'Pembayaran sudah diverifikasi. Status Paid tidak dapat diubah melalui form ini.'
            );
        }

        if ($result === 'no_proof') {
            return back()
                ->withInput()
                ->with(
                    'error',
                    'Bukti pembayaran belum tersedia atau file tidak ditemukan.'
                );
        }

        return back()->with(
            'success',
            'Status pembayaran dan keterangan admin berhasil diperbarui.'
        );
    }

    /**
     * Menampilkan bukti pembayaran privat
     * langsung di browser admin.
     */
    
public function paymentProof(Order $order)
{
    $disk = Storage::disk('local');
    $path = $order->payment_proof;

    if (!$path || !$disk->exists($path)) {
        abort(404, 'File bukti pembayaran tidak ditemukan.');
    }

    $fullPath = $disk->path($path);

    return response()->stream(function () use ($fullPath) {
        readfile($fullPath);
    }, 200, [
        'Content-Type' => 'image/png',
        'Content-Disposition' => 'inline',
        'Cache-Control' => 'no-store',
        'X-Content-Type-Options' => 'nosniff',
    ]);
}

}
