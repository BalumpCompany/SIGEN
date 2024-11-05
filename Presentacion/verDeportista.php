<?php
session_start();
if($_SESSION["logueado"]==true && $_SESSION["rol"]=="Seleccionador"){
    require '../Datos/SeleccionadorRepo.php';
    $repo = new SeleccionadorRepo();
    $clientes= $repo->obtenerDeportistas();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Deportistas - <?php echo $_GET["user"]; ?></title>
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
        <a href="verDeportista.php?user=<?php echo $_GET["user"]; ?>"><p id="opcionActual">Ver deportista</p></a>
        <a href="crearClub_Taller.php?user=<?php echo $_GET["user"]; ?>"><p>Agregar clubes/talleres</p></a>
        <a href="armarEquipos.php?user=<?php echo $_GET["user"]; ?>"><p>Armar equipos</p></a>
        <a href="verEquipos.php?user=<?php echo $_GET["user"]; ?>">
                <p>Ver equipos</p>
            </a>
    </div>
        <div id="contenidoPrincipal">
            <h1>Listado de los deportistas</h1>
            <table>
        <thead>
            <tr>
                <th>Deporte</th>
                <th>Posicion</th>
                <th>Numero_Socio</th>
                <th>Nombre</th>
                <th>Apellido</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientes as $cliente):?>
                <tr>
                    <td><strong><?php echo htmlspecialchars($cliente->nombreD); ?></strong></td>
                    <td><?php echo htmlspecialchars($cliente->Posicion); ?></td>
                    <td><strong><?php echo $cliente->Numero_Socio; ?></strong></td>
                    <td><?php echo $cliente->Nombre; ?></td>
                    <td><?php echo $cliente->Apellido; ?></td>
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