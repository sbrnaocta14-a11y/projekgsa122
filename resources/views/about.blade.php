<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Coffee News | CANO DE VASCO
    </title>


    <style>

.manual-news-grid {

    display: grid;

    grid-template-columns:
        repeat(3, 1fr);

    gap: 22px;
}


.manual-news-card {

    min-height: 300px;

    display: flex;

    flex-direction: column;

    padding: 27px;

    background: #0a0c09;

    border: 1px solid #292d24;

    transition: 0.3s;
}


.manual-news-card:hover {

    transform: translateY(-5px);

    border-color: #a88955;
}


.manual-news-meta {

    display: flex;

    justify-content: space-between;

    gap: 10px;

    margin-bottom: 20px;
}


.manual-news-meta span {

    color: #a88955;

    font-size: 10px;

    font-weight: bold;

    letter-spacing: 1.5px;

    text-transform: uppercase;
}


.manual-news-meta small {

    color: #666a60;

    font-size: 10px;
}


.manual-news-card h3 {

    font-family:
        Georgia,
        "Times New Roman",
        serif;

    color: #eeeae0;

    font-size: 21px;

    line-height: 1.4;

    font-weight: normal;

    margin-bottom: 16px;
}


.manual-news-card > p {

    color: #8d9084;

    font-size: 14px;

    line-height: 1.75;

    flex-grow: 1;
}


.manual-news-status {

    margin-top: 20px;

    font-size: 10px;

    letter-spacing: 1px;

    font-weight: bold;
}


.status-on {

    color: #a88955;
}


.status-off {

    color: #666a60;
}


.manual-news-actions {

    display: flex;

    gap: 10px;

    margin-top: 20px;
}


.manual-news-actions a,
.manual-news-actions button {

    padding: 9px 14px;

    border: 1px solid #292d24;

    background: transparent;

    font-size: 10px;

    font-weight: bold;

    letter-spacing: 1px;

    text-transform: uppercase;

    cursor: pointer;

    text-decoration: none;
}


.edit-news-btn {

    color: #a88955;
}


.edit-news-btn:hover {

    border-color: #a88955;
}


.delete-news-btn {

    color: #a66b6b;

    border-color: #4a2b2b !important;
}


.delete-news-btn:hover {

    background: #241313;
}


.manual-news-empty {

    grid-column: 1 / -1;

    text-align: center;

    padding: 60px 20px;

    background: #0a0c09;

    border: 1px solid #292d24;
}


.empty-icon {

    font-size: 35px;

    color: #a88955;

    margin-bottom: 15px;
}


.manual-news-empty h3 {

    font-family:
        Georgia,
        "Times New Roman",
        serif;

    font-size: 23px;

    font-weight: normal;

    margin-bottom: 10px;
}


.manual-news-empty p {

    color: #777a70;

    font-size: 13px;
}


@media (max-width: 900px) {

    .manual-news-grid {

        grid-template-columns:
            repeat(2, 1fr);
    }

}


