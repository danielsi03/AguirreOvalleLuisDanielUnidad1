@extends('layouts.app')

@section('title', 'Contáctanos')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center g-4">

        {{-- Formulario de contacto --}}
        <div class="col-lg-7">
            <h2 class="fw-bold mb-1" style="color:#1a3c5e;">Contáctanos</h2>
            <p class="text-muted mb-4">Envíanos un mensaje y te responderemos a la brevedad.</p>

            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('contacto.enviar') }}" novalidate id="contactoForm">
                        @csrf

                        {{-- Honeypot: los bots rellenan este campo; los humanos lo ignoran --}}
                        <input type="text" name="website" class="d-none" tabindex="-1" autocomplete="off" value="">

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Nombre <span class="text-danger">*</span></label>
                                <input type="text" name="nombre"
                                    class="form-control @error('nombre') is-invalid @enderror"
                                    value="{{ old('nombre') }}"
                                    placeholder="Tu nombre">
                                @error('nombre')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Correo electrónico <span class="text-danger">*</span></label>
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}"
                                    placeholder="correo@ejemplo.com">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">Asunto <span class="text-danger">*</span></label>
                                <input type="text" name="asunto"
                                    class="form-control @error('asunto') is-invalid @enderror"
                                    value="{{ old('asunto') }}"
                                    placeholder="Asunto del mensaje">
                                @error('asunto')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">Mensaje <span class="text-danger">*</span></label>
                                <textarea name="mensaje"
                                    class="form-control @error('mensaje') is-invalid @enderror"
                                    rows="5"
                                    placeholder="Escribe tu mensaje aquí (mínimo 10 caracteres)...">{{ old('mensaje') }}</textarea>
                                @error('mensaje')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="text-end mt-1">
                                    <small id="msgCount" class="text-muted">0 / 2000</small>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary" id="contactoSubmit">
                                    <i class="bi bi-send me-1"></i> Enviar mensaje
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Información de contacto --}}
        <div class="col-lg-3">
            <h5 class="fw-bold mb-3 mt-lg-5 pt-lg-2" style="color:#1a3c5e;">Información</h5>
            <ul class="list-unstyled">
                <li class="d-flex align-items-start gap-3 mb-3">
                    <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0"
                         style="width:40px;height:40px;background:#e8f0fe;">
                        <i class="bi bi-geo-alt" style="color:#2d7dd2;"></i>
                    </div>
                    <div>
                        <div class="fw-semibold small" style="color:#1a3c5e;">Dirección</div>
                        <div class="text-muted small">Av.V. Carranza 123, Saltillo, Coah.</div>
                    </div>
                </li>
                <li class="d-flex align-items-start gap-3 mb-3">
                    <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0"
                         style="width:40px;height:40px;background:#e8f0fe;">
                        <i class="bi bi-telephone" style="color:#2d7dd2;"></i>
                    </div>
                    <div>
                        <div class="fw-semibold small" style="color:#1a3c5e;">Teléfono</div>
                        <div class="text-muted small">+52 (123) 456-7890</div>
                    </div>
                </li>
                <li class="d-flex align-items-start gap-3">
                    <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0"
                         style="width:40px;height:40px;background:#e8f0fe;">
                        <i class="bi bi-clock" style="color:#2d7dd2;"></i>
                    </div>
                    <div>
                        <div class="fw-semibold small" style="color:#1a3c5e;">Horario</div>
                        <div class="text-muted small">Lun–Vie, 9:00 – 18:00</div>
                    </div>
                </li>
            </ul>
        </div>

    </div>

    {{-- ===== CHAT BOT ===== --}}
    <div class="row justify-content-center mt-5" id="chat">
        <div class="col-lg-8">

            <h4 class="fw-bold mb-3 d-flex align-items-center gap-2" style="color:#1a3c5e;">
                <i class="bi bi-robot"></i> Asistente Virtual
            </h4>

            <div class="card border-0 shadow" style="border-radius:16px; overflow:hidden;">

                {{-- Header del chat --}}
                <div class="d-flex align-items-center gap-3 px-4 py-3" style="background:#1a3c5e;">
                    <div class="rounded-circle d-flex align-items-center justify-content-center"
                         style="width:42px;height:42px;background:#2d7dd2;">
                        <i class="bi bi-robot text-white fs-5"></i>
                    </div>
                    <div>
                        <div class="fw-semibold text-white">PortalBot</div>
                        <div class="d-flex align-items-center gap-1">
                            <span class="rounded-circle bg-success d-inline-block" style="width:8px;height:8px;"></span>
                            <small class="text-white opacity-75">En línea</small>
                        </div>
                    </div>
                    <button class="btn btn-sm ms-auto" style="color:rgba(255,255,255,.6);" id="clearChat" title="Limpiar chat">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>

                {{-- Área de mensajes --}}
                <div id="chatMessages" class="p-3 d-flex flex-column gap-3"
                     style="height:400px; overflow-y:auto; background:#f0f4f8;">
                    {{-- Los mensajes se renderizan con JS --}}
                </div>

                {{-- Input --}}
                <div class="p-3 border-top bg-white">
                    <div class="input-group">
                        <input
                            type="text"
                            id="chatInput"
                            class="form-control border-0 bg-light"
                            placeholder="Escribe tu pregunta…"
                            maxlength="300"
                            autocomplete="off"
                            style="border-radius:25px 0 0 25px;"
                        >
                        <button class="btn btn-primary px-4" id="sendBtn" style="border-radius:0 25px 25px 0;">
                            <i class="bi bi-send-fill"></i>
                        </button>
                    </div>
                    <div class="mt-2 d-flex flex-wrap gap-1" id="quickReplies">
                        <button class="btn btn-sm btn-outline-secondary rounded-pill quick-reply" data-msg="¿Cómo me registro?">¿Cómo me registro?</button>
                        <button class="btn btn-sm btn-outline-secondary rounded-pill quick-reply" data-msg="Olvidé mi contraseña">Olvidé mi contraseña</button>
                        <button class="btn btn-sm btn-outline-secondary rounded-pill quick-reply" data-msg="¿Qué servicios ofrecen?">¿Qué servicios ofrecen?</button>
                        <button class="btn btn-sm btn-outline-secondary rounded-pill quick-reply" data-msg="Horario de atención">Horario de atención</button>
                    </div>
                </div>

            </div>

        </div>
    </div>

