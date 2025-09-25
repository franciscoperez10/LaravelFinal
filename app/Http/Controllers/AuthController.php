<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginForm()

    {
        return view('auth.login');
    }

    public function login(Request $request)

    {

    $email = $request->input('email');
    $password = $request->input('password');

    if (Auth::attempt(['email' => $email, 'password' => $password])) {
        $request->session()->regenerate();

        return redirect()->intended('dashboard');
    }

    return back()->with('Error', 'The provided credentials do not match our records.');
    }
}
