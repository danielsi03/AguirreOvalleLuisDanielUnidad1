@extends('layouts.app')

@section('title', 'Recuperar contraseña')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">

            <div class="text-center mb-4">
                <i class="bi bi-shield-lock" style="font-size:3rem; color:#1a3c5e;"></i>
                <h2 class="fw-bold mt-2" style="color:#1a3c5e;">Recuperar contraseña</h2>
                <p class="text-muted">Ingresa tu correo y te enviaremos un código de verificación.</p>
            </div>

            <div class="card border-0 shadow">
                <div class="card-body p-4">

                    <form method="POST" action="{{ route('password.email') }}" novalidate>
                        @csrf

                        <div class="mb-4">
                            <label for="email" class="form-label fw-semibold">
                                <i class="bi bi-envelope me-1"></i>Correo electrónico
                            </label>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') }}"
                                placeholder="correo@ejemplo.com"
                                autofocus
                            >
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary w-100 fw-semibold py-2">
                            <i class="bi bi-send me-1"></i> Enviar código de verificación
                        </button>
                    </form>

                </div>
            </div>

            <p class="text-center mt-3 text-muted small">
                ¿Recordaste tu contraseña?
                <a href="{{ route('login') }}" class="fw-semibold text-decoration-none">Iniciar sesión</a>
            </p>

        </div>
    </div>
</div>
@endsection
