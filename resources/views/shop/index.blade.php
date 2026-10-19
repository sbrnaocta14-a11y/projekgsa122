<!DOCTYPE html>
<html lang="id">
<head>
    <link rel="stylesheet" href="{{ asset('css/cano.css') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Coffee | CANODE VASCO</title>

    <style>
        :root {
    --bg: #0B0C09;
    --surface: #141610;
    --surface-light: #1D2018;
    --olive: #596447;
    --olive-dark: #454F36;
    --brown: #8B6748;
    --text: #F4F0E7;
    --muted: #A8AA9C;
    --border: rgba(255, 255, 255, 0.10);
}
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: var(--bg);
            color: var(--text);
            font-family: Arial, Helvetica, sans-serif;
            line-height: 1.6;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button, input, select {
            font: inherit;
        }

        .navbar {
            min-height: 76px;
            padding: 16px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 24px;
            border-bottom: 1px solid var(--border);
            background: rgba(11,12,9,0.96);
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .brand {
            font-size: 19px;
            font-weight: 700;
            letter-spacing: 3px;
        }

        .brand span {
            display: block;
            color: var(--olive);
            font-size: 9px;
            letter-spacing: 4px;
            text-align: center;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 25px;
            color: var(--muted);
            font-size: 13px;
        }

        .nav-links a:hover,
        .nav-links .active {
            color: var(--olive);
        }

        .cart-link {
            padding: 9px 16px;
            border: 1px solid var(--olive-dark);
            border-radius: 4px;
            color: var(--text) !important;
        }

        .hero {
            padding: 76px 7% 64px;
            background:
                radial-gradient(ellipse at 80% 20%, rgba(92,105,65,.20), transparent 45%),
                linear-gradient(135deg, #11130d, #0b0c09 70%);
            border-bottom: 1px solid var(--border);
        }

        .eyebrow {
            color: var(--olive);
            font-size: 11px;
            letter-spacing: 4px;
            text-transform: uppercase;
            margin-bottom: 18px;
        }

        .hero h1 {
            font-family: Georgia, 'Times New Roman', serif;
            font-size: clamp(36px, 5vw, 60px);
            line-height: 1.15;
            font-weight: 400;
            max-width: 700px;
            margin-bottom: 20px;
        }

        .hero h1 em {
            color: var(--olive);
        }

        .hero p {
            color: var(--muted);
            max-width: 560px;
            font-size: 14px;
        }

        .catalog {
            padding: 52px 7% 80px;
        }

        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: end;
            gap: 20px;
            margin-bottom: 28px;
        }

        .section-heading h2 {
            font-family: Georgia, 'Times New Roman', serif;
            font-size: 32px;
            font-weight: 400;
        }

        .section-heading p {
            color: var(--muted);
            font-size: 13px;
            margin-top: 5px;
        }

        .filter-form {
            display: flex;
            gap: 10px;
            margin-bottom: 32px;
            flex-wrap: wrap;
        }

        .filter-form input,
        .filter-form select {
            background: var(--surface);
            color: var(--text);
            border: 1px solid var(--border);
            border-radius: 4px;
            padding: 12px 14px;
            outline: none;
        }

        .filter-form input {
            flex: 1;
            min-width: 180px;
        }

        .filter-form select {
            min-width: 150px;
        }

        .filter-form input:focus,
        .filter-form select:focus {
            border-color: var(--olive);
        }

        .btn {
            border: 1px solid var(--olive);
            background: var(--olive);
            color: #10120c;
            padding: 11px 17px;
            border-radius: 4px;
            font-weight: 700;
            cursor: pointer;
            text-align: center;
            display: inline-block;
            font-size: 12px;
            transition: .2s;
        }

        .btn:hover {
    background: #697653;
    border-color: #697653;
}

        .btn-outline {
            background: transparent;
            color: var(--text);
            border-color: var(--border);
        }

        .btn-outline:hover {
            background: var(--surface-light);
            color: var(--text);
            border-color: var(--olive);
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 24px;
        }

        .product-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 6px;
            overflow: hidden;
            transition: transform .2s, border-color .2s;
        }

        .product-card:hover {
            transform: translateY(-4px);
            border-color: var(--olive-dark);
        }

        .product-image {
            height: 250px;
            background: linear-gradient(145deg, #25271d, #11120e);
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .image-placeholder {
            font-size: 58px;
            opacity: .75;
        }

        .product-info {
            padding: 22px;
        }

        .product-category {
            color: var(--olive);
            text-transform: uppercase;
            font-size: 10px;
            letter-spacing: 2px;
            margin-bottom: 8px;
        }

        .product-info h3 {
            font-family: Georgia, 'Times New Roman', serif;
            font-size: 23px;
            font-weight: 400;
            margin-bottom: 7px;
        }

        .product-description {
            color: var(--muted);
            font-size: 12px;
            min-height: 40px;
            margin-bottom: 15px;
        }

        .product-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            border-top: 1px solid var(--border);
            padding-top: 15px;
            margin-bottom: 18px;
            font-size: 12px;
            color: var(--muted);
        }

        .product-price {
            color: var(--text);
            font-size: 19px;
            font-weight: 700;
        }

        .product-actions {
            display: flex;
            gap: 9px;
        }

        .product-actions form {
            flex: 1;
        }

        .product-actions .btn {
            width: 100%;
        }

        .empty-state {
            padding: 55px 20px;
            border: 1px dashed var(--border);
            border-radius: 6px;
            text-align: center;
            color: var(--muted);
            grid-column: 1 / -1;
        }

        .empty-state h3 {
            color: var(--text);
            margin-bottom: 8px;
        }

        .footer {
            border-top: 1px solid var(--border);
            padding: 25px 7%;
            color: var(--muted);
            text-align: center;
            font-size: 11px;
            letter-spacing: 1px;
        }

        .notice {
            padding: 13px 16px;
            margin-bottom: 22px;
            border: 1px solid var(--olive-dark);
            background: var(--surface);
            color: #dce7c9;
            border-radius: 4px;
            font-size: 13px;
        }

        @media (max-width: 900px) {
            .product-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .navbar {
                padding: 15px 5%;
            }

            .nav-links {
                gap: 14px;
            }
        }

        @media (max-width: 600px) {
            .navbar {
                align-items: flex-start;
                flex-direction: column;
            }

            .nav-links {
                width: 100%;
                flex-wrap: wrap;
                gap: 13px;
            }

            .hero {
                padding: 55px 6%;
            }

            .catalog {
                padding: 38px 6% 60px;
            }

            .product-grid {
                grid-template-columns: 1fr;
            }

            .product-image {
                height: 260px;
            }

            .section-heading {
                align-items: flex-start;
                flex-direction: column;
            }

            .filter-form {
                flex-direction: column;
            }

            .filter-form input,
            .filter-form select,
            .filter-form button {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    @php
        $user = Auth::user();
        $isCustomer = $user && $user->role === 'customer';
        $isAdmin = $user && $user->role === 'admin';
    @endphp

   
<header class="navbar">
    <a href="{{ route('home') }}" class="brand">
        CANO DE<span>VASCO</span>
    </a>

    <nav class="nav-links">
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('shop.index') }}" class="active">Our Coffee</a>
        <a href="{{ route('about') }}">About Us</a>
    </nav>

    <div class="nav-actions">
        <a href="{{ route('dashboard') }}" class="login-btn">
            Dashboard
        </a>

        @if ($isCustomer)
            <a href="{{ route('cart.index') }}" class="register-btn">
                My Cart
            </a>
        @elseif ($isAdmin)
            <a href="{{ route('product.index') }}" class="register-btn">
                Manage Products
            </a>
        @else
            <a href="{{ route('login') }}" class="register-btn">
                Login
            </a>
        @endif
    </div>
</header>

    <main class="catalog">
        <div class="section-heading">
            <div>
                <div class="eyebrow">Our Collection</div>
                <h2>Our Coffee</h2>
                <p>Explore the coffee selection from CANO DE VASCO.</p>
            </div>
        </div>

        @if (session('success'))
            <div class="notice">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="notice">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('shop.index') }}" method="GET" class="filter-form">
            <input
                type="text"
                name="search"
                placeholder="Search coffee..."
                value="{{ request('search') }}"
            >

            <select name="category">
                <option value="">All Coffee Types</option>
                <option value="arabica" {{ request('category') === 'arabica' ? 'selected' : '' }}>
                    Arabica
                </option>
                <option value="robusta" {{ request('category') === 'robusta' ? 'selected' : '' }}>
                    Robusta
                </option>
            </select>

            <button type="submit" class="btn">Search</button>

            <a href="{{ route('shop.index') }}" class="btn btn-outline">
                Reset
            </a>
        </form>

        <div class="product-grid">
            @forelse ($products as $product)
                <article class="product-card">
                    <div class="product-image">
                        @if (!empty($product->image))
                            <img
                                src="{{ asset('storage/' . $product->image) }}"
                                alt="{{ $product->name }}"
                                loading="lazy"
                            >
                        @else
                            <div class="image-placeholder" aria-label="Coffee">
                                ☕
                            </div>
                        @endif
                    </div>

                    <div class="product-info">
                        <div class="product-category">
                            {{ $product->category ?? 'Coffee' }}
                            @if (!empty($product->type))
                                · {{ $product->type }}
                            @endif
                        </div>

                        <h3>{{ $product->name }}</h3>

                        <p class="product-description">
                            {{ $product->description ?: 'Discover the character and flavour of this coffee selection.' }}
                        </p>

                        <div class="product-meta">
                            <span>
                                @if (!empty($product->weight))
                                    {{ $product->weight }}
                                @else
                                    Coffee Selection
                                @endif
                            </span>

                            <span class="product-price">
                                Rp {{ number_format((float) $product->price, 0, ',', '.') }}
                            </span>
                        </div>

                        <div class="product-actions">
                            @if ($isCustomer)
                                <form
                                    action="{{ route('cart.add', $product->id) }}"
                                    method="POST"
                                >
                                    @csrf

                                    <input type="hidden" name="quantity" value="1">

                                    <button type="submit" class="btn">
                                        Add to Cart
                                    </button>
                                </form>
                            @elseif ($isAdmin)
                                <a href="{{ route('product.index') }}" class="btn btn-outline">
                                    Manage Product
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="btn">
                                    Login to Shop
                                </a>
                            @endif
                        </div>
                    </div>
                </article>
            @empty
                <div class="empty-state">
                    <h3>No Coffee Found</h3>
                    <p>
                        There are no products matching your search.
                        Try another keyword or reset the filter.
                    </p>
                    <br>
                    <a href="{{ route('shop.index') }}" class="btn btn-outline">
                        View All Coffee
                    </a>
                </div>
            @endforelse
        </div>
    </main>

    <footer class="footer">
        © {{ date('Y') }} CANO DE VASCO · PREMIUM COFFEE
    </footer>

</body>
</html>