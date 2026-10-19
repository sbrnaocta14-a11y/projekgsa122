
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout | CANO DE VASCO</title>
    <link rel="stylesheet" href="{{ asset('css/cano.css') }}">
</head>
<body>

<header class="navbar">
    <a href="{{ route('home') }}" class="brand">
        CANO DE<span>VASCO</span>
    </a>

    <nav class="nav-links">
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('shop.index') }}">Our Coffee</a>
        <a href="{{ route('cart.index') }}">My Cart</a>
    </nav>

    <div class="nav-actions">
        <a href="{{ route('orders.mine') }}" class="login-btn">
            My Orders
        </a>
    </div>
</header>

<section class="hero">
    <div>
        <div class="small-title">Almost Yours</div>
        <h1>Complete Your <span>Order.</span></h1>
        <p>
            Periksa pesanan, isi alamat pengiriman, dan pilih metode pembayaran
            untuk melanjutkan pembelian kopi favoritmu.
        </p>
    </div>
</section>

<main class="checkout-layout">

    <section class="checkout-panel">
        <h2>Shipping Information</h2>
        <p class="checkout-subtitle">
            Masukkan informasi penerima pesanan dengan benar.
        </p>

        @if ($errors->any())
            <div class="alert alert-error">
                <strong>Periksa kembali data kamu:</strong>
                <ul style="padding-left: 20px; margin-top: 8px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('checkout.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="customer_name">Nama Penerima</label>
                <input
                    type="text"
                    id="customer_name"
                    name="customer_name"
                    value="{{ old('customer_name', $user->name) }}"
                    maxlength="150"
                    required
                >
            </div>

            <div class="form-group">
                <label for="customer_email">Email</label>
                <input
                    type="email"
                    id="customer_email"
                    value="{{ $user->email }}"
                    readonly
                >
                <small>Email diambil dari akun yang sedang login.</small>
            </div>

            <div class="form-group">
                <label for="phone">Nomor Telepon</label>
                <input
                    type="tel"
                    id="phone"
                    name="phone"
                    value="{{ old('phone') }}"
                    placeholder="Contoh: 081234567890"
                    maxlength="30"
                    required
                >
            </div>

            <div class="form-group">
                <label for="shipping_address">Alamat Pengiriman</label>
                <textarea
                    id="shipping_address"
                    name="shipping_address"
                    rows="4"
                    maxlength="2000"
                    placeholder="Nama jalan, nomor rumah, kecamatan, kota, provinsi, dan kode pos"
                    required
                >{{ old('shipping_address') }}</textarea>
            </div>

            <div class="form-group">
                <label>Metode Pembayaran</label>

                <div class="payment-option">
                    <label class="payment-choice">
                        <input
                            type="radio"
                            name="payment_method"
                            value="bank_transfer"
                            {{ old('payment_method', 'bank_transfer') === 'bank_transfer' ? 'checked' : '' }}
                            required
                        >
                        <span>
                            <strong>Transfer Bank</strong>
                            <small>Transfer secara manual ke rekening toko.</small>
                        </span>
                    </label>

                    <label class="payment-choice">
                        <input
                            type="radio"
                            name="payment_method"
                            value="qris"
                            {{ old('payment_method') === 'qris' ? 'checked' : '' }}
                        >
                        <span>
                            <strong>QRIS</strong>
                            <small>Pembayaran melalui QRIS toko secara manual.</small>
                        </span>
                    </label>
                </div>

                <p class="payment-note">
                    Setelah pesanan dibuat, ikuti instruksi pembayaran dan
                    unggah bukti pembayaran pada halaman detail pesanan
                    jika fitur tersebut sudah tersedia.
                </p>
            </div>

            <button type="submit" class="btn checkout-submit">
                Place Order
            </button>

            <a href="{{ route('cart.index') }}" class="btn btn-outline checkout-back">
                Back to Cart
            </a>
        </form>
    </section>

    <aside class="checkout-panel order-summary">
        <h2>Order Summary</h2>
        <p class="checkout-subtitle">Ringkasan produk yang kamu pesan.</p>

        <div class="summary-items">
            @foreach ($items as $item)
                <div class="summary-item">
                    <div>
                        <strong>{{ $item['product']->name }}</strong>
                        <p>
                            @if (!empty($item['product']->weight))
                                {{ $item['product']->weight }}
                                ·
                            @endif
                            Qty: {{ $item['quantity'] }}
                        </p>
                    </div>

                    <span>
                        Rp {{ number_format($item['subtotal'], 0, ',', '.') }}
                    </span>
                </div>
            @endforeach
        </div>

        <div class="summary-total">
            <span>Total Pesanan</span>
            <strong>
                Rp {{ number_format($total, 0, ',', '.') }}
            </strong>
        </div>

        <p class="summary-note">
            Total dihitung berdasarkan harga produk dan jumlah yang dipilih.
            Ongkos kirim belum termasuk apabila nantinya diberlakukan.
        </p>
    </aside>

</main>

<footer class="footer">
    © {{ date('Y') }} CANO DE VASCO · PREMIUM COFFEE
</footer>

</body>
</html>
