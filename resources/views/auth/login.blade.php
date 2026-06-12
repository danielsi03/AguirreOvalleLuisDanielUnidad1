@extends('layouts.app')

@section('title', 'Iniciar sesión')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">

            <div class="text-center mb-4">
                <i class="bi bi-box-arrow-in-right" style="font-size:3rem; color:#1a3c5e;"></i>
                <h2 class="fw-bold mt-2" style="color:#1a3c5e;">Iniciar sesión</h2>
                <p class="text-muted">Accede a tu cuenta del portal</p>
            </div>

            <div class="card border-0 shadow">
                <div class="card-body p-4">

                    <form method="POST" action="{{ route('login') }}" novalidate id="loginForm">
                        @csrf

                        {{-- Correo --}}
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
                                autofocus
                            >
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Contraseña --}}
                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <label for="password" class="form-label fw-semibold mb-0">
                                    <i class="bi bi-lock me-1"></i>Contraseña
                                </label>
                                <a href="{{ route('password.request') }}" class="small text-decoration-none">
                                    ¿Olvidaste tu contraseña?
                                </a>
                            </div>
                            <div class="input-group mt-1">
                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Tu contraseña"
                                >
                                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                    <i class="bi bi-eye" id="eyeIcon"></i>
                                </button>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Recordarme --}}
                        <div class="mb-4 form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember">
                            <label class="form-check-label text-muted small" for="remember">
                                Mantener sesión iniciada
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 fw-semibold py-2">
                            <i class="bi bi-box-arrow-in-right me-1"></i> Iniciar sesión
                        </button>
                    </form>

                </div>
            </div>

            <p class="text-center mt-3 text-muted small">
                ¿No tienes cuenta?
                <a href="{{ route('register') }}" class="fw-semibold text-decoration-none">Regístrate gratis</a>
            </p>

        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Mostrar / ocultar contraseña
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

    // Validación frontend
    (function () {
        const form  = document.getElementById('loginForm');
        const email = document.getElementById('email');
        const pass  = document.getElementById('password');

        function showErr(input, msg) {
            input.classList.add('is-invalid');
            input.classList.remove('is-valid');
            let fb = input.closest('.mb-3, .input-group')?.querySelector('.invalid-feedback');
            if (!fb) { fb = document.createElement('div'); fb.className = 'invalid-feedback'; input.after(fb); }
            fb.textContent = msg;
        }
        function clearErr(input) {
            input.classList.remove('is-invalid');
            input.classList.add('is-valid');
        }

        email.addEventListener('blur', function () {
            if (!this.value.trim()) showErr(this, 'El correo electrónico es obligatorio.');
            else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(this.value.trim())) showErr(this, 'Ingresa un correo electrónico válido.');
            else clearErr(this);
        });

        pass.addEventListener('blur', function () {
            if (!this.value) showErr(this, 'La contraseña es obligatoria.');
            else clearErr(this);
        });

        form.addEventListener('submit', function (e) {
            let ok = true;
            if (!email.value.trim()) { showErr(email, 'El correo electrónico es obligatorio.'); ok = false; }
            else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value.trim())) { showErr(email, 'Ingresa un correo electrónico válido.'); ok = false; }
            if (!pass.value) { showErr(pass, 'La contraseña es obligatoria.'); ok = false; }
            if (!ok) e.preventDefault();
        });
    })();
</script>
@endpush
