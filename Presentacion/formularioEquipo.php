<?php
session_start();
if ($_SESSION["logueado"] == true && $_SESSION["rol"] == "Seleccionador") {
    require '../Datos/SeleccionadorRepo.php';
    $repo = new SeleccionadorRepo();
    $clientes = $repo->obtenerSeleccionados();
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Armar equipo - <?php echo $_GET["user"]; ?></title>
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
            <a href="seleccionarClientes.php?user=<?php echo $_GET["user"]; ?>">
                <p>Seleccionar clientes</p>
            </a>
            <a href="verDeportista.php?user=<?php echo $_GET["user"]; ?>">
                <p>Ver deportista</p>
            </a>
            <a href="crearClub_Taller.php?user=<?php echo $_GET["user"]; ?>">
                <p>Agregar clubes/talleres</p>
            </a>
            <a href="armarEquipos.php?user=<?php echo $_GET["user"]; ?>">
                <p>Armar equipos</p>
            </a>
            <a href="verEquipos.php?user=<?php echo $_GET["user"]; ?>">
                <p>Ver equipos</p>
            </a>
        </div>
        <div id="contenidoPrincipal">
            <h1>Armar equipo - <?php echo $_GET["nombre"]; ?></h1>
            <form action="../Negocio/armarEquipo.php" method="post">
                <input type="text" name="user" value="<?php echo $_GET["user"]; ?>" hidden>
                <input hidden type="number" name="id" value="<?php echo $_GET["id"]; ?>">
                <table>
                    <thead>
                        <th>Nombre</th>
                        <th>Selección</th>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($clientes as $cliente) {
                            echo "<tr>";
                            echo '<td style="font-family:Inter; font-size:1vw;">' . $cliente->Nombre . '</td>';
                            echo '<td><input style="padding:2vw;" type="checkbox" name="clientes[]" value="' . $cliente->Numero_Socio . '"></td>';
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <button
                    style="font-family:Inter; width:30vw; font-size:1vw; background-color:#e0e0e0; border:none; border-radius:10px; padding:0.5vw; margin-bottom:4vw;">Enviar</button>
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