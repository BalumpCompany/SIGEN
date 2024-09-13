<?php
session_start();
if($_SESSION["logueado"]==true && $_SESSION["rol"]=="Avanzado"){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pantalla principal - <?php echo $_GET["user"]; ?></title>
    <link rel="stylesheet" href="styleVerEjercicios.css">
    <link rel="icon" href="recursos/icono.png">
</head>
<body>
    <nav>
        <a href="index.php"><img src="recursos/header_beige.jpg" alt="Heracles" id="imgNav"></a>
        <form action="../Negocio/cerrarSesion.php" method="post" onsubmit="return confirmacion()"><button id="cerrarSesion">Cerrar sesión</button></form>
    </nav>
    <div id="barraLateral">
        <a href="modificarEjercicios.php?user=<?php echo $_GET["user"]; ?>"><p>Modificar ejercicios</p></a>
        <a href="crearUsuario.php?user=<?php echo $_GET["user"]; ?>"><p>Crear usuario</p></a>
        <a href="modificarUsuario.php?user=<?php echo $_GET["user"]; ?>"><p id="opcionActual">Modificar usuario</p></a>
        <a href="eliminarUsuario.php?user=<?php echo $_GET["user"]; ?>"><p>Eliminar usuario</p></a>
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