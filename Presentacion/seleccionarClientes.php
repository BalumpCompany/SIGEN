<?php
session_start();
if ($_SESSION["logueado"] == true && $_SESSION["rol"] == "Seleccionador") {
    require '../Datos/SeleccionadorRepo.php';
    $repo = new SeleccionadorRepo();
    $clientes = $repo->obtenerParaSeleccionar();
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ventana Seleccionador - <?php echo $_GET["user"]; ?></title>
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
            <a href="seleccionarClientes.php?user=<?php echo $_GET["user"]; ?>">
                <p id="opcionActual">Seleccionar clientes</p>
            </a>
            <a href="verDeportista.php?user=<?php echo $_GET["user"]; ?>">
                <p>Ver deportista</p>
            </a>
            <a href="crearClub_Taller.php?user=<?php echo $_GET["user"]; ?>">
                <p>Agregar clubes/talleres</p>
            </a>
            <a href="armarEquipos.php?user=<?php echo $_GET["user"]; ?>">
                <p>Armar equipos</p>
            </a>
            <a href="verEquipos.php?user=<?php echo $_GET["user"]; ?>">
                <p>Ver equipos</p>
            </a>
        </div>
        <div id="contenidoPrincipal">
            <h1>Seleccionar clientes</h1>
            <table>
                <thead>
                    <tr>
                        <th>N° Socio</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Deporte</th>
                        <th>Posicion</th>
                        <th>Opción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($clientes as $cliente): ?>
                        <tr>
                            <td><strong><?php echo htmlspecialchars($cliente->Numero_Socio); ?></strong></td>
                            <td><?php echo htmlspecialchars($cliente->Nombre); ?></td>
                            <td><?php echo $cliente->Apellido; ?></td>
                            <td><?php echo $cliente->nombreD; ?></td>
                            <td><?php echo $cliente->Posicion; ?></td>
                            <td>
                                <form action="../Negocio/seleccionarCliente.php" method="post"><input type="hidden" name="nro"
                                        value="<?php echo $cliente->Numero_Socio; ?>"><input type="hidden" name="user"
                                        value="<?php echo $_GET["user"]; ?>"><input type="hidden" name="deporte" value="<?php echo $cliente->ID_Deporte?>"><button
                                        style="height: 2vw; background-color:#f9f8d2; border:none; border-radius:10px; font-family:Inter; font-size:1vw;">Seleccionar</button>
                                </form>
                            </td>
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
} else {
    header("Location:index.php");
    exit();
}
?>