<?php
session_start();
if($_SESSION["logueado"]==true && $_SESSION["rol"]=="Admin"){
    require '../Datos/clienteRepo.php';
    $repo = new ClienteRepo();
    $clientes = $repo->obtenerUltimoPago();
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
        <a href="verClientesAdmin.php?user=<?php echo $_GET["user"]; ?>"><p>Ver clientes</p></a>
        <a href="verSucursales.php?user=<?php echo $_GET["user"]; ?>"><p>Ver sucursales</p></a>
        <a href="crearSucursal.php?user=<?php echo $_GET["user"]; ?>"><p>Crear sucursales</p></a>
        <a href="verPagos.php?user=<?php echo $_GET["user"]; ?>"><p id="opcionActual">Ver pagos</p></a>
    </div>
    <div id="contenidoPrincipal">
    <h1>Listado de los ultimos pagos de los clientes</h1>
    <table>
        <thead>
            <tr>
                <th>N° Socio</th>
                <th>Ultimo pago</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientes as $cliente):?>
                <tr>
                <td><strong><?php echo htmlspecialchars($cliente->Numero_Socio); ?></strong></td>
                <td><?php echo htmlspecialchars($cliente->ultimo_pago); ?></td>

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