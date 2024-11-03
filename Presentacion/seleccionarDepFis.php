<?php
session_start();
if ($_SESSION["logueado"] == true && $_SESSION["rol"] == "Cliente" && $_SESSION["estado"]==1) {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ver ejercicios - <?php echo $_GET["user"]; ?></title>
        <link rel="stylesheet" href="styleVerEjercicios.css">
        <link rel="icon" href="recursos/icono.png">
    </head>

    <body>
        <nav>
            <a href="index.php"><img src="recursos/header_beige.jpg" alt="Heracles" id="imgNav"></a>
            <form action="../Negocio/cerrarSesion.php" method="post" onsubmit="return confirmacion()"><button
                    id="cerrarSesion">Cerrar sesión</button></form>
        </nav>
        <div id="barraLateral">
            <a href="verEjercicios.php?user=<?php echo $_GET["user"]; ?>">
                <p>Ver ejercicios</p>
            </a>
            <a href="verCalificaciones.php?user=<?php echo $_GET["user"]; ?>">
                <p>Ver calificaciones</p>
            </a>
            <a href="seleccionarHorario.php?user=<?php echo $_GET["user"]; ?>">
                <p>Seleccionar horario</p>
            </a>
            <a href="seleccionarDepFis.php?user=<?php echo $_GET["user"]; ?>">
                <p id="opcionActual">Seleccionar deporte/fisioterapia</p>
            </a>
            <a href="seleccionarSedeCliente.php?user=<?php echo $_GET["user"]; ?>"><p>Seleccionar sede</p></a>
        </div>
        <div id="contenidoPrincipal">
            <h1>Elegir deporte</h1>
            <form action="../Negocio/seleccDeporte.php" method="post" style="display:flex; flex-direction:column; align-items:center;">
                <input type="text" hidden name="user" value="<?php echo $_GET["user"]; ?>">
                <label for="deporte" style="font-family:Inter; font-size:1vw; margin-bottom:0.5vw;">Deporte que
                    practicas</label>
                <select name="deporte" style="width:20vw; font-family:Inter; font-size:0.8vw; margin-bottom:1vw;">
                    <option value="1">Fútbol</option>
                    <option value="2">Basquetbol</option>
                    <option value="3">Tenis</option>
                    <option value="4">Atletismo</option>
                    <option value="5">Natación</option>
                    <option value="6">Lucha</option>
                    <option value="7">Voleibol</option>
                </select>
                <label for="posicion" style="font-family:Inter; font-size:1vw; margin-bottom:0.5vw;">Posición que cumples
                    (si tienes)</label>
                <input type="text" name="posicion"
                    style="width:19.6vw; font-family:Inter; font-size:0.8vw; margin-bottom:1vw;">
                <button style="width:20vw; font-family:Inter; font-size:0.8vw;">Seleccionar</button>
            </form>
            <h1>Fisioterapia, describir lesión</h1>
            <form action="../Negocio/seleccFisio.php" method="post" style="display:flex; flex-direction:column; align-items:center;">
                <input type="text" hidden name="user" value="<?php echo $_GET["user"]; ?>">
                <label for="lesion" style="font-family:Inter; font-size:1vw; margin-bottom:0.5vw;">Lesión que
                    padeces</label><input type="text" name="lesion"
                    style="width:19.6vw; font-family:Inter; font-size:0.8vw; margin-bottom:1vw;">
                <button style="width:20vw; font-family:Inter; font-size:0.8vw;">Seleccionar</button>
            </form>
        </div>
        <script src="jquery-3.7.1.min.js"></script>
        <script src="confirmacion.js"></script>
    </body>

    </html>
    <?php
} else {
    header("Location:index.php");
    exit();
}
?>