<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Our Coffee | CANODEVASCO</title>


<style>

/* =========================================================
   CANODEVASCO
   FUTURISTIC COFFEE SYSTEM
   DESIGN ONLY
========================================================= */

:root {

    --black: #050604;
    --black-soft: #090b07;

    --panel: rgba(17, 20, 14, 0.88);
    --panel-solid: #11140e;

    --olive: #535c2b;
    --olive-light: #7d8950;
    --olive-soft: #697451;

    --cream: #f3f1e7;
    --white: #ffffff;

    --text: #e9e9df;
    --text-soft: #a4a99a;
    --text-muted: #74796c;

    --border: rgba(130, 145, 75, 0.25);

    --danger: #6d3737;
}


/* =========================================================
   RESET
========================================================= */

* {

    margin: 0;
    padding: 0;

    box-sizing: border-box;

    font-family:
        Arial,
        Helvetica,
        sans-serif;
}


html {

    scroll-behavior: smooth;

}


body {

    min-height: 100vh;

    color: var(--text);

    background:

        radial-gradient(
            circle at 12% 8%,
            rgba(83,92,43,0.18),
            transparent 25%
        ),

        radial-gradient(
            circle at 90% 80%,
            rgba(83,92,43,0.12),
            transparent 30%
        ),

        linear-gradient(
            135deg,
            #050604,
            #0b0d09 45%,
            #050604
        );

    overflow-x: hidden;

}


/* =========================================================
   FUTURISTIC GRID
========================================================= */

body::before {

    content: "";

    position: fixed;

    inset: 0;

    background-image:

        linear-gradient(
            rgba(120,135,70,0.025) 1px,
            transparent 1px
        ),

        linear-gradient(
            90deg,
            rgba(120,135,70,0.025) 1px,
            transparent 1px
        );

    background-size: 45px 45px;

    mask-image:
        linear-gradient(
            to bottom,
            black,
            transparent 80%
        );

    pointer-events: none;

    z-index: -2;
}


/* =========================================================
   GREEN GLOW
========================================================= */

body::after {

    content: "";

    position: fixed;

    width: 420px;
    height: 420px;

    border-radius: 50%;

    background: var(--olive);

    opacity: 0.07;

    filter: blur(130px);

    top: -180px;
    right: -120px;

    pointer-events: none;

    z-index: -1;
}


/* =========================================================
   SIDEBAR
========================================================= */

.sidebar {

    position: fixed;

    top: 0;
    left: 0;
    bottom: 0;

    width: 245px;

    padding: 30px 18px 22px;

    background:

        linear-gradient(
            180deg,
            rgba(14,18,10,0.98),
            rgba(7,9,6,0.99)
        );

    border-right:
        1px solid
        rgba(116,127,66,0.25);

    box-shadow:
        15px 0 45px rgba(0,0,0,0.35);

    z-index: 1000;

    display: flex;

    flex-direction: column;

}


/* SIDEBAR LOGO */

.sidebar-logo {

    padding: 5px 15px 30px;

    color: var(--white);

    font-size: 21px;

    font-weight: 700;

    letter-spacing: 4px;

    border-bottom:
        1px solid
        rgba(255,255,255,0.06);

}

.sidebar-logo span {

    color: var(--olive-light);

}


/* SIDEBAR MENU */

.sidebar-menu {

    display: flex;

    flex-direction: column;

    gap: 8px;

    margin-top: 28px;

}


.sidebar-item {

    display: flex;

    align-items: center;

    gap: 14px;

    width: 100%;

    min-height: 50px;

    padding: 0 15px;

    border-radius: 13px;

    color: #858b7b;

    text-decoration: none;

    font-size: 15px;

    transition: all .3s ease;

}


.sidebar-icon {

    width: 25px;

    text-align: center;

    font-size: 18px;

    color: #70775d;

}


.sidebar-item:hover {

    color: white;

    background:
        rgba(83,92,43,0.12);

    transform: translateX(4px);

}


.sidebar-item:hover .sidebar-icon {

    color: var(--olive-light);

}


