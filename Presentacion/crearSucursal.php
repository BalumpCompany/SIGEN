<?php
session_start();
if ($_SESSION["logueado"] == true && $_SESSION["rol"] == "Admin") {
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
            <a href="verClientesAdmin.php?user=<?php echo $_GET["user"]; ?>">
                <p>Ver clientes</p>
            </a>
            <a href="verSucursales.php?user=<?php echo $_GET["user"]; ?>">
                <p>Ver sucursales</p>
            </a>
            <a href="crearSucursal.php?user=<?php echo $_GET["user"]; ?>">
                <p id="opcionActual">Crear sucursales</p>
            </a>
            <a href="verPagos.php?user=<?php echo $_GET["user"]; ?>">
                <p>Ver pagos</p>
            </a>
        </div>
        <div id="contenidoPrincipal">
            <h1>Crear Sucursal</h1>
            <form action="../Negocio/crearSucursal.php" method="post" enctype="multipart/form-data">
                <label for="nombre" style="font-family:Inter;">Nombre de sucursal </label><input type="text" name="nombre" style="width: 12.22vw; font-family:Inter;" required><br>
                <label for="direccion" style="font-family:Inter;">Direccion </label><input type="text" name="direccion" style="width: 12.22vw; font-family:Inter;" required><br>
                <label for="lugares_maximos" style="font-family:Inter;">Lugares maximos </label><input type="number" name="lugares_maximos" style="width: 12.22vw; font-family:Inter;" required><br>
                <label for="logo" style="font-family:Inter;">Logo</label><input type="file" name="logo" style="width: 12.22vw; font-family:Inter;" accept="image/png, image/jpeg" required><br>
                <label for="textos" style="font-family:Inter;">Textos</label><input type="text" name="textos" style="width: 12.22vw; font-family:Inter;"><br>
                <button style="width:20vw; font-family:Inter;">Crear</button>
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