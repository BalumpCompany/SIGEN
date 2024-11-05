<?php
session_start();
if($_SESSION["logueado"]==true && $_SESSION["rol"]=="Seleccionador"){
    require '../Datos/Club_TallerRepo.php';
    $repo = new Club_TallerRepo();
    $talleres= $repo->obtenerTodos();
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
        <a href="verDeportista.php?user=<?php echo $_GET["user"]; ?>"><p>Ver deportista</p></a>
        <a href="crearClub_Taller.php?user=<?php echo $_GET["user"]; ?>"><p>Agregar clubes/talleres</p></a>
        <a href="armarEquipos.php?user=<?php echo $_GET["user"]; ?>"><p id="opcionActual">Armar equipos</p></a>
        <a href="verEquipos.php?user=<?php echo $_GET["user"]; ?>">
                <p>Ver equipos</p>
            </a>
    </div>
        <div id="contenidoPrincipal">
            <h1>Listado de los clubes/talleres</h1>
            <table>
        <thead>
            <tr>
                <th>ID taller</th>
                <th>Club / Taller</th>
                <th>Nombre</th>
                <th>Opción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($talleres as $taller):?>
                    <td><strong><?php echo htmlspecialchars($taller->ID_club_taller); ?></strong></td>
                    <td><?php echo htmlspecialchars($taller->Club_Taller); ?></td>
                    <td><?php echo htmlspecialchars($taller->Nombre); ?></td>
                    <td><form action="formularioEquipo.php" method="get">
                        <input type="hidden" name="id" value="<?php echo $taller->ID_club_taller;?>">
                        <input type="hidden" name="nombre" value="<?php echo $taller->Nombre;?>">
                        <input type="hidden" name="user" value="<?php echo $_GET["user"];?>">
                        <button style="height: 2vw; background-color:#f9f8d2; border:none; border-radius:10px; font-family:Inter; font-size:1vw;">Armar</button>
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