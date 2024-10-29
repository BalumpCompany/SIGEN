<?php
session_start();
if($_SESSION["logueado"]==true && $_SESSION["rol"]=="Seleccionador"){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pantalla principal - <?php echo $_GET["user"]; ?></title>
    <link rel="stylesheet" href="styleverejercicios.css">
    <link rel="icon" href="recursos/icono.png">
</head>
<body>
    <nav>
        <a href="index.php"><img src="recursos/header_beige.jpg" alt="Heracles" id="imgNav"></a>
        <form action="../Negocio/cerrarSesion.php" method="post" onsubmit="return confirmacion()"><button id="cerrarSesion">Cerrar sesión</button></form>
    </nav>
    <div id="barraLateral">
        <a href="verEjercicios.php?user=<?php echo $_GET["user"]; ?>"><p>Seleccionar clientes</p></a>
        <a href="verCalificaciones.php?user=<?php echo $_GET["user"]; ?>"><p>Ver deportista</p></a>
        <a href="crearClub_Taller.php?user=<?php echo $_GET["user"]; ?>"><p id="opcionActual">Agregar clubes/talleres</p></a>
        <a href="seleccionarDepFis.php?user=<?php echo $_GET["user"]; ?>"><p>Armar equipos</p></a>
    </div>
        <div id="contenidoPrincipal">
            <h1>Agregar club o Taller</h1>
            <form action="../Negocio/crearClub_Taller.php" method="post">
            <label for="club_taller" style="font-family:Inter;">Seleccionar</label><select name="club_taller" style="width:18.5vw; font-family:Inter;">
                    <option value="Club">Club</option>
                    <option value="Taller">Taller</option>
                </select><br>
                <label for="nombre" style="font-family:Inter;">Nombre </label><input type="text" name="nombre" style="width:16.6vw; font-family:Inter;"><br>
                <button style="width:20vw; font-family:Inter;">Crear</button>
            </form>
        </div>
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