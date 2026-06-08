@extends('layouts.app')

@section('title', 'Crear cuenta')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">

            <div class="text-center mb-4">
                <i class="bi bi-person-plus-fill" style="font-size:3rem; color:#1a3c5e;"></i>
                <h2 class="fw-bold mt-2" style="color:#1a3c5e;">Crear cuenta</h2>
                <p class="text-muted">Únete al portal web</p>
            </div>

            <div class="card border-0 shadow">
                <div class="card-body p-4">

                    <form method="POST" action="{{ route('register') }}" novalidate id="registerForm">
                        @csrf

                        {{-- Nombre --}}
                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">
                                <i class="bi bi-person me-1"></i>Nombre completo
                            </label>
                            <input
                                type="text"
                                id="name"
                                name="name"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name') }}"
                                placeholder=""
                                autofocus
                            >
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div class="mb-3">
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
                            >
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Contraseña --}}
                        <div class="mb-3">
                            <label for="password" class="form-label fw-semibold">
                                <i class="bi bi-lock me-1"></i>Contraseña
                            </label>
                            <div class="input-group">
                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Mínimo 8 caracteres con letras y números"
                                >
                                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                    <i class="bi bi-eye" id="eyeIcon"></i>
                                </button>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- Barra de fortaleza --}}
                            <div class="mt-2" id="strengthBar" style="display:none;">
                                <div class="progress" style="height:5px;">
                                    <div class="progress-bar" id="strengthProgress" role="progressbar"></div>
                                </div>
                                <small id="strengthText" class="text-muted"></small>
                            </div>
                        </div>

                        {{-- Confirmar contraseña --}}
                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label fw-semibold">
                                <i class="bi bi-lock-fill me-1"></i>Confirmar contraseña
                            </label>
                            <input
                                type="password"
                                id="password_confirmation"
                                name="password_confirmation"
                                class="form-control"
                                placeholder="Repite tu contraseña"
                            >
                            <div class="invalid-feedback" id="confirmError" style="display:none;">
                                Las contraseñas no coinciden.
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 fw-semibold py-2">
                            <i class="bi bi-check-circle me-1"></i> Crear cuenta
                        </button>
                    </form>

                </div>
            </div>

            <p class="text-center mt-3 text-muted small">
                ¿Ya tienes cuenta?
                <a href="{{ route('login') }}" class="fw-semibold text-decoration-none">Inicia sesión</a>
            </p>

        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Mostrar/ocultar contraseña
    document.getElementById('togglePassword').addEventListener('click', function () {
        const input = document.getElementById('password');
        const icon  = document.getElementById('eyeIcon');
        if (input.type === 'password') {
            input.type = 'text';
            icon.className = 'bi bi-eye-slash';
        } else {
            input.type = 'password';
            icon.className = 'bi bi-eye';
        }
    });

    // Medidor de fortaleza de contraseña
    document.getElementById('password').addEventListener('input', function () {
        const val  = this.value;
        const bar  = document.getElementById('strengthBar');
        const prog = document.getElementById('strengthProgress');
        const txt  = document.getElementById('strengthText');

        if (val.length === 0) { bar.style.display = 'none'; return; }
        bar.style.display = 'block';

        let score = 0;
        if (val.length >= 8)               score++;
        if (/[A-Z]/.test(val))             score++;
        if (/[0-9]/.test(val))             score++;
        if (/[^A-Za-z0-9]/.test(val))      score++;

        const levels = [
            { w: '25%',  cls: 'bg-danger',  label: 'Muy débil' },
            { w: '50%',  cls: 'bg-warning', label: 'Débil' },
            { w: '75%',  cls: 'bg-info',    label: 'Aceptable' },
            { w: '100%', cls: 'bg-success', label: 'Fuerte' },
        ];
        const l = levels[score - 1] || levels[0];
        prog.style.width = l.w;
        prog.className = 'progress-bar ' + l.cls;
        txt.textContent = l.label;
    });

    // Validación en tiempo real: confirmar contraseña
    document.getElementById('password_confirmation').addEventListener('input', function () {
        const pass    = document.getElementById('password').value;
        const errDiv  = document.getElementById('confirmError');
        const input   = this;
        if (this.value && this.value !== pass) {
            input.classList.add('is-invalid');
            errDiv.style.display = 'block';
        } else {
            input.classList.remove('is-invalid');
            errDiv.style.display = 'none';
        }
    });
</script>
@endpush