</div>
@endsection

@push('styles')
<style>
    .msg-bot, .msg-user { max-width: 78%; }
    .msg-bot .bubble  { background:#fff; border:1px solid #dee2e6; border-radius:4px 18px 18px 18px; }
    .msg-user .bubble { background:#2d7dd2; color:#fff; border-radius:18px 4px 18px 18px; }
    .typing span {
        display:inline-block; width:8px; height:8px; border-radius:50%;
        background:#adb5bd; margin:0 2px; animation:bounce .9s infinite;
    }
    .typing span:nth-child(2) { animation-delay:.15s; }
    .typing span:nth-child(3) { animation-delay:.3s; }
    @keyframes bounce {
        0%,60%,100% { transform:translateY(0); }
        30%          { transform:translateY(-6px); }
    }
    .quick-reply { font-size:.78rem; }
</style>
@endpush

@push('scripts')
<script>
// ── Validación frontend del formulario de contacto ──────────────────────────
(function () {
    const form = document.getElementById('contactoForm');
    if (!form) return;

    const rules = {
        nombre:  { min: 2,  msg: 'El nombre debe tener al menos 2 caracteres.' },
        email:   { email: true, msg: 'Ingresa un correo electrónico válido.' },
        asunto:  { min: 3,  msg: 'El asunto debe tener al menos 3 caracteres.' },
        mensaje: { min: 10, msg: 'El mensaje debe tener al menos 10 caracteres.' },
    };

    function getFeedback(input) {
        return input.parentElement.querySelector('.invalid-feedback') ||
            (() => {
                const d = document.createElement('div');
                d.className = 'invalid-feedback';
                input.after(d);
                return d;
            })();
    }

    function validate(input) {
        const val  = input.value.trim();
        const rule = rules[input.name];
        if (!rule) return true;

        let error = '';
        if (!val) {
            error = 'Este campo es obligatorio.';
        } else if (rule.min && val.length < rule.min) {
            error = rule.msg;
        } else if (rule.email && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(val)) {
            error = rule.msg;
        }

        const fb = getFeedback(input);
        if (error) {
            input.classList.add('is-invalid');
            input.classList.remove('is-valid');
            fb.textContent = error;
            return false;
        }
        input.classList.remove('is-invalid');
        input.classList.add('is-valid');
        fb.textContent = '';
        return true;
    }

    // Validación en tiempo real al salir del campo
    Object.keys(rules).forEach(name => {
        const el = form.querySelector(`[name="${name}"]`);
        if (el) el.addEventListener('blur', () => validate(el));
    });

    // Contador de caracteres para el mensaje
    const textarea = form.querySelector('[name="mensaje"]');
    const counter  = document.getElementById('msgCount');
    if (textarea && counter) {
        counter.textContent = textarea.value.length + ' / 2000';
        textarea.addEventListener('input', () => {
            const len = textarea.value.length;
            counter.textContent = len + ' / 2000';
            counter.className = len > 1900 ? 'text-warning fw-semibold' : 'text-muted';
        });
    }

    // Bloquear envío si hay errores
    form.addEventListener('submit', function (e) {
        let ok = true;
        Object.keys(rules).forEach(name => {
            const el = form.querySelector(`[name="${name}"]`);
            if (el && !validate(el)) ok = false;
        });
        if (!ok) {
            e.preventDefault();
            form.querySelector('.is-invalid')?.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
    });

    // Scroll al primer error si vino del servidor
    const firstError = form.querySelector('.is-invalid');
    if (firstError) firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
})();
</script>

<script>
(function () {

    // ── Base de conocimiento del bot ────────────────────────────────────────────
    const knowledge = [
        {
            keys: ['hola','buenos','buenas','hi','hello','buen día','qué tal','como estas'],
            res:  '¡Hola! 👋 Soy <strong>PortalBot</strong>, el asistente virtual del portal. ¿En qué puedo ayudarte hoy?'
        },
        {
            keys: ['registro','registrar','crear cuenta','nueva cuenta','sign up','darme de alta'],
            res:  'Para <strong>crear una cuenta</strong> haz clic en <a href="{{ route("register") }}" class="alert-link">Registrarse</a> en el menú superior. Solo necesitas tu nombre, correo y una contraseña de al menos 8 caracteres con letras y números.'
        },
        {
            keys: ['contraseña','password','olvidé','olvide','recuperar','resetear','restablecer'],
            res:  'Si <strong>olvidaste tu contraseña</strong>, ve a <a href="{{ route("password.request") }}" class="alert-link">Recuperar contraseña</a>. Ingresa tu correo, recibirás un código de 6 dígitos válido por 10 minutos.'
        },
        {
            keys: ['login','iniciar sesión','iniciar sesion','ingresar','acceder','entrar','sign in'],
            res:  'Para <strong>iniciar sesión</strong> haz clic en <a href="{{ route("login") }}" class="alert-link">Iniciar sesión</a> en el menú. Ingresa tu correo y contraseña registrados.'
        },
        {
            keys: ['cerrar sesión','cerrar sesion','logout','salir','desconectar'],
            res:  'Para <strong>cerrar sesión</strong>, haz clic en tu nombre en el menú superior y selecciona "Cerrar sesión".'
        },
        {
            keys: ['servicios','servicio','ofrecen','ofrecemos','qué hacen','que hacen'],
            res:  'Ofrecemos servicios de <strong>desarrollo web</strong>, consultoría tecnológica y soporte técnico. Puedes ver todos los detalles en la sección <a href="{{ route("home") }}#servicios" class="alert-link">Servicios</a> de la página principal.'
        },
        {
            keys: ['ayuda','faq','preguntas frecuentes','soporte','duda','dudas'],
            res:  'Tenemos un <strong>Centro de Ayuda</strong> con respuestas a las preguntas más frecuentes. Accede desde <a href="{{ route("ayuda") }}" class="alert-link">Ayuda</a> en el menú.'
        },
        {
            keys: ['mapa','mapa del sitio','secciones','estructura'],
            res:  'Puedes ver la <strong>estructura completa</strong> del portal en <a href="{{ route("mapa-sitio") }}" class="alert-link">Mapa del sitio</a>, disponible en el menú superior.'
        },
        {
            keys: ['buzón','buzon','mensajes','bandeja','inbox'],
            res:  'El <strong>Buzón</strong> es tu bandeja de mensajes internos. Para acceder necesitas tener sesión iniciada. Haz clic en <a href="{{ route("buzon") }}" class="alert-link">Buzón</a> en el menú.'
        },
        {
            keys: ['contacto','correo','email','escribir','comunicar'],
            res:  'Puedes contactarnos llenando el <strong>formulario</strong> en esta misma página o escribiéndonos a <strong>soporte@portalweb.com</strong>.'
        },
        {
            keys: ['horario','horarios','disponible','atienden','cuando','cuándo'],
            res:  '⏰ Atendemos de <strong>Lunes a Viernes de 9:00 a 18:00</strong> horas.'
        },
        {
            keys: ['precio','costo','cobran','cuánto','cuanto','tarifa','pago'],
            res:  'Para información sobre <strong>precios y cotizaciones</strong>, contáctanos a soporte@portalweb.com o usa el formulario de esta página.'
        },
        {
            keys: ['quiénes son','quienes son','nosotros','empresa','quién eres','quien eres','de qué trata','de que trata'],
            res:  'Somos <strong>PortalWeb</strong>, una plataforma de servicios tecnológicos. Conoce más en la sección <a href="{{ route("home") }}#nosotros" class="alert-link">Nosotros</a> de la página principal.'
        },
        {
            keys: ['gracias','thanks','muchas gracias','perfecto','excelente','genial'],
            res:  '¡De nada! 😊 Si tienes más preguntas, aquí estaré.'
        },
        {
            keys: ['adiós','adios','bye','hasta luego','chao','hasta pronto'],
            res:  '¡Hasta luego! 👋 Que tengas un excelente día.'
        },
    ];

    const DEFAULT_RES = 'No estoy seguro de cómo ayudarte con eso. 🤔 Prueba preguntando sobre <strong>registro</strong>, <strong>contraseña</strong>, <strong>servicios</strong> u <strong>horarios</strong>, o usa el formulario de contacto.';
    const BOT_DELAY   = 900;
    const STORAGE_KEY = 'portalbot_history';

    // ── Utilidades DOM ──────────────────────────────────────────────────────────
    const box   = document.getElementById('chatMessages');
    const input = document.getElementById('chatInput');
    const btn   = document.getElementById('sendBtn');

    function scrollBottom() {
        box.scrollTop = box.scrollHeight;
    }

    function timestamp() {
        return new Date().toLocaleTimeString('es-MX', { hour: '2-digit', minute: '2-digit' });
    }

    function addMessage(text, type, time) {
        const ts = time || timestamp();
        const div = document.createElement('div');

        if (type === 'user') {
            div.className = 'msg-user d-flex flex-column align-items-end align-self-end';
            div.innerHTML = `
                <div class="bubble px-3 py-2">${text}</div>
                <small class="text-muted mt-1" style="font-size:.72rem;">${ts}</small>`;
        } else {
            div.className = 'msg-bot d-flex flex-column align-items-start align-self-start';
            div.innerHTML = `
                <div class="d-flex align-items-end gap-2">
                    <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0"
                         style="width:28px;height:28px;background:#1a3c5e;">
                        <i class="bi bi-robot text-white" style="font-size:.7rem;"></i>
                    </div>
                    <div class="bubble px-3 py-2">${text}</div>
                </div>
                <small class="text-muted ms-5 mt-1" style="font-size:.72rem;">${ts}</small>`;
        }

        box.appendChild(div);
        scrollBottom();
        return ts;
    }

    function showTyping() {
        const div = document.createElement('div');
        div.id = 'typingIndicator';
        div.className = 'msg-bot d-flex align-items-end gap-2 align-self-start';
        div.innerHTML = `
            <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0"
                 style="width:28px;height:28px;background:#1a3c5e;">
                <i class="bi bi-robot text-white" style="font-size:.7rem;"></i>
            </div>
            <div class="bubble px-3 py-2 typing"><span></span><span></span><span></span></div>`;
        box.appendChild(div);
        scrollBottom();
    }

    function hideTyping() {
        document.getElementById('typingIndicator')?.remove();
    }

    // ── Motor de respuestas ─────────────────────────────────────────────────────
    function getResponse(text) {
        const lower = text.toLowerCase().normalize('NFD').replace(/[̀-ͯ]/g, '');
        for (const item of knowledge) {
            if (item.keys.some(k => lower.includes(k.normalize('NFD').replace(/[̀-ͯ]/g, '')))) {
                return item.res;
            }
        }
        return DEFAULT_RES;
    }

    // ── Persistencia en localStorage ────────────────────────────────────────────
    function saveHistory() {
        const msgs = [...box.querySelectorAll('.msg-user, .msg-bot')].map(el => ({
            type: el.classList.contains('msg-user') ? 'user' : 'bot',
            text: el.querySelector('.bubble').innerHTML,
            time: el.querySelector('small')?.textContent || '',
        }));
        localStorage.setItem(STORAGE_KEY, JSON.stringify(msgs.slice(-40)));
    }

    function loadHistory() {
        try {
            const saved = JSON.parse(localStorage.getItem(STORAGE_KEY) || '[]');
            if (saved.length) {
                saved.forEach(m => addMessage(m.text, m.type, m.time));
                return true;
            }
        } catch (_) {}
        return false;
    }

    // ── Enviar mensaje ──────────────────────────────────────────────────────────
    function send(text) {
        text = text.trim();
        if (!text) return;

        input.value = '';
        addMessage(text, 'user');
        btn.disabled = true;

        showTyping();
        setTimeout(() => {
            hideTyping();
            addMessage(getResponse(text), 'bot');
            btn.disabled = false;
            saveHistory();
            input.focus();
        }, BOT_DELAY);
    }

    // ── Event listeners ─────────────────────────────────────────────────────────
    btn.addEventListener('click', () => send(input.value));

    input.addEventListener('keydown', e => {
        if (e.key === 'Enter' && !e.shiftKey) { e.preventDefault(); send(input.value); }
    });

    document.querySelectorAll('.quick-reply').forEach(b => {
        b.addEventListener('click', () => send(b.dataset.msg));
    });

    document.getElementById('clearChat').addEventListener('click', () => {
        if (confirm('¿Limpiar el historial del chat?')) {
            localStorage.removeItem(STORAGE_KEY);
            box.innerHTML = '';
            greet();
        }
    });

    // ── Inicio ──────────────────────────────────────────────────────────────────
    function greet() {
        setTimeout(() => {
            addMessage('¡Hola! 👋 Soy <strong>PortalBot</strong>, el asistente virtual de PortalWeb. ¿En qué puedo ayudarte hoy?', 'bot');
            saveHistory();
        }, 400);
    }

    if (!loadHistory()) {
        greet();
    }

    // Scroll suave si se llega desde el botón flotante
    if (window.location.hash === '#chat') {
        document.getElementById('chat')?.scrollIntoView({ behavior: 'smooth' });
    }

})();
</script>
@endpush
