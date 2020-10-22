<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('pages.auth.login');
    }

    public function authenticate()
    {
        request()->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $credentials = request()->only('username', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/');
        }else{
            return back()->withErrors(['login' => 'Username / Password salah']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
