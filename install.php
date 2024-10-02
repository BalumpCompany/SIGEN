<?php
$server = "localhost";
$usuario = "root";
$contrasena = "";
$conexionBD = new mysqli($server, $usuario, $contrasena);
if ($conexionBD->connect_error) {
    die("Falló la conexión " . $conexionBD->connect_error);
}
if(!$conexionBD->multi_query(file_get_contents("base.sql"))){
    die ("Error al crear la base de datos, log: " . $conexionBD->error);
}
echo "<a href='Ejemplos/cargarEjemplos.php'>Cargar ejemplos a la base de datos</a>";
$conexionBD->close();
?>