.sidebar-item.active {

    color: white;

    background:

        linear-gradient(
            135deg,
            rgba(83,92,43,0.30),
            rgba(83,92,43,0.08)
        );

    border:
        1px solid
        rgba(116,127,66,0.25);

    box-shadow:
        0 0 25px
        rgba(83,92,43,0.08);

}


.sidebar-item.active .sidebar-icon {

    color: var(--olive-light);

}


/* SIDEBAR BOTTOM */

.sidebar-bottom {

    margin-top: auto;

    padding-top: 20px;

    border-top:
        1px solid
        rgba(255,255,255,0.06);

}


.sidebar-user {

    display: flex;

    align-items: center;

    gap: 11px;

    padding: 11px;

    border-radius: 13px;

    text-decoration: none;

    transition: .3s;

}


.sidebar-user:hover {

    background:
        rgba(83,92,43,0.10);

}


.user-avatar {

    width: 40px;
    height: 40px;

    flex-shrink: 0;

    border-radius: 50%;

    display: flex;

    align-items: center;
    justify-content: center;

    background:

        linear-gradient(
            135deg,
            var(--olive),
            #252c16
        );

    color: white;

    font-size: 16px;

    font-weight: 600;

    border:
        1px solid
        rgba(116,127,66,0.4);

}


.user-detail {

    min-width: 0;

    display: flex;

    flex-direction: column;

    gap: 4px;

}


.user-detail strong {

    color: white;

    font-size: 13px;

    white-space: nowrap;

    overflow: hidden;

    text-overflow: ellipsis;

}


.user-detail span {

    color: var(--text-muted);

    font-size: 11px;

    white-space: nowrap;

    overflow: hidden;

    text-overflow: ellipsis;

}


/* LOGOUT */

.sidebar-bottom form {

    margin-top: 8px;

}


.logout-button {

    width: 100%;

    height: 43px;

    border-radius: 11px;

    border:
        1px solid
        rgba(120,60,60,0.35);

    background:
        rgba(100,45,45,0.06);

    color: #b98989;

    cursor: pointer;

    font-size: 13px;

    transition: .3s;

}


.logout-button span {

    margin-right: 7px;

}


.logout-button:hover {

    background: var(--danger);

    color: white;

    border-color: #895151;

}


/* =========================================================
   MAIN CONTENT
========================================================= */

body {

    padding-left: 245px;

}


/* =========================================================
   NAVBAR
========================================================= */

.navbar {

    position: sticky;

    top: 18px;

    z-index: 100;

    width: 92%;

    max-width: 1200px;

    height: 72px;

    margin: 20px auto;

    padding: 0 28px;

    display: flex;

    align-items: center;

    justify-content: space-between;

    background:

        linear-gradient(
            135deg,
            rgba(22,27,16,0.92),
            rgba(10,12,9,0.88)
        );

    border:
        1px solid
        var(--border);

    backdrop-filter: blur(22px);

    -webkit-backdrop-filter: blur(22px);

    border-radius: 20px;

    box-shadow:

        0 20px 55px rgba(0,0,0,0.55),

        inset
        0 1px 0
        rgba(255,255,255,0.04);

}


.brand {

    font-size: 21px;

    font-weight: 700;

    letter-spacing: 4px;

    color: var(--white);

    text-decoration: none;

    transition: .3s;

}


.brand span {

    color: var(--olive-light);

}


.brand:hover {

    text-shadow:
        0 0 18px
        rgba(116,127,66,.5);

}


.nav-links {

    display: flex;

    align-items: center;

    gap: 34px;

}


.nav-links a {

    position: relative;

    color: var(--text-muted);

    text-decoration: none;

    font-size: 15px;

    font-weight: 500;

    transition: .3s;

}


.nav-links a::after {

    content: "";

    position: absolute;

    left: 0;
    bottom: -8px;

    width: 0;
    height: 2px;

    background: var(--olive-light);

    transition: .3s;

}


.nav-links a:hover {

    color: var(--cream);

}


.nav-links a:hover::after {

    width: 100%;

}


/* CART */

.cart {

    position: relative;

    width: 46px;
    height: 46px;

    border-radius: 14px;

    display: flex;

    align-items: center;
    justify-content: center;

    border:
        1px solid
        var(--border);

    background:
        rgba(83,92,43,.10);

    cursor: pointer;

    font-size: 19px;

    transition: .3s;

}


