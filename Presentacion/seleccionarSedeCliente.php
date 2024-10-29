<?php
require '../Datos/SucursalRepo.php';
session_start();
if($_SESSION["logueado"]==true && $_SESSION["rol"]=="Cliente"){
    $sucursalRepo=new SucursalRepo();
    $sucursales=$sucursalRepo->obtenerTodos();
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
        <form action="../Negocio/cerrarSesion.php" method="post" onsubmit="return confirmacion()"><button id="cerrarSesion">Cerrar sesión</button></form>
    </nav>
    <div id="barraLateral">
        <a href="verEjercicios.php?user=<?php echo $_GET["user"]; ?>"><p>Ver ejercicios</p></a>
        <a href="verCalificaciones.php?user=<?php echo $_GET["user"]; ?>"><p>Ver calificaciones</p></a>
        <a href="seleccionarHorario.php?user=<?php echo $_GET["user"]; ?>"><p>Seleccionar horario</p></a>
        <a href="seleccionarDepFis.php?user=<?php echo $_GET["user"]; ?>"><p>Seleccionar deporte/fisioterapia</p></a>
        <a href="seleccionarSedeCliente.php?user=<?php echo $_GET["user"]; ?>"><p id="opcionActual">Seleccionar sede</p></a>
    </div>
    <div id="contenidoPrincipal">
        <h1>Seleccionar sede</h1>
        <form action="../Negocio/seleccSede.php" method="post">
            <input type="hidden" name="rol" value="<?php echo $_SESSION["rol"]; ?>">
            <input type="hidden" name="user" value="<?php echo $_GET["user"]; ?>">
            <select name="sucursal" style="width:20vw;">
                <?php foreach($sucursales as $sucursal){
                    echo "<option value='$sucursal->ID_sede'>$sucursal->Nombre - $sucursal->Direccion</option>";
                }
                ?>
            </select><br>
            <button style="margin-top:1vw; width:20vw;">Seleccionar</button>
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