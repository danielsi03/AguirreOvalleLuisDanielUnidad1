<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class CodigoRecuperacion extends Mailable
{
    public function __construct(public string $codigo) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Código de recuperación de contraseña'
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.codigo-recuperacion'
        );
    }
}
