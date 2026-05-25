<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../Image/logo/logo_texto_trasparente.png">
    <title>ObrasAIR · Ofertas Laborales</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    <link rel="stylesheet" href="../../Css/Main/Aspirante.css">
</head>
<body>

    <nav class="navegacion">
        <div class="logotipo">
            <img src="../Image/logo/logo_texto.png" alt="ObrasAIR">
            <div class="texto">ObrasAIR</div>
            <span class="insignia-aspirante">Aspirante</span>
        </div>

        <ul class="lista-navegacion">
            <li><a href="aspirante_dashboard.html" class="activo"><i class="ti ti-briefcase"></i>Ofertas Laborales</a></li>
            <li><a href="aspirante_postulaciones.html"><i class="ti ti-send"></i>Mis Postulaciones</a></li>
            <li><a href="aspirante_perfil.html"><i class="ti ti-user-circle"></i>Mi Perfil / Hoja de Vida</a></li>
            <li class="separador"></li>
            <li><a href="index.html" class="boton-cerrar-sesion"><i class="ti ti-logout"></i>Cerrar Sesión</a></li>
        </ul>
    </nav>

    <main class="principal">
        
        <div class="barra-filtros">
            <div class="grupo-busqueda">
                <i class="ti ti-search icono-buscar"></i>
                <input type="text" class="control-formulario entrada-busqueda" placeholder="Buscar cargo, palabra clave o empresa...">
            </div>
            <div class="grupo-selectores">
                <select class="control-formulario selector-filtro">
                    <option value="">Todas las ubicaciones</option>
                    <option value="bogota">Bogotá</option>
                    <option value="medellin">Medellín</option>
                    <option value="cali">Cali</option>
                </select>
                <select class="control-formulario selector-filtro">
                    <option value="">Cualquier tipo de contrato</option>
                    <option value="completo">Tiempo completo</option>
                    <option value="parcial">Medio tiempo</option>
                    <option value="proyecto">Por proyecto</option>
                </select>
                <button class="boton-buscar">Buscar</button>
            </div>
        </div>

        <div class="cabecera-seccion">
            <h2 class="titulo-seccion">Ofertas de empleo disponibles</h2>
            <p class="subtitulo-seccion">Encuentra tu próximo trabajo en construcción e infraestructura</p>
        </div>

        <div class="cuadricula-ofertas">

            <div class="tarjeta-oferta">
                <div class="tarjeta-cabecera">
                    <div>
                        <h3 class="tarjeta-titulo">Maestro de Obra</h3>
                        <p class="tarjeta-empresa">Arquiacero S.A.S.</p>
                    </div>
                    <div class="tarjeta-bloque-derecho">
                        <div class="empresa-logotipo">AQ</div>
                        <span class="etiqueta destacada">Destacada</span>
                    </div>
                </div>
                <p class="tarjeta-descripcion">Buscamos Maestro de Obra con más de 5 años de experiencia liderando proyectos de edificaciones residenciales de gran altura. Debe tener conocimientos sólidos en lectura de planos estructurales, control de personal, gestión de materiales y cumplimiento de normas de seguridad industrial.</p>
                <div class="tarjeta-etiquetas">
                    <span class="etiqueta-requisito">Estructuras</span>
                    <span class="etiqueta-requisito">Liderazgo</span>
                    <span class="etiqueta-requisito">Planos</span>
                    <span class="etiqueta-requisito">5 años exp.</span>
                </div>
                <div class="tarjeta-pie">
                    <div class="tarjeta-metadatos">
                        <div class="metadato-item"><i class="ti ti-map-pin"></i>Bogotá</div>
                        <div class="metadato-item"><i class="ti ti-clock"></i>Tiempo Completo</div>
                    </div>
                    <button class="boton-postularse">Postularme</button>
                </div>
            </div>

            <div class="tarjeta-oferta">
                <div class="tarjeta-cabecera">
                    <div>
                        <h3 class="tarjeta-titulo">Electricista Industrial</h3>
                        <p class="tarjeta-empresa">HYC Proyectos</p>
                    </div>
                    <div class="tarjeta-bloque-derecho">
                        <div class="empresa-logotipo">HY</div>
                    </div>
                </div>
                <p class="tarjeta-descripcion">Se requiere técnico o tecnólogo en electricidad industrial con certificación Conte o Conaltel vigente. Experiencia en montaje de subestaciones, cableado estructurado, tableros de control y mantenimiento preventivo/correctivo en plantas de producción o proyectos civiles.</p>
                <div class="tarjeta-etiquetas">
                    <span class="etiqueta-requisito">Certificación Conte</span>
                    <span class="etiqueta-requisito">Tableros</span>
                    <span class="etiqueta-requisito">Montajes</span>
                </div>
                <div class="tarjeta-pie">
                    <div class="tarjeta-metadatos">
                        <div class="metadato-item"><i class="ti ti-map-pin"></i>Medellín</div>
                        <div class="metadato-item"><i class="ti ti-clock"></i>Tiempo Completo</div>
                    </div>
                    <button class="boton-postularse">Postularme</button>
                </div>
            </div>

            <div class="tarjeta-oferta">
                <div class="tarjeta-cabecera">
                    <div>
                        <h3 class="tarjeta-titulo">Plomero Certificado</h3>
                        <p class="tarjeta-empresa">Constructora Capital</p>
                    </div>
                    <div class="tarjeta-bloque-derecho">
                        <div class="empresa-logotipo">CC</div>
                        <span class="etiqueta urgente">Urgente</span>
                    </div>
                </div>
                <p class="tarjeta-descripcion">Constructora líder busca plomeros o fontaneros para instalación de redes hidráulicas, sanitarias y de gas en proyectos de vivienda nueva. Experiencia en termofusión, instalación de aparatos sanitarios y reparación de fugas bajo estándares de calidad.</p>
                <div class="tarjeta-etiquetas">
                    <span class="etiqueta-requisito">Redes Hidráulicas</span>
                    <span class="etiqueta-requisito">Termofusión</span>
                    <span class="etiqueta-requisito">Vivienda</span>
                </div>
                <div class="tarjeta-pie">
                    <div class="tarjeta-metadatos">
                        <div class="metadato-item"><i class="ti ti-map-pin"></i>Bogotá</div>
                        <div class="metadato-item"><i class="ti ti-clock"></i>Por Proyecto</div>
                    </div>
                    <button class="boton-postularse">Postularme</button>
                </div>
            </div>

            <div class="tarjeta-oferta">
                <div class="tarjeta-cabecera">
                    <div>
                        <h3 class="tarjeta-titulo">Soldador Estructural (MIG/TIG)</h3>
                        <p class="tarjeta-empresa">Arquiacero S.A.S.</p>
                    </div>
                    <div class="tarjeta-bloque-derecho">
                        <div class="empresa-logotipo">AQ</div>
                        <span class="etiqueta destacada">Destacada</span>
                    </div>
                </div>
                <p class="tarjeta-descripcion">Convocatoria para soldadores calificados con experiencia comprobada en procesos de soldadura MIG (GMAW) y TIG (GTAW) sobre estructuras de acero pesado. Requerido poseer certificación 3G/4G vigente y habilidad en uso de herramientas de corte.</p>
                <div class="tarjeta-etiquetas">
                    <span class="etiqueta-requisito">MIG / TIG</span>
                    <span class="etiqueta-requisito">Certificación 3G/4G</span>
                    <span class="etiqueta-requisito">4 años exp.</span>
                </div>
                <div class="tarjeta-pie">
                    <div class="tarjeta-metadatos">
                        <div class="metadato-item"><i class="ti ti-map-pin"></i>Bogotá</div>
                        <div class="metadato-item"><i class="ti ti-clock"></i>Tiempo Completo</div>
                    </div>
                    <button class="boton-postularse">Postularme</button>
                </div>
            </div>

        </div>
    </main>

    <footer class="pie-pagina">
        <div class="contenido-pie">
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
            <p class="texto-pie">&copy; 2026 ObrasAIR. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script>
    document.querySelectorAll('.boton-cerrar-sesion').forEach(button => {
        button.addEventListener('click', async function (e) {
            e.preventDefault();
            try {
                const res = await fetch('/api/logout', { method: 'POST' });
                const data = await res.json();
                window.location.href = data.redirect || '/';
            } catch (err) {
                window.location.href = '/';
            }
        });
    });
    </script>

</body>
</html>