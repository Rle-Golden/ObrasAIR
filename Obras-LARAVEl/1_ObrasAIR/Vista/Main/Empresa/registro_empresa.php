<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../../Image/logo/logo_texto_trasparente.png">
    <title>Empresa</title>
    <link rel="stylesheet" href="../../Css/nav_footer.css">
    <link rel="stylesheet" href="../../Css/forms.css">
</head>
<body>

<!--Barra de menu-->
    <nav>
        <div class="logo">
            <img src="../../Image/logo/logo_texto.png" alt="">
            <div class="text">ObrasAIR</div>
        </div>
    </nav>

    <section class="info">
            <div class="titulo">
                <h2>DATOS DE TU EMPRESA</h2>
            </div>

            <div class="form">
                <form action="index.php" method="post">
                    <label for="">Nombre de la empresa</label> <br>
                    <input required type="text"> <br>

                    <label for="">Sector al que pertenece la empresa</label> <br>
                    <input required type="text"> <br>

                    <label for="">Descripcion de la empresa</label> <br>
                    <input required type="text"> <br>

                    <label for="">Direccion de la empresa</label> <br>
                    <input required type="text">

                    <button class="seccion-btn">Siguiente</button>
                </form>
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

</body>
</html>
