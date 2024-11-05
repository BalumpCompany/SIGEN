<?php
session_start();
if($_SESSION["logueado"]==true && $_SESSION["rol"]=="Cliente" && $_SESSION["estado"]==1){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventana Cliente - <?php echo $_GET["user"]; ?></title>
    <link rel="stylesheet" href="styleCliente.css">
    <link rel="icon" href="recursos/icono.png">
</head>
<body>
    <nav>
        <a href="index.php"><img src="recursos/header_beige.jpg" alt="Heracles" id="imgNav"></a>
        <form action="../Negocio/cerrarSesion.php" method="post" onsubmit="return confirmacion()"><button id="cerrarSesion">Cerrar sesión</button></form>
    </nav>
    <div id="barraLateral">
        <a href="verEjercicios.php?user=<?php echo $_GET["user"]; ?>"><p>Ver ejercicios</p></a>
        <a href="verCalificaciones.php?user=<?php echo $_GET["user"]; ?>"><p>Ver calificaciones</p></a>
        <a href="seleccionarHorario.php?user=<?php echo $_GET["user"]; ?>"><p>Seleccionar horario</p></a>
        <a href="seleccionarDepFis.php?user=<?php echo $_GET["user"]; ?>"><p>Seleccionar deporte/fisioterapia</p></a>
        <a href="seleccionarSedeCliente.php?user=<?php echo $_GET["user"]; ?>"><p>Seleccionar sede</p></a>
    </div>
    <h1>Elige una de las opciones</h1>
    <script src="jquery-3.7.1.min.js"></script>
    <script src="confirmacion.js"></script>
</body>
</html>
<?php
}else{
    header("Location:index.php");
    exit();
}
?>