.cart:hover {

    background: var(--olive);

    border-color:
        var(--olive-light);

    box-shadow:
        0 0 25px
        rgba(83,92,43,.35);

    transform: translateY(-2px);

}


.cart-count {

    position: absolute;

    top: -6px;
    right: -6px;

    width: 20px;
    height: 20px;

    border-radius: 50%;

    display: flex;

    align-items: center;
    justify-content: center;

    background:
        var(--olive-light);

    color: white;

    font-size: 11px;

    font-weight: 700;

    border:
        2px solid
        var(--black);

}


/* =========================================================
   HERO
========================================================= */

.hero {

    width: 92%;

    max-width: 1200px;

    margin: 85px auto 55px;

    text-align: center;

}


.small-title {

    color: var(--olive-light);

    font-size: 14px;

    letter-spacing: 5px;

    text-transform: uppercase;

    margin-bottom: 18px;

    font-weight: 600;

}


.hero h1 {

    font-size: 62px;

    font-weight: 400;

    letter-spacing: -2.5px;

    line-height: 1.08;

    margin-bottom: 22px;

    color: var(--cream);

}


.hero h1 span {

    color: var(--olive-light);

    text-shadow:
        0 0 30px
        rgba(116,127,66,.20);

}


.hero p {

    max-width: 650px;

    margin: auto;

    color: var(--text-soft);

    font-size: 16px;

    line-height: 1.85;

}


/* =========================================================
   ADD COFFEE
========================================================= */

.add-coffee-wrapper {

    width: 92%;

    max-width: 1200px;

    margin: 0 auto 25px;

    display: flex;

    justify-content: flex-end;

}


.add-coffee-btn {

    display: inline-flex;

    align-items: center;

    gap: 8px;

    padding: 13px 20px;

    background:

        linear-gradient(
            135deg,
            var(--olive),
            #69763c
        );

    color: white;

    text-decoration: none;

    border:
        1px solid
        var(--olive-light);

    border-radius: 10px;

    font-size: 14px;

    font-weight: 600;

    transition: .3s;

    box-shadow:
        0 0 20px
        rgba(83,92,43,.10);

}


.add-coffee-btn:hover {

    transform: translateY(-2px);

    box-shadow:
        0 0 28px
        rgba(83,92,43,.25);

}


/* =========================================================
   SEARCH & FILTER
========================================================= */

.tools {

    width: 92%;

    max-width: 1200px;

    margin: 0 auto 45px;

    display: flex;

    justify-content: space-between;

    align-items: center;

    gap: 20px;

}


.search-box {

    position: relative;

    width: 330px;

}


.search-box input {

    width: 100%;

    height: 52px;

    padding:
        0 18px 0 48px;

    border-radius: 15px;

    border:
        1px solid
        var(--border);

    background:
        rgba(15,18,12,.82);

    color: var(--cream);

    outline: none;

    font-size: 15px;

    transition: .3s;

}


.search-box input::placeholder {

    color: #656b5d;

}


.search-box input:focus {

    border-color:
        var(--olive-light);

    background:
        rgba(24,29,17,.95);

    box-shadow:

        0 0 0 3px
        rgba(83,92,43,.12),

        0 0 25px
        rgba(83,92,43,.10);

}


.search-icon {

    position: absolute;

    left: 17px;
    top: 15px;

    color:
        var(--olive-light);

    font-size: 18px;

}


.filters {

    display: flex;

    gap: 10px;

}


.filter-btn {

    height: 45px;

    padding: 0 21px;

    border-radius: 13px;

    border:
        1px solid
        var(--border);

    background:
        rgba(255,255,255,.025);

    color:
        var(--text-muted);

    cursor: pointer;

    font-size: 14px;

    font-weight: 500;

    transition: .3s;

}


.filter-btn:hover {

    color: white;

    border-color:
        var(--olive-light);

    background:
        rgba(83,92,43,.10);

}


.filter-btn.active {

    background:

        linear-gradient(
            135deg,
            var(--olive),
            #626d36
        );

    color: white;

    border-color:
        var(--olive-light);

    box-shadow:
        0 0 22px
        rgba(83,92,43,.22);

}