@media (max-width: 600px) {

    .manual-news-grid {

        grid-template-columns: 1fr;
    }

}

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        body {

            min-height: 100vh;

            background:
                radial-gradient(
                    circle at 15% 10%,
                    rgba(104, 112, 67, 0.16),
                    transparent 30%
                ),

                radial-gradient(
                    circle at 85% 90%,
                    rgba(168, 137, 85, 0.10),
                    transparent 30%
                ),

                linear-gradient(
                    135deg,
                    #050604,
                    #0b0d09,
                    #030403
                );

            color: #f1ede5;

            font-family:
                Arial,
                Helvetica,
                sans-serif;

            padding: 40px 20px;
        }


        /* =====================================
           CONTAINER
        ===================================== */

        .container {

            width: 100%;

            max-width: 1180px;

            margin: auto;
        }


        /* =====================================
           HEADER
        ===================================== */

        .header {

            text-align: center;

            margin-bottom: 48px;
        }


        .top-line {

            width: 55px;

            height: 2px;

            background: #a88955;

            margin: 0 auto 24px;
        }


        .brand {

            color: #a88955;

            font-size: 12px;

            font-weight: bold;

            letter-spacing: 4px;

            margin-bottom: 15px;
        }


        .header h1 {

            font-family:
                Georgia,
                "Times New Roman",
                serif;

            font-size: 42px;

            font-weight: normal;

            letter-spacing: 0.5px;

            color: #f1ede5;

            margin-bottom: 14px;
        }


        .header p {

            max-width: 650px;

            margin: auto;

            color: #929486;

            font-size: 15px;

            line-height: 1.7;
        }


        /* =====================================
           UPDATE INFO
        ===================================== */

        .update-info {

            display: flex;

            justify-content: center;

            align-items: center;

            gap: 9px;

            margin-top: 20px;

            color: #777a70;

            font-size: 12px;

            letter-spacing: 0.5px;
        }


        .live-dot {

            width: 7px;

            height: 7px;

            border-radius: 50%;

            background: #a88955;

            box-shadow:
                0 0 10px rgba(168, 137, 85, 0.6);
        }


        /* =====================================
           NEWS GRID
        ===================================== */

        .news-grid {

            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 22px;
        }


        /* =====================================
           NEWS CARD
        ===================================== */

        .news-card {

            min-height: 320px;

            display: flex;

            flex-direction: column;

            padding: 27px;

            background: #0a0c09;

            border: 1px solid #292d24;

            transition:
                transform 0.3s ease,
                border-color 0.3s ease,
                box-shadow 0.3s ease;
        }


        .news-card:hover {

            transform: translateY(-5px);

            border-color: #a88955;

            box-shadow:
                0 18px 40px rgba(0, 0, 0, 0.35);
        }


        /* =====================================
           NEWS META
        ===================================== */

        .news-meta {

            display: flex;

            justify-content: space-between;

            align-items: center;

            gap: 10px;

            margin-bottom: 20px;
        }


        .news-source {

            color: #a88955;

            font-size: 10px;

            font-weight: bold;

            letter-spacing: 1.5px;

            text-transform: uppercase;
        }


        .news-date {

            color: #666a60;

            font-size: 10px;

            white-space: nowrap;
        }


        /* =====================================
           NEWS TITLE
        ===================================== */

        .news-title {

            font-family:
                Georgia,
                "Times New Roman",
                serif;

            font-size: 21px;

            line-height: 1.4;

            font-weight: normal;

            color: #eeeae0;

            margin-bottom: 16px;
        }


        /* =====================================
           NEWS DESCRIPTION
        ===================================== */

        .news-description {

            color: #8d9084;

            font-size: 14px;

            line-height: 1.75;

            flex-grow: 1;

            margin-bottom: 24px;
        }

.news-admin-button {
    margin-top: 25px;
    text-align: center;
}

.news-admin-button a {
    display: inline-block;

    padding: 12px 22px;

    background: #a88955;

    color: #080a07;

    border: 1px solid #a88955;

    text-decoration: none;

    font-size: 11px;

    font-weight: bold;

    letter-spacing: 1px;

    text-transform: uppercase;

    transition: 0.2s;
}

.news-admin-button a:hover {
    background: #d0ae72;
    border-color: #d0ae72;
}

        /* =====================================
           READ MORE
        ===================================== */

        .read-more {

            display: inline-flex;

            align-items: center;

            gap: 8px;

            color: #a88955;

            font-size: 12px;

            font-weight: bold;

            letter-spacing: 1px;

            text-decoration: none;

            text-transform: uppercase;

            transition: 0.2s;
        }


        .read-more:hover {

            color: #d0ae72;

            gap: 12px;
        }


        /* =====================================
           EMPTY STATE
        ===================================== */

        .empty {

            grid-column: 1 / -1;

            text-align: center;

            padding: 70px 20px;

            border: 1px solid #292d24;

            background: #0a0c09;
        }


        .empty-icon {

            font-size: 40px;

            color: #a88955;

            margin-bottom: 18px;
        }


        .empty h2 {

            font-family:
                Georgia,
                "Times New Roman",
                serif;

            font-size: 24px;

            font-weight: normal;

            margin-bottom: 10px;
        }


        .empty p {

            color: #777a70;

            font-size: 14px;
        }


        /* =====================================
           FOOTER
        ===================================== */

        .footer {

            text-align: center;

            margin-top: 45px;

            padding-top: 25px;

            border-top: 1px solid #252820;

            color: #666960;

            font-size: 11px;

            line-height: 1.7;
        }


        .footer strong {

            color: #a88955;

            font-weight: normal;
        }


        /* =====================================
           BACK BUTTON
        ===================================== */

        .back-btn {

            display: inline-block;

            margin-top: 25px;

            color: #85887b;

            text-decoration: none;

            font-size: 12px;

            transition: 0.2s;
        }


        .back-btn:hover {

            color: #a88955;
        }


        /* =====================================
           TABLET
        ===================================== */

        @media (max-width: 900px) {

            body {

                padding: 35px 18px;
            }


            .news-grid {

                grid-template-columns:
                    repeat(2, 1fr);
            }


            .header h1 {

                font-size: 37px;
            }
        }


        /* =====================================
           MOBILE
        ===================================== */

        @media (max-width: 600px) {

            body {

                padding: 28px 15px;
            }


            .header {

                margin-bottom: 35px;
            }


            .brand {

                font-size: 10px;

                letter-spacing: 3px;
            }


            .header h1 {

                font-size: 31px;

                line-height: 1.25;
            }


            .header p {

                font-size: 13px;

                line-height: 1.7;
            }


            .update-info {

                font-size: 11px;

                flex-wrap: wrap;
            }


            .news-grid {

                grid-template-columns: 1fr;

                gap: 17px;
            }


            .news-card {

                min-height: auto;

                padding: 23px;
            }


            .news-title {

                font-size: 20px;
            }


            .news-description {

                font-size: 13px;

                line-height: 1.7;
            }


            .news-meta {

                align-items: flex-start;

                flex-direction: column;

                gap: 7px;
            }
        }


        /* =====================================
           SMALL MOBILE
        ===================================== */

        @media (max-width: 360px) {

            .header h1 {

                font-size: 28px;
            }


            .news-card {

                padding: 20px;
            }


            .news-title {

                font-size: 18px;
            }
        }

    </style>

