<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', 'MiSitio')) — Portal Web</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root {
            --primary: #1a3c5e;
            --secondary: #2d7dd2;
            --accent: #f0a500;
        }
        body { padding-top: 70px; font-family: 'Segoe UI', sans-serif; }
        .navbar-brand { font-weight: 700; letter-spacing: 1px; color: var(--accent) !important; }
        .navbar { background: var(--primary) !important; }
        .navbar .nav-link { color: rgba(255,255,255,.85) !important; font-size: .9rem; }
        .navbar .nav-link:hover, .navbar .nav-link.active { color: var(--accent) !important; }
        .navbar .dropdown-menu { border: none; box-shadow: 0 4px 12px rgba(0,0,0,.15); }
        .search-form .form-control { border-radius: 20px 0 0 20px; border-right: none; font-size: .85rem; }
        .search-form .btn { border-radius: 0 20px 20px 0; background: var(--secondary); border-color: var(--secondary); font-size: .85rem; }
        .site-id-badge { background: var(--accent); color: var(--primary); font-weight: 700; padding: 2px 8px; border-radius: 4px; font-size: .75rem; letter-spacing: 1px; }
        footer { background: var(--primary); color: rgba(255,255,255,.7); }
        footer a { color: rgba(255,255,255,.7); text-decoration: none; }
        footer a:hover { color: var(--accent); }
        .chat-btn { position: fixed; bottom: 24px; right: 24px; z-index: 1050; background: var(--secondary); color: #fff; border-radius: 50%; width: 52px; height: 52px; display: flex; align-items: center; justify-content: center; font-size: 1.4rem; box-shadow: 0 4px 12px rgba(0,0,0,.25); text-decoration: none; }
        .chat-btn:hover { background: var(--accent); color: var(--primary); }
    </style>

    @stack('styles')
</head>
<body>

<!-- ===== NAVBAR ===== -->
<nav class="navbar navbar-expand-lg fixed-top shadow-sm" id="sitio-nav">
    <div class="container">

        <!-- ID del sitio / Marca -->
        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('home') }}">
            <span class="site-id-badge">ID:001</span>
            <span>Portal<span class="text-white fw-light">Web</span></span>
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMenu">

            <!-- === Secciones principales === -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                        <i class="bi bi-house-door"></i> Inicio
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        <i class="bi bi-grid-3x3-gap"></i> Secciones
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('home') }}#nosotros"><i class="bi bi-info-circle me-2"></i>Nosotros</a></li>
                        <li><a class="dropdown-item" href="{{ route('home') }}#servicios"><i class="bi bi-briefcase me-2"></i>Servicios</a></li>
                        <li><a class="dropdown-item" href="{{ route('home') }}#galeria"><i class="bi bi-images me-2"></i>Galería</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('contacto') }}"><i class="bi bi-envelope me-2"></i>Contacto</a></li>
                    </ul>
                </li>

                <!-- === Elementos adicionales === -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('ayuda') ? 'active' : '' }}" href="{{ route('ayuda') }}">
                        <i class="bi bi-question-circle"></i> Ayuda
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('mapa-sitio') ? 'active' : '' }}" href="{{ route('mapa-sitio') }}">
                        <i class="bi bi-diagram-3"></i> Mapa del sitio
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('contacto') ? 'active' : '' }}" href="{{ route('contacto') }}">
                        <i class="bi bi-chat-dots"></i> Contáctanos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('buzon') }}">
                        <i class="bi bi-inbox"></i> Buzón
                    </a>
                </li>
            </ul>

            <!-- === Búsqueda en el sitio === -->
            <form class="d-flex search-form me-3" method="GET" action="{{ route('buscar') }}">
                <input class="form-control" type="search" name="q" placeholder="Buscar en el sitio…"
                       value="{{ request('q') }}" aria-label="Buscar">
                <button class="btn text-white" type="submit"><i class="bi bi-search"></i></button>
            </form>

            <!-- === Auth links === -->
            <ul class="navbar-nav">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('buzon') }}"><i class="bi bi-inbox me-2"></i>Buzón</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="dropdown-item text-danger" type="submit">
                                        <i class="bi bi-box-arrow-right me-2"></i>Cerrar sesión
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}" href="{{ route('login') }}">
                            <i class="bi bi-box-arrow-in-right"></i> Iniciar sesión
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-sm btn-warning ms-2 fw-semibold" href="{{ route('register') }}">
                            <i class="bi bi-person-plus"></i> Registrarse
                        </a>
                    </li>
                @endauth
            </ul>

        </div>
    </div>
</nav>
<!-- ===== FIN NAVBAR ===== -->

<!-- Mensajes flash -->
<div class="container mt-3">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-circle me-2"></i>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
</div>

<!-- Contenido principal -->
<main>
    @yield('content')
</main>

<!-- ===== FOOTER ===== -->
<footer class="mt-5 pt-4 pb-3">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <h6 class="text-white fw-bold mb-3">Portal<span class="text-warning">Web</span></h6>
                <p class="small">Sitio web académico elaborado para la Unidad 1 de la materia de Desarrollo Web.</p>
            </div>
            <div class="col-md-4">
                <h6 class="text-white fw-bold mb-3">Navegación</h6>
                <ul class="list-unstyled small">
                    <li><a href="{{ route('home') }}"><i class="bi bi-chevron-right"></i> Inicio</a></li>
                    <li><a href="{{ route('ayuda') }}"><i class="bi bi-chevron-right"></i> Ayuda</a></li>
                    <li><a href="{{ route('mapa-sitio') }}"><i class="bi bi-chevron-right"></i> Mapa del sitio</a></li>
                    <li><a href="{{ route('contacto') }}"><i class="bi bi-chevron-right"></i> Contáctanos</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h6 class="text-white fw-bold mb-3">Cuenta</h6>
                <ul class="list-unstyled small">
                    <li><a href="{{ route('login') }}"><i class="bi bi-chevron-right"></i> Inicio de sesión</a></li>
                    <li><a href="{{ route('register') }}"><i class="bi bi-chevron-right"></i> Registrarse</a></li>
                    <li><a href="{{ route('password.request') }}"><i class="bi bi-chevron-right"></i> Recuperar contraseña</a></li>
                    <li><a href="{{ route('buzon') }}"><i class="bi bi-chevron-right"></i> Buzón</a></li>
                </ul>
            </div>
        </div>
        <hr class="border-secondary mt-3">
        <p class="text-center small mb-0">
            &copy; {{ date('Y') }} PortalWeb — Aguirre Ovalle Luis Daniel — Unidad 1
        </p>
    </div>
</footer>

<!-- Botón de chat flotante -->
<a href="{{ route('contacto') }}#chat" class="chat-btn" title="Chat en vivo">
    <i class="bi bi-chat-fill"></i>
</a>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@stack('scripts')
</body>
</html>
