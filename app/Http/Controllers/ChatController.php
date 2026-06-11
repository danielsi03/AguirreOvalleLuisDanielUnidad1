<?php

namespace App\Http\Controllers;

use App\Models\ChatMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function enviar(Request $request)
    {
        $request->validate([
            'mensaje' => ['required', 'string', 'max:500'],
        ], [
            'mensaje.required' => 'Escribe un mensaje antes de enviar.',
            'mensaje.max'      => 'El mensaje no puede superar los 500 caracteres.',
        ]);

        ChatMessage::create([
            'user_id' => Auth::id(),
            'mensaje' => $request->mensaje,
        ]);

        return redirect()->to(route('contacto') . '#chat')
            ->with('chat_ok', true);
    }
}
