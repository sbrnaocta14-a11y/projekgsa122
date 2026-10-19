<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Coffee | CANODEVASCO</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            background: #0b0c09;
            color: #ffffff;
            font-family: Arial, sans-serif;
        }

        .container {
            width: 90%;
            max-width: 700px;
            margin: 60px auto;
        }

        .back {
            display: inline-block;
            margin-bottom: 25px;
            color: #999;
            text-decoration: none;
            font-size: 14px;
        }

        .back:hover {
            color: white;
        }

        h1 {
            margin-bottom: 30px;
        }

        .form-box {
            background: #151515;
            border: 1px solid #292929;
            border-radius: 14px;
            padding: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #aaa;
            font-size: 13px;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 13px;
            border-radius: 8px;
            border: 1px solid #333;
            background: #0e0e0e;
            color: white;
            outline: none;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: #535c2b;
        }

        .update-btn {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 8px;
            background: #535c2b;
            color: white;
            cursor: pointer;
            font-size: 14px;
        }

        .update-btn:hover {
            background: #667238;
        }

        .error {
            margin-bottom: 20px;
            padding: 12px;
            background: #351818;
            border-radius: 8px;
            color: #ff9b9b;
            font-size: 13px;
        }

    </style>

</head>

<body>

<div class="container">

    <a href="/product" class="back">
        ← Back to Coffee
    </a>

    <h1>Edit Coffee</h1>

    <div class="form-box">

        @if ($errors->any())

            <div class="error">

                @foreach ($errors->all() as $error)

                    <div>{{ $error }}</div>

                @endforeach

            </div>

        @endif

<form
    action="/product/{{ $product->id }}"
    method="POST"
    enctype="multipart/form-data"
>

<div class="form-group">

    <label>Coffee Photo</label>


    @if ($product->image)

        <div style="margin-bottom:12px;">

            <img
                src="{{ asset('storage/' . $product->image) }}"
                alt="{{ $product->name }}"
                style="
                    width:120px;
                    height:120px;
                    object-fit:cover;
                    border-radius:10px;
                    border:1px solid #333;
                "
            >

        </div>

    @endif


    <input
        type="file"
        name="image"
        accept=".jpg,.jpeg,.png,.webp"
    >

    <small style="color:#777; display:block; margin-top:7px;">
        Pilih foto baru jika ingin mengganti foto lama.
        Maksimal 2MB.
    </small>

</div>

            @csrf

            @method('PUT')


            <div class="form-group">

                <label>Coffee Name</label>

                <input
                    type="text"
                    name="name"
                    value="{{ $product->name }}"
                    required
                >

            </div>


            <div class="form-group">

                <label>Category</label>

                <select name="category" required>

                    <option
                        value="Arabica"
                        {{ $product->category == 'Arabica' ? 'selected' : '' }}
                    >
                        Arabica
                    </option>

                    <option
                        value="Robusta"
                        {{ $product->category == 'Robusta' ? 'selected' : '' }}
                    >
                        Robusta
                    </option>

                </select>

            </div>


            <div class="form-group">

                <label>Type</label>

                <input
                    type="text"
                    name="type"
                    value="{{ $product->type }}"
                    required
                >

            </div>


            <div class="form-group">

                <label>Description</label>

                <textarea
                    name="description"
                    required
                >{{ $product->description }}</textarea>

            </div>


            <div class="form-group">

                <label>Price</label>

                <input
                    type="number"
                    name="price"
                    value="{{ $product->price }}"
                    step="0.01"
                    required
                >

            </div>


            <div class="form-group">

                <label>Weight (gram)</label>

                <input
                    type="number"
                    name="weight"
                    value="{{ $product->weight }}"
                    required
                >

            </div>


            <div class="form-group">

                <label>Rating</label>

                <input
                    type="number"
                    name="rating"
                    value="{{ $product->rating }}"
                    min="0"
                    max="5"
                    step="0.1"
                    required
                >

            </div>


            <button
                type="submit"
                class="update-btn"
            >
                Save Changes
            </button>

        </form>

    </div>

</div>

</body>

</html>