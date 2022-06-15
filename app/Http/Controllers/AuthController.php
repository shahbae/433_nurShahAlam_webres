<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class AuthController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function simpanuser(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        
        return redirect('/login');
    }
    public function login()
    {
        return view('login');
    }
    public function home()
    {
        return view('home');
    }

    public function ceklogin(Request $request)
    {
        if (!Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ]))
        {
            return redirect('home');
        } 
        else 
        {
            return 'Berhasil Masuk';
        }
    }

}