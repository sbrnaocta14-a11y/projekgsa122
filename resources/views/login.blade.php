<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | CANO DE VASCO</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow-x: hidden;

            font-family: Arial, Helvetica, sans-serif;

            background:
                radial-gradient(
                    circle at 15% 15%,
                    rgba(104, 112, 67, 0.18),
                    transparent 30%
                ),
                radial-gradient(
                    circle at 85% 85%,
                    rgba(168, 137, 85, 0.12),
                    transparent 30%
                ),
                linear-gradient(
                    135deg,
                    #050604,
                    #0b0d09,
                    #030403
                );

            color: #f1ede5;
        }


        /* =========================
           BACKGROUND DECORATION
        ========================= */

        body::before {
            content: "";
            position: absolute;

            width: 500px;
            height: 500px;

            border-radius: 50%;

            background: #687043;
            opacity: 0.10;

            filter: blur(150px);

            top: -280px;
            left: -180px;

            pointer-events: none;
        }

        body::after {
            content: "";
            position: absolute;

            width: 500px;
            height: 500px;

            border-radius: 50%;

            background: #a88955;
            opacity: 0.08;

            filter: blur(160px);

            bottom: -280px;
            right: -180px;

            pointer-events: none;
        }


        /* =========================
           LOGIN CARD
        ========================= */

        .login-card {
            position: relative;
            z-index: 2;

            width: 540px;
            max-width: calc(100% - 40px);

            padding: 48px 58px;

            border-radius: 4px;

            background: rgba(11, 13, 9, 0.96);

            border: 1px solid rgba(168, 137, 85, 0.38);

            box-shadow:
                0 30px 80px rgba(0, 0, 0, 0.65),
                0 0 40px rgba(168, 137, 85, 0.05);
        }


        /* =========================
           TOP LINE
        ========================= */

        .top-line {
            width: 55px;
            height: 2px;

            margin: 0 auto 25px;

            background: #a88955;
        }


        /* =========================
           LOGO
        ========================= */

        .logo {
            text-align: center;
            margin-bottom: 15px;
        }

        .logo-icon {
            width: 58px;
            height: 58px;

            margin: auto;

            display: flex;
            justify-content: center;
            align-items: center;

            border: 1px solid #a88955;
            border-radius: 50%;

            color: #a88955;

            font-size: 25px;

            box-shadow:
                0 0 20px rgba(168, 137, 85, 0.08);
        }


        /* =========================
           BRAND
        ========================= */

        .brand {
            text-align: center;

            color: #a88955;

            font-size: 12px;
            font-weight: bold;

            letter-spacing: 4px;

            margin-top: 17px;
            margin-bottom: 12px;
        }


        /* =========================
           TITLE
        ========================= */

        h1 {
            text-align: center;

            font-family: Georgia, "Times New Roman", serif;

            font-size: 38px;
            font-weight: normal;

            letter-spacing: 0.5px;

            color: #f1ede5;

            margin-bottom: 12px;
        }


        .subtitle {
            text-align: center;

            color: #929486;

            font-size: 14px;

            line-height: 1.7;

            margin-bottom: 35px;
        }


        /* =========================
           INPUT
        ========================= */

        .input-group {
            margin-bottom: 23px;
        }

        .input-group label {
            display: block;

            color: #c3beaF;

            font-size: 13px;
            font-weight: 500;

            letter-spacing: 0.4px;

            margin-bottom: 9px;
        }


        .input-wrapper {
            position: relative;
        }


        .input-wrapper input {
            width: 100%;
            height: 54px;

            padding: 0 48px 0 17px;

            border-radius: 2px;

            border: 1px solid #34382b;

            background: #080a07;

            color: #f1ede5;

            outline: none;

            font-size: 15px;

            transition: all 0.3s ease;
        }


        .input-wrapper input::placeholder {
            color: #65685d;
        }


        .input-wrapper input:focus {
            border-color: #a88955;

            background: #0c0e0a;

            box-shadow:
                0 0 0 1px rgba(168, 137, 85, 0.12),
                0 0 20px rgba(168, 137, 85, 0.05);
        }


        /* =========================
           PASSWORD ICON
        ========================= */

        .eye {
            position: absolute;

            right: 17px;
            top: 50%;

            transform: translateY(-50%);

            cursor: pointer;

            color: #777b6e;

            font-size: 17px;

            transition: 0.2s;
        }


        .eye:hover {
            color: #a88955;
        }


        /* =========================
           OPTIONS
        ========================= */

        .options {
            display: flex;

            justify-content: space-between;
            align-items: center;

            margin-top: 5px;
            margin-bottom: 27px;

            font-size: 13px;

            color: #85887b;
        }


        .remember {
            display: flex;

            align-items: center;

            gap: 8px;

            cursor: pointer;
        }


        .remember input {
            width: 16px;
            height: 16px;

            accent-color: #a88955;

            cursor: pointer;
        }


        .forgot {
            color: #a88955;

            text-decoration: none;

            transition: 0.2s;
        }


        .forgot:hover {
            color: #d0ae72;
        }


        /* =========================
           LOGIN BUTTON
        ========================= */

        .login-btn {
            width: 100%;
            height: 54px;

            border: 1px solid #a88955;

            border-radius: 2px;

            background: #a88955;

            color: #090a07;

            font-size: 14px;
            font-weight: bold;

            letter-spacing: 1.5px;

            cursor: pointer;

            transition: all 0.3s ease;
        }


        .login-btn:hover {
            background: #c09d62;

            border-color: #c09d62;

            transform: translateY(-2px);

            box-shadow:
                0 12px 30px rgba(168, 137, 85, 0.15);
        }


        .login-btn:active {
            transform: translateY(0);
        }


        /* =========================
           DIVIDER
        ========================= */

        .divider {
            display: flex;

            align-items: center;

            gap: 15px;

            margin: 27px 0;

            color: #62665a;

            font-size: 12px;

            text-transform: uppercase;

            letter-spacing: 1px;
        }


        .divider::before,
        .divider::after {
            content: "";

            flex: 1;

            height: 1px;

            background: #2d3027;
        }


        /* =========================
           GOOGLE BUTTON
        ========================= */

        .google-btn {
            width: 100%;
            height: 52px;

            border-radius: 2px;

            border: 1px solid #363a2e;

            background: #0a0c09;

            color: #d0d0c8;

            cursor: pointer;

            display: flex;

            justify-content: center;
            align-items: center;

            gap: 11px;

            font-size: 14px;

            transition: 0.3s;
        }


        .google-btn:hover {
            background: #10130e;

            border-color: #a88955;

            color: #f1ede5;
        }


        .google-icon {
            font-size: 17px;

            font-weight: bold;

            color: #a88955;
        }


        /* =========================
           SIGN UP
        ========================= */

        .signup {
            text-align: center;

            margin-top: 29px;

            color: #777a70;

            font-size: 13px;

            line-height: 1.6;
        }


        .signup a {
            color: #a88955;

            text-decoration: none;

            font-weight: bold;

            margin-left: 5px;

            transition: 0.2s;
        }


        .signup a:hover {
            color: #d0ae72;

            text-decoration: underline;
        }


        /* =========================
           RESPONSIVE TABLET
        ========================= */

        @media (max-width: 700px) {

            body {
                padding: 30px 20px;

                overflow-y: auto;
            }

            .login-card {
                width: 100%;

                max-width: 540px;

                padding: 42px 40px;
            }

            h1 {
                font-size: 34px;
            }

            .subtitle {
                font-size: 13px;
            }
        }


        /* =========================
           RESPONSIVE MOBILE
        ========================= */

        @media (max-width: 480px) {

            body {
                padding: 20px 14px;
            }

            .login-card {
                max-width: 100%;

                padding: 35px 23px;

                border-radius: 3px;
            }

            .top-line {
                margin-bottom: 20px;
            }

            .logo-icon {
                width: 52px;
                height: 52px;

                font-size: 22px;
            }

            .brand {
                font-size: 10px;

                letter-spacing: 3px;

                margin-top: 15px;
            }

            h1 {
                font-size: 30px;

                margin-top: 5px;
            }

            .subtitle {
                font-size: 13px;

                margin-bottom: 30px;
            }

            .input-group {
                margin-bottom: 20px;
            }

            .input-group label {
                font-size: 13px;
            }

            .input-wrapper input {
                height: 52px;

                font-size: 14px;
            }

            .options {
                font-size: 12px;

                gap: 10px;
            }

            .login-btn {
                height: 53px;

                font-size: 13px;
            }

            .google-btn {
                height: 51px;

                font-size: 13px;
            }

            .signup {
                font-size: 12px;
            }
        }


        /* =========================
           SMALL MOBILE
        ========================= */

        @media (max-width: 360px) {

            .login-card {
                padding: 30px 18px;
            }

            h1 {
                font-size: 27px;
            }

            .subtitle {
                font-size: 12px;
            }

            .options {
                align-items: flex-start;

                flex-direction: column;

                gap: 10px;
            }

            .forgot {
                align-self: flex-end;
            }
        }
    </style>
