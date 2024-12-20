<?php
session_start();
if($_SESSION["logueado"]==true && $_SESSION["rol"]=="Seleccionador"){
    require '../Datos/SeleccionadorRepo.php';
    $repo = new SeleccionadorRepo();
    $equipos= $repo->obtenerEquipos();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Equipos - <?php echo $_GET["user"]; ?></title>
    <link rel="stylesheet" href="styleverejercicios.css">
    <link rel="icon" href="recursos/icono.png">
</head>
<body>
    <nav>
        <a href="index.php"><img src="recursos/header_beige.jpg" alt="Heracles" id="imgNav"></a>
        <form action="../Negocio/cerrarSesion.php" method="post" onsubmit="return confirmacion()"><button id="cerrarSesion">Cerrar sesión</button></form>
    </nav>
    <div id="barraLateral">
        <a href="seleccionarClientes.php?user=<?php echo $_GET["user"]; ?>"><p>Seleccionar clientes</p></a>
        <a href="verDeportista.php?user=<?php echo $_GET["user"]; ?>"><p>Ver deportista</p></a>
        <a href="crearClub_Taller.php?user=<?php echo $_GET["user"]; ?>"><p>Agregar clubes/talleres</p></a>
        <a href="armarEquipos.php?user=<?php echo $_GET["user"]; ?>"><p>Armar equipos</p></a>
        <a href="verEquipos.php?user=<?php echo $_GET["user"]; ?>"><p id="opcionActual">Ver equipos</p></a>
    </div>
        <div id="contenidoPrincipal">
            <h1>Listado de equipos</h1>
            <table>
        <thead>
            <tr>
                <th>ID Club/Taller</th>
                <th>Club/Taller</th>
                <th>Nombre Club/Taller</th>
                <th>N° de Socio</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Deporte</th>
                <th>Posición</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($equipos as $equipo):?>
                <tr>
                    <td><strong><?php echo htmlspecialchars($equipo->ID_club_taller); ?></strong></td>
                    <td><?php echo htmlspecialchars($equipo->Club_Taller); ?></td>
                    <td><?php echo $equipo->nombreT; ?></td>
                    <td><strong><?php echo $equipo->Numero_Socio; ?></strong></td>
                    <td><?php echo $equipo->Nombre; ?></td>
                    <td><?php echo $equipo->Apellido; ?></td>
                    <td><?php echo $equipo->nombreD; ?></td>
                    <td><?php echo $equipo->Posicion; ?></td>
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