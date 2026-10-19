<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Order Details | CANO DE VASCO</title>

    <link rel="stylesheet" href="{{ asset('css/cano.css') }}">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #0b0c09;
            color: #f5f1e8;
            font-family: Arial, sans-serif;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 5%;
            border-bottom: 1px solid #34362a;
        }

        .brand {
            color: #f5f1e8;
            text-decoration: none;
            font-weight: bold;
            letter-spacing: 2px;
        }

        .brand span {
            color: #b1b88a;
        }

        .back-link {
            color: #c4cca5;
            text-decoration: none;
            font-size: 14px;
        }

        .page {
            width: 92%;
            max-width: 950px;
            margin: 35px auto 60px;
        }

        .eyebrow {
            color: #b1b88a;
            font-size: 12px;
            letter-spacing: 3px;
            text-transform: uppercase;
        }

        h1 {
            font-size: clamp(26px, 4vw, 38px);
            margin: 12px 0;
            overflow-wrap: anywhere;
        }

        h2, h3 {
            color: #f5f1e8;
        }

        .subtitle {
            color: #aaa99f;
            margin-bottom: 28px;
        }

        .panel {
            padding: 24px;
            margin-bottom: 22px;
            background: #141510;
            border: 1px solid #34362a;
            border-radius: 14px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
        }

        .info-label {
            display: block;
            color: #aaa99f;
            font-size: 12px;
            margin-bottom: 7px;
        }

        .info-value {
            overflow-wrap: anywhere;
            line-height: 1.6;
        }

        .item {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            padding: 15px 0;
            border-bottom: 1px solid #303127;
        }

        .item:last-child {
            border-bottom: none;
        }

        .muted {
            color: #aaa99f;
            font-size: 13px;
            margin-top: 6px;
        }

        .total {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 22px;
            padding-top: 18px;
            border-top: 1px solid #454737;
        }

        .total strong {
            color: #c4cca5;
            font-size: 22px;
        }

        .status {
            display: inline-block;
            padding: 7px 11px;
            border-radius: 20px;
            background: #28291f;
            color: #deddb8;
            font-size: 12px;
        }

        .status.waiting_verification {
    background: #302b1b;
    color: #e8d49b;
}

.status.pending {
    background: #28291f;
    color: #deddb8;
}

        .status.paid {
            background: #203025;
            color: #b9e2be;
        }

        .status.rejected {
            background: #351f1f;
            color: #f0aaaa;
        }

        .notice {
            padding: 14px 16px;
            margin-bottom: 18px;
            border-radius: 8px;
            background: #202319;
            color: #c4cca5;
        }

        .notice.error {
            background: #291919;
            color: #f0aaaa;
        }

        .field {
            margin-top: 20px;
        }

        .field label {
            display: block;
            margin-bottom: 9px;
            color: #e8e4da;
            font-size: 14px;
        }

        .field select,
        .field textarea,
        .field input {
            display: block;
            width: 100%;
            padding: 13px;
            background: #0b0c09;
            color: #f5f1e8;
            border: 1px solid #454737;
            border-radius: 7px;
            font: inherit;
        }

        .field textarea {
            resize: vertical;
            min-height: 120px;
        }

        .field select:focus,
        .field textarea:focus {
            outline: 1px solid #b1b88a;
            border-color: #b1b88a;
        }

        .button {
            display: inline-block;
            padding: 13px 20px;
            background: #b1b88a;
            color: #11120d;
            border: none;
            border-radius: 7px;
            font-weight: bold;
            text-decoration: none;
            cursor: pointer;
        }

        .button-secondary {
            background: transparent;
            color: #c4cca5;
            border: 1px solid #454737;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 22px;
        }

        .note-content {
            white-space: pre-line;
            overflow-wrap: anywhere;
            line-height: 1.7;
            color: #c4cca5;
        }

        .help {
            color: #aaa99f;
            font-size: 13px;
            line-height: 1.6;
            margin-top: 8px;
        }

        @media (max-width: 600px) {
            .navbar {
                padding: 18px 4%;
            }

            .page {
                width: 94%;
                margin-top: 25px;
            }

            .panel {
                padding: 18px;
            }

            .info-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }

            .item {
                flex-direction: column;
                gap: 8px;
            }
        }
    </style>
