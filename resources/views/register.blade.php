<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Register | CANO DE VASCO</title>


    <style>

        /* =====================================================
           RESET
        ===================================================== */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        /* =====================================================
           BODY
        ===================================================== */

        body {

            min-height: 100vh;

            font-family: Arial, Helvetica, sans-serif;

            color: #f2eee5;

            background:
                radial-gradient(
                    circle at 15% 20%,
                    rgba(91, 101, 48, 0.18),
                    transparent 32%
                ),
                radial-gradient(
                    circle at 85% 80%,
                    rgba(145, 91, 48, 0.12),
                    transparent 30%
                ),
                linear-gradient(
                    135deg,
                    #070906 0%,
                    #0b0d09 45%,
                    #050604 100%
                );

            display: flex;

            align-items: center;

            justify-content: center;

            padding: 50px 20px;

            position: relative;

            overflow-x: hidden;
        }


        /* =====================================================
           BACKGROUND DECORATION
        ===================================================== */

        body::before {

            content: "";

            position: fixed;

            width: 500px;
            height: 500px;

            border-radius: 50%;

            background:
                radial-gradient(
                    circle,
                    rgba(123, 132, 72, 0.12),
                    transparent 70%
                );

            top: -260px;
            left: -180px;

            pointer-events: none;
        }


        body::after {

            content: "";

            position: fixed;

            width: 450px;
            height: 450px;

            border-radius: 50%;

            background:
                radial-gradient(
                    circle,
                    rgba(177, 112, 64, 0.09),
                    transparent 70%
                );

            bottom: -240px;
            right: -170px;

            pointer-events: none;
        }


        /* =====================================================
           MAIN CARD
        ===================================================== */

        .register-card {

            width: min(100%, 500px);

            position: relative;

            z-index: 2;

            padding: 48px 50px;

            background:
                linear-gradient(
                    145deg,
                    rgba(20, 23, 17, 0.98),
                    rgba(8, 10, 7, 0.98)
                );

            border: 1px solid rgba(164, 137, 83, 0.35);

            border-radius: 4px;

            box-shadow:
                0 25px 70px rgba(0, 0, 0, 0.75),
                inset 0 1px 0 rgba(255,255,255,0.03);
        }


        /* =====================================================
           TOP DECORATION
        ===================================================== */

        .top-line {

            width: 55px;

            height: 1px;

            margin: 0 auto 22px;

            background: #a88955;
        }


        /* =====================================================
           LOGO
        ===================================================== */

        .logo {

            text-align: center;

            margin-bottom: 18px;
        }


        .logo-icon {

            width: 54px;

            height: 54px;

            margin: auto;

            border: 1px solid #9f8151;

            border-radius: 50%;

            display: flex;

            align-items: center;

            justify-content: center;

            color: #c8a96c;

            font-size: 22px;

            background:
                rgba(126, 136, 70, 0.08);
        }


        /* =====================================================
           BRAND
        ===================================================== */

        .brand-name {

            text-align: center;

            color: #eee9df;

            font-family: Georgia, "Times New Roman", serif;

            font-size: 15px;

            letter-spacing: 4px;

            margin-top: 13px;

            text-transform: uppercase;
        }


        .brand-subtitle {

            text-align: center;

            color: #a58b5d;

            font-size: 8px;

            letter-spacing: 4px;

            margin-top: 5px;
        }


        /* =====================================================
           TITLE
        ===================================================== */

        h1 {

            text-align: center;

            font-family: Georgia, "Times New Roman", serif;

            font-size: 38px;

            font-weight: 400;

            color: #f1ede5;

            margin-top: 32px;

            margin-bottom: 9px;
        }


        .subtitle {

            text-align: center;

            color: #8f9087;

            font-size: 14px;

            line-height: 1.6;

            margin-bottom: 32px;
        }


        /* =====================================================
           INPUT
        ===================================================== */

        .input-group {

            margin-bottom: 20px;
        }


        .input-group label {

            display: block;

            color: #b7ad9b;

            font-size: 13px;

            letter-spacing: 0.5px;

            margin-bottom: 9px;
        }


        .input-wrapper {

            position: relative;
        }


        .input-wrapper input {

            width: 100%;

            height: 53px;

            padding: 0 17px;

            border: 1px solid #35382f;

            border-radius: 2px;

            outline: none;

            background: #0d0f0c;

            color: #f3eee5;

            font-size: 15px;

            transition:
                border-color 0.25s ease,
                background 0.25s ease,
                box-shadow 0.25s ease;
        }


        .input-wrapper input::placeholder {

            color: #5f625b;
        }


        .input-wrapper input:focus {

            border-color: #9c7c4d;

            background: #11130f;

            box-shadow:
                0 0 0 1px rgba(156,124,77,0.12);
        }


        /* =====================================================
           PASSWORD EYE
        ===================================================== */

        .eye {

            position: absolute;

            right: 17px;

            top: 50%;

            transform: translateY(-50%);

            color: #77786e;

            cursor: pointer;

            font-size: 16px;

            transition: color 0.2s ease;
        }


        .eye:hover {

            color: #c1a16b;
        }


        /* =====================================================
           REGISTER BUTTON
        ===================================================== */

        .register-btn {

            width: 100%;

            height: 53px;

            margin-top: 7px;

            border: 1px solid #8f784d;

            border-radius: 2px;

            background:
                linear-gradient(
                    135deg,
                    #687043,
                    #4e572f
                );

            color: #f7f3eb;

            font-size: 14px;

            font-weight: 600;

            letter-spacing: 1.2px;

            text-transform: uppercase;

            cursor: pointer;

            transition:
                background 0.25s ease,
                border-color 0.25s ease,
                transform 0.2s ease;
        }


        .register-btn:hover {

            background:
                linear-gradient(
                    135deg,
                    #77804e,
                    #596337
                );

            border-color: #b3945e;

            transform: translateY(-1px);
        }


        .register-btn:active {

            transform: translateY(0);
        }


        /* =====================================================
           DIVIDER
        ===================================================== */

        .divider {

            display: flex;

            align-items: center;

            gap: 15px;

            margin: 26px 0;

            color: #686a61;

            font-size: 12px;

            text-transform: uppercase;

            letter-spacing: 2px;
        }


        .divider::before,
        .divider::after {

            content: "";

            flex: 1;

            height: 1px;

            background: #292c25;
        }


        /* =====================================================
           GOOGLE BUTTON
        ===================================================== */

        .google-btn {

            width: 100%;

            height: 52px;

            border: 1px solid #363a31;

            border-radius: 2px;

            background: #0c0e0b;

            color: #d2cec4;

            display: flex;

            align-items: center;

            justify-content: center;

            gap: 11px;

            font-size: 14px;

            cursor: pointer;

            transition:
                border-color 0.25s ease,
                background 0.25s ease;
        }


        .google-btn:hover {

            border-color: #806c48;

            background: #12150f;
        }


        .google-icon {

            color: #c0a06a;

            font-size: 17px;

            font-weight: bold;
        }


        /* =====================================================
           LOGIN
        ===================================================== */

        .login {

            text-align: center;

            color: #777970;

            font-size: 13px;

            margin-top: 27px;

            line-height: 1.6;
        }


        .login a {

            color: #b79a65;

            text-decoration: none;

            font-weight: 600;

            margin-left: 5px;

            transition: color 0.2s ease;
        }


        .login a:hover {

            color: #d0b47d;

            text-decoration: underline;
        }


        /* =====================================================
           TABLET
        ===================================================== */

        @media (max-width: 768px) {

            body {

                padding: 35px 18px;
            }


            .register-card {

                padding: 42px 38px;
            }


            h1 {

                font-size: 35px;
            }


            .subtitle {

                font-size: 14px;
            }
        }


        /* =====================================================
           MOBILE
        ===================================================== */

        @media (max-width: 480px) {

            body {

                min-height: 100svh;

                padding: 25px 14px;

                align-items: center;
            }


            .register-card {

                width: 100%;

                padding: 35px 23px;

                border-radius: 3px;
            }


            .top-line {

                margin-bottom: 18px;
            }


            .logo-icon {

                width: 48px;

                height: 48px;

                font-size: 20px;
            }


            .brand-name {

                font-size: 13px;

                letter-spacing: 3px;
            }


            .brand-subtitle {

                font-size: 7px;

                letter-spacing: 3px;
            }


            h1 {

                font-size: 30px;

                margin-top: 27px;
            }


            .subtitle {

                font-size: 13px;

                margin-bottom: 27px;
            }


            .input-group {

                margin-bottom: 17px;
            }


            .input-group label {

                font-size: 12px;
            }


            .input-wrapper input {

                height: 51px;

                font-size: 14px;
            }


            .register-btn {

                height: 52px;

                font-size: 13px;
            }


            .google-btn {

                height: 50px;

                font-size: 13px;
            }


            .login {

                font-size: 12px;
            }
        }


        /* =====================================================
           VERY SMALL MOBILE
        ===================================================== */

        @media (max-width: 360px) {

            body {

                padding: 18px 10px;
            }


            .register-card {

                padding: 30px 18px;
            }


            h1 {

                font-size: 27px;
            }


            .subtitle {

                font-size: 12px;
            }


            .input-wrapper input {

                height: 49px;
            }
        }

    </style>

