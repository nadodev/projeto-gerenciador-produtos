<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('login.index');
    }

    public function authenticate(LoginRequest $request)
    {

        $credentials = $request->validated();


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
