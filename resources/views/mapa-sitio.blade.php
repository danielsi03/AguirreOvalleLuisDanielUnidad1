@extends('layouts.app')

@section('title', 'Mapa del sitio')

@section('content')

{{-- Hero --}}
<section style="background:linear-gradient(135deg,#1a3c5e 0%,#2d7dd2 100%); color:#fff;" class="py-5">
    <div class="container text-center py-3">
        <i class="bi bi-diagram-3" style="font-size:3.5rem; opacity:.9;"></i>
        <h1 class="fw-bold mt-3 mb-2">Mapa del sitio</h1>
        <p class="lead mb-0 opacity-75">Estructura completa del portal y todas sus secciones.</p>
    </div>
</section>

<section class="py-5">
    <div class="container">

        {{-- Nodo raíz --}}
        <div class="d-flex justify-content-center mb-2">
            <a href="{{ route('home') }}" class="text-decoration-none">
                <div class="text-center px-4 py-3 rounded-3 shadow fw-bold"
                     style="background:#1a3c5e; color:#f0a500; font-size:1.1rem; min-width:180px;">
                    <i class="bi bi-globe2 me-2"></i>PortalWeb
                    <div class="small fw-normal mt-1 opacity-75" style="color:#fff; font-size:.75rem;">ID:001 — Inicio</div>
                </div>
            </a>
        </div>

        {{-- Línea vertical desde raíz --}}
        <div class="d-flex justify-content-center">
            <div style="width:2px; height:30px; background:#2d7dd2;"></div>
        </div>

        {{-- Línea horizontal que conecta las 3 ramas --}}
        <div class="d-flex justify-content-center">
            <div style="width:70%; height:2px; background:#2d7dd2; position:relative;">
                <div style="position:absolute;left:16.5%;top:-4px;width:10px;height:10px;border-radius:50%;background:#2d7dd2;"></div>
                <div style="position:absolute;left:calc(50% - 5px);top:-4px;width:10px;height:10px;border-radius:50%;background:#2d7dd2;"></div>
                <div style="position:absolute;right:16.5%;top:-4px;width:10px;height:10px;border-radius:50%;background:#2d7dd2;"></div>
            </div>
        </div>

        {{-- Las 3 ramas principales --}}
        <div class="row g-0 justify-content-center">

            {{-- Líneas verticales sobre las columnas --}}
            <div class="col-lg-4 d-flex justify-content-center">
                <div style="width:2px; height:20px; background:#2d7dd2;"></div>
            </div>
            <div class="col-lg-4 d-flex justify-content-center">
                <div style="width:2px; height:20px; background:#2d7dd2;"></div>
            </div>
            <div class="col-lg-4 d-flex justify-content-center">
                <div style="width:2px; height:20px; background:#2d7dd2;"></div>
            </div>
        </div>

        {{-- Columnas de ramas --}}
        <div class="row g-4 justify-content-center">

            {{-- ── Rama 1: Secciones principales ── --}}
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm h-100" style="border-radius:14px; overflow:hidden;">
                    <div class="card-header fw-bold py-3 text-white text-center"
                         style="background:#2d7dd2; letter-spacing:.3px;">
                        <i class="bi bi-grid-3x3-gap me-2"></i>Secciones principales
                    </div>
                    <div class="card-body p-3">

                        {{-- Inicio --}}
                        <div class="sitemap-node mb-2">
                            <a href="{{ route('home') }}" class="sitemap-link d-flex align-items-center gap-2 p-2 rounded-2">
                                <i class="bi bi-house-door" style="color:#2d7dd2;"></i>
                                <span class="fw-semibold">Inicio</span>
                                <code class="ms-auto small text-muted">/</code>
                            </a>
                            <div class="ms-4 ps-2 border-start border-2" style="border-color:#dee2e6 !important;">
                                <a href="{{ route('home') }}#nosotros" class="sitemap-sub d-flex align-items-center gap-2 p-1 rounded-2">
                                    <i class="bi bi-chevron-right small" style="color:#adb5bd;"></i>
                                    <span>Nosotros</span>
                                    <code class="ms-auto small text-muted">/#nosotros</code>
                                </a>
                                <a href="{{ route('home') }}#servicios" class="sitemap-sub d-flex align-items-center gap-2 p-1 rounded-2">
                                    <i class="bi bi-chevron-right small" style="color:#adb5bd;"></i>
                                    <span>Servicios</span>
                                    <code class="ms-auto small text-muted">/#servicios</code>
                                </a>
                                <a href="{{ route('home') }}#galeria" class="sitemap-sub d-flex align-items-center gap-2 p-1 rounded-2">
                                    <i class="bi bi-chevron-right small" style="color:#adb5bd;"></i>
                                    <span>Galería</span>
                                    <code class="ms-auto small text-muted">/#galeria</code>
                                </a>
                            </div>
                        </div>

                        <hr class="my-2">

                        {{-- Contáctanos --}}
                        <div class="sitemap-node mb-2">
                            <a href="{{ route('contacto') }}" class="sitemap-link d-flex align-items-center gap-2 p-2 rounded-2">
                                <i class="bi bi-envelope" style="color:#2d7dd2;"></i>
                                <span class="fw-semibold">Contáctanos</span>
                                <code class="ms-auto small text-muted">/contacto</code>
                            </a>
                            <div class="ms-4 ps-2 border-start border-2" style="border-color:#dee2e6 !important;">
                                <a href="{{ route('contacto') }}" class="sitemap-sub d-flex align-items-center gap-2 p-1 rounded-2">
                                    <i class="bi bi-chevron-right small" style="color:#adb5bd;"></i>
                                    <span>Formulario</span>
                                </a>
                                <a href="{{ route('contacto') }}#chat" class="sitemap-sub d-flex align-items-center gap-2 p-1 rounded-2">
                                    <i class="bi bi-chevron-right small" style="color:#adb5bd;"></i>
                                    <span>Chat Bot</span>
                                    <code class="ms-auto small text-muted">#chat</code>
                                </a>
                            </div>
                        </div>

                        <hr class="my-2">

                        {{-- Buzón --}}
                        <a href="{{ route('buzon') }}" class="sitemap-link d-flex align-items-center gap-2 p-2 rounded-2">
                            <i class="bi bi-inbox" style="color:#2d7dd2;"></i>
                            <span class="fw-semibold">Buzón</span>
                            <span class="badge ms-1" style="background:#e8f0fe;color:#2d7dd2;font-size:.7rem;">Auth</span>
                            <code class="ms-auto small text-muted">/buzon</code>
                        </a>

                        <hr class="my-2">

                        {{-- Búsqueda --}}
                        <a href="{{ route('buscar') }}" class="sitemap-link d-flex align-items-center gap-2 p-2 rounded-2">
                            <i class="bi bi-search" style="color:#2d7dd2;"></i>
                            <span class="fw-semibold">Búsqueda</span>
                            <code class="ms-auto small text-muted">/buscar</code>
                        </a>

                    </div>
                </div>
            </div>

            {{-- ── Rama 2: Navegación adicional ── --}}
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm h-100" style="border-radius:14px; overflow:hidden;">
                    <div class="card-header fw-bold py-3 text-white text-center"
                         style="background:#1a3c5e; letter-spacing:.3px;">
                        <i class="bi bi-compass me-2"></i>Elementos adicionales
                    </div>
                    <div class="card-body p-3">

                        <a href="{{ route('ayuda') }}" class="sitemap-link d-flex align-items-center gap-2 p-2 rounded-2 mb-2">
                            <i class="bi bi-question-circle" style="color:#1a3c5e;"></i>
                            <span class="fw-semibold">Ayuda</span>
                            <code class="ms-auto small text-muted">/ayuda</code>
                        </a>
                        <div class="ms-4 ps-2 border-start border-2 mb-2" style="border-color:#dee2e6 !important;">
                            <div class="sitemap-sub d-flex align-items-center gap-2 p-1">
                                <i class="bi bi-chevron-right small" style="color:#adb5bd;"></i>
                                <span>Mi cuenta</span>
                            </div>
                            <div class="sitemap-sub d-flex align-items-center gap-2 p-1">
                                <i class="bi bi-chevron-right small" style="color:#adb5bd;"></i>
                                <span>Acceso y contraseñas</span>
                            </div>
                            <div class="sitemap-sub d-flex align-items-center gap-2 p-1">
                                <i class="bi bi-chevron-right small" style="color:#adb5bd;"></i>
                                <span>Navegación</span>
                            </div>
                            <div class="sitemap-sub d-flex align-items-center gap-2 p-1">
                                <i class="bi bi-chevron-right small" style="color:#adb5bd;"></i>
                                <span>Soporte</span>
                            </div>
                        </div>

                        <hr class="my-2">

                        <a href="{{ route('mapa-sitio') }}" class="sitemap-link active d-flex align-items-center gap-2 p-2 rounded-2 mb-2">
                            <i class="bi bi-diagram-3" style="color:#1a3c5e;"></i>
                            <span class="fw-semibold">Mapa del sitio</span>
                            <span class="badge ms-1" style="background:#1a3c5e;color:#f0a500;font-size:.7rem;">Aquí</span>
                            <code class="ms-auto small text-muted">/mapa-sitio</code>
                        </a>

                        <hr class="my-2">

                        <div class="p-3 rounded-2 text-center" style="background:#f8f9fa;">
                            <i class="bi bi-exclamation-triangle" style="color:#f0a500; font-size:1.5rem;"></i>
                            <div class="fw-semibold small mt-1" style="color:#1a3c5e;">Página de error</div>
                            <code class="text-muted" style="font-size:.75rem;">/404</code>
                            <div class="text-muted mt-1" style="font-size:.75rem;">Se activa automáticamente<br>ante rutas no encontradas</div>
                        </div>

                    </div>
                </div>
            </div>

            {{-- ── Rama 3: Autenticación ── --}}
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm h-100" style="border-radius:14px; overflow:hidden;">
                    <div class="card-header fw-bold py-3 text-white text-center"
                         style="background:#198754; letter-spacing:.3px;">
                        <i class="bi bi-shield-lock me-2"></i>Autenticación
                    </div>
                    <div class="card-body p-3">

                        {{-- Registro --}}
                        <a href="{{ route('register') }}" class="sitemap-link d-flex align-items-center gap-2 p-2 rounded-2 mb-2">
                            <i class="bi bi-person-plus" style="color:#198754;"></i>
                            <span class="fw-semibold">Registrarse</span>
                            <code class="ms-auto small text-muted">/register</code>
                        </a>

                        <hr class="my-2">

                        {{-- Login --}}
                        <a href="{{ route('login') }}" class="sitemap-link d-flex align-items-center gap-2 p-2 rounded-2 mb-2">
                            <i class="bi bi-box-arrow-in-right" style="color:#198754;"></i>
                            <span class="fw-semibold">Iniciar sesión</span>
                            <code class="ms-auto small text-muted">/login</code>
                        </a>

                        <hr class="my-2">

                        {{-- Recuperación --}}
                        <div class="sitemap-node mb-2">
                            <a href="{{ route('password.request') }}" class="sitemap-link d-flex align-items-center gap-2 p-2 rounded-2">
                                <i class="bi bi-key" style="color:#198754;"></i>
                                <span class="fw-semibold">Recuperar contraseña</span>
                                <code class="ms-auto small text-muted">/forgot-password</code>
                            </a>
                            <div class="ms-4 ps-2 border-start border-2" style="border-color:#dee2e6 !important;">
                                <a href="{{ route('password.verify') }}" class="sitemap-sub d-flex align-items-center gap-2 p-1 rounded-2">
                                    <i class="bi bi-chevron-right small" style="color:#adb5bd;"></i>
                                    <span>Verificar código</span>
                                    <code class="ms-auto small text-muted">/verify-code</code>
                                </a>
                                <a href="{{ route('password.reset') }}" class="sitemap-sub d-flex align-items-center gap-2 p-1 rounded-2">
                                    <i class="bi bi-chevron-right small" style="color:#adb5bd;"></i>
                                    <span>Nueva contraseña</span>
                                    <code class="ms-auto small text-muted">/reset-password</code>
                                </a>
                            </div>
                        </div>

                        <hr class="my-2">

                        {{-- Logout --}}
                        <div class="d-flex align-items-center gap-2 p-2 rounded-2" style="background:#f8f9fa;">
                            <i class="bi bi-box-arrow-right" style="color:#dc3545;"></i>
                            <span class="fw-semibold">Cerrar sesión</span>
                            <span class="badge ms-1" style="background:#fde8ea;color:#dc3545;font-size:.7rem;">POST</span>
                            <code class="ms-auto small text-muted">/logout</code>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        {{-- Leyenda --}}
        <div class="row justify-content-center mt-5">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm p-3" style="border-radius:12px; background:#f8f9fa;">
                    <h6 class="fw-bold mb-3" style="color:#1a3c5e;">Leyenda</h6>
                    <div class="d-flex flex-wrap gap-3">
                        <div class="d-flex align-items-center gap-2">
                            <div class="rounded-2 px-2 py-1" style="background:#e8f0fe;">
                                <span style="color:#2d7dd2; font-size:.75rem; font-weight:600;">Auth</span>
                            </div>
                            <small class="text-muted">Requiere sesión iniciada</small>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <div class="rounded-2 px-2 py-1" style="background:#1a3c5e;">
                                <span style="color:#f0a500; font-size:.75rem; font-weight:600;">Aquí</span>
                            </div>
                            <small class="text-muted">Página actual</small>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <div class="rounded-2 px-2 py-1" style="background:#fde8ea;">
                                <span style="color:#dc3545; font-size:.75rem; font-weight:600;">POST</span>
                            </div>
                            <small class="text-muted">Acción de formulario (no URL directa)</small>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <code class="text-muted" style="font-size:.8rem;">/ruta</code>
                            <small class="text-muted">URL del portal</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection

@push('styles')
<style>
    .sitemap-link {
        text-decoration: none;
        color: #1a3c5e;
        transition: background .15s;
    }
    .sitemap-link:hover {
        background: #e8f0fe !important;
        color: #1a3c5e;
    }
    .sitemap-sub {
        text-decoration: none;
        color: #495057;
        font-size: .88rem;
        transition: background .15s;
    }
    .sitemap-sub:hover {
        background: #f0f4ff;
        color: #1a3c5e;
    }
</style>
@endpush
