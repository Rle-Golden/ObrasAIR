<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../Image/logo/logo_texto_trasparente.png">
    <title>ObrasAIR · Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    <link rel="stylesheet" href="../../Css/Main/admin.css">
</head>
<body>

    <nav class="navegacion">
        <div class="logotipo">
            <img src="../Image/logo/logo_texto.png" alt="ObrasAIR">
            <div class="texto">ObrasAIR</div>
            <span class="insignia-administrador">Admin</span>
        </div>

        <ul class="lista-navegacion">
            <li><a href="admin_ofertas.html" class="activo"><i class="ti ti-briefcase"></i>Ofertas Laborales</a></li>
            <li><a href="admin_postulaciones.html"><i class="ti ti-send"></i>Postulaciones</a></li>
            <li><a href="admin_empresas.html"><i class="ti ti-building"></i>Empresas</a></li>
            <li><a href="admin_usuarios.html"><i class="ti ti-users"></i>Usuarios</a></li>
            <li><a href="admin_perfil.html"><i class="ti ti-user-circle"></i>Mi Perfil</a></li>
            <li class="separador"></li>
            <li><a href="index.html" class="boton-cerrar-sesion"><i class="ti ti-logout"></i>Cerrar Sesión</a></li>
        </ul>
    </nav>

    <main class="principal">
        <div class="barra-superior">
            <div class="bloque-saludo">
                <p class="etiqueta-saludo">Panel de administración</p>
                <h1 class="titulo-saludo">Vista General del Sistema</h1>
            </div>
            <span class="pildora-fecha" id="fecha-hoy"></span>
        </div>

        <div class="cuadricula-kpis">
            <div class="kpi">
                <div class="kpi-acento"></div>
                <div class="kpi-icono azul"><i class="ti ti-users"></i></div>
                <div class="kpi-numero">1,248</div>
                <div class="kpi-etiqueta">Usuarios registrados</div>
                <span class="kpi-variacion sube">+12% mes</span>
            </div>
            <div class="kpi">
                <div class="kpi-acento verde"></div>
                <div class="kpi-icono verde"><i class="ti ti-building"></i></div>
                <div class="kpi-numero">87</div>
                <div class="kpi-etiqueta">Empresas activas</div>
                <span class="kpi-variacion sube">+4 esta semana</span>
            </div>
            <div class="kpi">
                <div class="kpi-acento ambar"></div>
                <div class="kpi-icono ambar"><i class="ti ti-briefcase"></i></div>
                <div class="kpi-numero">342</div>
                <div class="kpi-etiqueta">Ofertas publicadas</div>
                <span class="kpi-variacion baja">-3 vs. ayer</span>
            </div>
            <div class="kpi">
                <div class="kpi-acento azul-oscuro"></div>
                <div class="kpi-icono azul-oscuro"><i class="ti ti-send"></i></div>
                <div class="kpi-numero">5,901</div>
                <div class="kpi-etiqueta">Postulaciones totales</div>
                <span class="kpi-variacion sube">+8% mes</span>
            </div>
        </div>

        <div class="cuadricula-intermedia">
            <div class="panel">
                <div class="panel-cabecera">
                    <div>
                        <div class="panel-titulo">Ofertas con más postulaciones</div>
                        <div class="panel-subtitulo">Top 5 · últimos 30 días</div>
                    </div>
                    <a class="ver-todo" href="admin_ofertas.html">Ver todas →</a>
                </div>
                <div class="fila-oferta">
                    <div class="oferta-avatar">🏗️</div>
                    <div class="oferta-detalles">
                        <div class="oferta-nombre">Maestro de Obra</div>
                        <div class="oferta-empresa">Arquiacero · Bogotá</div>
                    </div>
                    <span class="etiqueta activa">Activa</span>
                    <div class="oferta-metricas">
                        <div class="oferta-numero">148</div>
                        <div class="oferta-numero-etiqueta">postulantes</div>
                    </div>
                </div>
                <div class="fila-oferta">
                    <div class="oferta-avatar">⚡</div>
                    <div class="oferta-detalles">
                        <div class="oferta-nombre">Electricista Industrial</div>
                        <div class="oferta-empresa">HYC Proyectos · Medellín</div>
                    </div>
                    <span class="etiqueta activa">Activa</span>
                    <div class="oferta-metricas">
                        <div class="oferta-numero">117</div>
                        <div class="oferta-numero-etiqueta">postulantes</div>
                    </div>
                </div>
                <div class="fila-oferta">
                    <div class="oferta-avatar">🔧</div>
                    <div class="oferta-detalles">
                        <div class="oferta-nombre">Plomero Certificado</div>
                        <div class="oferta-empresa">Constructora Capital · Cali</div>
                    </div>
                    <span class="etiqueta activa">Activa</span>
                    <div class="oferta-metricas">
                        <div class="oferta-numero">93</div>
                        <div class="oferta-numero-etiqueta">postulantes</div>
                    </div>
                </div>
                <div class="fila-oferta">
                    <div class="oferta-avatar">🪟</div>
                    <div class="oferta-detalles">
                        <div class="oferta-nombre">Instalador de Ventanas</div>
                        <div class="oferta-empresa">Ciencuadras · Bogotá</div>
                    </div>
                    <span class="etiqueta pendiente">En revisión</span>
                    <div class="oferta-metricas">
                        <div class="oferta-numero">72</div>
                        <div class="oferta-numero-etiqueta">postulantes</div>
                    </div>
                </div>
                <div class="fila-oferta">
                    <div class="oferta-avatar">🏠</div>
                    <div class="oferta-detalles">
                        <div class="oferta-nombre">Obrero Especializado</div>
                        <div class="oferta-empresa">Colcimes · Barranquilla</div>
                    </div>
                    <span class="etiqueta activa">Activa</span>
                    <div class="oferta-metricas">
                        <div class="oferta-numero">61</div>
                        <div class="oferta-numero-etiqueta">postulantes</div>
                    </div>
                </div>
            </div>

            <div class="panel">
                <div class="panel-cabecera">
                    <div>
                        <div class="panel-titulo">Actividad reciente</div>
                        <div class="panel-subtitulo">Últimas acciones en el sistema</div>
                    </div>
                </div>
                <div class="lista-actividad">
                    <div class="actividad-item">
                        <span class="actividad-punto verde"></span>
                        <div>
                            <div class="actividad-texto">Nueva empresa <strong>MetroObras</strong> verificada</div>
                            <div class="actividad-tiempo">Hace 8 minutos</div>
                        </div>
                    </div>
                    <div class="actividad-item">
                        <span class="actividad-punto azul"></span>
                        <div>
                            <div class="actividad-texto">Oferta <strong>Pintor de Interiores</strong> publicada por Ciencuadras</div>
                            <div class="actividad-tiempo">Hace 23 minutos</div>
                        </div>
                    </div>
                    <div class="actividad-item">
                        <span class="actividad-punto ambar"></span>
                        <div>
                            <div class="actividad-texto">Usuario <strong>Carlos M.</strong> completó su hoja de vida</div>
                            <div class="actividad-tiempo">Hace 41 minutos</div>
                        </div>
                    </div>
                    <div class="actividad-item">
                        <span class="actividad-punto rojo"></span>
                        <div>
                            <div class="actividad-texto">Oferta <strong>Soldador TIG</strong> marcada para revisión</div>
                            <div class="actividad-tiempo">Hace 1 hora</div>
                        </div>
                    </div>
                    <div class="actividad-item">
                        <span class="actividad-punto verde"></span>
                        <div>
                            <div class="actividad-texto">34 nuevas postulaciones registradas hoy</div>
                            <div class="actividad-tiempo">Hace 2 horas</div>
                        </div>
                    </div>
                    <div class="actividad-item">
                        <span class="actividad-punto azul"></span>
                        <div>
                            <div class="actividad-texto">Empresa <strong>Arquiacero</strong> actualizó su perfil</div>
                            <div class="actividad-tiempo">Hace 3 horas</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="cuadricula-inferior">
            <div class="panel">
                <div class="panel-cabecera">
                    <div>
                        <div class="panel-titulo">Usuarios recientes</div>
                        <div class="panel-subtitulo">Últimos registros</div>
                    </div>
                    <a class="ver-todo" href="admin_usuarios.html">Ver todos →</a>
                </div>
                <div class="fila-usuario">
                    <div class="usuario-iniciales azul">BM</div>
                    <div class="usuario-detalles">
                        <div class="usuario-nombre">Beatriz Mendoza</div>
                        <div class="usuario-rol">Aspirante · Electricidad</div>
                    </div>
                    <span class="etiqueta nuevo">Nuevo</span>
                    <span class="usuario-fecha">Hoy, 09:14</span>
                </div>
                <div class="fila-usuario">
                    <div class="usuario-iniciales verde">JP</div>
                    <div class="usuario-detalles">
                        <div class="usuario-nombre">Jorge Pacheco</div>
                        <div class="usuario-rol">Aspirante · Plomería</div>
                    </div>
                    <span class="etiqueta nuevo">Nuevo</span>
                    <span class="usuario-fecha">Hoy, 08:51</span>
                </div>
                <div class="fila-usuario">
                    <div class="usuario-iniciales ambar">LD</div>
                    <div class="usuario-detalles">
                        <div class="usuario-nombre">Laura Díaz</div>
                        <div class="usuario-rol">Rep. Empresa · Colcimes</div>
                    </div>
                    <span class="etiqueta activa">Activa</span>
                    <span class="usuario-fecha">Ayer, 16:30</span>
                </div>
                <div class="fila-usuario">
                    <div class="usuario-iniciales azul-oscuro">RC</div>
                    <div class="usuario-detalles">
                        <div class="usuario-nombre">Ricardo Cardona</div>
                        <div class="usuario-rol">Aspirante · Obra civil</div>
                    </div>
                    <span class="etiqueta activa">Activo</span>
                    <span class="usuario-fecha">Ayer, 14:05</span>
                </div>
                <div class="fila-usuario">
                    <div class="usuario-iniciales azul">AM</div>
                    <div class="usuario-detalles">
                        <div class="usuario-nombre">Andrea Morales</div>
                        <div class="usuario-rol">Aspirante · Pintura</div>
                    </div>
                    <span class="etiqueta activa">Activa</span>
                    <span class="usuario-fecha">May 20, 11:20</span>
                </div>
            </div>

            <div class="panel">
                <div class="panel-cabecera">
                    <div>
                        <div class="panel-titulo">Empresas destacadas</div>
                        <div class="panel-subtitulo">Por número de ofertas activas</div>
                    </div>
                    <a class="ver-todo" href="admin_empresas.html">Ver todas →</a>
                </div>
                <div class="fila-empresa">
                    <div class="empresa-logotipo">AQ</div>
                    <div class="empresa-detalles">
                        <div class="empresa-nombre">Arquiacero</div>
                        <div class="empresa-sector">Estructuras metálicas · Bogotá</div>
                    </div>
                    <div class="empresa-derecha">
                        <div class="empresa-ofertas">24</div>
                        <div class="empresa-ofertas-etiqueta">ofertas activas</div>
                    </div>
                </div>
                <div class="fila-empresa">
                    <div class="empresa-logotipo">CC</div>
                    <div class="empresa-detalles">
                        <div class="empresa-nombre">Constructora Capital</div>
                        <div class="empresa-sector">Edificaciones · Bogotá</div>
                    </div>
                    <div class="empresa-derecha">
                        <div class="empresa-ofertas">18</div>
                        <div class="empresa-ofertas-etiqueta">ofertas activas</div>
                    </div>
                </div>
                <div class="fila-empresa">
                    <div class="empresa-logotipo">HY</div>
                    <div class="empresa-detalles">
                        <div class="empresa-nombre">HYC Proyectos</div>
                        <div class="empresa-sector">Proyectos civiles · Medellín</div>
                    </div>
                    <div class="empresa-derecha">
                        <div class="empresa-ofertas">15</div>
                        <div class="empresa-ofertas-etiqueta">ofertas activas</div>
                    </div>
                </div>
                <div class="fila-empresa">
                    <div class="empresa-logotipo">CI</div>
                    <div class="empresa-detalles">
                        <div class="empresa-nombre">Ciencuadras</div>
                        <div class="empresa-sector">Finca raíz · Nacional</div>
                    </div>
                    <div class="empresa-derecha">
                        <div class="empresa-ofertas">11</div>
                        <div class="empresa-ofertas-etiqueta">ofertas activas</div>
                    </div>
                </div>
                <div class="fila-empresa">
                    <div class="empresa-logotipo">CO</div>
                    <div class="empresa-detalles">
                        <div class="empresa-nombre">Colcimes</div>
                        <div class="empresa-sector">Materiales · Barranquilla</div>
                    </div>
                    <div class="empresa-derecha">
                        <div class="empresa-ofertas">8</div>
                        <div class="empresa-ofertas-etiqueta">ofertas activas</div>
                    </div>
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
        const dias = ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'];
        const meses = ['enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre'];
        const hoy = new Date();
        document.getElementById('fecha-hoy').textContent =
            `${dias[hoy.getDay()]}, ${hoy.getDate()} de ${meses[hoy.getMonth()]} de ${hoy.getFullYear()}`;
    </script>

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