<?php
require '../Datos/Usuario.php';
require '../Datos/UsuarioRepo.php';
$repo = new UsuarioRepo();
$usuario = $repo->obtener($_POST["username"])[0];
session_start();
if ($_SESSION["logueado"] == true && $_SESSION["rol"] == "Avanzado") {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Modificar Usuario - <?php echo $_GET["user"]; ?></title>
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
            <a href="modificarEjercicios.php?user=<?php echo $_GET["user"]; ?>">
                <p>Modificar ejercicios</p>
            </a>
            <a href="crearUsuario.php?user=<?php echo $_GET["user"]; ?>">
                <p>Crear usuario</p>
            </a>
            <a href="listaUsuarios.php?user=<?php echo $_GET["user"]; ?>">
                <p>Listado usuarios</p>
            </a>
        </div>
        <div id="contenidoPrincipal">
            <h1>Formulario de modificación</h1>
            <form action="../Negocio/modificarUsuario.php" method="post">
                <input type="text" name="user" value="<?php echo $_GET["user"] ?>" hidden>
            <label for="username" style="font-family:Inter;">Nombre de usuario </label><input type="text" name="username" value="<?php echo $usuario->Username; ?>" style="width: 12.22vw; font-family:Inter;"><br>
            <label for="nombre" style="font-family:Inter;">Nombre </label><input type="text" name="nombre" value="<?php echo $usuario->Nombre; ?>" style="width:16.6vw; font-family:Inter;"><br>
            <label for="apellido" style="font-family:Inter;">Apellido </label><input type="text" name="apellido" value="<?php echo $usuario->Apellido; ?>" style="width:16.55vw; font-family:Inter;"><br>
            <label for="mail" style="font-family:Inter;">E-Mail </label><input type="text" name="mail" value="<?php echo $usuario->Email; ?>" style="width:17.25vw; font-family:Inter;"><br>
            <label for="contrasena" style="font-family:Inter;">Contraseña </label><input type="pass" name="contrasena" value="<?php echo $usuario->Contrasena; ?>" style="width:15.2vw; font-family:Inter;"><br>
            <label for="rol" style="font-family:Inter;">Rol </label><select name="rol" value="<?php echo $usuario->Rol; ?>" style="width:18.5vw; font-family:Inter;">
                    <option value="Cliente">Cliente</option>
                    <option value="Coach">Entrenador</option>
                    <option value="Seleccionador">Seleccionador</option>
                    <option value="Avanzado">Avanzado</option>
                    <option value="Admin">Administrativo</option>
                </select><br>
                <button style="width:20vw; font-family:Inter;">Modificar</button>
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