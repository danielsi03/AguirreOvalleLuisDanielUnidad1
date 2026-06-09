@extends('layouts.app')

@section('title', 'Verificar código')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">

            <div class="text-center mb-4">
                <i class="bi bi-123" style="font-size:3rem; color:#1a3c5e;"></i>
                <h2 class="fw-bold mt-2" style="color:#1a3c5e;">Código de verificación</h2>
                <p class="text-muted">
                    Ingresa el código de 6 dígitos enviado a<br>
                    <strong>{{ $email }}</strong>
                </p>
            </div>

            <div class="card border-0 shadow">
                <div class="card-body p-4">

                    <form method="POST" action="{{ route('password.verify.check') }}" novalidate>
                        @csrf

                        <input type="hidden" name="email" value="{{ $email }}">

                        <div class="mb-4">
                            <label for="codigo" class="form-label fw-semibold">
                                <i class="bi bi-key me-1"></i>Código de verificación
                            </label>
                            <input
                                type="text"
                                id="codigo"
                                name="codigo"
                                class="form-control form-control-lg text-center @error('codigo') is-invalid @enderror"
                                maxlength="6"
                                placeholder="000000"
                                inputmode="numeric"
                                autocomplete="one-time-code"
                                autofocus
                            >
                            @error('codigo')
                                <div class="invalid-feedback text-center">{{ $message }}</div>
                            @enderror
                            <div class="form-text text-center">El código expira en 10 minutos.</div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 fw-semibold py-2">
                            <i class="bi bi-check-circle me-1"></i> Verificar código
                        </button>
                    </form>

                </div>
            </div>

            <p class="text-center mt-3 text-muted small">
                ¿No recibiste el código?
                <a href="{{ route('password.request') }}" class="fw-semibold text-decoration-none">Reenviar</a>
            </p>

        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Solo permitir dígitos en el campo de código
    document.getElementById('codigo').addEventListener('input', function () {
        this.value = this.value.replace(/\D/g, '').slice(0, 6);
    });
</script>
@endpush
