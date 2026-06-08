<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasswordResetController extends Controller
{
    public function showForm()
    {
        return view('auth.forgot-password');
    }

    public function sendLink(Request $request)
    {
        // Lógica completa en commit 5
        return back()->with('success', 'Si el correo existe, recibirás un enlace de recuperación.');
    }

    public function showReset(string $token)
    {
        return view('auth.reset-password', compact('token'));
    }

    public function reset(Request $request)
    {
        // Lógica completa en commit 5
        return redirect()->route('login')->with('success', 'Contraseña actualizada correctamente.');
    }
}