/* =========================================================
   PRODUCT TABLE
========================================================= */

.products-table-section {

    width: 92%;

    max-width: 1400px;

    margin: 35px auto 90px;

}


.products-table-wrapper {

    width: 100%;

    overflow-x: auto;

    background:

        linear-gradient(
            145deg,
            rgba(19,23,14,.94),
            rgba(9,11,8,.94)
        );

    border:
        1px solid
        var(--border);

    border-radius: 20px;

    box-shadow:
        0 25px 60px
        rgba(0,0,0,.35);

}


.products-table {

    width: 100%;

    border-collapse: collapse;

    min-width: 1000px;

}


.products-table thead {

    background:

        linear-gradient(
            90deg,
            rgba(83,92,43,.18),
            rgba(255,255,255,.02)
        );

}


.products-table th {

    padding: 19px 17px;

    text-align: left;

    font-size: 12px;

    letter-spacing: 1.4px;

    text-transform: uppercase;

    color: #aab18d;

    font-weight: 700;

    border-bottom:
        1px solid
        var(--border);

}


.products-table td {

    padding: 19px 17px;

    border-bottom:
        1px solid
        rgba(255,255,255,.055);

    color: #b9bdaf;

    font-size: 14px;

    vertical-align: middle;

}


.products-table tbody tr {

    transition: .25s ease;

}


.products-table tbody tr:hover {

    background:
        rgba(83,92,43,.07);

    box-shadow:
        inset 3px 0 0
        var(--olive);

}


.products-table tbody tr:last-child td {

    border-bottom: none;

}


/* =========================================================
   COFFEE NAME
========================================================= */

.coffee-name {

    display: flex;

    align-items: center;

    gap: 14px;

    min-width: 190px;

}


.coffee-mini-icon {

    width: 54px;
    height: 54px;

    border-radius: 13px;

    background:

        linear-gradient(
            145deg,
            #252b19,
            #11140d
        );

    border:
        1px solid
        var(--border);

    display: flex;

    align-items: center;
    justify-content: center;

    overflow: hidden;

    flex-shrink: 0;

    font-size: 23px;

}


.coffee-mini-icon img {

    width: 100%;
    height: 100%;

    object-fit: cover;

    display: block;

}


.coffee-name strong {

    display: block;

    color: var(--cream);

    font-size: 15px;

    margin-bottom: 5px;

}


.coffee-name small {

    color:
        var(--text-muted);

    font-size: 12px;

}


/* CATEGORY */

.category-badge {

    display: inline-block;

    padding: 7px 12px;

    border:
        1px solid
        rgba(116,127,66,.35);

    border-radius: 20px;

    font-size: 11px;

    letter-spacing: .7px;

    color: #c4cca5;

    background:
        rgba(83,92,43,.08);

}


/* DESCRIPTION */

.description-cell {

    max-width: 260px;

    line-height: 1.6;

    color:
        #999f90 !important;

}


/* PRICE */

.price-cell {

    color:
        var(--cream) !important;

    font-weight: 700;

    font-size: 15px !important;

    white-space: nowrap;

}


/* RATING */

.rating-cell {

    color: #b8c17d;

    white-space: nowrap;

    font-size: 13px;

}


.rating-cell small {

    color:
        var(--text-muted);

    margin-left: 5px;

    font-size: 12px;

}


/* ACTION */

.table-actions {

    display: flex;

    align-items: center;

    gap: 7px;

}


.table-actions form {

    margin: 0;

}


.edit-table-btn,
.delete-table-btn {

    width: 38px;
    height: 38px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 10px;

    cursor: pointer;

    text-decoration: none;

    font-size: 14px;

    transition: .25s;

}


.edit-table-btn {

    border:
        1px solid
        rgba(116,127,66,.45);

    background:
        rgba(83,92,43,.08);

}


.edit-table-btn:hover {

    background:
        var(--olive);

    box-shadow:
        0 0 18px
        rgba(83,92,43,.25);

}


.delete-table-btn {

    border:
        1px solid
        rgba(120,60,60,.5);

    background:
        rgba(100,45,45,.08);

}


.delete-table-btn:hover {

    background:
        var(--danger);

    box-shadow:
        0 0 18px
        rgba(109,55,55,.25);

}


