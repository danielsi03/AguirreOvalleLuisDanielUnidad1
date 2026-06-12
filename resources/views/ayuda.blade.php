@extends('layouts.app')

@section('title', 'Ayuda')

@section('content')

{{-- Hero --}}
<section style="background:linear-gradient(135deg,#1a3c5e 0%,#2d7dd2 100%); color:#fff;" class="py-5">
    <div class="container text-center py-3">
        <i class="bi bi-question-circle" style="font-size:3.5rem; opacity:.9;"></i>
        <h1 class="fw-bold mt-3 mb-2">Centro de ayuda</h1>
        <p class="lead mb-0 opacity-75">Encuentra respuestas rápidas a las preguntas más frecuentes del portal.</p>
    </div>
</section>

{{-- Tarjetas de categorías --}}
<section class="py-5" style="background:#f8f9fa;">
    <div class="container">
        <div class="row g-4 justify-content-center">
            <div class="col-sm-6 col-lg-3">
                <a href="#cuenta" class="text-decoration-none">
                    <div class="card border-0 shadow-sm text-center h-100 py-4 px-3" style="border-radius:12px; transition:.2s;" onmouseover="this.style.transform='translateY(-4px)'" onmouseout="this.style.transform='none'">
                        <i class="bi bi-person-circle mb-3" style="font-size:2.2rem; color:#2d7dd2;"></i>
                        <h6 class="fw-bold mb-1" style="color:#1a3c5e;">Mi cuenta</h6>
                        <small class="text-muted">Registro, perfil y datos</small>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-lg-3">
                <a href="#acceso" class="text-decoration-none">
                    <div class="card border-0 shadow-sm text-center h-100 py-4 px-3" style="border-radius:12px; transition:.2s;" onmouseover="this.style.transform='translateY(-4px)'" onmouseout="this.style.transform='none'">
                        <i class="bi bi-box-arrow-in-right mb-3" style="font-size:2.2rem; color:#2d7dd2;"></i>
                        <h6 class="fw-bold mb-1" style="color:#1a3c5e;">Acceso</h6>
                        <small class="text-muted">Inicio de sesión y contraseñas</small>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-lg-3">
                <a href="#navegacion" class="text-decoration-none">
                    <div class="card border-0 shadow-sm text-center h-100 py-4 px-3" style="border-radius:12px; transition:.2s;" onmouseover="this.style.transform='translateY(-4px)'" onmouseout="this.style.transform='none'">
                        <i class="bi bi-compass mb-3" style="font-size:2.2rem; color:#2d7dd2;"></i>
                        <h6 class="fw-bold mb-1" style="color:#1a3c5e;">Navegación</h6>
                        <small class="text-muted">Secciones y funciones del portal</small>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-lg-3">
                <a href="#contacto-ayuda" class="text-decoration-none">
                    <div class="card border-0 shadow-sm text-center h-100 py-4 px-3" style="border-radius:12px; transition:.2s;" onmouseover="this.style.transform='translateY(-4px)'" onmouseout="this.style.transform='none'">
                        <i class="bi bi-headset mb-3" style="font-size:2.2rem; color:#2d7dd2;"></i>
                        <h6 class="fw-bold mb-1" style="color:#1a3c5e;">Soporte</h6>
                        <small class="text-muted">Contactar al equipo</small>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

