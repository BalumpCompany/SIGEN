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
        <h1 id="aboutTitulo">Nosotros</h1>
        <span id="aboutContenido">En Heracles, nos enorgullece ofrecer un espacio donde cada individuo puede alcanzar
            sus objetivos de acondicionamiento físico y bienestar. Nuestro nombre, inspirado en el legendario héroe
            griego conocido por su fuerza y valor, refleja nuestro compromiso con la superación personal y el desarrollo
            de un cuerpo y mente fuertes.</span>
    </div>

       <section id="questions">
        <h1 class="title">Preguntas Frecuentes</h1>
        <div class="faq">
            <div class="preguntas">
                <h1>¿Métodos de pago?</h1>
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
                <p>El pago puede ser de forma presencial en la sucursal a la cual asistis, transferencia bancaria o a través de mercado pago.</p>
            </div>
        </div>
        <div class="faq">
            <div class="preguntas">
                <h1>¿Con quien me puedo contactar ante cualquier duda?</h1>
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
                <p>Te puedes contactar a través de telefono o mail con nuestro departamento de "ayuda al cliente".<br>
                    TEL: 2362 4427<br>MAIL: heracles@gmail.com
                </p>
            </div>
        </div>

        <div class="faq">
            <div class="preguntas">
                <h1>Sucursales</h1>
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
                <p>Contamos con 3 sucursales a lo largo del país: Pocitos, Prado y Paso molino
                </p>
            </div>
        </div>
        <script src="assets/js/scripts.js"></script>
    </section>
    
    <footer>
        <div id="parteArriba">
            <div id="primerParte">
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