/* =========================================================
   EMPTY PRODUCT
========================================================= */

.empty-products {

    width: 100%;

    padding: 80px 30px;

    text-align: center;

    border:
        1px solid
        var(--border);

    border-radius: 20px;

    background:
        rgba(17,20,14,.75);

}


.empty-products h3 {

    margin-top: 15px;

    color: var(--cream);

    font-size: 22px;

}


.empty-products p {

    margin-top: 8px;

    color:
        var(--text-muted);

    font-size: 14px;

}


.empty-products a {

    display: inline-block;

    margin-top: 20px;

    padding: 12px 20px;

    border-radius: 10px;

    background:
        var(--olive);

    color: white;

    text-decoration: none;

}


/* =========================================================
   PROFILE
========================================================= */

.user-profile {

    position: fixed;

    left: 270px;

    bottom: 25px;

    z-index: 200;

}


.profile-button {

    display: flex;

    align-items: center;

    gap: 12px;

    padding: 12px 16px;

    border-radius: 16px;

    border:
        1px solid
        var(--border);

    background:
        rgba(14,17,11,.90);

    color: white;

    cursor: pointer;

    backdrop-filter: blur(18px);

    transition: .3s;

}


.profile-button:hover {

    background:
        rgba(25,30,17,.96);

    border-color:
        rgba(116,127,66,.45);

    transform: translateY(-2px);

}


.profile-avatar {

    width: 42px;
    height: 42px;

    border-radius: 50%;

    background:

        linear-gradient(
            135deg,
            var(--olive),
            #252c16
        );

    display: flex;

    align-items: center;
    justify-content: center;

    font-size: 17px;

}


.profile-info {

    display: flex;

    flex-direction: column;

    align-items: flex-start;

    gap: 4px;

}


.profile-info strong {

    font-size: 14px;

    color: white;

}


.profile-info span {

    font-size: 12px;

    color:
        var(--text-muted);

    max-width: 160px;

    overflow: hidden;

    text-overflow: ellipsis;

}


/* PROFILE MENU */

.profile-menu {

    position: absolute;

    left: 0;

    bottom: 72px;

    width: 270px;

    padding: 18px;

    border-radius: 18px;

    background:
        rgba(13,16,10,.96);

    border:
        1px solid
        var(--border);

    backdrop-filter: blur(25px);

    box-shadow:
        0 25px 60px
        rgba(0,0,0,.65);

    display: none;

}


.profile-menu.active {

    display: block;

}


.menu-user {

    display: flex;

    align-items: center;

    gap: 12px;

}


.menu-avatar {

    width: 44px;
    height: 44px;

    border-radius: 50%;

    background:
        var(--olive);

    display: flex;

    align-items: center;
    justify-content: center;

}


.menu-user strong {

    display: block;

    font-size: 14px;

}


.menu-user span {

    display: block;

    color:
        var(--text-muted);

    font-size: 12px;

    margin-top: 4px;

}


.menu-divider {

    height: 1px;

    background:
        rgba(255,255,255,.07);

    margin: 16px 0;

}


.profile-menu a,
.profile-menu form button {

    width: 100%;

    display: block;

    padding: 12px;

    border: none;

    border-radius: 11px;

    background: transparent;

    color: #aeb3a3;

    text-align: left;

    text-decoration: none;

    font-size: 14px;

    cursor: pointer;

    transition: .25s;

}


.profile-menu a:hover,
.profile-menu form button:hover {

    background:
        rgba(83,92,43,.14);

    color: white;

}


/* =========================================================
   FOOTER
========================================================= */

footer {

    border-top:
        1px solid
        rgba(116,127,66,.14);

    padding: 42px 5%;

    text-align: center;

    color:
        #666d5c;

    font-size: 13px;

}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 1000px) {

    .sidebar {

        width: 210px;

    }

    body {

        padding-left: 210px;

    }

    .user-profile {

        left: 235px;

    }

}


@media (max-width: 900px) {

    .hero h1 {

        font-size: 52px;

    }

    .tools {

        flex-direction: column;

        align-items: stretch;

    }

    .search-box {

        width: 100%;

    }

    .filters {

        justify-content: center;

    }

}


