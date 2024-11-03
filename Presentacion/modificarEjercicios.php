<?php
require '../Datos/Ejercicio.php';
require '../Datos/EjercicioRepo.php';

$repo = new EjercicioRepo();
if (isset($_POST["nombre"])) {
    $ejercicios = $repo->obtener($_POST["nombre"]);
} else {
    $ejercicios = $repo->obtenerTodos();
}
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
                <p id="opcionActual">Modificar ejercicios</p>
            </a>
            <a href="crearUsuario.php?user=<?php echo $_GET["user"]; ?>">
                <p>Crear usuario</p>
            </a>
            <a href="modificarUsuarios.php?user=<?php echo $_GET["user"]; ?>">
                <p>Modificar usuario</p>
            </a>
            <a href="eliminarUsuario.php?user=<?php echo $_GET["user"]; ?>">
                <p>Eliminar usuario</p>
            </a>
        </div>
        <div id="contenidoPrincipal">
            <h1>Lista de Ejercicios</h1>
            <form action="" method="post"><input type="text" name="nombre" required
                    style="width: 26.3vw; height: 2vw;"><button style="height: 2vw;">🔍︎Buscar</button></form>
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Ejemplo</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($ejercicios as $ejercicio): ?>
                        <tr>
                            <td><strong><?php echo htmlspecialchars($ejercicio->ID_Ejercicio); ?></strong></td>
                            <td><?php echo htmlspecialchars($ejercicio->Nombre); ?></td>
                            <td><?php echo $ejercicio->Descripcion; ?></td>
                            <td><img src="recursos/Ejercicios/<?php echo $ejercicio->Gif; ?>" alt=":)" width="200"></td>
                            <td>
                                <form action="formularioEjercicio.php?user=<?php echo $_GET["user"]; ?>" method="post"><input
                                        type="hidden" name="id" value="<?php echo $ejercicio->Nombre ?>"><button
                                        style="height: 10vw; background-color:white; border:none; border-radius:10px; font-family:Inter; font-size:1vw;">Modificar</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
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