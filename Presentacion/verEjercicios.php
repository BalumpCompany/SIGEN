<?php
session_start();
if ($_SESSION["logueado"] == true && $_SESSION["rol"] == "Cliente" && $_SESSION["estado"]==1) {
    require '../Datos/Cliente.php';
    require '../Datos/ClienteRepo.php';
    $repo = new ClienteRepo();
    if (isset($_POST["nombre"])) {
        $ejercicios = $repo->obtenerRutinaNombre($_GET["user"], $_POST["nombre"]);
    } else {
        $ejercicios = $repo->obtenerRutina($_GET["user"]);
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ver Ejercicios - <?php echo $_GET["user"]; ?></title>
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
            <a href="verEjercicios.php?user=<?php echo $_GET["user"]; ?>">
                <p id="opcionActual">Ver ejercicios</p>
            </a>
            <a href="verCalificaciones.php?user=<?php echo $_GET["user"]; ?>">
                <p>Ver calificaciones</p>
            </a>
            <a href="seleccionarHorario.php?user=<?php echo $_GET["user"]; ?>">
                <p>Seleccionar horario</p>
            </a>
            <a href="seleccionarDepFis.php?user=<?php echo $_GET["user"]; ?>">
                <p>Seleccionar deporte/fisioterapia</p>
            </a>
            <a href="seleccionarSedeCliente.php?user=<?php echo $_GET["user"]; ?>"><p>Seleccionar sede</p></a>
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
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($ejercicios as $ejercicio): ?>
                        <tr>
                            <td><strong><?php echo htmlspecialchars($ejercicio->ID_Ejercicio); ?></strong></td>
                            <td><?php echo htmlspecialchars($ejercicio->Nombre); ?></td>
                            <td><?php echo $ejercicio->Descripcion; ?></td>
                            <td><img src="recursos/Ejercicios/<?php echo $ejercicio->Gif; ?>" alt=":)" width="200"></td>
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