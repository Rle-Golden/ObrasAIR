<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../Image/logo/logo_texto_trasparente.png">
    <title>Inicio de Sesion</title>
    <link rel="stylesheet" href="../Css/nav_footer.css">
    <link rel="stylesheet" href="../Css/Main/isesion_style.css">
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
            <li><a href="registro.php">Registrarse</a></li>
        </ul>
    </nav>

    <section class="form">
        <div class="descrip">
            <div class="titulo">
                <h2>BIENVENIDO A OBRASAIR</h2>
                <P>Inicia sesion con tu cuenta para acceder a todas las funciones</P>
            </div>
            <div class="login">
                <form id="loginForm" method="post">

                    <label for="email">Correo Electronico</label> <br>
                    <input required name="email" type="email" id="email" placeholder="tucorreo@obrasair.com"> <br>

                    <label for="password">Contraseña</label> <br>
                    <input required name="password" type="password" id="password" placeholder="obrasair123"> <br>

                    <div class="opciones">
                        <label for="remember_me">
                            <input type="checkbox" id="remember_me" name="remember_me">
                            <span>Recordarme</span>
                        </label> <br>
                        
                        <a href="reset_request.php">¿Olvidaste la contraseña?</a>
                    </div>

                    <button type="submit" class="btn-inicio">Iniciar Sesion</button>

                    <div class="registro">
                        <p>¿No tienes cuenta? <a href="registro.php">Registrate aqui</a></p>
                    </div>
                </form>
                <div id="loginMessage" style="margin-top: 20px; padding: 10px; border-radius: 5px; display: none;"></div>
            </div>
        </div>
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
document.getElementById("loginForm").addEventListener("submit", async function (event) {
    event.preventDefault();
    const email = document.getElementById("email").value.trim();
    const password = document.getElementById("password").value;
    const messageEl = document.getElementById("loginMessage");

    messageEl.style.display = "none";

    try {
        const response = await fetch('/api/login', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            body: JSON.stringify({ email, password }),
        });

        const result = await response.json();

        messageEl.textContent = result.message || 'Error en el inicio de sesión.';
        messageEl.style.display = 'block';
        messageEl.style.backgroundColor = response.ok ? '#d4edda' : '#f8d7da';
        messageEl.style.color = response.ok ? '#155724' : '#721c24';

        if (response.ok && result.redirect) {
            setTimeout(() => {
                window.location.href = result.redirect;
            }, 900);
        }
    } catch (error) {
        messageEl.textContent = 'Error al iniciar sesi�n: ' + error.message;
        messageEl.style.display = 'block';
        messageEl.style.backgroundColor = '#f8d7da';
        messageEl.style.color = '#721c24';
    }
});
</script></body>
</html>