@media (max-width: 700px) {

    .sidebar {

        width: 75px;

        padding:
            25px 10px;

    }

    body {

        padding-left: 75px;

    }

    .sidebar-logo {

        font-size: 0;

        text-align: center;

        padding:
            5px 0 25px;

    }

    .sidebar-logo::before {

        content: "CV";

        font-size: 20px;

        color:
            var(--olive-light);

        letter-spacing: 2px;

    }

    .sidebar-logo span {

        display: none;

    }

    .sidebar-item {

        justify-content: center;

        padding: 0;

    }

    .sidebar-item span:last-child {

        display: none;

    }

    .sidebar-bottom {

        display: flex;

        flex-direction: column;

        align-items: center;

    }

    .sidebar-user {

        padding: 5px;

    }

    .user-detail {

        display: none;

    }

    .logout-button {

        width: 45px;

        font-size: 0;

    }

    .logout-button span {

        margin: 0;

        font-size: 18px;

    }

    .user-profile {

        left: 95px;

    }

    .nav-links {

        display: none;

    }

    .navbar {

        width: 94%;

    }

    .hero {

        margin-top: 60px;

    }

    .hero h1 {

        font-size: 40px;

    }

    .hero p {

        font-size: 14px;

    }

}


@media (max-width: 500px) {

    .sidebar {

        width: 65px;

    }

    body {

        padding-left: 65px;

    }

    .user-profile {

        left: 80px;

        bottom: 15px;

    }

    .profile-info {

        display: none;

    }

    .profile-button {

        padding: 7px;

    }

    .hero h1 {

        font-size: 34px;

    }

    .small-title {

        font-size: 11px;

    }

}


/* =========================================================
   HIDE PROFILE ON VERY SMALL SCREEN
========================================================= */

@media (max-width: 400px) {

    .user-profile {

        display: none;

    }

}

</style>

</head>


<body>


<!-- =====================================================
     SIDEBAR
===================================================== -->

<aside class="sidebar">

    <div class="sidebar-logo">

        CANODE<span>VASCO</span>

    </div>


    <nav class="sidebar-menu">

        <a
            href="/dashboard"
            class="sidebar-item"
        >

            <span class="sidebar-icon">
                ▣
            </span>

            <span>
                Dashboard
            </span>

        </a>


        <a
            href="/home"
            class="sidebar-item"
        >

            <span class="sidebar-icon">
                ⌂
            </span>

            <span>
                Home
            </span>

        </a>


        <a
            href="/profile"
            class="sidebar-item"
        >

            <span class="sidebar-icon">
                ♙
            </span>

            <span>
                Profile
            </span>

        </a>


        <a
            href="/product"
            class="sidebar-item active"
        >

            <span class="sidebar-icon">
                ☕
            </span>

            <span>
                Coffee
            </span>

        </a>


        <a
            href="/settings"
            class="sidebar-item"
        >

            <span class="sidebar-icon">
                ⚙
            </span>

            <span>
                Settings
            </span>

        </a>

    </nav>


    <div class="sidebar-bottom">

        <a
            href="/profile"
            class="sidebar-user"
        >

            <div class="user-avatar">

                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}

            </div>


            <div class="user-detail">

                <strong>

                    {{ Auth::user()->name }}

                </strong>

                <span>

                    {{ Auth::user()->email }}

                </span>

            </div>

        </a>


        <form
            action="/logout"
            method="POST"
        >

            @csrf

            <button
                type="submit"
                class="logout-button"
            >

                <span>
                    ↪
                </span>

                Logout

            </button>

        </form>

    </div>

</aside>


<!-- =====================================================
     NAVBAR
===================================================== -->

<nav class="navbar">

    <a
        href="/product"
        class="brand"
    >

        CANODE<span>VASCO</span>

    </a>


    <div class="nav-links">

        <a href="/home">
            Home
        </a>

        <a href="/about">
            About
        </a>

        <a href="/home#contact">
            Contact
        </a>

    </div>


    <div
        class="cart"
        onclick="openCart()"
    >

        🛒

        <span
            class="cart-count"
            id="cartCount"
        >
            0
        </span>

    </div>

</nav>


