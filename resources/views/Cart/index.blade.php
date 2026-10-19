<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{ asset('css/cano.css') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Your Cart | CANO DE VASCO</title>
    <link rel="stylesheet" href="{{ asset('css/cano.css') }}">
    <style>
        .cart-panel {
            width: 92%; max-width: 1000px; margin: 50px auto;
            padding: 25px; border: 1px solid var(--border);
            border-radius: 18px; background: var(--panel);
        }
        .cart-row {
            display: flex; justify-content: space-between;
            align-items: center; gap: 15px; padding: 18px 0;
            border-bottom: 1px solid var(--border);
        }
        .cart-row form { display: flex; gap: 8px; }
        .cart-row input {
            width: 65px; padding: 8px; background: var(--black);
            color: white; border: 1px solid var(--border);
            border-radius: 8px;
        }
        .cart-panel button, .primary-link {
            padding: 10px 14px; border: 1px solid var(--olive-light);
            border-radius: 9px; background: var(--olive);
            color: white; cursor: pointer; text-decoration: none;
        }
        .cart-total { text-align: right; margin: 25px 0; }
        .cart-panel a { color: var(--cream); }
    </style>
</head>
<body>

<nav class="navbar">
    <a href="{{ route('home') }}" class="brand">
        CANO DE <span>VASCO</span>
    </a>

    <div class="nav-links">
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ url('/about') }}">About</a>
        <a href="{{ url('/#contact') }}">Contact</a>
    </div>

    <div class="nav-actions">
        <a href="{{ route('dashboard') }}" class="nav-dashboard">
            Dashboard
        </a>
        
        <a href="{{ route('shop.index') }}" class="nav-coffee">
            My Coffee
        </a>
    </div>
</nav>


<section class="hero">
    <div class="small-title">Your Selection</div>
    <h1>Shopping <span>Cart.</span></h1>
</section>

<div class="cart-panel">
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif
    @if (session('error'))
        <p>{{ session('error') }}</p>
    @endif

    @forelse ($items as $item)
        <div class="cart-row">
            <div>
                <strong>{{ $item['product']->name }}</strong>
                <p>{{ $item['product']->weight }} g</p>
                <p>${{ number_format($item['product']->price, 2) }} each</p>
                <p>Subtotal: ${{ number_format($item['subtotal'], 2) }}</p>
            </div>
            <div>
                <form action="{{ route('cart.update', $item['product']) }}"
                    method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="number" name="quantity" min="1" max="99"
                        value="{{ $item['quantity'] }}" required>
                    <button type="submit">Update</button>
                </form>
                <form style="margin-top:8px"
                    action="{{ route('cart.remove', $item['product']) }}"
                    method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Remove</button>
                </form>
            </div>
        </div>
    @empty
        <p>Your cart is empty.</p>
    @endforelse

    @if ($items->isNotEmpty())
        <div class="cart-total">
            <h2>Total: ${{ number_format($total, 2) }}</h2>
            <p style="margin:12px 0">Shipping cost, if applicable, is not included.</p>
            <a class="primary-link" href="{{ route('checkout.index') }}">
                Proceed to Checkout
            </a>
        </div>
    @endif
</div>
</body>
</html>
