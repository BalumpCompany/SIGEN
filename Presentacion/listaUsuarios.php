<?php
require '../Datos/Usuario.php';
require '../Datos/UsuarioRepo.php';

$repo = new UsuarioRepo();
$usuarios = $repo->obtenerTodos();
session_start();
if ($_SESSION["logueado"] == true && $_SESSION["rol"] == "Avanzado") {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lista de usuarios - <?php echo $_GET["user"]; ?></title>
        <link rel="stylesheet" href="styleVerEjercicios.css">
        <link rel="icon" href="recursos/icono.png">
    </head>

    <body>
        <nav>
            <a href="index.php"><img src="recursos/header_beige.jpg" alt="Heracles" id="imgNav"></a>
            <form action="../Negocio/cerrarSesion.php" method="post" onsubmit="return confirmacion()"><button id="cerrarSesion">Cerrar sesión</button></form>
        </nav>
        <div id="barraLateral">
            <a href="modificarEjercicios.php?user=<?php echo $_GET["user"]; ?>">
                <p>Modificar ejercicios</p>
            </a>
            <a href="crearUsuario.php?user=<?php echo $_GET["user"]; ?>">
                <p>Crear usuario</p>
            </a>
            <a href="listaUsuarios.php?user=<?php echo $_GET["user"]; ?>">
                <p id="opcionActual">Listado usuarios</p>
            </a>
        </div>
        <div id="contenidoPrincipal">
            <h1>Lista de Usuarios</h1>
            <table>
                <thead>
                    <tr>
                        <th>Nombre de usuario</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>E-Mail</th>
                        <th>Rol</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $usuario): ?>
                        <tr>
                            <td><strong><?php echo $usuario->Username; ?></strong></td>
                            <td><?php echo $usuario->Nombre; ?></td>
                            <td><?php echo $usuario->Apellido; ?></td>
                            <td><?php echo $usuario->Email; ?></td>
                            <td><?php echo $usuario->Rol; ?></td>
                            <td>
                                <form action="formularioUsuario.php?user=<?php echo $_GET["user"]; ?>" method="post"><input
                                        type="hidden" name="username" value="<?php echo $usuario->Username; ?>"><button
                                        style="height: 3vw; background-color:white; border:none; border-radius:10px; font-family:Inter; font-size:1vw;">Modificar</button>
                                </form>
                            </td>
                            <td>
                                <form action="../Negocio/eliminarUsuario.php?user=<?php echo $_GET["user"]; ?>" method="post">
                                    <input type="hidden" name="username" value="<?php echo $usuario->Username; ?>">
                                    <button style="height: 3vw; background-color:white; border:none; border-radius:10px; font-family:Inter; font-size:1vw;">Eliminar</button>
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