<!-- =====================================================
     HERO
===================================================== -->

<section class="hero">

    <div class="small-title">

        Our Collection

    </div>


    <h1>

        Discover Your
        <span>Coffee.</span>

    </h1>


    <p>

        Carefully selected coffee beans with
        exceptional quality and character.
        Discover our Arabica and Robusta collection
        and find the perfect coffee for your daily ritual.

    </p>

</section>


<!-- =====================================================
     ADD COFFEE
===================================================== -->

<div class="add-coffee-wrapper">

    <a
        href="/product/create"
        class="add-coffee-btn"
    >

        + Add Coffee

    </a>

</div>


<!-- =====================================================
     SEARCH & FILTER
===================================================== -->

<section class="tools">


    <div class="search-box">

        <span class="search-icon">
            🔍
        </span>


        <input
            type="text"
            id="searchInput"
            placeholder="Search coffee..."
            onkeyup="searchProducts()"
        >

    </div>


    <div class="filters">

        <button
            class="filter-btn active"
            onclick="filterProducts('all', this)"
        >
            All
        </button>


        <button
            class="filter-btn"
            onclick="filterProducts('arabica', this)"
        >
            Arabica
        </button>


        <button
            class="filter-btn"
            onclick="filterProducts('robusta', this)"
        >
            Robusta
        </button>

    </div>

</section>


<!-- =====================================================
     PRODUCTS
===================================================== -->

<section
    class="products-table-section"
    id="productContainer"
>


@forelse ($products as $product)


    @if ($loop->first)

        <div class="products-table-wrapper">

            <table class="products-table">

                <thead>

                    <tr>

                        <th>
                            COFFEE
                        </th>

                        <th>
                            CATEGORY
                        </th>

                        <th>
                            TYPE
                        </th>

                        <th>
                            DESCRIPTION
                        </th>

                        <th>
                            PRICE
                        </th>

                        <th>
                            WEIGHT
                        </th>

                        <th>
                            RATING
                        </th>

                        <th>
                            ACTION
                        </th>

                    </tr>

                </thead>


                <tbody>


    @endif


                    <tr
                        data-category="{{ strtolower($product->category) }}"
                        data-name="{{ strtolower($product->name) }}"
                    >


                        <!-- COFFEE -->

                        <td>

                            <div class="coffee-name">

                                <div class="coffee-mini-icon">


                                    @if ($product->image)

                                        <img
                                            src="{{ asset('storage/' . $product->image) }}"
                                            alt="{{ $product->name }}"
                                        >

                                    @else

                                        ☕

                                    @endif


                                </div>


                                <div>

                                    <strong>

                                        {{ $product->name }}

                                    </strong>


                                    <small>

                                        {{ $product->type }}

                                    </small>

                                </div>

                            </div>

                        </td>


                        <!-- CATEGORY -->

                        <td>

                            <span class="category-badge">

                                {{ $product->category }}

                            </span>

                        </td>


                        <!-- TYPE -->

                        <td>

                            {{ $product->type }}

                        </td>


                        <!-- DESCRIPTION -->

                        <td class="description-cell">

                            {{ $product->description }}

                        </td>


                        <!-- PRICE -->

                        <td class="price-cell">

                            ${{ number_format($product->price, 2) }}

                        </td>


                        <!-- WEIGHT -->

                        <td>

                            {{ $product->weight }} g

                        </td>


                        <!-- RATING -->

                        <td>

                            <span class="rating-cell">

                                ★★★★★

                                <small>

                                    {{ number_format($product->rating, 1) }}

                                </small>

                            </span>

                        </td>


                        <!-- ACTION -->

                        <td>

                            <div class="table-actions">


                                <!-- EDIT -->

                                <a
                                    href="/product/{{ $product->id }}/edit"
                                    class="edit-table-btn"
                                    title="Edit Coffee"
                                >

                                    ✏️

                                </a>


                                <!-- DELETE -->

                                <form
                                    action="/product/{{ $product->id }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus coffee ini?')"
                                >

                                    @csrf

                                    @method('DELETE')


                                    <button
                                        type="submit"
                                        class="delete-table-btn"
                                        title="Delete Coffee"
                                    >

                                        🗑️

                                    </button>

                                </form>

                            </div>

                        </td>


                    </tr>


    @if ($loop->last)

                </tbody>

            </table>

        </div>

    @endif


