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
            <a href="verClientes.php?user=<?php echo $_GET["user"]; ?>"><p>Ver clientes</p></a>
            <a href="verSucursales.php?user=<?php echo $_GET["user"]; ?>"><p>Ver sucursales</p></a>
            <a href="crearSucursal.php?user=<?php echo $_GET["user"]; ?>"><p>Crear sucursales</p></a>
            <a href="verPagos.php?user=<?php echo $_GET["user"];?>"><p>Ver pagos</p></a>
        </div>
        <div id="contenidoPrincipal">
            <h1>Crear Sucursal</h1>
            <form action="../Negocio/crearUsuario.php" method="post">
                <input type="text" name="user" value="<?php echo $_GET["user"] ?>" hidden>
                <label for="username" style="font-family:Inter;">Nombre de usuario </label><input type="text" name="username" style="width: 12.22vw; font-family:Inter;"><br>
                <label for="nombre" style="font-family:Inter;">Nombre </label><input type="text" name="nombre" style="width:16.6vw; font-family:Inter;"><br>
                <label for="apellido" style="font-family:Inter;">Apellido </label><input type="text" name="apellido" style="width:16.55vw; font-family:Inter;"><br>
                <label for="mail" style="font-family:Inter;">E-Mail </label><input type="text" name="mail" style="width:17.25vw; font-family:Inter;"><br>
                <label for="contrasena" style="font-family:Inter;">Contraseña </label><input type="password" name="contrasena" style="width:15.2vw; font-family:Inter;"><br>
                <label for="rol" style="font-family:Inter;">Rol </label><select name="rol" style="width:18.5vw; font-family:Inter;">
                    <option value="Cliente">Cliente</option>
                    <option value="Coach">Entrenador</option>
                    <option value="Seleccionador">Seleccionador</option>
                    <option value="Avanzado">Avanzado</option>
                    <option value="Admin">Administrativo</option>
                </select><br>
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