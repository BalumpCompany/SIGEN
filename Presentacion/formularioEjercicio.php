<?php
require '../Datos/Ejercicio.php';
require '../Datos/EjercicioRepo.php';
$repo = new EjercicioRepo();
$ejercicio = $repo->obtener($_POST["nombre"])[0];
session_start();
if ($_SESSION["logueado"] == true && $_SESSION["rol"] == "Avanzado") {
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
            <a href="modificarUsuario.php?user=<?php echo $_GET["user"]; ?>">
                <p>Modificar usuario</p>
            </a>
            <a href="eliminarUsuario.php?user=<?php echo $_GET["user"]; ?>">
                <p>Eliminar usuario</p>
            </a>
        </div>
        <div id="contenidoPrincipal">
            <h1>Formulario de modificación</h1>
            <form action="../Negocio/modificarEjercicio.php" method="post">
                <input type="text" name="user" value="<?php echo $_GET["user"]; ?>" hidden>
                <input type="number" name="id" value="<?php echo $ejercicio->ID_Ejercicio; ?>" hidden>
                <input type="text" name="gif" value="<?php echo $ejercicio->Gif; ?>" hidden>
                <input type="text" name="nombre" value="<?php echo $ejercicio->Nombre; ?>" style="width:20vw; font-family:Inter;"><br>
                <textarea name="desc" style="width:20vw; font-family:Inter;"><?php echo $ejercicio->Descripcion ?></textarea><br>
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