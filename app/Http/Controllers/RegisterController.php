<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Session;

class RegisterController extends Controller
{
    public function register()
    {
        return view('register');
    }
    
    public function actionregister(Request $request)
    {
        $api_id = generateRandomID();

        User::create([
            'id_api' => $api_id,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'active' => 1
        ]);

        registerUser($api_id);

        Session::flash('message', 'Register Berhasil. Akun Anda sudah Aktif silahkan Login menggunakan username dan password.');
        return redirect('login');
    }
}