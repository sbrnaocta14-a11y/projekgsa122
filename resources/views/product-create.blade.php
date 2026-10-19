<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Coffee | CANODEVASCO</title>

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
                    circle at top right,
                    rgba(92, 69, 37, 0.15),
                    transparent 35%
                ),
                #080908;

            color: #eee;

            font-family: Georgia, 'Times New Roman', serif;

            padding: 40px;
        }


        .container {
            max-width: 750px;

            margin: 40px auto;

            background: rgba(20, 21, 17, 0.95);

            border: 1px solid #37372c;

            border-radius: 14px;

            padding: 45px;

            box-shadow:
                0 25px 80px rgba(0,0,0,0.4);
        }


        .back {
            display: inline-block;

            margin-bottom: 25px;

            color: #9d936f;

            text-decoration: none;

            font-size: 13px;
        }

        .back:hover {
            color: white;
        }


        .label {
            color: #aa9862;

            font-size: 11px;

            letter-spacing: 5px;

            margin-bottom: 12px;
        }


        h1 {
            font-size: 40px;

            font-weight: 400;

            margin-bottom: 35px;
        }

        h1 span {
            color: #b88b5d;

            font-style: italic;
        }


        .form-group {
            margin-bottom: 22px;
        }


        label {
            display: block;

            margin-bottom: 9px;

            color: #c9c3b7;

            font-size: 13px;
        }


        input,
        select,
        textarea {

            width: 100%;

            padding: 14px 15px;

            background: #10110e;

            border: 1px solid #38382e;

            border-radius: 8px;

            color: white;

            outline: none;

            font-family: inherit;

            font-size: 14px;

            transition: 0.3s;
        }


        input:focus,
        select:focus,
        textarea:focus {

            border-color: #9a8150;

            box-shadow:
                0 0 0 2px rgba(154,129,80,0.08);
        }


        textarea {
            min-height: 120px;

            resize: vertical;
        }


        .row {
            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 18px;
        }


        .error {
            color: #d98f8f;

            font-size: 12px;

            margin-top: 6px;
        }


        .success {
            background: rgba(81, 106, 48, 0.15);

            border: 1px solid #4e5b36;

            color: #bdc99e;

            padding: 12px 15px;

            border-radius: 8px;

            margin-bottom: 25px;
        }


        .submit-btn {

            width: 100%;

            padding: 15px;

            border: none;

            border-radius: 8px;

            background: #535c2b;

            color: white;

            cursor: pointer;

            font-family: inherit;

            font-size: 14px;

            letter-spacing: 1px;

            transition: 0.3s;
        }


        .submit-btn:hover {

            background: #6c7738;

            transform: translateY(-2px);
        }


        @media (max-width: 650px) {

            body {
                padding: 20px;
            }

            .container {
                padding: 28px 22px;
            }

            .row {
                grid-template-columns: 1fr;
            }

            h1 {
                font-size: 32px;
            }

        }

    </style>

</head>


<body>


<div class="container">


    <a href="/product" class="back">
        ← Back to Coffee
    </a>


    <div class="label">
        CANODEVASCO · COLLECTION
    </div>


    <h1>
        Add New <span>Coffee.</span>
    </h1>


    @if ($errors->any())

        <div class="error">

            @foreach ($errors->all() as $error)

                <div>{{ $error }}</div>

            @endforeach

        </div>

    @endif


   <form
    action="/product"
    method="POST"
    enctype="multipart/form-data"
>

        @csrf


        <!-- NAME -->

        <div class="form-group">

            <label>
                Coffee Name
            </label>

            <input
                type="text"
                name="name"
                placeholder="Example: Arabica Gayo"
                value="{{ old('name') }}"
            >

            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror

        </div>



        <!-- CATEGORY + TYPE -->

        <div class="row">

            <div class="form-group">

                <label>
                    Category
                </label>

                <select name="category">

                    <option value="">
                        Select Category
                    </option>

                    <option
                        value="Arabica"
                        {{ old('category') == 'Arabica' ? 'selected' : '' }}
                    >
                        Arabica
                    </option>

                    <option
                        value="Robusta"
                        {{ old('category') == 'Robusta' ? 'selected' : '' }}
                    >
                        Robusta
                    </option>

                </select>

            </div>


            <div class="form-group">

                <label>
                    Type
                </label>

                <input
                    type="text"
                    name="type"
                    value="{{ old('type', 'Single Origin') }}"
                >

            </div>

        </div>



        <!-- DESCRIPTION -->

        <div class="form-group">

            <label>
                Description
            </label>

            <textarea
                name="description"
                placeholder="Describe the character of this coffee..."
            >{{ old('description') }}</textarea>

        </div>



        <!-- PRICE + WEIGHT -->

        <div class="row">

            <div class="form-group">

                <label>
                    Price
                </label>

                <input
                    type="number"
                    name="price"
                    step="0.01"
                    placeholder="12.00"
                    value="{{ old('price') }}"
                >

            </div>


            <div class="form-group">

                <label>
                    Weight (gram)
                </label>

                <input
                    type="number"
                    name="weight"
                    placeholder="250"
                    value="{{ old('weight', 250) }}"
                >

            </div>

        </div>



        <!-- RATING -->

        <div class="form-group">

            <label>
                Rating
            </label>

            <input
                type="number"
                name="rating"
                step="0.1"
                min="0"
                max="5"
                placeholder="4.9"
                value="{{ old('rating', 5) }}"
            >

        </div>



        <button
            type="submit"
            class="submit-btn"
        >
            ADD COFFEE
        </button>


    </form>


</div>


</body>

</html>