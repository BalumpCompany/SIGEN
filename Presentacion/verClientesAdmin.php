<?php
session_start();
if($_SESSION["logueado"]==true && $_SESSION["rol"]=="Admin"){
    require '../Datos/clienteRepo.php';
    $repo = new ClienteRepo();
    $clientes = $repo->obtenerTodos();
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
        <a href="verClientesAdmin.php?user=<?php echo $_GET["user"]; ?>"><p id="opcionActual">Ver clientes</p></a>
        <a href="verSucursales.php?user=<?php echo $_GET["user"]; ?>"><p>Ver sucursales</p></a>
        <a href="crearSucursal.php?user=<?php echo $_GET["user"]; ?>"><p>Crear sucursales</p></a>
    </div>
    <div id="contenidoPrincipal">
    <h1>Listado de clientes</h1>
    <table>
        <thead>
            <tr>
                <th>N° Socio</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Fecha de registro</th>
                <th>Activo</th>
                <th>Ultimo pago</th>
                <th>Verificar pago</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientes as $cliente):?>
                <tr>
                <td><strong><?php echo htmlspecialchars($cliente->Numero_Socio); ?></strong></td>
                <td><?php echo $cliente->Nombre; ?></td>
                <td><?php echo $cliente->Apellido; ?></td>
                <td><?php echo $cliente->fecha_registro; ?></td>
                <td><?php if($cliente->activo){echo "Activo";}else{echo "No activo";} ?></td>
                <td><?php if($cliente->ultimo_pago==NULL){echo "";}else{echo $cliente->ultimo_pago;} ?></td>
                <td><form action="../Negocio/verificarPago.php" method="post"><input type="hidden" name="nro" value="<?php echo $cliente->Numero_Socio;?>"><input type="hidden" name="user" value="<?php echo $_GET["user"];?>"><button style="height: 2vw; background-color:#f9f8d2; border:none; border-radius:10px; font-family:Inter; font-size:1vw;">Verificar</button></form></td>

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