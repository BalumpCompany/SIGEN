<?php
session_start();
if($_SESSION["logueado"]==true && $_SESSION["rol"]=="Coach"){
    require '../Datos/EntrenadorRepo.php';
    $repo = new EntrenadorRepo();
    $clientes= $repo->obtenerClientesAsignados($_GET["user"]);
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
        <a href="modificarRutina.php?user=<?php echo $_GET["user"]; ?>"><p>Modificar rutina</p></a>
        <a href="verClientes.php?user=<?php echo $_GET["user"]; ?>"><p id="opcionActual">Ver clientes asignados</p></a>
        <a href="agruparEjercicios.php?user=<?php echo $_GET["user"]; ?>"><p>Agrupar ejercicios</p></a>
        <a href="modificarMinimos.php?user=<?php echo $_GET["user"]; ?>"><p>Modificar mínimos</p></a>
        <a href="seleccHorarioTrabajo.php?user=<?php echo $_GET["user"]; ?>"><p>Seleccionar horario</p></a>
    </div>
    <div id="contenidoPrincipal">
    <h1>Listado de clientes asignados</h1>
    <table>
        <thead>
            <tr>
                <th>N° Socio</th>
                <th>Nombre</th>
                <th>Apellido</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientes as $cliente):?>
                <tr>
                    <td><strong><?php echo htmlspecialchars($cliente->Numero_Socio); ?></strong></td>
                    <td><?php echo htmlspecialchars($cliente->Nombre); ?></td>
                    <td><?php echo $cliente->Apellido; ?></td>
                    <td><form action="puntuarDeportista.php" method="get">
                        <input type="text" name="user" value="<?php echo $_GET["user"]; ?>" hidden>
                        <input type="text" name="nombre" value="<?php echo $cliente->Nombre." ".$cliente->Apellido; ?>" hidden>
                        <input hidden type="number" name="nro" value="<?php echo $cliente->Numero_Socio; ?>">
                        <button style="height: 2vw; background-color:white; border:none; border-radius:10px; font-family:Inter; font-size:1vw;">Puntuar</button>
                    </form></td>
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
}elseif($_SESSION["logueado"]==true && $_SESSION["rol"]=="Admin"){

    require '../Datos/ClienteRepo.php';
    $repo = new ClienteRepo();
    $clientes= $repo->obtenerTodos();

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
        <a href="verClientes.php?user=<?php echo $_GET["user"]; ?>"><p>Ver clientes</p></a>
        <a href="verSucursales.php?user=<?php echo $_GET["user"]; ?>"><p>Ver sucursales</p></a>
        <a href="crearSucursal.php?user=<?php echo $_GET["user"]; ?>"><p>Crear sucursales</p></a>
        <a href="verPagos.php?user=<?php echo $_GET["user"]; ?>"><p>Ver pagos</p></a>
    </div>
    <div id="contenidoPrincipal">
    <h1>Listado de clientes</h1>
    <table>
        <thead>
            <tr>
                <th>N° Socio</th>
                <th>Nombre</th>
                <th>Apellido</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientes as $cliente):?>
                <tr>
                    <td><strong><?php echo htmlspecialchars($cliente->Numero_Socio); ?></strong></td>
                    <td><?php echo htmlspecialchars($cliente->Nombre); ?></td>
                    <td><?php echo $cliente->Apellido; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    <script src="jquery-3.7.1.min.js"></script>
    <script src="confirmacion.js"></script>

<?php
}else{
    header("Location:index.php");
    exit();
}
?>