</head>


<body>


<div class="container">


    <!-- =====================================
         HEADER
    ====================================== -->

    <header class="header">

        <div class="top-line"></div>

        <div class="brand">
            CANO DE VASCO
        </div>

        <h1>
            Coffee News
        </h1>

        <p>
            Discover the latest stories, trends,
            innovations, and developments from
            the world of coffee.
        </p>


        <div class="update-info">

            <span class="live-dot"></span>

            <span>
                Updated automatically from coffee news sources
            </span>
@auth

    <div class="news-admin-button">

        <a href="{{ route('news.create') }}">
            + Add News
        </a>

    </div>

@endauth

@auth

<section class="manual-news-section">


    <div class="manual-news-grid">

        @forelse($manualNews as $article)

            <article class="manual-news-card">

                <div class="manual-news-meta">

                    <span>
                        {{ $article->source }}
                    </span>

                    @if($article->date)

                        <small>
                            {{ $article->date->format('d M Y') }}
                        </small>

                    @endif

                </div>


                <h3>
                    {{ $article->title }}
                </h3>


                <p>
                    {{ $article->description }}
                </p>


                <div class="manual-news-status">

                    @if($article->show_on_home)

                        <span class="status-on">
                            ● SHOW ON HOME
                        </span>

                    @else

                        <span class="status-off">
                            ● HIDDEN FROM HOME
                        </span>

                    @endif

                </div>


                <div class="manual-news-actions">

                    <a
                        href="{{ route('news.edit', $article->id) }}"
                        class="edit-news-btn"
                    >
                        Edit
                    </a>


                    <form
                        action="{{ route('news.destroy', $article->id) }}"
                        method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus berita ini?')"
                    >

                        @csrf

                        @method('DELETE')

                        <button
                            type="submit"
                            class="delete-news-btn"
                        >
                            Delete
                        </button>

                    </form>

                </div>

            </article>

        @empty

            <div class="manual-news-empty">

                <div class="empty-icon">
                    ☕
                </div>

                <h3>
                    No Personal News Yet
                </h3>

                <p>
                    Click "+ Add News" to create your first story.
                </p>

            </div>

        @endforelse

    </div>

</section>

@endauth
        </div>

    </header>



    <!-- =====================================
         NEWS
    ====================================== -->

    <section class="news-grid">


        @forelse(collect($news)->take(9) as $article)

            <article class="news-card">


                <!-- META -->

                <div class="news-meta">

                    <span class="news-source">
                        {{ $article['source'] }}
                    </span>


                    @if(!empty($article['date']))

                        <span class="news-date">

                            {{ \Carbon\Carbon::parse($article['date'])->format('d M Y') }}

                        </span>

                    @endif

                </div>


                <!-- TITLE -->

                <h2 class="news-title">

                    {{ $article['title'] }}

                </h2>


                <!-- DESCRIPTION -->

                <p class="news-description">

                    {{ $article['description'] }}

                </p>


                <!-- READ -->

                <a
                    href="{{ $article['link'] }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="read-more"
                >

                    Read Full Story

                    <span>
                        →
                    </span>

                </a>


            </article>

        @empty


            <div class="empty">

                <div class="empty-icon">
                    ☕
                </div>

                <h2>
                    Coffee News Is Temporarily Unavailable
                </h2>

                <p>
                    Please check again in a few moments.
                </p>

            </div>


        @endforelse


    </section>



    <!-- =====================================
         FOOTER
    ====================================== -->

    <footer class="footer">

        <p>
            News displayed by
            <strong> C A N O  D E  V A S C O </strong>
            is sourced from external coffee publications.
        </p>

        <p>
            Headlines and links belong to their
            respective publishers.
        </p>


        <a
            href="/home"
            class="back-btn"
        >
            ← Back to Home
        </a>

    </footer>


</div>


</body>

</html>