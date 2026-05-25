<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../../Image/logo/logo_texto_trasparente.png">
    <title>Registrarse - ObrasAIR</title>
    <link rel="stylesheet" href="../Css/nav_footer.css">
    <link rel="stylesheet" href="../Css/Main/registro.css">
</head>
<body>

<!--Barra de menu-->
    <nav>
        <div class="logo">
            <img src="../../Image/logo/logo_texto.png" alt="">
            <div class="text">ObrasAIR</div>
        </div>

        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="inicio_sesion.php">Iniciar Sesion</a></li>
        </ul>
    </nav>

    <section class="form">
        <div class="info">
            <h2>¿Nuevo en ObrasAIR?</h2>
            <p>No hay problema, crea tu usuario e ingresa a todas las funcionalidades que ofrecemos</p>
        </div>

        <div class="registro">
            <form action="/api/register" method="post" id="registerForm">
                <fieldset>
                    <legend>Datos de identificacion</legend> <br>

                    <label for="tipo_documento">Tipo de Documento</label> <br>
                    <select name="tipo_documento" id="tipo_documento" required>
                        <option value="">-- Selecciona una opción --</option>
                        <option value="CC">(CC) Cedula de Ciudadania</option>
                        <option value="CE">(CE) Cedula de Extranjeria</option>
                        <option value="PA">(PA) Pasaporte</option>
                        <option value="PPT">(PPT) Permiso por Proteccion Temporal</option>
                        <option value="PEP">(PEP) Permiso Especial de Permanencia</option>
                    </select> <br>

                    <label for="numero_documento">Número de Documento</label> <br>
                    <input type="number" name="numero_documento" id="numero_documento" placeholder="1234567890" required> <br>
                </fieldset>

                <fieldset>
                    <legend>Nombre completo</legend> <br>

                    <label for="primer_nombre">Primer Nombre</label> <br>
                    <input required type="text" name="primer_nombre" id="primer_nombre" placeholder="Beatriz"> <br>

                    <label for="segundo_nombre">Segundo Nombre</label> <br>
                    <input type="text" name="segundo_nombre" id="segundo_nombre" placeholder="Aurora"> <br>

                    <label for="primer_apellido">Primer Apellido</label> <br>
                    <input required type="text" name="primer_apellido" id="primer_apellido" placeholder="Pinzon"> <br>

                    <label for="segundo_apellido">Segundo Apellido</label> <br>
                    <input type="text" name="segundo_apellido" id="segundo_apellido" placeholder="Solano"> <br>
                </fieldset>

                <fieldset>
                    <legend>Informacion de contacto</legend> <br>

                    <label for="celular">Numero Celular</label> <br>
                    <input required type="number" name="celular" id="celular" placeholder="311 446 2120"> <br>

                    <label for="email">Correo Electronico</label> <br>
                    <input required type="email" name="email" id="email" placeholder="usuario@obrasair.com"> <br>
                </fieldset>

                <fieldset>
                    <legend>Seguridad</legend> <br>

                    <label for="password">Contraseña</label> <br>
                    <input required type="password" name="password" id="password" placeholder="ObrasAIR123"> <br>
                
                    <label for="confirmar_password">Confirmar Contraseña</label> <br>
                    <input required type="password" name="confirmar_password" id="confirmar_password" placeholder="ObrasAIR123"> <br>
                </fieldset>
            
                <button type="submit">Registrarme</button>
            </form>
            <div id="message" style="margin-top: 20px; padding: 10px; border-radius: 5px; display: none;"></div>
        </div>
    </section>

<!--Pie De Pagina-->
    <footer>
        <div class="footer-content">
            <div class="redes-sociales">
                <a href="mailto:obrasair@gmail.com" class="red-social" title="Gmail" target="_blank">
                    <img src="../../image/redes_sociales/email.png" alt="Gmail">
                </a>
                <a href="https://www.facebook.com/obrasair" class="red-social" title="Facebook" target="_blank">
                    <img src="../../image/redes_sociales/facebook.png" alt="Facebook">
                </a>
                <a href="https://www.instagram.com/obrasair" class="red-social" title="Instagram" target="_blank">
                    <img src="../../image/redes_sociales/instagram.png" alt="Instagram">
                </a>
                <a href="https://x.com/obrasair" class="red-social" title="X (Twitter)" target="_blank">
                    <img src="../../image/redes_sociales/x.png" alt="X">
                </a>
            </div>
            <p class="footer-text">&copy; 2026 ObrasAIR. Todos los derechos reservados.</p>
        </div>
    </footer>

<script>
document.getElementById('registerForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const data = Object.fromEntries(formData);
    
    // Validar que las contraseñas coincidan
    if (data.password !== data.confirmar_password) {
        showMessage('Las contraseñas no coinciden', 'error');
        return;
    }
    
    try {
        const response = await fetch('/api/register', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
            },
            body: JSON.stringify(data)
        });
        
        const result = await response.json();
        
        if (response.ok) {
            showMessage('¡Registro exitoso! Redirigiendo...', 'success');
            localStorage.setItem('obrasair_new_user', result.numero_documento);
            setTimeout(() => {
                window.location.href = '/roles.php';
            }, 2000);
        } else {
            if (result.errors) {
                const errorMessages = Object.values(result.errors).flat().join(', ');
                showMessage('Error: ' + errorMessages, 'error');
            } else {
                showMessage(result.message || 'Error en el registro', 'error');
            }
        }
    } catch (error) {
        showMessage('Error al registrarse: ' + error.message, 'error');
    }
});

function showMessage(msg, type) {
    const messageDiv = document.getElementById('message');
    messageDiv.textContent = msg;
    messageDiv.className = type;
    messageDiv.style.display = 'block';
    messageDiv.style.backgroundColor = type === 'success' ? '#d4edda' : '#f8d7da';
    messageDiv.style.color = type === 'success' ? '#155724' : '#721c24';
}
</script>

</body>
</html>
