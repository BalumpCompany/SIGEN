<?php
session_start();
if ($_SESSION["logueado"] == true && $_SESSION["rol"] == "Admin") {
    require '../Datos/SucursalRepo.php';
    $repo = new SucursalRepo();
    $sucursal = $repo->obtener($_GET["idSede"]);
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Modificar Sede - <?php echo $_GET["user"]; ?></title>
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
            <a href="verClientesAdmin.php?user=<?php echo $_GET["user"]; ?>">
                <p>Ver clientes</p>
            </a>
            <a href="verSucursales.php?user=<?php echo $_GET["user"]; ?>">
                <p>Ver sucursales</p>
            </a>
            <a href="crearSucursal.php?user=<?php echo $_GET["user"]; ?>">
                <p>Crear sucursales</p>
            </a>

        </div>
        <div id="contenidoPrincipal">
            <h1>Modificar Sede - <?php echo $sucursal->Nombre; ?></h1>
            <form action="../Negocio/modificarSede.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="user" value="<?php echo $_GET["user"]; ?>">
                <input type="hidden" name="idSede" value="<?php echo $sucursal->ID_sede; ?>">
                <label for="nombre" style="font-family:Inter; font-size:0.83vw;">Nombre de sucursal </label><input type="text" name="nombre"
                    style="width: 21.4vw; font-family:Inter; font-size:0.83vw;" required value="<?php echo $sucursal->Nombre; ?>"><br>
                <label for="direccion" style="font-family:Inter; font-size:0.83vw;">Direccion </label><input type="text" name="direccion"
                    style="width: 25.55vw; font-family:Inter; font-size:0.83vw;" required value="<?php echo $sucursal->Direccion; ?>"><br>
                <label for="lugares_maximos" style="font-family:Inter; font-size:0.83vw;">Lugares maximos </label><input type="number"
                    name="lugares_maximos" style="width: 22.4vw; font-family:Inter; font-size:0.83vw;" required value="<?php echo $sucursal->Lugares_Maximos; ?>"><br>
                <label for="logo" style="font-family:Inter; font-size:0.83vw;">Logo</label><input type="file" name="logo"
                    style="width: 22.22vw; font-family:Inter; font-size:0.83vw;" accept="image/png, image/jpeg" required value="<?php echo $sucursal->Logo; ?>"><br>
                <label for="textos" style="font-family:Inter; font-size:0.83vw;">Textos</label><input type="text" name="textos"
                    style="width: 26.9vw; font-family:Inter; font-size:0.83vw;" value="<?php echo $sucursal->Textos_Editables; ?>"><br>
                <button
                    style="font-family:Inter; width:30vw; font-size:1vw; background-color:#e0e0e0; border:none; margin-top:0.5vw; border-radius:10px; padding:0.5vw;">Enviar</button>
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