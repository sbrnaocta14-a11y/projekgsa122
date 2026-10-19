
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard | CANO DE VASCO</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background:
                radial-gradient(circle at 80% 10%, rgba(83,92,43,.10), transparent 32%),
                radial-gradient(circle at 15% 85%, rgba(83,92,43,.06), transparent 30%),
                #0b0c09;
            color: #fff;
            min-height: 100vh;
            overflow-x: hidden;
        }

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 230px;
            height: 100vh;
            background: linear-gradient(180deg, #10120d, #0a0b09);
            border-right: 1px solid #2b3022;
            padding: 28px 18px;
            display: flex;
            flex-direction: column;
            z-index: 1000;
        }

        .logo {
            padding: 8px 14px 35px;
            font-size: 21px;
            font-weight: 700;
            letter-spacing: 3px;
            color: #fff;
        }

        .logo span {
            color: #697154;
            font-weight: normal;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 14px 15px;
            color: #858a7c;
            text-decoration: none;
            border-radius: 10px;
            font-size: 15px;
            transition: .25s;
            border: 1px solid transparent;
        }

        .menu a:hover,
        .menu a.active {
            color: #fff;
            background: rgba(83,92,43,.15);
            border-color: #424a2b;
        }

        .menu a.active {
            box-shadow: inset 3px 0 0 #68743b;
        }

        .menu-icon {
            width: 21px;
            text-align: center;
            font-size: 18px;
        }

        .sidebar-bottom {
            margin-top: auto;
            border-top: 1px solid #292d24;
            padding-top: 18px;
        }

        .user-box {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 11px;
            text-decoration: none;
            border-radius: 10px;
        }

        .user-box:hover {
            background: rgba(83,92,43,.08);
        }

        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(145deg,#535c2b,#282d19);
            border: 1px solid #626d34;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
            font-weight: 600;
            flex-shrink: 0;
        }

        .user-info {
            min-width: 0;
            display: flex;
            flex-direction: column;
        }

        .user-info strong {
            font-size: 13px;
            color: #fff;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .user-info span {
            font-size: 11px;
            color: #777c70;
            margin-top: 4px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .logout {
            width: 100%;
            margin-top: 8px;
            padding: 12px 13px;
            border: 1px solid transparent;
            border-radius: 9px;
            background: transparent;
            color: #777c70;
            text-align: left;
            cursor: pointer;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 13px;
        }

        .logout:hover {
            background: rgba(83,92,43,.08);
            color: #fff;
        }

        .main {
            margin-left: 230px;
            padding: 42px 50px;
            max-width: 1550px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 42px;
        }

        .page-title small {
            color: #7d865c;
            font-size: 11px;
            letter-spacing: 2.5px;
            text-transform: uppercase;
        }

        .page-title h1 {
            font-size: 34px;
            margin-top: 9px;
            font-weight: 500;
        }

        .page-title h1 span {
            color: #6f765e;
            font-weight: 300;
        }

        .top-user {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #aaa;
            font-size: 14px;
        }

        .top-user-avatar {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: linear-gradient(145deg,#30361f,#171914);
            border: 1px solid #414a29;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .welcome {
            padding: 34px;
            border: 1px solid #303529;
            border-radius: 18px;
            background: linear-gradient(135deg,rgba(48,55,29,.32),rgba(18,20,15,.80));
            margin-bottom: 30px;
            position: relative;
            overflow: hidden;
        }

        .welcome-label {
            color: #7d865c;
            font-size: 11px;
            letter-spacing: 2.5px;
            text-transform: uppercase;
        }

        .welcome h2 {
            font-size: 31px;
            margin-top: 12px;
            font-weight: 500;
        }

        .welcome p {
            color: #858a7c;
            margin-top: 11px;
            font-size: 15px;
            line-height: 1.7;
            max-width: 700px;
        }

        .section-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 36px 0 17px;
        }

        .section-title h3 {
            font-size: 18px;
            font-weight: 500;
        }

        .section-title span {
            color: #666b5d;
            font-size: 12px;
        }

        .overview {
            display: grid;
            grid-template-columns: repeat(3,1fr);
            gap: 20px;
        }

        .stat-card {
            padding: 26px;
            border: 1px solid #30342a;
            border-radius: 15px;
            background: linear-gradient(145deg,#1b1d17,#0e0f0c);
            transition: .25s;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            border-color: #535c2b;
        }

        .stat-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .stat-name {
            color: #858a7c;
            font-size: 13px;
        }

        .stat-icon {
            width: 38px;
            height: 38px;
            border-radius: 9px;
            background: rgba(83,92,43,.13);
            border: 1px solid #3b4327;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .stat-number {
            font-size: 29px;
            margin-top: 19px;
            font-weight: 500;
        }

        .stat-description {
            color: #777c70;
            font-size: 12px;
            margin-top: 6px;
        }

        .content-grid {
            display: grid;
            grid-template-columns: 1.3fr .7fr;
            gap: 22px;
            margin-top: 22px;
        }

        .panel {
            border: 1px solid #30342a;
            border-radius: 15px;
            background: linear-gradient(145deg,#1b1d17,#0e0f0c);
            padding: 26px;
        }

        .panel-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .panel-header h3 {
            font-size: 17px;
            font-weight: 500;
        }

        .panel-header a {
            color: #7d865c;
            text-decoration: none;
            font-size: 12px;
        }

        .activity {
            display: flex;
            gap: 14px;
            padding: 16px 0;
            border-bottom: 1px solid #252922;
        }

        .activity:last-child {
            border-bottom: none;
        }

        .activity-icon,
        .quick-icon {
            width: 38px;
            height: 38px;
            border-radius: 9px;
            background: rgba(83,92,43,.12);
            border: 1px solid #363d26;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .activity-text {
            flex: 1;
        }

        .activity-text strong {
            display: block;
            font-size: 14px;
            font-weight: 500;
        }

        .activity-text span {
            display: block;
            color: #858a7c;
            font-size: 11px;
            margin-top: 6px;
        }

        .quick-list {
            display: flex;
            flex-direction: column;
            gap: 11px;
        }

        .quick-link {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 14px;
            color: #aaa;
            text-decoration: none;
            border: 1px solid #292d24;
            border-radius: 10px;
            transition: .2s;
        }

        .quick-link:hover {
            color: #fff;
            border-color: #535c2b;
            background: rgba(83,92,43,.08);
        }

        .quick-text {
            flex: 1;
            font-size: 13px;
        }

        .arrow {
            color: #59604f;
        }

        .coffee-section {
            margin-top: 22px;
        }

        .coffee-grid {
            display: grid;
            grid-template-columns: repeat(3,1fr);
            gap: 18px;
        }

        .coffee-card {
            padding: 19px;
            border: 1px solid #30342a;
            border-radius: 14px;
            background: linear-gradient(145deg,#1b1d17,#0e0f0c);
            transition: .25s;
        }

        .coffee-card:hover {
            transform: translateY(-5px);
            border-color: #535c2b;
        }

        .coffee-image {
            height: 125px;
            border-radius: 10px;
            background: radial-gradient(circle at center,rgba(83,92,43,.22),#11130e 70%);
            border: 1px solid #2e3425;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            margin-bottom: 15px;
        }

        .coffee-card small {
            color: #7d865c;
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 1.2px;
        }

        .coffee-card h4 {
            font-size: 16px;
            font-weight: 500;
            margin-top: 6px;
        }

        .coffee-card p {
            color: #858a7c;
            font-size: 11px;
            margin-top: 6px;
            line-height: 1.6;
        }

        .coffee-button {
            display: block;
            margin-top: 14px;
            width: 100%;
            padding: 10px;
            text-align: center;
            border: 1px solid #424832;
            border-radius: 8px;
            color: #aaa;
            text-decoration: none;
            font-size: 11px;
            transition: .2s;
        }

        .coffee-button:hover {
            color: #fff;
            background: #535c2b;
            border-color: #68743b;
        }

        @media (max-width: 1000px) {
            .main {
                padding: 30px;
            }

            .content-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 800px) {
            .sidebar {
                width: 75px;
                padding: 20px 10px;
            }

            .logo {
                font-size: 0;
                text-align: center;
                padding: 8px 0 30px;
            }

            .logo::before {
                content: "CV";
                font-size: 18px;
            }

            .logo span,
            .user-info {
                display: none;
            }

            .menu a {
                justify-content: center;
                padding: 13px 8px;
            }

            .menu a span:last-child {
                display: none;
            }

            .menu-icon {
                width: auto;
            }

            .user-box {
                justify-content: center;
            }

            .logout {
                justify-content: center;
                font-size: 0;
            }

            .logout span {
                font-size: 17px;
            }

            .main {
                margin-left: 75px;
                padding: 25px;
            }

            .coffee-grid {
                grid-template-columns: repeat(2,1fr);
            }
        }

        @media (max-width: 600px) {
            .main {
                padding: 20px 15px;
            }

            .top-user {
                display: none;
            }

            .page-title h1 {
                font-size: 28px;
            }

            .welcome {
                padding: 24px;
            }

            .welcome h2 {
                font-size: 25px;
            }

            .overview,
            .coffee-grid {
                grid-template-columns: 1fr;
            }

            .section-title {
                align-items: flex-start;
                gap: 10px;
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

@php
    $user = Auth::user();
    $isAdmin = $user && $user->role === 'admin';
    $cart = session('cart', []);
    $cartCount = array_sum($cart);
@endphp

<aside class="sidebar">

    <div class="logo">CANO DE<span> VASCO</span></div>

    <nav class="menu">
        <a href="{{ route('dashboard') }}" class="active">
            <span class="menu-icon">▣</span>
            <span>Dashboard</span>
        </a>

        <a href="{{ route('home') }}">
            <span class="menu-icon">⌂</span>
            <span>Home</span>
        </a>

        <a href="{{ route('profile') }}">
            <span class="menu-icon">♙</span>
            <span>Profile</span>
        </a>

        <a href="{{ route('shop.index') }}">
            <span class="menu-icon">☕</span>
            <span>Coffee</span>
        </a>

        @if($isAdmin)
            <a href="{{ route('product.index') }}">
                <span class="menu-icon">▤</span>
                <span>Manage Products</span>
            </a>

            <a href="{{ route('admin.orders.index') }}">
                <span class="menu-icon">▣</span>
                <span>Manage Orders</span>
            </a>
        @else
            <a href="{{ route('cart.index') }}">
                <span class="menu-icon">🛒</span>
                <span>My Cart ({{ $cartCount }})</span>
            </a>

            <a href="{{ route('orders.mine') }}">
                <span class="menu-icon">▤</span>
                <span>My Orders</span>
            </a>
        @endif

        <a href="{{ route('settings') }}">
            <span class="menu-icon">⚙</span>
            <span>Settings</span>
        </a>
    </nav>

    <div class="sidebar-bottom">
        <a href="{{ route('profile') }}" class="user-box">
            <div class="avatar">
                {{ strtoupper(substr($user->name ?? 'U', 0, 1)) }}
            </div>

            <div class="user-info">
                <strong>{{ $user->name ?? 'User' }}</strong>
                <span>{{ $user->email ?? '' }}</span>
            </div>
        </a>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout">
                <span>↪</span> Logout
            </button>
        </form>
    </div>

</aside>

<main class="main">

    <div class="topbar">
        <div class="page-title">
            <small>CANO DE VASCO / ACCOUNT</small>
            <h1>Dashboard <span>Overview</span></h1>
        </div>

        <div class="top-user">
            <div class="top-user-avatar">👤</div>
            <span>{{ $user->name ?? 'User' }}</span>
        </div>
    </div>

    <section class="welcome">
        <div class="welcome-label">
            {{ $isAdmin ? 'Administrator Dashboard' : 'Welcome Back' }}
        </div>

        <h2>Hello, {{ $user->name ?? 'User' }}.</h2>

        <p>
            @if($isAdmin)
                Manage your coffee collection, review customer orders,
                and verify payments from your dashboard.
            @else
                Welcome to your CANO DE VASCO account.
                Explore our coffee collection, add your favorites to the cart,
                and manage your orders from one place.
            @endif
        </p>
    </section>

    <div class="section-title">
        <h3>Account Overview</h3>
        <span>{{ $isAdmin ? 'Store management' : 'Your personal space' }}</span>
    </div>

    <section class="overview">

        <div class="stat-card">
            <div class="stat-top">
                <span class="stat-name">Account</span>
                <div class="stat-icon">♙</div>
            </div>
            <div class="stat-number">✓</div>
            <div class="stat-description">
                {{ $isAdmin ? 'Administrator account' : 'Customer account active' }}
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-top">
                <span class="stat-name">
                    {{ $isAdmin ? 'Product Management' : 'My Orders' }}
                </span>
                <div class="stat-icon">
                    {{ $isAdmin ? '☕' : '▤' }}
                </div>
            </div>
            <div class="stat-number">
                {{ $isAdmin ? 'Admin' : 'Orders' }}
            </div>
            <div class="stat-description">
                @if($isAdmin)
                    <a href="{{ route('product.index') }}" style="color:#a9b17f;text-decoration:none">
                        Manage coffee products →
                    </a>
                @else
                    <a href="{{ route('orders.mine') }}" style="color:#a9b17f;text-decoration:none">
                        View your orders →
                    </a>
                @endif
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-top">
                <span class="stat-name">{{ $isAdmin ? 'Orders' : 'Cart' }}</span>
                <div class="stat-icon">{{ $isAdmin ? '▣' : '🛒' }}</div>
            </div>
            <div class="stat-number">
                {{ $isAdmin ? 'Manage' : $cartCount }}
            </div>
            <div class="stat-description">
                @if($isAdmin)
                    <a href="{{ route('admin.orders.index') }}" style="color:#a9b17f;text-decoration:none">
                        Review customer orders →
                    </a>
                @else
                    <a href="{{ route('cart.index') }}" style="color:#a9b17f;text-decoration:none">
                        View your cart →
                    </a>
                @endif
            </div>
        </div>

    </section>

    <section class="content-grid">

        <div class="panel">
            <div class="panel-header">
                <h3>Recent Activity</h3>
                <a href="{{ route('shop.index') }}">Browse Coffee →</a>
            </div>

            <div class="activity">
                <div class="activity-icon">♙</div>
                <div class="activity-text">
                    <strong>Account ready</strong>
                    <span>Your CANO DE VASCO account is ready to use.</span>
                </div>
            </div>

            <div class="activity">
                <div class="activity-icon">☕</div>
                <div class="activity-text">
                    <strong>Discover our coffee</strong>
                    <span>Explore the Arabica and Robusta collection.</span>
                </div>
            </div>

            <div class="activity">
                <div class="activity-icon">⚙</div>
                <div class="activity-text">
                    <strong>Manage your account</strong>
                    <span>Update your profile and account settings.</span>
                </div>
            </div>
        </div>

        <div class="panel">
            <div class="panel-header">
                <h3>Quick Access</h3>
            </div>

            <div class="quick-list">
                <a href="{{ route('shop.index') }}" class="quick-link">
                    <div class="quick-icon">☕</div>
                    <div class="quick-text">Browse Coffee</div>
                    <div class="arrow">→</div>
                </a>

                @if($isAdmin)
                    <a href="{{ route('product.index') }}" class="quick-link">
                        <div class="quick-icon">▤</div>
                        <div class="quick-text">Manage Products</div>
                        <div class="arrow">→</div>
                    </a>

                    <a href="{{ route('admin.orders.index') }}" class="quick-link">
                        <div class="quick-icon">▣</div>
                        <div class="quick-text">Manage Orders</div>
                        <div class="arrow">→</div>
                    </a>
                @else
                    <a href="{{ route('cart.index') }}" class="quick-link">
                        <div class="quick-icon">🛒</div>
                        <div class="quick-text">My Cart ({{ $cartCount }})</div>
                        <div class="arrow">→</div>
                    </a>

                    <a href="{{ route('orders.mine') }}" class="quick-link">
                        <div class="quick-icon">▤</div>
                        <div class="quick-text">My Orders</div>
                        <div class="arrow">→</div>
                    </a>
                @endif

                <a href="{{ route('profile') }}" class="quick-link">
                    <div class="quick-icon">♙</div>
                    <div class="quick-text">My Profile</div>
                    <div class="arrow">→</div>
                </a>

                <a href="{{ route('home') }}" class="quick-link">
                    <div class="quick-icon">⌂</div>
                    <div class="quick-text">Back to Home</div>
                    <div class="arrow">→</div>
                </a>
            </div>
        </div>

    </section>

    <section class="coffee-section">
        <div class="section-title">
            <h3>Discover Our Coffee</h3>
            <span>Selected for your journey</span>
        </div>

        <div class="coffee-grid">

            <div class="coffee-card">
                <div class="coffee-image">☕</div>
                <small>Arabica</small>
                <h4>Arabica Collection</h4>
                <p>Discover the aroma and distinctive character of Arabica coffee.</p>
                <a href="{{ route('shop.index') }}" class="coffee-button">
                    View Coffee
                </a>
            </div>

            <div class="coffee-card">
                <div class="coffee-image">☕</div>
                <small>Arabica</small>
                <h4>Explore Our Selection</h4>
                <p>Find coffee suited to your preferred taste and brewing style.</p>
                <a href="{{ route('shop.index') }}" class="coffee-button">
                    View Coffee
                </a>
            </div>

            <div class="coffee-card">
                <div class="coffee-image">☕</div>
                <small>Robusta</small>
                <h4>Robusta Collection</h4>
                <p>Explore robust coffee character and a bold flavour profile.</p>
                <a href="{{ route('shop.index') }}" class="coffee-button">
                    View Coffee
                </a>
            </div>

        </div>
    </section>

</main>

</body>
</html>
