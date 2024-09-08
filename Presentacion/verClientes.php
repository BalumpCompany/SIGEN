<?php
session_start();
if($_SESSION["logueado"]==true && $_SESSION["rol"]=="Coach"){
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
        <a href="puntuarDeportista.php?user=<?php echo $_GET["user"]; ?>"><p>Puntuar deportista</p></a>
        <a href="verClientes.php?user=<?php echo $_GET["user"]; ?>"><p id="opcionActual">Ver clientes asignados</p></a>
        <a href="agruparEjercicios.php?user=<?php echo $_GET["user"]; ?>"><p>Agrupar ejercicios</p></a>
        <a href="modificarMinimos.php?user=<?php echo $_GET["user"]; ?>"><p>Modificar mínimos</p></a>
    </div>
    <h1>Listado de clientes</h1>
    <form action="" method="post"><input type="text" name="nombre" required style="width: 25vw; height: 2vw;"><button style="height: 2vw;">🔍︎Buscar</button></form>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Gif</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientes as $cliente):?>
                <tr>
                    <td><strong><?php echo htmlspecialchars($cliente->ID_Ejercicio); ?></strong></td>
                    <td><?php echo htmlspecialchars($cliente->Nombre); ?></td>
                    <td><?php echo $cliente->Descripcion; ?></td>
                    <td><?php echo $cliente->Gif; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
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