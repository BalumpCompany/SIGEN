<?php
session_start();
if($_SESSION["logueado"]==true && $_SESSION["rol"]=="Seleccionador"){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventana Seleccionador - <?php echo $_GET["user"]; ?></title>
    <link rel="stylesheet" href="styleCliente.css">
    <link rel="icon" href="recursos/icono.png">
</head>
<body>
    <nav>
        <a href="index.php"><img src="recursos/header_beige.jpg" alt="Heracles" id="imgNav"></a>
        <form action="../Negocio/cerrarSesion.php" method="post" onsubmit="return confirmacion()"><button id="cerrarSesion">Cerrar sesión</button></form>
    </nav>
    <div id="barraLateral">
        <a href="verEjercicios.php?user=<?php echo $_GET["user"]; ?>"><p>Seleccionar clientes</p></a>
        <a href="verDeportista.php?user=<?php echo $_GET["user"]; ?>"><p>Ver deportista</p></a>
        <a href="crearClub_Taller.php?user=<?php echo $_GET["user"]; ?>"><p>Agregar clubes/talleres</p></a>
        <a href="seleccionarDepFis.php?user=<?php echo $_GET["user"]; ?>"><p>Armar equipos</p></a>
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