@extends('layouts.app')

@section('title', 'Buzón')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold mb-1" style="color:#1a3c5e;"><i class="bi bi-inbox"></i> Buzón de mensajes</h2>
    <p class="text-muted mb-4">Revisa los mensajes de tu bandeja de entrada.</p>

    @guest
        <div class="alert alert-info">
            <i class="bi bi-info-circle me-2"></i>
            Debes <a href="{{ route('login') }}">iniciar sesión</a> para acceder a tu buzón.
        </div>
    @endguest

    @auth
        <div class="card border-0 shadow-sm">
            <div class="card-body text-center py-5 text-muted">
                <i class="bi bi-inbox" style="font-size:3rem; color:#dee2e6;"></i>
                <p class="mt-2 mb-0">Tu buzón está vacío.</p>
            </div>
        </div>
    @endauth
</div>
@endsection
