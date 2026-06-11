@extends('layouts.app')

@section('title', 'Página no encontrada')

@push('styles')
<style>
    .error-hero {
        min-height: 70vh;
        display: flex;
        align-items: center;
        background: linear-gradient(135deg, var(--primary) 0%, #0d2137 100%);
        position: relative;
        overflow: hidden;
    }
    .error-hero::before {
        content: '404';
        position: absolute;
        font-size: 28rem;
        font-weight: 900;
        color: rgba(255,255,255,.04);
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        line-height: 1;
        pointer-events: none;
        user-select: none;
    }
    .error-icon-wrapper {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        background: rgba(240,165,0,.15);
        border: 2px solid rgba(240,165,0,.35);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        animation: pulse 2.5s ease-in-out infinite;
    }
    @keyframes pulse {
        0%, 100% { box-shadow: 0 0 0 0 rgba(240,165,0,.25); }
        50%       { box-shadow: 0 0 0 18px rgba(240,165,0,0); }
    }
    .error-code {
        font-size: 5rem;
        font-weight: 900;
        color: var(--accent);
        line-height: 1;
        letter-spacing: -2px;
    }
    .error-divider {
        width: 60px;
        height: 3px;
        background: var(--accent);
        border-radius: 2px;
        margin: 1rem auto;
    }
    .suggestion-card {
        background: rgba(255,255,255,.06);
        border: 1px solid rgba(255,255,255,.1);
        border-radius: 12px;
        padding: 1.25rem 1rem;
        text-decoration: none;
        color: rgba(255,255,255,.85);
        transition: all .25s;
        display: block;
    }
    .suggestion-card:hover {
        background: rgba(255,255,255,.12);
        border-color: var(--accent);
        color: #fff;
        transform: translateY(-3px);
    }
    .suggestion-card .si-icon {
        font-size: 1.75rem;
        color: var(--accent);
        margin-bottom: .5rem;
    }
    .suggestion-card .si-title {
        font-weight: 600;
        font-size: .95rem;
        margin-bottom: .25rem;
    }
    .suggestion-card .si-url {
        font-size: .75rem;
        color: rgba(255,255,255,.45);
        font-family: monospace;
    }
    .search-404 .form-control {
        border-radius: 25px 0 0 25px;
        background: rgba(255,255,255,.1);
        border-color: rgba(255,255,255,.2);
        color: #fff;
        padding: .6rem 1.25rem;
    }
    .search-404 .form-control::placeholder { color: rgba(255,255,255,.45); }
    .search-404 .form-control:focus {
        background: rgba(255,255,255,.15);
        border-color: var(--accent);
        color: #fff;
        box-shadow: none;
    }
    .search-404 .btn {
        border-radius: 0 25px 25px 0;
        background: var(--secondary);
        border-color: var(--secondary);
        color: #fff;
        padding: .6rem 1.25rem;
    }
    .search-404 .btn:hover { background: var(--accent); border-color: var(--accent); color: var(--primary); }
</style>
@endpush

@section('content')
<section class="error-hero">
    <div class="container text-center position-relative py-5">

        <div class="error-icon-wrapper">
            <i class="bi bi-compass" style="font-size:3.5rem; color:var(--accent);"></i>
        </div>

        <p class="error-code">404</p>
        <div class="error-divider"></div>

        <h1 class="text-white fw-bold fs-2 mb-2">Página no encontrada</h1>
        <p class="text-white-50 mb-4" style="max-width:480px; margin:0 auto 1.5rem;">
            La dirección que ingresaste no existe o fue movida. Usa la búsqueda o
            elige una de las secciones de abajo para continuar.
        </p>

        <!-- Búsqueda -->
        <form class="d-flex search-404 justify-content-center mb-5" method="GET" action="{{ route('buscar') }}" style="max-width:440px; margin:0 auto;">
            <input class="form-control" type="search" name="q" placeholder="Buscar en el sitio…" aria-label="Buscar">
            <button class="btn" type="submit"><i class="bi bi-search"></i></button>
        </form>

        <!-- Sugerencias de navegación -->
        <div class="row g-3 justify-content-center" style="max-width:700px; margin:0 auto;">
            <div class="col-6 col-md-3">
                <a href="{{ route('home') }}" class="suggestion-card">
                    <div class="si-icon"><i class="bi bi-house-door"></i></div>
                    <div class="si-title">Inicio</div>
                    <div class="si-url">/</div>
                </a>
            </div>
            <div class="col-6 col-md-3">
                <a href="{{ route('contacto') }}" class="suggestion-card">
                    <div class="si-icon"><i class="bi bi-envelope"></i></div>
                    <div class="si-title">Contáctanos</div>
                    <div class="si-url">/contacto</div>
                </a>
            </div>
            <div class="col-6 col-md-3">
                <a href="{{ route('ayuda') }}" class="suggestion-card">
                    <div class="si-icon"><i class="bi bi-question-circle"></i></div>
                    <div class="si-title">Ayuda</div>
                    <div class="si-url">/ayuda</div>
                </a>
            </div>
            <div class="col-6 col-md-3">
                <a href="{{ route('mapa-sitio') }}" class="suggestion-card">
                    <div class="si-icon"><i class="bi bi-diagram-3"></i></div>
                    <div class="si-title">Mapa del sitio</div>
                    <div class="si-url">/mapa-sitio</div>
                </a>
            </div>
        </div>

        <div class="mt-5">
            <a href="{{ route('home') }}" class="btn btn-warning fw-semibold px-4 py-2 rounded-pill">
                <i class="bi bi-arrow-left me-2"></i>Volver al inicio
            </a>
        </div>

    </div>
</section>
@endsection
