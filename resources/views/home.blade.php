
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CANO DE VASCO | Coffee</title>

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
            background: #0b0c09;
            color: #ffffff;
            overflow-x: hidden;
        }

        a {
            transition: all 0.3s ease;
        }

        /* NAVBAR */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 75px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 7%;
            background: rgba(11, 12, 9, 0.96);
            border-bottom: 1px solid #292d23;
            z-index: 1000;
        }

        .brand {
            text-decoration: none;
            color: #ffffff;
            font-size: 20px;
            font-weight: bold;
            letter-spacing: 3px;
            white-space: nowrap;
        }

        .brand span {
            color: #a88955;
            font-weight: normal;
        }

        .nav-links {
            display: flex;
            gap: 35px;
        }

        .nav-links a {
            text-decoration: none;
            color: #929486;
            font-size: 14px;
        }

        .nav-links a:hover,
        .nav-links .active {
            color: #ffffff;
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .login-btn,
        .register-btn {
            display: inline-block;
            text-decoration: none;
            padding: 10px 17px;
            font-size: 13px;
            border-radius: 25px;
        }

        .login-btn {
            color: #d0d0c8;
            border: 1px solid #35382d;
        }

        .login-btn:hover {
            border-color: #a88955;
            color: #ffffff;
        }

        .register-btn {
            color: #ffffff;
            background: #535c2b;
            border: 1px solid #68743b;
        }

        .register-btn:hover {
            background: #68743b;
            transform: translateY(-2px);
        }

        /* HERO */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 130px 8% 80px;
            position: relative;
            overflow: hidden;
            background: radial-gradient(
                circle at 75% 40%,
                rgba(83, 92, 43, 0.13),
                transparent 38%
            );
        }

        .hero-content {
            width: 55%;
            position: relative;
            z-index: 2;
        }

        .small-title {
            color: #a88955;
            font-size: 12px;
            letter-spacing: 4px;
            text-transform: uppercase;
            margin-bottom: 25px;
        }

        .hero h1 {
            font-size: clamp(55px, 7vw, 100px);
            line-height: 0.98;
            letter-spacing: -3px;
            margin-bottom: 30px;
        }

        .hero h1 span {
            color: #8c9668;
            font-weight: 300;
        }

        .hero p {
            max-width: 500px;
            color: #a0a295;
            font-size: 15px;
            line-height: 1.9;
            margin-bottom: 35px;
        }

        .hero-buttons {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .primary-btn,
        .secondary-btn {
            display: inline-block;
            padding: 14px 25px;
            text-decoration: none;
            border-radius: 30px;
            font-size: 13px;
        }

        .primary-btn {
            background: #535c2b;
            color: #ffffff;
            border: 1px solid #68743b;
        }

        .primary-btn:hover {
            background: #68743b;
            transform: translateY(-3px);
        }

        .secondary-btn {
            border: 1px solid #45483a;
            color: #d0d0c8;
        }

        .secondary-btn:hover {
            border-color: #a88955;
            color: #ffffff;
        }

        .coffee-visual {
            position: absolute;
            right: 8%;
            width: 400px;
            height: 400px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .coffee-circle {
            width: 350px;
            height: 350px;
            border-radius: 50%;
            background: radial-gradient(
                circle at 35% 30%,
                #6b7540,
                #333a1f 48%,
                #11130d 80%
            );
            box-shadow:
                0 0 100px rgba(83, 92, 43, 0.20),
                inset 0 0 50px rgba(0, 0, 0, 0.8);
        }

        /* GENERAL SECTION */
        .section {
            padding: 100px 7%;
        }

        .section-title {
            color: #a88955;
            font-size: 12px;
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-bottom: 14px;
        }

        .section h2 {
            font-size: clamp(32px, 4vw, 45px);
            margin-bottom: 20px;
            color: #ffffff;
        }

        .section-description {
            color: #a0a295;
            max-width: 600px;
            line-height: 1.9;
            font-size: 15px;
            margin-bottom: 40px;
        }

        /* FEATURED COFFEE */
        .products {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 28px;
        }

        .product-card {
            background: linear-gradient(145deg, #151710, #0e0f0c);
            border: 1px solid #30342a;
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .product-card:hover {
            border-color: #68743b;
            transform: translateY(-5px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
        }

        .product-image {
            height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: radial-gradient(
                circle at center,
                rgba(83, 92, 43, 0.20),
                #11120f 70%
            );
            border-bottom: 1px solid #292c23;
        }

        .coffee-bag {
            width: 165px;
            height: 210px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(145deg, #4e5630, #252a19);
            border: 1px solid #697440;
            border-radius: 9px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.35);
        }

        .coffee-bag span {
            color: #ffffff;
            font-size: 16px;
            letter-spacing: 3px;
            font-weight: bold;
        }

        .product-info {
            padding: 28px;
        }

        .product-info h3 {
            color: #ffffff;
            font-size: 23px;
            margin-bottom: 15px;
        }

        .product-info p {
            color: #a0a295;
            font-size: 15px;
            line-height: 1.8;
            margin-bottom: 28px;
        }

        .product-bottom {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
        }

        .price {
            color: #b8c18f;
            font-size: 15px;
            font-weight: 600;
        }

        .detail-btn {
            display: inline-block;
            padding: 10px 17px;
            border: 1px solid #424832;
            color: #e0e0d8;
            text-decoration: none;
            border-radius: 25px;
            font-size: 13px;
            white-space: nowrap;
        }

        .detail-btn:hover {
            background: #535c2b;
            border-color: #68743b;
            color: #ffffff;
        }

        /* LATEST COFFEE NEWS */
        .home-news {
            padding: 90px 7% 110px;
            background: #0b0c09;
            border-top: 1px solid #24271e;
        }

        .home-news-heading {
            margin-bottom: 35px;
        }

        .home-news-heading .section-title {
            margin-bottom: 14px;
        }

        .home-news-heading h2 {
            color: #f1ede5;
            font-family: Georgia, "Times New Roman", serif;
            font-size: clamp(32px, 4vw, 45px);
            font-weight: normal;
            margin-bottom: 15px;
        }

        .home-news-heading p {
            max-width: 650px;
            color: #a0a295;
            font-size: 15px;
            line-height: 1.8;
        }

        .home-news-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 28px;
        }

        .home-news-card {
            min-width: 0;
            min-height: 320px;
            display: flex;
            flex-direction: column;
            padding: 30px;
            background: linear-gradient(145deg, #151710, #0e0f0c);
            border: 1px solid #30342a;
            border-radius: 16px;
            transition: border-color 0.3s ease, transform 0.3s ease;
        }

        .home-news-card:hover {
            border-color: #a88955;
            transform: translateY(-4px);
        }

        .home-news-meta {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 24px;
        }

        .home-news-source {
            color: #b89a60;
            font-size: 12px;
            font-weight: bold;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        .home-news-date {
            color: #929486;
            font-size: 13px;
        }

        .home-news-card h3 {
            color: #f1ede5;
            font-family: Georgia, "Times New Roman", serif;
            font-size: clamp(22px, 2vw, 28px);
            font-weight: normal;
            line-height: 1.45;
            margin-bottom: 18px;
        }

        .home-news-card p {
            color: #b0b1a5;
            font-size: 15px;
            line-height: 1.85;
            margin-bottom: 28px;
            flex-grow: 1;
        }

        .home-news-link {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            align-self: flex-start;
            color: #c0a16a;
            font-size: 13px;
            font-weight: bold;
            letter-spacing: 1px;
            text-decoration: none;
        }

        .home-news-link:hover {
            color: #e0c28a;
            gap: 14px;
        }

        .home-news-empty {
            grid-column: 1 / -1;
            padding: 45px 25px;
            border: 1px solid #30342a;
            border-radius: 16px;
            color: #b0b1a5;
            text-align: center;
            line-height: 1.8;
        }

        .home-news-more {
            text-align: center;
            margin-top: 35px;
        }

        .home-news-more a {
            display: inline-block;
            padding: 13px 22px;
            border: 1px solid #555d37;
            border-radius: 25px;
            color: #c0a16a;
            font-size: 13px;
            font-weight: bold;
            letter-spacing: 1px;
            text-decoration: none;
        }

        .home-news-more a:hover {
            background: #535c2b;
            color: #ffffff;
        }

        /* CTA */
        .cta {
            margin: 30px 7% 100px;
            padding: 75px 30px;
            text-align: center;
            border-radius: 22px;
            border: 1px solid #34392a;
            background: radial-gradient(circle, #30371d, #10110d 70%);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.25);
        }

        .cta small {
            color: #b89a60;
            letter-spacing: 3px;
            text-transform: uppercase;
            font-size: 12px;
        }

        .cta h2 {
            font-family: Georgia, "Times New Roman", serif;
            font-size: clamp(32px, 4vw, 48px);
            margin: 20px 0;
            color: #ffffff;
        }

        .cta p {
            color: #a0a295;
            max-width: 550px;
            margin: 0 auto 30px;
            line-height: 1.8;
            font-size: 15px;
        }

        /* FOOTER */
        footer {
            border-top: 1px solid #292d24;
            padding: 35px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            background: #0b0c09;
        }

        footer p {
            color: #85887b;
            font-size: 13px;
        }

        /* RESPONSIVE */
        @media (max-width: 900px) {
            .navbar {
                padding: 0 5%;
            }

            .nav-links {
                gap: 18px;
            }

            .hero-content {
                width: 100%;
            }

            .coffee-visual {
                display: none;
            }

            .products {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .home-news-grid {
                gap: 20px;
            }

            .home-news-card {
                padding: 24px;
            }
        }

        @media (max-width: 650px) {
            .navbar {
                height: 68px;
            }

            .brand {
                font-size: 16px;
                letter-spacing: 2px;
            }

            .nav-links {
                display: none;
            }

            .nav-actions .register-btn {
                display: none;
            }

            .hero {
                min-height: 90vh;
                padding: 120px 6% 70px;
            }

            .hero h1 {
                font-size: 55px;
            }

            .hero p {
                font-size: 14px;
            }

            .section {
                padding: 75px 6%;
            }

            .products {
                grid-template-columns: 1fr;
            }

            .product-image {
                height: 260px;
            }

            .home-news {
                padding: 70px 6%;
            }

            .home-news-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .home-news-card {
                min-height: 280px;
                padding: 24px;
            }

            .home-news-card h3 {
                font-size: 24px;
            }

            .cta {
                margin: 20px 5% 70px;
                padding: 55px 22px;
            }

            footer {
                display: block;
                text-align: center;
            }

            footer p {
                margin-top: 15px;
                line-height: 1.7;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar">
        <a href="/" class="brand">
            CANODE<span>VASCO</span>
        </a>

        <div class="nav-links">
            <a href="/" class="active">Home</a>
            <a href="/about">About</a>
            <a href="#contact">Contact</a>
        </div>

        <div class="nav-actions">
            @guest
                <a href="/login" class="login-btn">Login</a>
                <a href="/register" class="register-btn">Register</a>
            @else
                <a href="/dashboard" class="login-btn">Dashboard</a>
                <a href="/product" class="register-btn">My Coffee</a>
            @endguest
        </div>
    </nav>

    <!-- HERO -->
    <section class="hero">
        <div class="hero-content">
            <div class="small-title">Specialty Coffee</div>

            <h1>
                Taste the<br>
                <span>quality.</span>
            </h1>

            <p>
                Discover carefully selected coffee beans,
                maintained with quality and passion for
                those who appreciate authentic coffee.
            </p>

            <div class="hero-buttons">
                @auth
                    <a href="/product" class="primary-btn">Explore Coffee</a>
                @else
                    <a href="/login" class="primary-btn">Explore Coffee</a>
                @endauth

                <a href="#about" class="secondary-btn">Our Story</a>
            </div>
        </div>

        <div class="coffee-visual">
            <div class="coffee-circle"></div>
        </div>
    </section>

    <!-- FEATURED COFFEE -->
    <section class="section">
        <div class="section-title">Our Selection</div>

        <h2>Featured Coffee</h2>

        <p class="section-description">
            Explore our selection of carefully maintained
            coffee beans with different characteristics,
            aromas, and flavor profiles.
        </p>

        <div class="products">

            <!-- ARABICA -->
            <div class="product-card">
                <div class="product-image">
                    <div class="coffee-bag">
                        <span>ARABICA</span>
                    </div>
                </div>

                <div class="product-info">
                    <h3>Arabica Coffee</h3>

                    <p>
                        Smooth acidity with balanced aroma
                        and naturally sweet characteristics.
                    </p>

                    <div class="product-bottom">
                        <span class="price">From $8.00</span>

                        @auth
                            <a href="/product" class="detail-btn">View Detail</a>
                        @else
                            <a href="/login" class="detail-btn">View Detail</a>
                        @endauth
                    </div>
                </div>
            </div>

            <!-- ROBUSTA -->
            <div class="product-card">
                <div class="product-image">
                    <div class="coffee-bag">
                        <span>ROBUSTA</span>
                    </div>
                </div>

                <div class="product-info">
                    <h3>Robusta Coffee</h3>

                    <p>
                        Strong body with deeper bitterness
                        and rich, powerful aroma.
                    </p>

                    <div class="product-bottom">
                        <span class="price">From $7.00</span>

                        @auth
                            <a href="/product" class="detail-btn">View Detail</a>
                        @else
                            <a href="/login" class="detail-btn">View Detail</a>
                        @endauth
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- LATEST COFFEE NEWS -->
    <section class="home-news" id="about">

        <div class="home-news-heading">
            <div class="section-title">CANO DE VASCO JOURNAL</div>

            <h2>Latest Coffee News</h2>

            <p>
                Discover the latest stories, trends, and developments
                from the world of coffee.
            </p>
        </div>

        <div class="home-news-grid">

            @forelse(collect($news ?? [])->take(2) as $article)

                <article class="home-news-card">

                    <div class="home-news-meta">
                        <span class="home-news-source">
                            {{ $article['source'] ?? 'Coffee News' }}
                        </span>

                        @if(!empty($article['date']))
                            <span class="home-news-date">
                                {{ \Carbon\Carbon::parse($article['date'])->format('d M Y') }}
                            </span>
                        @endif
                    </div>

                    <h3>
                        {{ $article['title'] ?? 'Coffee News' }}
                    </h3>

                    <p>
                        {{ $article['description'] ?? 'Read the latest coffee story from the original publisher.' }}
                    </p>

                    @if(!empty($article['link']))
                        <a
                            href="{{ $article['link'] }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="home-news-link"
                        >
                            READ FULL STORY <span>→</span>
                        </a>
                    @endif

                </article>

            @empty

                <div class="home-news-empty">
                    <h3>Coffee News Is Temporarily Unavailable</h3>
                    <p>Please check again in a few moments.</p>
                </div>

            @endforelse

            @if(isset($manualNews))

    @foreach($manualNews as $article)

        <article class="home-news-card">

            <div class="home-news-meta">

                <span class="home-news-source">
                    {{ $article->source }}
                </span>

                @if($article->date)

                    <span class="home-news-date">
                        {{ $article->date->format('d M Y') }}
                    </span>

                @endif

            </div>


            <h3>
                {{ $article->title }}
            </h3>


            <p>
                {{ $article->description }}
            </p>


            @if($article->link)

                <a
                    href="{{ $article->link }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="home-news-link"
                >
                    READ FULL STORY
                    <span>→</span>
                </a>

            @endif

        </article>

    @endforeach

@endif

        </div>

        <div class="home-news-more">
            <a href="/about">VIEW ALL COFFEE NEWS →</a>
        </div>

    </section>

    <!-- CONTACT / CTA -->
    <section class="cta" id="contact">
        <small>Discover Your Coffee</small>

        <h2>Find your perfect cup.</h2>

        <p>
            Explore our coffee selection and discover
            beans that match your taste.
        </p>

        @auth
            <a href="/product" class="primary-btn">Shop Coffee</a>
        @else
            <a href="/register" class="primary-btn">Start Exploring</a>
        @endauth
    </section>

    <!-- FOOTER -->
    <footer>
        <a href="/" class="brand">
            CANODE<span>VASCO</span>
        </a>

        <p>© 2026 CANO DE VASCO. Quality in every bean.</p>
    </footer>

</body>
</html>