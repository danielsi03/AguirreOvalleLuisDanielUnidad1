<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validaciones completas en commit 9
        return redirect()->route('home');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Lógica completa en commit 4
        return redirect()->route('home');
    }

    public function logout(Request $request)
    {
        return redirect()->route('home');
    }
}
