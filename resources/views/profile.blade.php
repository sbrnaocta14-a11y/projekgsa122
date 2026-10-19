<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Profile | CANO DE VASCO</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            min-height: 100vh;

            background:
                radial-gradient(
                    circle at 10% 10%,
                    rgba(255,255,255,0.06),
                    transparent 30%
                ),
                linear-gradient(
                    135deg,
                    #000000,
                    #11120c,
                    #050505
                );

            color: white;

            display: flex;
            justify-content: center;
            align-items: center;

            padding: 40px 20px;
        }

        /* PROFILE CARD */

        .profile-card {

            width: 520px;

            padding: 40px;

            background:
                linear-gradient(
                    145deg,
                    rgba(25,25,20,0.96),
                    rgba(10,10,8,0.96)
                );

            border: 1px solid rgba(176, 147, 91, 0.35);

            border-radius: 22px;

            box-shadow:
                0 25px 70px rgba(0,0,0,0.7);

            position: relative;

            overflow: hidden;
        }

        .profile-card::before {

            content: "";

            position: absolute;

            width: 250px;
            height: 250px;

            background: rgba(150,125,70,0.08);

            border-radius: 50%;

            top: -120px;
            right: -100px;

            filter: blur(10px);
        }

        /* HEADER */

        .profile-header {

            text-align: center;

            margin-bottom: 30px;

            position: relative;
            z-index: 2;
        }

        .profile-header small {

            color: #b79a61;

            font-size: 11px;

            letter-spacing: 4px;

            text-transform: uppercase;
        }

        .profile-header h1 {

            font-family: Georgia, serif;

            font-size: 36px;

            font-weight: 400;

            margin-top: 8px;

            color: #f3eee5;
        }

        .profile-header p {

            color: #888;

            font-size: 13px;

            margin-top: 8px;
        }

        /* PROFILE PHOTO */

        .photo-section {

            display: flex;

            flex-direction: column;

            align-items: center;

            margin-bottom: 30px;

            position: relative;
            z-index: 2;
        }

        .profile-photo-wrapper {

            width: 125px;
            height: 125px;

            border-radius: 50%;

            padding: 4px;

            border: 1px solid #8d7444;

            background: #111;

            position: relative;

            overflow: hidden;
        }

        .profile-photo {

            width: 100%;
            height: 100%;

            object-fit: cover;

            border-radius: 50%;

            display: block;
        }

        .default-avatar {

            width: 100%;
            height: 100%;

            border-radius: 50%;

            display: flex;

            align-items: center;
            justify-content: center;

            background: #1b1b18;

            color: #a89163;

            font-size: 45px;
        }

        .photo-label {

            margin-top: 13px;

            color: #b79a61;

            font-size: 12px;

            cursor: pointer;

            letter-spacing: 1px;
        }

        .photo-label:hover {

            color: #e0c891;
        }

        #profile_photo {

            display: none;
        }

        .photo-info {

            color: #666;

            font-size: 10px;

            margin-top: 5px;
        }

        /* SUCCESS */

        .success {

            background: rgba(100,120,60,0.15);

            border: 1px solid rgba(150,170,100,0.3);

            color: #cbd7a4;

            padding: 12px;

            border-radius: 10px;

            font-size: 12px;

            margin-bottom: 20px;

            text-align: center;
        }

        /* FORM */

        .input-group {

            margin-bottom: 20px;

            position: relative;
            z-index: 2;
        }

        label {

            display: block;

            color: #b5a788;

            font-size: 11px;

            letter-spacing: 1px;

            text-transform: uppercase;

            margin-bottom: 8px;
        }

        input,
        select,
        textarea {

            width: 100%;

            border-radius: 10px;

            border: 1px solid #33362d;

            background: #10110e;

            color: #eee;

            outline: none;

            transition: 0.2s;
        }

        input,
        select {

            height: 48px;

            padding: 0 15px;
        }

        textarea {

            min-height: 90px;

            padding: 14px 15px;

            resize: vertical;
        }

        input:focus,
        select:focus,
        textarea:focus {

            border-color: #9c824c;

            box-shadow:
                0 0 0 2px rgba(156,130,76,0.08);
        }

        select {

            cursor: pointer;
        }

        select option {

            background: #111;

            color: white;
        }

        .optional {

            color: #666;

            font-size: 9px;

            text-transform: lowercase;

            letter-spacing: 0;

            margin-left: 5px;
        }

        /* SAVE BUTTON */

        .update-btn {

            width: 100%;

            height: 50px;

            border: none;

            border-radius: 10px;

            background:
                linear-gradient(
                    135deg,
                    #9d824a,
                    #c2a66d
                );

            color: #111;

            font-weight: bold;

            letter-spacing: 1px;

            cursor: pointer;

            margin-top: 5px;

            transition: 0.2s;

            position: relative;
            z-index: 2;
        }

        .update-btn:hover {

            transform: translateY(-1px);

            box-shadow:
                0 8px 25px rgba(150,120,60,0.2);
        }

        /* DELETE */

        .delete-btn {

            width: 100%;

            height: 45px;

            margin-top: 25px;

            border-radius: 10px;

            border: 1px solid #383838;

            background: transparent;

            color: #9c824c;

            cursor: pointer;

            transition: 0.2s;
        }

        .delete-btn:hover {

            background: #1b1b1b;

            color: #ddd;

            border-color: #555;

        }

        .delete-photo-btn {

    background: transparent;

    border: none;

    color: #777;

    font-size: 11px;

    letter-spacing: 1px;

    cursor: pointer;

    padding: 0;
}

