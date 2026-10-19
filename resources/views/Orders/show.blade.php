<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Order Details | CANO DE VASCO</title>
    <link rel="stylesheet" href="{{ asset('css/cano.css') }}">
</head>
<body>

<nav class="navbar">
    <a href="{{ route('shop.index') }}" class="brand">
        CANODE<span>VASCO</span>
    </a>
</nav>

<section class="hero">
    <div class="small-title">Order Details</div>
    <h1>{{ $order->order_number }}</h1>
</section>

<div style="width:92%;max-width:850px;margin:30px auto;padding:25px;
    background:var(--panel);border:1px solid var(--border);border-radius:18px">

    {{-- Notification --}}
    @if (session('success'))
        <p style="color:#c4cca5">
            {{ session('success') }}
        </p>
    @endif

    @if (session('error'))
        <p style="color:#e5a0a0">
            {{ session('error') }}
        </p>
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p style="color:#e5a0a0">{{ $error }}</p>
        @endforeach
    @endif

    {{-- Order information --}}
    <h3>Order Information</h3>

    <p>
        Payment method:
        {{ str_replace('_', ' ', ucfirst($order->payment_method)) }}
    </p>

    <p>
        Payment status:
        <strong>
            {{ str_replace('_', ' ', ucfirst($order->payment_status)) }}
        </strong>
    </p>

    {{-- Order items --}}
    <h3 style="margin-top:25px">Items</h3>

    @foreach ($order->items as $item)
        <p style="margin:12px 0">
            {{ $item->product_name }}
            ({{ $item->weight }} g)
            × {{ $item->quantity }}
            — Rp {{ number_format((float) $item->subtotal, 0, ',', '.') }}
        </p>
    @endforeach

    <h2 style="margin:20px 0">
        Total: Rp {{ number_format((float) $order->total, 0, ',', '.') }}
    </h2>

    {{-- Payment instructions --}}
    @if ($order->payment_method === 'bank_transfer')
        <div style="margin-top:25px;padding:18px;
            border:1px solid var(--border);border-radius:12px">

            <h3>Bank Transfer</h3>
            <p>Transfer the exact order total to the official store account.</p>

            <p><strong>Bank:</strong> [Enter bank name]</p>
            <p><strong>Account number:</strong> [Enter account number]</p>
            <p><strong>Account holder:</strong> [Enter account holder name]</p>
        </div>

    @elseif ($order->payment_method === 'qris')
        <div style="margin-top:25px;padding:18px;
            border:1px solid var(--border);border-radius:12px">

            <h3>QRIS Payment</h3>
            <p>
                Scan the official CANO DE VASCO QRIS code
                and pay the exact order total.
            </p>

            {{-- Add the official QRIS image after uploading it --}}
            {{-- Example:
            <img src="{{ asset('images/qris-cano.jpg') }}"
                 alt="Official CANO DE VASCO QRIS"
                 style="display:block;width:100%;max-width:300px;margin:15px auto">
            --}}
        </div>
    @endif

    {{-- Admin feedback --}}
    @if ($order->admin_note)
        <div style="margin-top:25px;padding:16px;
            border:1px solid var(--border);border-radius:12px">

            <h3>Admin Message</h3>
            <p>{{ $order->admin_note }}</p>
        </div>
    @endif

    {{-- Payment status handling --}}
    @if ($order->payment_status === 'paid')

        <div style="margin-top:25px;padding:16px;
            border:1px solid var(--border);border-radius:12px">

            <h3 style="color:#c4cca5">Payment Verified</h3>
            <p>Your payment has been verified. Thank you for your order.</p>
        </div>

    @elseif ($order->payment_status === 'waiting_verification')

        <div style="margin-top:25px;padding:16px;
            border:1px solid var(--border);border-radius:12px">

            <h3>Payment Under Review</h3>
            <p>
                Your payment proof has been submitted and is waiting
                for admin verification. Please wait for the result.
            </p>
            <p>There is no need to upload the proof again while it is being reviewed.</p>
        </div>

    @else

        @if ($order->payment_status === 'rejected')
            <div style="margin-top:25px;padding:16px;
                border:1px solid var(--border);border-radius:12px">

                <h3 style="color:#e5a0a0">Payment Proof Rejected</h3>
                <p>
                    Please review the admin message above, correct the issue,
                    and upload your payment proof again.
                </p>
            </div>
        @endif

        <h3 style="margin-top:25px">Submit Payment Proof</h3>

        <form action="{{ route('orders.proof', $order) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div style="margin:15px 0">
                <label for="payment_proof">
                    Payment receipt (JPG, PNG, WEBP; max 3 MB)
                </label>

                <input
                    id="payment_proof"
                    type="file"
                    name="payment_proof"
                    accept=".jpg,.jpeg,.png,.webp"
                    required
                    style="display:block;width:100%;margin-top:8px"
                >
            </div>

            <div style="margin:15px 0">
                <label for="payment_note">Payment note (optional)</label>

                <textarea
                    id="payment_note"
                    name="payment_note"
                    rows="3"
                    maxlength="1000"
                    style="display:block;width:100%;margin-top:8px"
                >{{ old('payment_note', $order->payment_note) }}</textarea>
            </div>

            <button
                type="submit"
                style="margin-top:15px;padding:12px 18px;
                    background:var(--olive);color:white;border-radius:9px;
                    border:none;cursor:pointer"
            >
                Submit Payment Proof
            </button>
        </form>

    @endif

    <p style="margin-top:25px">
        <a href="{{ route('orders.mine') }}" style="color:#c4cca5">
            &larr; Back to My Orders
        </a>
    </p>

</div>
</body>
</html>
