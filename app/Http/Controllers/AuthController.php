<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | REGISTER
    |--------------------------------------------------------------------------
    */

    public function register()
    {
        return view('register');
    }


    public function registerProcess(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/login')
            ->with('success', 'Registrasi berhasil!');
    }


    /*
    |--------------------------------------------------------------------------
    | LOGIN
    |--------------------------------------------------------------------------
    */

    public function login()
    {
        return view('login');
    }


    public function loginProcess(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            return redirect('/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | PROFILE
    |--------------------------------------------------------------------------
    */

    public function profile()
    {
        return view('profile');
    }

    public function deleteProfilePhoto()
{
    $user = Auth::user();

    // Hapus file foto dari storage
    if ($user->profile_photo) {

        Storage::disk('public')
            ->delete($user->profile_photo);
    }

    // Kosongkan data foto di database
    $user->profile_photo = null;

    $user->save();

    return redirect('/profile')
        ->with('success', 'Foto profile berhasil dihapus.');
}

    /*
    |--------------------------------------------------------------------------
    | UPDATE PROFILE
    |--------------------------------------------------------------------------
    */

    public function updateProfile(Request $request)
    {
        $user = Auth::user();


        /*
        |--------------------------------------------------------------------------
        | VALIDATION
        |--------------------------------------------------------------------------
        */

        $request->validate([

            // Data lama
            'name' => 'required|string|max:255',

            'email' => 'required|email|unique:users,email,' . $user->id,


            // Data baru - optional
            'address' => 'nullable|string|max:1000',

            'gender' => 'nullable|in:male,female,other',


            // Foto profile - optional
            // Maksimal 2MB
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

        ]);


        /*
        |--------------------------------------------------------------------------
        | UPDATE DATA USER
        |--------------------------------------------------------------------------
        */

        $user->name = $request->name;

        $user->email = $request->email;


        /*
        |--------------------------------------------------------------------------
        | UPDATE ADDRESS
        |--------------------------------------------------------------------------
        |
        | Karena optional, kalau kosong akan disimpan sebagai NULL/kosong.
        |
        */

        $user->address = $request->address;


        /*
        |--------------------------------------------------------------------------
        | UPDATE GENDER
        |--------------------------------------------------------------------------
        |
        | Pilihan:
        | male
        | female
        | other
        |
        | Field ini juga optional.
        |
        */

        $user->gender = $request->gender;


        /*
        |--------------------------------------------------------------------------
        | UPLOAD PROFILE PHOTO
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('profile_photo')) {
        
       


            /*
            |--------------------------------------------------------------------------
            | Hapus foto lama
            |--------------------------------------------------------------------------
            */

            if ($user->profile_photo) {

                Storage::disk('public')
                    ->delete($user->profile_photo);
            }


            /*
            |--------------------------------------------------------------------------
            | Simpan foto baru
            |--------------------------------------------------------------------------
            |
            | Foto akan masuk ke:
            |
            | storage/app/public/profile_photos
            |
            */

            $path = $request
                ->file('profile_photo')
                ->store('profile_photos', 'public');


            /*
            |--------------------------------------------------------------------------
            | Simpan lokasi foto ke database
            |--------------------------------------------------------------------------
            */

            $user->profile_photo = $path;
        }


        /*
        |--------------------------------------------------------------------------
        | SAVE
        |--------------------------------------------------------------------------
        */

        $user->save();


        /*
        |--------------------------------------------------------------------------
        | REDIRECT
        |--------------------------------------------------------------------------
        */

        return redirect('/profile')
            ->with('success', 'Profile berhasil diperbarui!');
    }


    /*
    |--------------------------------------------------------------------------
    | DELETE ACCOUNT
    |--------------------------------------------------------------------------
    */

    public function deleteAccount(Request $request)
    {
        $user = Auth::user();


        /*
        |--------------------------------------------------------------------------
        | Hapus foto profile terlebih dahulu
        |--------------------------------------------------------------------------
        */

        if ($user->profile_photo) {

            Storage::disk('public')
                ->delete($user->profile_photo);
        }


        /*
        |--------------------------------------------------------------------------
        | Logout
        |--------------------------------------------------------------------------
        */

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();


        /*
        |--------------------------------------------------------------------------
        | Hapus akun
        |--------------------------------------------------------------------------
        */

        $user->delete();


        return redirect('/login')
            ->with('success', 'Akun berhasil dihapus.');
    }


    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}