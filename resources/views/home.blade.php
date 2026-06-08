@extends('layouts.app')

@section('title', 'Inicio')

@section('content')

<!-- Hero -->
<section class="py-5 text-center" style="background: linear-gradient(135deg, #1a3c5e 0%, #2d7dd2 100%); color:#fff;">
    <div class="container py-4">
        <h1 class="display-5 fw-bold mb-3">Bienvenido al Portal Web</h1>
        <p class="lead mb-4 opacity-75">Sitio web académico — Unidad 1 &middot; Desarrollo Web</p>
        <a href="{{ route('register') }}" class="btn btn-warning btn-lg fw-semibold me-2">
            <i class="bi bi-person-plus"></i> Regístrate gratis
        </a>
        <a href="#servicios" class="btn btn-outline-light btn-lg">
            <i class="bi bi-arrow-down-circle"></i> Conoce más
        </a>
    </div>
</section>

<!-- Nosotros -->
<section id="nosotros" class="py-5">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-md-6">
                <h2 class="fw-bold mb-3" style="color:#1a3c5e;">¿Quiénes somos?</h2>
                <p class="text-muted">Somos una plataforma educativa orientada a la enseñanza del desarrollo web moderno,
                    aplicando el paradigma de Programación Orientada a Objetos con tecnologías actuales como Laravel.</p>
                <p class="text-muted">Nuestro objetivo es brindar herramientas y recursos de calidad para el aprendizaje práctico.</p>
                <a href="{{ route('ayuda') }}" class="btn btn-outline-primary">
                    <i class="bi bi-question-circle"></i> Centro de ayuda
                </a>
            </div>
            <div class="col-md-6 text-center">
                <div class="p-5 rounded-4" style="background:#f0f4f8;">
                    <i class="bi bi-mortarboard-fill" style="font-size:5rem; color:#2d7dd2;"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Servicios -->
<section id="servicios" class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center fw-bold mb-5" style="color:#1a3c5e;">Nuestros Servicios</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm text-center p-4">
                    <i class="bi bi-code-slash mb-3" style="font-size:2.5rem; color:#2d7dd2;"></i>
                    <h5 class="fw-bold">Desarrollo Web</h5>
                    <p class="text-muted small">Aprende a construir aplicaciones web con PHP, Laravel y las mejores prácticas de OOP.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm text-center p-4">
                    <i class="bi bi-shield-lock mb-3" style="font-size:2.5rem; color:#f0a500;"></i>
                    <h5 class="fw-bold">Seguridad</h5>
                    <p class="text-muted small">Validación de datos, autenticación segura y protección contra vulnerabilidades comunes.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm text-center p-4">
                    <i class="bi bi-people mb-3" style="font-size:2.5rem; color:#28a745;"></i>
                    <h5 class="fw-bold">Comunidad</h5>
                    <p class="text-muted small">Únete a nuestra comunidad, comparte proyectos y resuelve dudas con otros estudiantes.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Galería -->
<section id="galeria" class="py-5">
    <div class="container">
        <h2 class="text-center fw-bold mb-5" style="color:#1a3c5e;">Galería</h2>
        <div class="row g-3">
            @for($i = 1; $i <= 6; $i++)
            <div class="col-6 col-md-4">
                <div class="rounded-3 overflow-hidden" style="height:160px; background: linear-gradient(135deg, #1a3c5e{{ $i*15 }}, #2d7dd2); display:flex; align-items:center; justify-content:center;">
                    <i class="bi bi-image text-white opacity-50" style="font-size:3rem;"></i>
                </div>
            </div>
            @endfor
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-5 text-center" style="background:#1a3c5e; color:#fff;">
    <div class="container">
        <h3 class="fw-bold mb-3">¿Listo para comenzar?</h3>
        <p class="opacity-75 mb-4">Crea tu cuenta ahora y accede a todos los recursos del portal.</p>
        <a href="{{ route('register') }}" class="btn btn-warning btn-lg fw-semibold">
            <i class="bi bi-person-plus"></i> Crear cuenta
        </a>
        <a href="{{ route('contacto') }}" class="btn btn-outline-light btn-lg ms-3">
            <i class="bi bi-envelope"></i> Contáctanos
        </a>
    </div>
</section>

@endsection
