<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function buscar(Request $request)
    {
        $query = $request->input('q');
        return view('buscar', compact('query'));
    }

    public function contacto()
    {
        return view('contacto');
    }

    public function contactoEnviar(Request $request)
    {
        // Honeypot: campo oculto; los bots lo llenan, los humanos no
        if ($request->filled('website')) {
            return redirect()->route('contacto')->with('success', '¡Mensaje enviado correctamente!');
        }

        $request->validate([
            'nombre'  => ['required', 'string', 'min:2', 'max:100'],
            'email'   => ['required', 'email', 'max:255'],
            'asunto'  => ['required', 'string', 'min:3', 'max:200'],
            'mensaje' => ['required', 'string', 'min:10', 'max:2000'],
        ], [
            'nombre.required'  => 'El nombre es obligatorio.',
            'nombre.min'       => 'El nombre debe tener al menos 2 caracteres.',
            'email.required'   => 'El correo electrónico es obligatorio.',
            'email.email'      => 'Ingresa un correo electrónico válido.',
            'asunto.required'  => 'El asunto es obligatorio.',
            'asunto.min'       => 'El asunto debe tener al menos 3 caracteres.',
            'mensaje.required' => 'El mensaje es obligatorio.',
            'mensaje.min'      => 'El mensaje debe tener al menos 10 caracteres.',
            'mensaje.max'      => 'El mensaje no puede superar los 2000 caracteres.',
        ]);

        return redirect()->route('contacto')->with('success', '¡Mensaje enviado correctamente!');
    }

    public function buzon()
    {
        return view('buzon');
    }

    public function ayuda()
    {
        return view('ayuda');
    }

    public function mapaSitio()
    {
        return view('mapa-sitio');
    }
}
