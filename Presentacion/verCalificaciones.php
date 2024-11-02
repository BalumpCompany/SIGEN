<?php
session_start();
if($_SESSION["logueado"]==true && $_SESSION["rol"]=="Cliente"){
    require '../Datos/ClienteRepo.php';
    $repo = new ClienteRepo();
    $user = $_GET["user"];
    $clientes = $repo->obtenerPuntuacion($user);
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
        <a href="verCalificaciones.php?user=<?php echo $_GET["user"]; ?>"><p id="opcionActual">Ver calificaciones</p></a>
        <a href="seleccionarHorario.php?user=<?php echo $_GET["user"]; ?>"><p>Seleccionar horario</p></a>
        <a href="seleccionarDepFis.php?user=<?php echo $_GET["user"]; ?>"><p>Seleccionar deporte/fisioterapia</p></a>
        <a href="seleccionarSedeCliente.php?user=<?php echo $_GET["user"]; ?>"><p>Seleccionar sede</p></a>
    </div>
    <div id="contenidoPrincipal">
        <h1>Calificaciones</h1>
            <table>
        <thead>
            <tr>
                <th>ID Calificacion</th>
                <th>Puntaje obtenido</th>
                <th>Puntaje esperado</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientes as $cliente):?>
                <tr>
                    <td><strong><?php echo htmlspecialchars($cliente->ID_Calificacion); ?></strong></td>
                    <td><?php echo htmlspecialchars($cliente->Puntaje_obtenido); ?></td>
                    <td><?php echo htmlspecialchars($cliente->Puntaje_esperado); ?></td>
                    <td><?php echo htmlspecialchars($cliente->fecha); ?></td>
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
}else{
    header("Location:index.php");
    exit();
}
?>