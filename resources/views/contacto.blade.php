@extends('layouts.app')

@section('title', 'Contáctanos')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="fw-bold mb-1" style="color:#1a3c5e;">Contáctanos</h2>
            <p class="text-muted mb-4">Envíanos un mensaje y te responderemos a la brevedad.</p>

            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('contacto.enviar') }}">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Nombre</label>
                                <input type="text" name="nombre" class="form-control" placeholder="Tu nombre" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Correo electrónico</label>
                                <input type="email" name="email" class="form-control" placeholder="correo@ejemplo.com" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">Asunto</label>
                                <input type="text" name="asunto" class="form-control" placeholder="Asunto del mensaje" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">Mensaje</label>
                                <textarea name="mensaje" class="form-control" rows="5" placeholder="Escribe tu mensaje aquí..." required></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-send"></i> Enviar mensaje
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Chat en vivo -->
            <div id="chat" class="card border-0 shadow-sm mt-4">
                <div class="card-header fw-bold" style="background:#1a3c5e; color:#fff;">
                    <i class="bi bi-chat-dots"></i> Chat en vivo
                </div>
                <div class="card-body text-center py-4 text-muted">
                    <i class="bi bi-chat-square-text" style="font-size:3rem; color:#dee2e6;"></i>
                    <p class="mt-2 mb-0">El chat estará disponible cuando inicies sesión.</p>
                    <a href="{{ route('login') }}" class="btn btn-sm btn-outline-primary mt-2">Iniciar sesión</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
