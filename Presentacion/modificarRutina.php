<?php
session_start();
if($_SESSION["logueado"]==true && $_SESSION["rol"]=="Coach"){
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
        <a href="../Negocio/cerrarSesion.php"><button id="cerrarSesion">Cerrar sesión</button></a>
    </nav>
    <div id="barraLateral">
        <a href="modificarRutina.php?user=<?php echo $_GET["user"]; ?>"><p id="opcionActual">Modificar rutina</p></a>
        <a href="puntuarDeportista.php?user=<?php echo $_GET["user"]; ?>"><p>Puntuar deportista</p></a>
        <a href="verClientes.php?user=<?php echo $_GET["user"]; ?>"><p>Ver clientes asignados</p></a>
        <a href="agruparEjercicios.php?user=<?php echo $_GET["user"]; ?>"><p>Agrupar ejercicios</p></a>
        <a href="modificarMinimos.php?user=<?php echo $_GET["user"]; ?>"><p>Modificar mínimos</p></a>
    </div>
    <h1>Elige una de las opciones</h1>
</body>
</html>
<?php
}else{
    header("Location:index.php");
    exit();
}
?>