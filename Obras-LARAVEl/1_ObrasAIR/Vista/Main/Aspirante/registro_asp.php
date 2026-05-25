<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../../Image/logo/logo_texto_trasparente.png">
    <title>Datos - Aspirante</title>
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
                <h2>Aspirante</h2>
                <P>Indica tus datos</P>
            </div>

            <div class="form">
                <form action="index.php" method="post">
                    <label for="">Numero de documento</label> <br>
                    <input required type="number" placeholder="1095303918"> <br>

                    <label for="">¿Cuanta experiencia tienes?</label> <br>
                    <input required type="number" placeholder="8"> <br>

                    <label for="">Sube tu hoja de vida</label> <br>
                    <input required type="file"> <br>

                    <label for="">Presentate</label> <br>
                    <input required type="text" placeholder="Soy... Actualmente me de dico a... Aspiro al cargo de.."> <br>

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