</head>


<body>


    <div class="register-card">


        <div class="top-line"></div>


        <!-- BRAND -->

        <div class="logo">

            <div class="logo-icon">
                ♨
            </div>

            <div class="brand-name">
                CANO DE VASCO
            </div>

            <div class="brand-subtitle">
                PREMIUM COFFEE
            </div>

        </div>


        <!-- TITLE -->

        <h1>
            Create Account
        </h1>


        <p class="subtitle">
            Create your account and start your journey
        </p>


        <!-- REGISTER FORM -->

        <form action="/register" method="POST">

            @csrf


            <!-- NAME -->

            <div class="input-group">

                <label>
                    Full Name
                </label>

                <div class="input-wrapper">

                    <input
                        type="text"
                        id="name"
                        name="name"
                        placeholder="Enter your full name"
                        required
                    >

                </div>

            </div>


            <!-- EMAIL -->

            <div class="input-group">

                <label>
                    Email
                </label>

                <div class="input-wrapper">

                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="Enter your email"
                        required
                    >

                </div>

            </div>


            <!-- PASSWORD -->

            <div class="input-group">

                <label>
                    Password
                </label>

                <div class="input-wrapper">

                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Create a password"
                        required
                    >

                    <span
                        class="eye"
                        onclick="togglePassword('password', this)"
                    >
                        ◉
                    </span>

                </div>

            </div>


            <!-- CONFIRM PASSWORD -->

            <div class="input-group">

                <label>
                    Confirm Password
                </label>

                <div class="input-wrapper">

                    <input
                        type="password"
                        id="confirmPassword"
                        name="password_confirmation"
                        placeholder="Confirm your password"
                        required
                    >

                    <span
                        class="eye"
                        onclick="togglePassword('confirmPassword', this)"
                    >
                        ◉
                    </span>

                </div>

            </div>


            <!-- REGISTER BUTTON -->

            <button
                type="submit"
                class="register-btn"
            >
                Create Account
            </button>

        </form>


        <!-- DIVIDER -->

        <div class="divider">
            <span>Or</span>
        </div>


        <!-- GOOGLE -->

        <button
            type="button"
            class="google-btn"
        >

            <span class="google-icon">
                G
            </span>

            Sign Up with Google

        </button>


        <!-- LOGIN -->

        <div class="login">

            Already have an account?

            <a href="/login">
                Log In
            </a>

        </div>


    </div>


    <script>

        function togglePassword(inputId, element) {

            const input =
                document.getElementById(inputId);

            if (input.type === "password") {

                input.type = "text";

            } else {

                input.type = "password";

            }

        }

    </script>


</body>

</html>