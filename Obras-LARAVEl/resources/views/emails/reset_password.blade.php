<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Restablecer contraseña</title>
</head>
<body>
    <p>Has solicitado restablecer tu contraseña para ObrasAIR.</p>
    <p>Haz clic en el siguiente enlace para establecer una nueva contraseña (válido 60 minutos):</p>
    <p>
        <a href="{{ url('/reset_password.php') }}?token={{ $token }}&email={{ urlencode($email) }}">Restablecer mi contraseña</a>
    </p>
    <p>Si no solicitaste esto, ignora este correo.</p>
</body>
</html>
