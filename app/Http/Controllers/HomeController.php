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
        // Backend validation added in commit 9
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