.delete-photo-btn:hover {
    color: #d8a0a0;
}

        /* BACK */

        .back-btn {

            display: block;

            text-align: center;

            margin-top: 18px;

            color: #777;

            text-decoration: none;

            font-size: 11px;

            transition: 0.2s;
        }

        .back-btn:hover {

            color: #c5a96d;
        }

        /* RESPONSIVE */

        @media (max-width: 600px) {

            .profile-card {

                width: 100%;

                padding: 28px 22px;
            }

            .profile-header h1 {

                font-size: 30px;
            }
        }

    </style>

</head>

<body>

<div class="profile-card">

    <!-- HEADER -->

    <div class="profile-header">

        <small>CANO DE VASCO</small>

        <h1>My Profile</h1>

        <p>Manage your account information</p>

    </div>


    <!-- PROFILE PHOTO -->

    <div class="photo-section">

        <div class="profile-photo-wrapper">

            @if(Auth::user()->profile_photo)

                <img
                    id="photoPreview"
                    class="profile-photo"
                    src="{{ asset('storage/' . Auth::user()->profile_photo) }}"
                    alt="Profile Photo"
                >

            @else

                <div
                    id="defaultAvatar"
                    class="default-avatar"
                >
                    👤
                </div>

                <img
                    id="photoPreview"
                    class="profile-photo"
                    style="display:none;"
                    alt="Profile Photo"
                >

            @endif

        </div>


         <label
            for="profile_photo"
            class="photo-label"
        >
            CHANGE PROFILE PHOTO 
        </label>

       
@if(Auth::user()->profile_photo)

    <form
        action="/profile/photo/delete"
        method="POST"
        style="margin-top: 8px;"
        onsubmit="return confirm('Hapus foto profile dan kembali ke avatar?');"
    >

        @csrf

        <button
            type="submit"
            class="delete-photo-btn"
        >
            DELETE PROFILE PHOTO
        </button>

    </form>

@endif

        <div class="photo-info">
            JPG, JPEG, PNG — Maximum 2MB
        </div> 

    </div>


    @if(session('success'))

        <div class="success">

            {{ session('success') }}

        </div>

    @endif


    @if($errors->any())

        <div class="success"
             style="color:#e5aaaa; border-color:#633c3c; background:rgba(100,30,30,0.15);">

            {{ $errors->first() }}

        </div>

    @endif


    <!-- UPDATE PROFILE -->

    <form
        action="/profile"
        method="POST"
        enctype="multipart/form-data"
    >

        @csrf

        @method('PUT')
      

        <!-- PHOTO INPUT -->

        <input
            type="file"
            id="profile_photo"
            name="profile_photo"
            accept="image/png,image/jpeg,image/jpg"
        >


        <!-- NAME -->

        <div class="input-group">

            <label>
                Name
            </label>

            <input
                type="text"
                name="name"
                value="{{ Auth::user()->name }}"
                required
            >

        </div>


        <!-- EMAIL -->

        <div class="input-group">

            <label>
                Email
            </label>

            <input
                type="email"
                name="email"
                value="{{ Auth::user()->email }}"
                required
            >

        </div>


        <!-- ADDRESS -->

        <div class="input-group">

            <label>
                Address
                <span class="optional">(optional)</span>
            </label>

            <textarea
                name="address"
                placeholder="Enter your address..."
            >{{ Auth::user()->address }}</textarea>

        </div>


        <!-- GENDER -->

        <div class="input-group">

            <label>
                Gender
                <span class="optional">(optional)</span>
            </label>

            <select name="gender">

                <option value="">
                    Select gender
                </option>

                <option
                    value="male"
                    {{ Auth::user()->gender == 'male' ? 'selected' : '' }}
                >
                    Male
                </option>

                <option
                    value="female"
                    {{ Auth::user()->gender == 'female' ? 'selected' : '' }}
                >
                    Female
                </option>

                <option
                    value="other"
                    {{ Auth::user()->gender == 'other' ? 'selected' : '' }}
                >
                    Other
                </option>

            </select>

        </div>


        <!-- SAVE -->

        <button
            type="submit"
            class="update-btn"
        >
            SAVE CHANGES
        </button>

    </form>


    <!-- DELETE ACCOUNT -->

    <form
        action="/profile"
        method="POST"
        onsubmit="return confirm('Are you sure you want to delete your account? This action cannot be undone.');"
    >

        @csrf

        @method('DELETE')

        <button
            type="submit"
            class="delete-btn"
        >
            Delete Account
        </button>

    </form>


    <!-- BACK -->

    <a
        href="/dashboard"
        class="back-btn"
    >
        ← Back to Dashboard
    </a>

</div>


<!-- PHOTO PREVIEW SCRIPT -->
 
<script>

    const photoInput =
        document.getElementById('profile_photo');

    const photoPreview =
        document.getElementById('photoPreview');

    const defaultAvatar =
        document.getElementById('defaultAvatar');


    photoInput.addEventListener('change', function(event) {

        const file = event.target.files[0];

        if (!file) {
            return;
        }

        if (file.size > 2 * 1024 * 1024) {

            alert('Profile photo maximum size is 2MB.');

            photoInput.value = '';

            return;
        }


        const reader = new FileReader();


        reader.onload = function(e) {

            photoPreview.src = e.target.result;

            photoPreview.style.display = 'block';


            if (defaultAvatar) {

                defaultAvatar.style.display = 'none';

            }

        };


        reader.readAsDataURL(file);

    });

</script>


</body>

</html>