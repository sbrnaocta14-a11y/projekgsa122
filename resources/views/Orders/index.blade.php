
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Orders | CANO DE VASCO</title>
    <link rel="stylesheet" href="{{ asset('css/cano.css') }}">
</head>
<body>
<nav class="navbar">
    <a href="{{ route('shop.index') }}" class="brand">CANODE<span>VASCO</span></a>
    <div class="nav-links"><a href="{{ route('shop.index') }}">Shop</a></div>
</nav>

<section class="hero">
    <div class="small-title">Your Account</div>
    <h1>My <span>Orders.</span></h1>
</section>

<div style="width:92%;max-width:1100px;margin:30px auto">
    @foreach ($orders as $order)
        <div style="padding:22px;margin-bottom:16px;background:var(--panel);
            border:1px solid var(--border);border-radius:16px">
            <h3>{{ $order->order_number }}</h3>
            <p style="margin:10px 0">
                Total: ${{ number_format($order->total, 2) }}
            </p>
            <p>Payment: {{ str_replace('_', ' ', ucfirst($order->payment_status)) }}</p>
            <p>Order status: {{ ucfirst($order->order_status) }}</p>
            <a href="{{ route('orders.show', $order) }}">View order details</a>
        </div>
    @endforeach

    {{ $orders->links() }}
</div>
</body>
</html>
