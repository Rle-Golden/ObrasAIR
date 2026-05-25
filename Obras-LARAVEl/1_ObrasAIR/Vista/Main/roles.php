<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../Image/logo/logo_texto_trasparente.png">
    <title>Aspirante - Empresa</title>
    <link rel="stylesheet" href="../Css/nav_footer.css">
    <link rel="stylesheet" href="../Css/Main/roles.css">
</head>
<body>

<!--Barra de menu-->
    <nav>
        <div class="logo">
            <img src="../Image/logo/logo_texto.png" alt="">
            <div class="text">ObrasAIR</div>
        </div>

        <ul>
            <li><a href="index.php">Inicio</a></li>
        </ul>
    </nav>

    <section class="rol">
        <h2>DINOS QUE ROL ERES</h2>
        <p>Para continuar con nuestra web debes seleccionar el rol al cual perteneces</p>
        <div class="roles">
            <button type="button" class="seccion-btn" data-role="Aspirante">Soy Aspirante</button>
            <button type="button" class="seccion-btn" data-role="Representante de empresa">Soy Representante De Una Empresa</button>
        </div>
        <div id="message" class="role-message"></div>
    </section>

<!--Pie De Pagina-->
    <footer>
        <div class="footer-content">
            <div class="redes-sociales">
                <a href="mailto:obrasair@gmail.com" class="red-social" title="Gmail" target="_blank">
                    <img src="../image/redes_sociales/email.png" alt="Gmail">
                </a>
                <a href="https://www.facebook.com/obrasair" class="red-social" title="Facebook" target="_blank">
                    <img src="../image/redes_sociales/facebook.png" alt="Facebook">
                </a>
                <a href="https://www.instagram.com/obrasair" class="red-social" title="Instagram" target="_blank">
                    <img src="../image/redes_sociales/instagram.png" alt="Instagram">
                </a>
                <a href="https://x.com/obrasair" class="red-social" title="X (Twitter)" target="_blank">
                    <img src="../image/redes_sociales/x.png" alt="X">
                </a>
            </div>
            <p class="footer-text">&copy; 2026 ObrasAIR. Todos los derechos reservados.</p>
        </div>
    </footer>

<script>
const userKey = 'obrasair_new_user';
const userNumber = localStorage.getItem(userKey);
const messageDiv = document.getElementById('message');

if (!userNumber) {
    messageDiv.textContent = 'No se encontró el usuario registrado. Por favor vuelve a registrarte.';
    messageDiv.style.color = '#b91c1c';
    messageDiv.style.backgroundColor = '#fee2e2';
    messageDiv.style.padding = '14px';
    messageDiv.style.borderRadius = '8px';
    messageDiv.style.marginTop = '18px';
}

function showMessage(text, isError = false) {
    messageDiv.textContent = text;
    messageDiv.style.color = isError ? '#b91c1c' : '#155724';
    messageDiv.style.backgroundColor = isError ? '#f8d7da' : '#d4edda';
    messageDiv.style.padding = '14px';
    messageDiv.style.borderRadius = '8px';
    messageDiv.style.marginTop = '18px';
}

Array.from(document.querySelectorAll('[data-role]')).forEach(button => {
    button.addEventListener('click', async () => {
        const role = button.dataset.role;

        if (!userNumber) {
            showMessage('No se encontró el usuario registrado. Regístrate de nuevo.', true);
            return;
        }

        try {
            const response = await fetch('/api/assign-role', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    numero_documento: userNumber,
                    role: role
                })
            });

            const result = await response.json();

            if (response.ok && result.success) {
                localStorage.removeItem(userKey);
                showMessage('Rol guardado. Redirigiendo al inicio de sesión...');
                setTimeout(() => {
                    window.location.href = 'inicio_sesion.php';
                }, 1600);
            } else {
                showMessage(result.message || 'Error al guardar el rol.', true);
            }
        } catch (error) {
            showMessage('Error al guardar el rol: ' + error.message, true);
        }
    });
});
</script>
</body>
</html>
