<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="recursos/icono.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heracles</title>
    <link rel="stylesheet" href="style.css">
    <!-- Script de efecto para desplegar opciones -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        //////////////////// Desplegar opciones cuando nos posicionamos sobre el menú de barras //////////////////////
        $(document).ready(function () {
            $(".op-barras").click(function () {
                $(".menu-adaptable").slideToggle("slow");
            });
        });
        ////////////////////////////// Ocultar menú cuando hacemos clic en las opciones ////////////////////////////////
        $(document).ready(function () {
            $(".op-menu-oculto").click(function () {
                $(".menu-adaptable").slideToggle("slow");
            });
        });
    </script>
    <!-- Script para efecto scroll al seleccionar una opción del menú -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"
        charset="utf-8"></script>
</head>

<body>
    <nav>
        <a href="index.php"><img src="recursos/heracles_logo.jpg" alt="Logo Heracles" id="logo"></a>
        <div id="final">
            <ul id="opcionesNav">
                <li id="nav1"><a href="#unete">INICIO</a></li>
                <li id="nav2"><a href="#aboutus">NOSOTROS</a></li>
                <li id="nav4"><a href="#questions">FAQ</a></li>
            </ul>
            <?php
            session_start();
         if(session_status()==2 && $_SESSION["logueado"]==true){
            ?><form action="ventana<?php echo $_SESSION["rol"]; ?>.php" method="get">
            <input type="hidden" name="user" value="<?php echo $_SESSION["user"]; ?>">
            <button id='login'>IR A LA VENTANA</button></form><?php
        }else{
            echo "<a href='login.html'><button id='login'>INICIAR SESIÓN</button></a>";
            echo "<a href='registro.html'><button id='registro'>REGISTRARSE</button></a>";
        }
            ?>
        </div>
    </nav>
    <div id="unete">
        <span id="primer">UNETE A NUESTRO </span>
        <span id="segunda">GIMNASIO</span>
    </div>

    <div id="aboutus">
        <h1 id="aboutTitulo">About us</h1>
        <span id="aboutContenido">En Heracles, nos enorgullece ofrecer un espacio donde cada individuo puede alcanzar
            sus objetivos de acondicionamiento físico y bienestar. Nuestro nombre, inspirado en el legendario héroe
            griego conocido por su fuerza y valor, refleja nuestro compromiso con la superación personal y el desarrollo
            de un cuerpo y mente fuertes.</span>
    </div>

       <section id="questions">
        <h1 class="title">Preguntas Frecuentes</h1>
        <div class="faq">
            <div class="preguntas">
                <h1>¿Pregunta?</h1>
                <svg width="15" height="10" viewBox="0 0 42 25">
                    <path
                    d="M3 3L21 21L39 3"
                    stroke=#f9e8b2
                    stroke-width="7"
                    stroke-linecap="roud"
                    />
                </svg>
            </div>
            <div class="respuestas">
                <p>RespuestaRespuestaRespuestaRespuestaRespuestaRespuesta
                    Respuesta</p>
            </div>
        </div>
        <div class="faq">
            <div class="preguntas">
                <h1>¿Pregunta?</h1>
                <svg width="15" height="10" viewBox="0 0 42 25">
                    <path
                    d="M3 3L21 21L39 3"
                    stroke=#f9e8b2
                    stroke-width="7"
                    stroke-linecap="roud"
                    />
                </svg>
            </div>
            <div class="respuestas">
                <p>RespuestaRespuestaRespuestaRespuestaRespuestaRespuesta
                    Respuesta
                </p>
            </div>
        </div>

        <div class="faq">
            <div class="preguntas">
                <h1>¿Pregunta?</h1>
                <svg width="15" height="10" viewBox="0 0 42 25">
                    <path
                    d="M3 3L21 21L39 3"
                    stroke=#f9e8b2
                    stroke-width="7"
                    stroke-linecap="roud"
                    />
                </svg>
            </div>
            <div class="respuestas">
                <p>RespuestaRespuestaRespuestaRespuestaRespuestaRespuesta
                    Respuesta
                </p>
            </div>
        </div>
        <script src="assets/js/scripts.js"></script>
    </section>
    
    <footer>
        <div id="parteArriba">
            <div id="primerParte">
                <img src="recursos/logo_footer.jpg" alt="logofooter" id="logofooter">
                <p id="ubicacion">Ubicación:<br>Ubicación oficial</p>
                <p id="telefono">Teléfono de contacto:<br>+598 90 000 000</p>
                <p id="mail">Mail:<br>heracles@gmail.com</p>
            </div>
            <div id="compañia">
                <h1 id="tituloCompañia">Compañía</h1>
                <ul>
                    <li id="compañia1">Opción</li>
                    <li id="compañia2">Opción</li>
                    <li id="compañia3">Opción</li>
                    <li id="compañia4">Opción</li>
                </ul>
            </div>
            <div id="soporte">
                <h1 id="tituloSoporte">Soporte</h1>
                <ul>
                    <li id="soporte1">Opción</li>
                    <li id="soporte2">Opción</li>
                    <li id="soporte3">Opción</li>
                    <li id="soporte4">Opción</li>
                </ul>
            </div>
            <div id="plataforma">
                <h1 id="tituloPlataforma">Plataforma</h1>
                <ul>
                    <li id="plataforma1">Opción</li>
                    <li id="plataforma2">Opción</li>
                    <li id="plataforma3">Opción</li>
                    <li id="plataforma4">Opción</li>
                </ul>
            </div>
        </div>
        <div id="ubicaciones">
            <p>Pocitos</p>
            <p>Paso Molino</p>
            <p>Prado</p>
        </div>
        <p id="balumpco"><a href="WebInstitucional/index.html">Balump Company 2024®</p></a>
    </footer>

    <script src="jquery-3.7.1.min.js"></script>
    <script src="script.js"></script>
</body>

</html>