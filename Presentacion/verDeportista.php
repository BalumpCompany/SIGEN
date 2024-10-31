<?php
session_start();
if($_SESSION["logueado"]==true && $_SESSION["rol"]=="Seleccionador"){
    require '../Datos/ClienteRepo.php';
    $repo = new ClienteRepo();
    $clientes= $repo->obtenerDeportista($_GET["user"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pantalla principal - <?php echo $_GET["user"]; ?></title>
    <link rel="stylesheet" href="styleverejercicios.css">
    <link rel="icon" href="recursos/icono.png">
</head>
<body>
    <nav>
        <a href="index.php"><img src="recursos/header_beige.jpg" alt="Heracles" id="imgNav"></a>
        <form action="../Negocio/cerrarSesion.php" method="post" onsubmit="return confirmacion()"><button id="cerrarSesion">Cerrar sesión</button></form>
    </nav>
    <div id="barraLateral">
        <a href="verEjercicios.php?user=<?php echo $_GET["user"]; ?>"><p>Seleccionar clientes</p></a>
        <a href="verDeportista.php?user=<?php echo $_GET["user"]; ?>"><p id="opcionActual">Ver deportista</p></a>
        <a href="crearClub_Taller.php?user=<?php echo $_GET["user"]; ?>"><p>Agregar clubes/talleres</p></a>
        <a href="seleccionarDepFis.php?user=<?php echo $_GET["user"]; ?>"><p>Armar equipos</p></a>
    </div>
        <div id="contenidoPrincipal">
            <h1>Listado de los deportistas</h1>
            <table>
        <thead>
            <tr>
                <th>ID_Deporte</th>
                <th>Posicion</th>
                <th>Numero_Socio</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientes as $cliente):?>
                <tr>
                    <td><strong><?php echo htmlspecialchars($cliente->ID_Deporte); ?></strong></td>
                    <td><?php echo htmlspecialchars($cliente->Posicion); ?></td>
                    <td><?php echo $cliente->Numero_Socio; ?></td>
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