@empty


    <div class="empty-products">

        <div style="font-size:50px;">
            ☕
        </div>


        <h3>

            No Coffee Yet

        </h3>


        <p>

            Start building your collection
            by adding your first coffee.

        </p>


        <a href="/product/create">

            + Add Coffee

        </a>

    </div>


@endforelse


</section>


<!-- =====================================================
     PROFILE USER
===================================================== -->

<div class="user-profile">


    <button
        class="profile-button"
        onclick="toggleProfile()"
    >

        <div class="profile-avatar">

            👤

        </div>


        <div class="profile-info">

            <strong>

                {{ Auth::user()->name }}

            </strong>


            <span>

                {{ Auth::user()->email }}

            </span>

        </div>

    </button>


    <div
        class="profile-menu"
        id="profileMenu"
    >


        <div class="menu-user">


            <div class="menu-avatar">

                👤

            </div>


            <div>

                <strong>

                    {{ Auth::user()->name }}

                </strong>


                <span>

                    {{ Auth::user()->email }}

                </span>

            </div>


        </div>


        <div class="menu-divider"></div>


        <a href="/profile">

            ✏️ Edit Profile

        </a>


        <form
            action="/logout"
            method="POST"
        >

            @csrf

            <button type="submit">

                🚪 Logout

            </button>

        </form>


    </div>

</div>


<!-- =====================================================
     FOOTER
===================================================== -->

<footer>

    © 2026 CANODEVASCO —
    Crafted with quality, delivered with care.

</footer>


<!-- =====================================================
     JAVASCRIPT
===================================================== -->

<script>


/* =====================================================
   PROFILE
===================================================== */

function toggleProfile() {

    const menu =
        document.getElementById("profileMenu");

    menu.classList.toggle("active");

}


/* =====================================================
   CART
===================================================== */

let cartCount = 0;


function addToCart(productName) {

    cartCount++;

    document.getElementById("cartCount")
        .textContent = cartCount;


    alert(
        productName +
        " has been added to your cart!"
    );

}


function openCart() {

    alert(
        "Your cart contains " +
        cartCount +
        " item(s)."
    );

}


/* =====================================================
   BUY NOW
===================================================== */

function buyNow(productName) {

    alert(
        "You selected " +
        productName +
        "."
    );

}


/* =====================================================
   VIEW DETAIL
===================================================== */

function viewDetail(productName) {

    alert(
        "Opening details for " +
        productName
    );

}


/* =====================================================
   FAVORITE
===================================================== */

function favorite(button) {

    button.classList.toggle("liked");


    if (
        button.classList.contains("liked")
    ) {

        button.textContent = "♥";

    } else {

        button.textContent = "♡";

    }

}


/* =====================================================
   FILTER PRODUCTS
   SEKARANG MENGGUNAKAN TABLE ROW
===================================================== */

function filterProducts(category, button) {


    const rows =
        document.querySelectorAll(
            "#productContainer tbody tr"
        );


    const buttons =
        document.querySelectorAll(
            ".filter-btn"
        );


    buttons.forEach(function(btn) {

        btn.classList.remove("active");

    });


    button.classList.add("active");


    rows.forEach(function(row) {


        const rowCategory =
            row.dataset.category;


        if (
            category === "all" ||
            rowCategory === category
        ) {

            row.style.display = "";

        } else {

            row.style.display = "none";

        }

    });

}


/* =====================================================
   SEARCH PRODUCTS
   SEKARANG MENGGUNAKAN TABLE ROW
===================================================== */

function searchProducts() {


    const input =
        document
            .getElementById("searchInput")
            .value
            .toLowerCase();


    const rows =
        document.querySelectorAll(
            "#productContainer tbody tr"
        );


    rows.forEach(function(row) {


        const productName =
            row.dataset.name || "";


        const category =
            row.dataset.category || "";


        if (

            productName.includes(input) ||

            category.includes(input)

        ) {

            row.style.display = "";

        } else {

            row.style.display = "none";

        }

    });

}

</script>


</body>

</html>