{{-- FAQ --}}
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                {{-- Mi cuenta --}}
                <h4 class="fw-bold mb-4 d-flex align-items-center gap-2" id="cuenta" style="color:#1a3c5e;">
                    <i class="bi bi-person-circle"></i> Mi cuenta
                </h4>
                <div class="accordion mb-5 shadow-sm" id="faqCuenta" style="border-radius:12px; overflow:hidden;">

                    <div class="accordion-item border-0 border-bottom">
                        <h2 class="accordion-header">
                            <button class="accordion-button fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#c1">
                                ¿Cómo creo una cuenta en el portal?
                            </button>
                        </h2>
                        <div id="c1" class="accordion-collapse collapse show" data-bs-parent="#faqCuenta">
                            <div class="accordion-body text-muted">
                                Haz clic en <strong>Registrarse</strong> en el menú superior. Completa el formulario con tu nombre completo, correo electrónico y una contraseña de al menos 8 caracteres (letras y números). Al finalizar, tu sesión se iniciará automáticamente.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item border-0 border-bottom">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#c2">
                                ¿Mis datos están seguros?
                            </button>
                        </h2>
                        <div id="c2" class="accordion-collapse collapse" data-bs-parent="#faqCuenta">
                            <div class="accordion-body text-muted">
                                Sí. Las contraseñas se almacenan cifradas con <strong>bcrypt</strong> y nunca se guardan en texto plano. El portal utiliza tokens CSRF para proteger todos los formularios contra ataques externos.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item border-0">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#c3">
                                ¿Puedo registrarme con un correo que ya existe?
                            </button>
                        </h2>
                        <div id="c3" class="accordion-collapse collapse" data-bs-parent="#faqCuenta">
                            <div class="accordion-body text-muted">
                                No. Cada correo electrónico está asociado a una sola cuenta. Si ya tienes cuenta, ve directamente a <strong>Iniciar sesión</strong>.
                            </div>
                        </div>
                    </div>

                </div>

                {{-- Acceso --}}
                <h4 class="fw-bold mb-4 d-flex align-items-center gap-2" id="acceso" style="color:#1a3c5e;">
                    <i class="bi bi-box-arrow-in-right"></i> Acceso
                </h4>
                <div class="accordion mb-5 shadow-sm" id="faqAcceso" style="border-radius:12px; overflow:hidden;">

                    <div class="accordion-item border-0 border-bottom">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#a1">
                                Olvidé mi contraseña, ¿qué hago?
                            </button>
                        </h2>
                        <div id="a1" class="accordion-collapse collapse" data-bs-parent="#faqAcceso">
                            <div class="accordion-body text-muted">
                                En la página de inicio de sesión haz clic en <strong>¿Olvidaste tu contraseña?</strong>. Ingresa tu correo registrado y recibirás un código de 6 dígitos. Ingrésalo en la siguiente pantalla y podrás crear una nueva contraseña. El código expira en 10 minutos.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item border-0 border-bottom">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#a2">
                                ¿Qué significa "Mantener sesión iniciada"?
                            </button>
                        </h2>
                        <div id="a2" class="accordion-collapse collapse" data-bs-parent="#faqAcceso">
                            <div class="accordion-body text-muted">
                                Activa esa opción si usas un dispositivo personal. El portal recordará tu sesión durante más tiempo. <strong>No la actives</strong> en computadoras compartidas o públicas.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item border-0">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#a3">
                                No recibo el código de recuperación en mi correo.
                            </button>
                        </h2>
                        <div id="a3" class="accordion-collapse collapse" data-bs-parent="#faqAcceso">
                            <div class="accordion-body text-muted">
                                Revisa la carpeta de <strong>Spam</strong> o <strong>Correo no deseado</strong>. Si aún no aparece, espera un minuto y solicita un nuevo código haciendo clic en <strong>Reenviar</strong>. Asegúrate de haber escrito bien el correo.
                            </div>
                        </div>
                    </div>

                </div>

                {{-- Navegación --}}
                <h4 class="fw-bold mb-4 d-flex align-items-center gap-2" id="navegacion" style="color:#1a3c5e;">
                    <i class="bi bi-compass"></i> Navegación
                </h4>
                <div class="accordion mb-5 shadow-sm" id="faqNav" style="border-radius:12px; overflow:hidden;">

                    <div class="accordion-item border-0 border-bottom">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#n1">
                                ¿Qué es el Buzón?
                            </button>
                        </h2>
                        <div id="n1" class="accordion-collapse collapse" data-bs-parent="#faqNav">
                            <div class="accordion-body text-muted">
                                El Buzón es la bandeja de mensajes internos de tu cuenta. Puedes acceder a él desde el menú superior. Requiere tener sesión iniciada.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item border-0 border-bottom">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#n2">
                                ¿Cómo funciona el chat del portal?
                            </button>
                        </h2>
                        <div id="n2" class="accordion-collapse collapse" data-bs-parent="#faqNav">
                            <div class="accordion-body text-muted">
                                El botón flotante <i class="bi bi-chat-dots"></i> en la esquina inferior derecha te lleva directamente a la sección de chat en la página de Contáctanos, donde puedes enviar un mensaje al equipo.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item border-0">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#n3">
                                ¿Para qué sirve el buscador del portal?
                            </button>
                        </h2>
                        <div id="n3" class="accordion-collapse collapse" data-bs-parent="#faqNav">
                            <div class="accordion-body text-muted">
                                El buscador está disponible en el menú superior. Te permite localizar contenido dentro del portal escribiendo palabras clave y presionando Enter o el ícono de búsqueda.
                            </div>
                        </div>
                    </div>

                </div>

                {{-- Soporte --}}
                <h4 class="fw-bold mb-4 d-flex align-items-center gap-2" id="contacto-ayuda" style="color:#1a3c5e;">
                    <i class="bi bi-headset"></i> Soporte
                </h4>
                <div class="card border-0 shadow-sm p-4" style="border-radius:12px;">
                    <p class="mb-3 text-muted">¿No encontraste lo que buscabas? Nuestro equipo está disponible para ayudarte.</p>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0"
                                     style="width:44px;height:44px;background:#e8f0fe;">
                                    <i class="bi bi-envelope" style="color:#2d7dd2;"></i>
                                </div>
                                <div>
                                    <div class="fw-semibold small" style="color:#1a3c5e;">Correo</div>
                                    <div class="text-muted small">daniel.aguirre.ldao@gmail.com</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0"
                                     style="width:44px;height:44px;background:#e8f0fe;">
                                    <i class="bi bi-clock" style="color:#2d7dd2;"></i>
                                </div>
                                <div>
                                    <div class="fw-semibold small" style="color:#1a3c5e;">Horario</div>
                                    <div class="text-muted small">Lun–Vie, 9:00 – 18:00</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('contacto') }}" class="btn btn-primary">
                            <i class="bi bi-chat-dots me-1"></i> Ir a Contáctanos
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection
