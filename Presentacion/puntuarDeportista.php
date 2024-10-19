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
        <a href="verClientes.php?user=<?php echo $_GET["user"]; ?>"><p>Ver clientes asignados</p></a>
        <a href="agruparEjercicios.php?user=<?php echo $_GET["user"]; ?>"><p>Agrupar ejercicios</p></a>
        <a href="modificarMinimos.php?user=<?php echo $_GET["user"]; ?>"><p>Modificar mínimos</p></a>
        <a href="seleccHorarioTrabajo.php?user=<?php echo $_GET["user"]; ?>"><p>Seleccionar horario</p></a>
    </div>
    <div id="contenidoPrincipal">
        <h1>Puntuación deportista (<?php echo $_GET["nombre"];?>)</h1>
        <form action="../Negocio/puntuarDeportista.php" method="post">
            <input type="hidden" name="user" value="<?php echo $_GET["user"] ?>">
            <input type="number" name="nroSocio" value="<?php echo $_GET["nro"]; ?>" hidden>
        <table>
            <thead>
                <th>Item</th>
                <th>Puntaje esperado</th>
                <th>Puntaje obtenido</th>
            </thead>
            <tbody>
                <tr>
                    <td>Cumplimiento agenda</td>
                    <td><input style="font-size:0.6vw;" type="number" name="cumplimientoE" required></td>
                    <td><input style="font-size:0.6vw;" type="number" name="cumplimientoO" required></td>
                </tr>
                <tr>
                    <td>Resistencia anaerobica</td>
                    <td><input style="font-size:0.6vw;" type="number" name="resAnaerobicaE" required></td>
                    <td><input style="font-size:0.6vw;" type="number" name="resAnaerobicaO" required></td>
                </tr>
                <tr>
                    <td>Fuerza muscular</td>
                    <td><input style="font-size:0.6vw;" type="number" name="fuerzaE" required></td>
                    <td><input style="font-size:0.6vw;" type="number" name="fuerzaO" required></td>
                </tr>
                <tr>
                    <td>Resistencia muscular</td>
                    <td><input style="font-size:0.6vw;" type="number" name="resMuscularE" required></td>
                    <td><input style="font-size:0.6vw;" type="number" name="resMuscularO" required></td>
                </tr>
                <tr>
                    <td>Flexibilidad</td>
                    <td><input style="font-size:0.6vw;" type="number" name="flexibilidadE" required></td>
                    <td><input style="font-size:0.6vw;" type="number" name="flexibilidadO" required></td>
                </tr>
                <tr>
                    <td>Resistencia a la monotonía</td>
                    <td><input style="font-size:0.6vw;" type="number" name="resMonotoniaE" required></td>
                    <td><input style="font-size:0.6vw;" type="number" name="resMonotoniaO" required></td>
                </tr>
                <tr>
                    <td>Resilencia</td>
                    <td><input style="font-size:0.6vw;" type="number" name="resilenciaE" required></td>
                    <td><input style="font-size:0.6vw;" type="number" name="resilenciaO" required></td>
                </tr>
            </tbody>
        </table>
            <button style="font-family:Inter; width:30vw; font-size:1vw; background-color:#e0e0e0; border:none; border-radius:10px; padding:0.5vw;">Enviar</button>
        </form>
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