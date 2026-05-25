<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer contraseña</title>
    <link rel="stylesheet" href="../Css/Main/isesion_style.css">
</head>
<body>
    <section class="form">
        <div class="descrip">
            <div class="titulo">
                <h2>Nueva contraseña</h2>
                <p>Introduce tu nueva contraseña.</p>
            </div>
            <div class="login">
                <form id="resetForm">
                    <input type="hidden" id="email" name="email">
                    <input type="hidden" id="token" name="token">

                    <label for="password">Contraseña</label> <br>
                    <input required name="password" type="password" id="password" placeholder="Nueva contraseña"> <br>

                    <label for="password_confirmation">Confirmar Contraseña</label> <br>
                    <input required name="password_confirmation" type="password" id="password_confirmation" placeholder="Repite la contraseña"> <br>

                    <button type="submit" class="btn-inicio">Restablecer contraseña</button>
                </form>
                <div id="message" style="margin-top:20px; display:none;"></div>
            </div>
        </div>
    </section>

<script>
// fill email and token from query params
const params = new URLSearchParams(window.location.search);
const token = params.get('token');
const email = params.get('email');
if (token) document.getElementById('token').value = token;
if (email) document.getElementById('email').value = email;

document.getElementById('resetForm').addEventListener('submit', async function(e){
    e.preventDefault();
    const msg = document.getElementById('message');
    msg.style.display = 'none';
    const payload = {
        email: document.getElementById('email').value,
        token: document.getElementById('token').value,
        password: document.getElementById('password').value,
        password_confirmation: document.getElementById('password_confirmation').value
    };
    try {
        const res = await fetch('/api/password/reset', {
            method: 'POST',
            headers: {'Content-Type':'application/json'},
            body: JSON.stringify(payload)
        });
        const text = await res.text();
        let data;
        try {
            data = JSON.parse(text);
        } catch (e) {
            data = { message: text };
        }
        msg.textContent = data.message || 'Operación completada.';
        msg.style.display = 'block';
        if (res.ok) setTimeout(()=> window.location.href = '/inicio_sesion.php', 1200);
    } catch (err) {
        // Mostrar error detallado para depuración
        msg.textContent = 'Error al restablecer la contraseña: ' + (err.message || err);
        msg.style.display = 'block';
        msg.style.backgroundColor = '#f8d7da';
    }
});
</script>
</body>
</html>
