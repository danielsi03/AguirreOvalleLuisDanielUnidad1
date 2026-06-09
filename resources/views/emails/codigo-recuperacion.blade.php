<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; background:#f4f6f9; margin:0; padding:30px; }
        .container { max-width:520px; margin:0 auto; background:#fff; border-radius:10px; overflow:hidden; box-shadow:0 2px 10px rgba(0,0,0,.08); }
        .header { background:#1a3c5e; padding:30px; text-align:center; }
        .header h1 { color:#fff; margin:0; font-size:22px; letter-spacing:.5px; }
        .body { padding:35px 40px; }
        .body p { color:#444; line-height:1.7; margin:0 0 16px; }
        .code-box { background:#f0f4f8; border:2px dashed #2d7dd2; border-radius:10px; text-align:center; padding:22px 10px; margin:24px 0; }
        .code { font-size:40px; font-weight:bold; letter-spacing:12px; color:#1a3c5e; }
        .note { font-size:13px; color:#888; margin-top:8px; }
        .footer { background:#f0f4f8; padding:18px 40px; text-align:center; font-size:12px; color:#aaa; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>PortalWeb — Recuperación de contraseña</h1>
        </div>
        <div class="body">
            <p>Hola,</p>
            <p>Recibimos una solicitud para restablecer la contraseña de tu cuenta. Usa el siguiente código de verificación:</p>
            <div class="code-box">
                <div class="code">{{ $codigo }}</div>
                <div class="note">Este código expira en <strong>10 minutos</strong>.</div>
            </div>
            <p>Si no solicitaste este cambio, puedes ignorar este mensaje. Tu contraseña no será modificada.</p>
        </div>
        <div class="footer">
            PortalWeb &nbsp;|&nbsp; Este es un correo automático, no respondas a este mensaje.
        </div>
    </div>
</body>
</html>
