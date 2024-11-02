<?php
session_start();
if ($_SESSION["logueado"] == true && $_SESSION["rol"] == "Coach") {
    require '../Datos/EjercicioRepo.php';
    $repo = new EjercicioRepo();
    $ejercicios = $repo->obtenerTodos();
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
            <a href="modificarRutina.php?user=<?php echo $_GET["user"]; ?>">
                <p id="opcionActual">Modificar rutina</p>
            </a>
            <a href="verClientes.php?user=<?php echo $_GET["user"]; ?>">
                <p>Ver clientes asignados</p>
            </a>
            <a href="agruparEjercicios.php?user=<?php echo $_GET["user"]; ?>">
                <p>Agrupar ejercicios</p>
            </a>
            <a href="modificarMinimos.php?user=<?php echo $_GET["user"]; ?>">
                <p>Modificar mínimos</p>
            </a>
            <a href="seleccHorarioTrabajo.php?user=<?php echo $_GET["user"]; ?>">
                <p>Seleccionar horario</p>
            </a>
            <a href="seleccionarSedeCoach.php?user=<?php echo $_GET["user"]; ?>">
                <p>Seleccionar sede</p>
            </a>
        </div>
        <div id="contenidoPrincipal">
            <h1>Modificar rutina - Día: <?php echo $_GET["dia"]; ?></h1>
            <form action="../Negocio/modificarRutina.php" method="post">
                <input type="text" name="user" value="<?php echo $_GET["user"]; ?>" hidden>
                <input hidden type="number" name="nro" value="<?php echo $_GET["nro"]; ?>">
                <input type="hidden" name="dia" value="<?php echo $_GET["dia"]; ?>">
                <table>
                    <thead>
                        <th>Nombre Ejercicio</th>
                        <th>Selección</th>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($ejercicios as $ejercicio) {
                            echo "<tr>";
                            echo '<td style="font-family:Inter; font-size:1vw;">' . $ejercicio->Nombre . '</td>';
                            if($repo->verificar($_GET["nro"],$ejercicio->ID_Ejercicio,$_GET["dia"])){
                                echo '<td><input style="padding:2vw;" type="checkbox" name="ejercicios[]" value="' . $ejercicio->ID_Ejercicio . '" checked></td>';
                            }else{
                                echo '<td><input style="padding:2vw;" type="checkbox" name="ejercicios[]" value="' . $ejercicio->ID_Ejercicio . '"></td>';
                            }
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