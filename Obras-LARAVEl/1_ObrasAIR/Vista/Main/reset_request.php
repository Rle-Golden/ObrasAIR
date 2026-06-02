<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar contraseña</title>
    <link rel="stylesheet" href="../Css/Main/isesion_style.css">
</head>
<body>
    <section class="form">
        <div class="descrip">
            <div class="titulo">
                <h2>Recuperar contraseña</h2>
                <p>Ingresa el correo asociado a tu cuenta y recibirás un enlace para restablecerla.</p>
            </div>
            <div class="login">
                <form id="forgotForm">
                    <label for="email">Correo Electronico</label> <br>
                    <input required name="email" type="email" id="email" placeholder="tucorreo@obrasair.com"> <br> <br>
                    <button type="submit" class="btn-inicio">Enviar correo</button>
                </form>
                <div id="message" style="margin-top:20px; display:none;"></div>
            </div>
        </div>
    </section>

<script>
document.getElementById('forgotForm').addEventListener('submit', async function(e){
    e.preventDefault();
    const email = document.getElementById('email').value.trim();
    const msg = document.getElementById('message');
    msg.style.display = 'none';
    try {
        const res = await fetch('/api/password/forgot', {
            method: 'POST',
            headers: {'Content-Type':'application/json'},
            body: JSON.stringify({ email })
        });

        // Leer como texto y luego intentar parsear JSON para evitar "body stream already read"
        const text = await res.text();
        let payload;
        try {
            payload = JSON.parse(text);
        } catch (e) {
            payload = { message: text };
        }

        // Mostrar mensaje detallado para depuración
        msg.textContent = payload.message || payload.error || res.statusText || 'Respuesta recibida.';
        msg.style.display = 'block';
        if (!res.ok) msg.style.backgroundColor = '#f8d7da';
    } catch (err){
        msg.textContent = 'Error al enviar el correo: ' + (err.message || err);
        msg.style.display = 'block';
        msg.style.backgroundColor = '#f8d7da';
    }
});
</script>
</body>
</html>
