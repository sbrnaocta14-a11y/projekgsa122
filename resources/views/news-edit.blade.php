<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Coffee News | CANO DE VASCO</title>

    <style>

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

            padding: 50px 20px;
        }

        .container {

            width: 100%;

            max-width: 800px;

            margin: auto;
        }

        .header {

            text-align: center;

            margin-bottom: 40px;
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

        h1 {

            font-family:
                Georgia,
                "Times New Roman",
                serif;

            font-size: 40px;

            font-weight: normal;

            margin-bottom: 12px;
        }

        .subtitle {

            color: #929486;

            font-size: 14px;
        }

        .form-card {

            background: #0a0c09;

            border: 1px solid #292d24;

            padding: 35px;
        }

        .form-group {

            margin-bottom: 22px;
        }

        label {

            display: block;

            color: #a88955;

            font-size: 11px;

            font-weight: bold;

            letter-spacing: 1.5px;

            text-transform: uppercase;

            margin-bottom: 9px;
        }

        input,
        textarea {

            width: 100%;

            background: #080a07;

            border: 1px solid #292d24;

            color: #f1ede5;

            padding: 13px 15px;

            font-size: 14px;

            outline: none;
        }

        input:focus,
        textarea:focus {

            border-color: #a88955;
        }

        textarea {

            min-height: 140px;

            resize: vertical;
        }

        .checkbox-group {

            display: flex;

            align-items: center;

            gap: 10px;

            margin: 25px 0;
        }

        .checkbox-group input {
            width: auto;
        }

        .checkbox-group label {

            margin: 0;

            color: #929486;

            text-transform: none;

            letter-spacing: 0;

            font-size: 13px;
        }

        .buttons {

            display: flex;

            gap: 12px;

            margin-top: 30px;
        }

        .btn {

            display: inline-block;

            padding: 13px 22px;

            border: 1px solid #a88955;

            text-decoration: none;

            cursor: pointer;

            font-size: 12px;

            font-weight: bold;

            letter-spacing: 1px;

            text-transform: uppercase;
        }

        .btn-primary {

            background: #a88955;

            color: #080a07;
        }

        .btn-primary:hover {

            background: #d0ae72;
        }

        .btn-secondary {

            color: #a88955;

            background: transparent;
        }

        .btn-secondary:hover {

            background: #151912;
        }

        @media (max-width: 600px) {

            .form-card {
                padding: 25px;
            }

            h1 {
                font-size: 32px;
            }

            .buttons {
                flex-direction: column;
            }

        }

    </style>

</head>


<body>

<div class="container">

    <header class="header">

        <div class="top-line"></div>

        <div class="brand">
            CANO DE VASCO
        </div>

        <h1>
            Edit Coffee News
        </h1>

        <p class="subtitle">
            Update your coffee story.
        </p>

    </header>


    <form
        action="{{ route('news.update', $news->id) }}"
        method="POST"
        class="form-card"
    >

        @csrf

        @method('PUT')


        <div class="form-group">

            <label>
                News Title
            </label>

            <input
                type="text"
                name="title"
                value="{{ old('title', $news->title) }}"
                required
            >

        </div>


        <div class="form-group">

            <label>
                Source
            </label>

            <input
                type="text"
                name="source"
                value="{{ old('source', $news->source) }}"
                required
            >

        </div>


        <div class="form-group">

            <label>
                Date
            </label>

            <input
                type="date"
                name="date"
                value="{{ old('date', optional($news->date)->format('Y-m-d')) }}"
            >

        </div>


        <div class="form-group">

            <label>
                Description
            </label>

            <textarea
                name="description"
                required
            >{{ old('description', $news->description) }}</textarea>

        </div>


        <div class="form-group">

            <label>
                Full Story Link
            </label>

            <input
                type="url"
                name="link"
                value="{{ old('link', $news->link) }}"
            >

        </div>


        <div class="checkbox-group">

            <input
                type="checkbox"
                name="show_on_home"
                value="1"
                id="show_on_home"

                {{ $news->show_on_home ? 'checked' : '' }}
            >

            <label for="show_on_home">
                Show this news on Home page
            </label>

        </div>


        <div class="buttons">

            <button
                type="submit"
                class="btn btn-primary"
            >
                Save Changes
            </button>


            <a
                href="{{ route('about') }}"
                class="btn btn-secondary"
            >
                Cancel
            </a>

        </div>

    </form>

</div>

</body>

</html>