</head>


<body>

    <div class="login-card">

        <!-- TOP LINE -->

        <div class="top-line"></div>


        <!-- LOGO -->

        <div class="logo">

            <div class="logo-icon">
                ◉
            </div>

        </div>


        <!-- BRAND -->

        <div class="brand">
            CANO DE VASCO
        </div>


        <!-- TITLE -->

        <h1>
            Welcome Back
        </h1>


        <p class="subtitle">
            Sign in to access your account,<br>
            continue your journey with us
        </p>


        <!-- FORM -->

        <form action="/login" method="POST">

            @csrf


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
                        placeholder="Enter your password"
                        required
                    >

                    <span
                        class="eye"
                        onclick="togglePassword()"
                    >
                        ◉
                    </span>

                </div>

            </div>


            <!-- OPTIONS -->

            <div class="options">

                <label class="remember">

                    <input type="checkbox">

                    Remember me

                </label>


                <a href="#" class="forgot">
                    Forgot password?
                </a>

            </div>


            <!-- LOGIN BUTTON -->

            <button
                type="submit"
                class="login-btn"
            >
                LOG IN
            </button>

        </form>


        <!-- DIVIDER -->

        <div class="divider">

            <span>
                Or
            </span>

        </div>


        <!-- GOOGLE -->

        <button
            type="button"
            class="google-btn"
        >

            <span class="google-icon">
                G
            </span>

            Sign In with Google

        </button>


        <!-- REGISTER -->

        <div class="signup">

            Don't have an account?

            <a href="/register">
                Sign Up
            </a>

        </div>

    </div>


    <script>

        function togglePassword() {

            const password =
                document.getElementById("password");

            if (password.type === "password") {

                password.type = "text";

            } else {

                password.type = "password";

            }
        }

    </script>

</body>
</html>