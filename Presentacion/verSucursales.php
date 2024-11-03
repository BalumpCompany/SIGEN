<?php
session_start();
if($_SESSION["logueado"]==true && $_SESSION["rol"]=="Admin"){
    require '../Datos/SucursalRepo.php';
    $repo = new SucursalRepo();
    $sucursales = $repo->obtenerTodos();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Sucursales - <?php echo $_GET["user"]; ?></title>
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
        <a href="verSucursales.php?user=<?php echo $_GET["user"]; ?>"><p id="opcionActual">Ver sucursales</p></a>
        <a href="crearSucursal.php?user=<?php echo $_GET["user"]; ?>"><p>Crear sucursales</p></a>
        
    </div>
    <div id="contenidoPrincipal">
    <h1>Listado de sucursales</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Logo</th>
                <th>Nombre</th>
                <th>Direccion</th>
                <th>Lugares Maximos</th>
                <th>Texto Editable</th>
                <th>Opción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sucursales as $sucursal):?>
                <tr>
                    <td><?php echo $sucursal->ID_sede; ?></td>
                    <td><?php echo "<img src='../".$sucursal->Logo."' style='width:6vw;'" ?></td>
                    <td><?php echo $sucursal->Nombre; ?></td>
                    <td><?php echo $sucursal->Direccion; ?></td>
                    <td><?php echo $sucursal->Lugares_Maximos; ?></td>
                    <td><?php echo $sucursal->Textos_Editables; ?></td>
                    <td><form action="formularioModificarSede.php?" method="get">
                        <input type="hidden" name="user" value="<?php echo $_GET["user"]; ?>">
                        <input type="hidden" name="idSede" value="<?php echo $sucursal->ID_sede; ?>">
                        <button style="height: 2vw; background-color:#f9f8d2; border:none; border-radius:10px; font-family:Inter; font-size:1vw;">Modificar</button>
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
}else{
    header("Location:index.php");
    exit();
}
?>