</head>

<body>

<nav class="navbar">
    <a href="{{ route('admin.orders.index') }}" class="brand">
        CANO DE <span>VASCO</span>
    </a>

    <a href="{{ route('admin.orders.index') }}" class="back-link">
        ← Manage Orders
    </a>
</nav>

<main class="page">

    <div class="eyebrow">Admin Dashboard</div>

    <h1>Order Details</h1>

    <p class="subtitle">
        Periksa pesanan, bukti pembayaran, dan perbarui keterangan admin.
    </p>

    {{-- NOTIFIKASI --}}
    @if (session('success'))
        <div class="notice">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="notice error">
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="notice error">
            <strong>Perubahan belum berhasil disimpan.</strong>

            <ul style="margin-bottom:0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- INFORMASI PESANAN --}}
    <section class="panel">
        <span class="info-label">Order Number</span>

        <h2 style="margin-top:5px;overflow-wrap:anywhere">
            {{ $order->order_number }}
        </h2>

        <p class="muted">
            Dibuat:
            {{ $order->created_at
                ? $order->created_at->format('d M Y, H:i')
                : '-' }}
        </p>

        <div style="margin-top:20px">
            <span class="info-label">Payment Status</span>

            <span class="status {{ $order->payment_status }}">
                {{ ucwords(str_replace(
                    '_',
                    ' ',
                    $order->payment_status
                )) }}
            </span>
        </div>

        <div style="margin-top:15px">
            <span class="info-label">Order Status</span>

            <span>
                {{ ucwords(str_replace(
                    '_',
                    ' ',
                    $order->order_status
                )) }}
            </span>
        </div>
    </section>

    {{-- INFORMASI CUSTOMER --}}
    <section class="panel">
        <h3>Customer Information</h3>

        <div class="info-grid">
            <div>
                <span class="info-label">Customer Name</span>
                <div class="info-value">
                    {{ $order->customer_name }}
                </div>
            </div>

            <div>
                <span class="info-label">Email</span>
                <div class="info-value">
                    {{ $order->customer_email }}
                </div>
            </div>

            <div>
                <span class="info-label">Phone Number</span>
                <div class="info-value">
                    {{ $order->phone }}
                </div>
            </div>

            <div>
                <span class="info-label">Payment Method</span>
                <div class="info-value">
                    {{ strtoupper(str_replace(
                        '_',
                        ' ',
                        $order->payment_method
                    )) }}
                </div>
            </div>

            <div style="grid-column:1/-1">
                <span class="info-label">Shipping Address</span>
                <div class="info-value">
                    {{ $order->shipping_address }}
                </div>
            </div>
        </div>
    </section>

    {{-- DAFTAR PRODUK --}}
    <section class="panel">
        <h3>Order Items</h3>

        @forelse ($order->items as $item)
            <div class="item">
                <div>
                    <strong>{{ $item->product_name }}</strong>

                    <div class="muted">
                        Quantity: {{ $item->quantity }}

                        @if (!is_null($item->weight))
                            · {{ $item->weight }} g
                        @endif
                    </div>

                    <div class="muted">
                        Unit Price:
                        Rp {{ number_format((float) $item->price, 2) }}
                    </div>
                </div>

                <strong>
                    Rp {{ number_format((float) $item->subtotal, 2) }}
                </strong>
            </div>
        @empty
            <p class="muted">
                Tidak ada item pada pesanan ini.
            </p>
        @endforelse

        <div class="total">
            <span>Total Payment</span>

            <strong>
                ${{ number_format((float) $order->total, 2) }}
            </strong>
        </div>
    </section>

    {{-- BUKTI PEMBAYARAN --}}
    <section class="panel">
        <h3>Payment Proof</h3>

        @if ($order->payment_proof)
            <p class="muted">
                Customer sudah mengirim bukti pembayaran.
            </p>

            <a href="{{ route('admin.orders.proof', $order) }}"
               target="_blank"
               rel="noopener"
               class="button">
                View Payment Proof
            </a>
        @else
            <p class="muted">
                Customer belum mengirim bukti pembayaran.
            </p>
        @endif

        @if ($order->payment_note)
            <div style="margin-top:22px">
                <span class="info-label">
                    Customer Payment Note
                </span>

                <p class="note-content">
                    {{ $order->payment_note }}
                </p>
            </div>
        @endif
    </section>

    {{-- KETERANGAN ADMIN YANG TERSIMPAN --}}
    <section class="panel">
        <h3>Current Admin Note</h3>

        @if ($order->admin_note)
            <p class="note-content">{{ $order->admin_note }}</p>
        @else
            <p class="muted">
                Belum ada keterangan dari admin untuk pesanan ini.
            </p>
        @endif

        @if ($order->paid_at)
            <div style="margin-top:18px">
                <span class="info-label">Payment Verified At</span>

                <p>
                    {{ \Illuminate\Support\Carbon::parse(
                        $order->paid_at
                    )->format('d M Y, H:i') }}
                </p>
            </div>
        @endif
    </section>

    {{-- FORM EDIT STATUS DAN KETERANGAN ADMIN --}}
    <section class="panel">
        <h3>Edit Order Status & Notes</h3>

        <p class="muted">
            Perubahan berikut hanya berlaku untuk pesanan
            {{ $order->order_number }}.
        </p>

        <form method="POST"
              action="{{ route('admin.orders.payment', $order) }}">

            @csrf
            @method('PATCH')

            <div class="field">
                <label for="payment_status">
                    Payment Status
                </label>

                <select name="payment_status"
                        id="payment_status"
                        required>

                    <option value="pending"
                        {{ old('payment_status', $order->payment_status) === 'pending' ? 'selected' : '' }}>
                        Pending
                    </option>

                    <option value="waiting_verification"
                        {{ old('payment_status', $order->payment_status) === 'waiting_verification' ? 'selected' : '' }}>
                        Waiting Verification
                    </option>

                    <option value="paid"
                        {{ old('payment_status', $order->payment_status) === 'paid' ? 'selected' : '' }}>
                        Paid — Payment Verified
                    </option>

                    <option value="rejected"
                        {{ old('payment_status', $order->payment_status) === 'rejected' ? 'selected' : '' }}>
                        Rejected — Payment Rejected
                    </option>
                </select>

                <p class="help">
                    Pilih status pembayaran yang sesuai hasil pemeriksaan.
                    Status Paid memerlukan file bukti pembayaran yang tersedia.
                </p>
            </div>

            <div class="field">
                <label for="admin_note">
                    Keterangan Admin
                </label>

                <textarea name="admin_note"
                          id="admin_note"
                          maxlength="1000"
                          placeholder="Contoh: Pembayaran sudah diverifikasi. Pesanan akan segera diproses.">{{ old('admin_note', $order->admin_note) }}</textarea>

                <p class="help">
                    Keterangan ini disimpan pada pesanan yang sedang dibuka.
                    Kamu bisa mengubahnya sebelum menyimpan perubahan.
                </p>
            </div>

            <div class="actions">
                <button type="submit"
                        class="button"
                        onclick="return confirm('Simpan perubahan status pembayaran dan keterangan admin?')">
                    Save Changes
                </button>

                <a href="{{ route('admin.orders.index') }}"
                   class="button button-secondary">
                    Back to Orders
                </a>
            </div>
        </form>
    </section>

</main>

</body>
</html>