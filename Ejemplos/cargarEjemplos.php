<?php
$server = "localhost";
$usuario = "root";
$contrasena = "";
$nombreBDUsuario = "heracles_bd";
$conexionBD = new mysqli($server, $usuario, $contrasena, $nombreBDUsuario);
if ($conexionBD->connect_error) {
    die("Falló la conexión " . $conexionBD->connect_error);
}
$query = file_get_contents("usuariosEjemplo.sql").file_get_contents("ejerciciosEjemplo.sql").file_get_contents("calificacion.sql").file_get_contents("cronograma.sql").file_get_contents("deportes.sql").file_get_contents("sede.sql").file_get_contents("estados.sql");
if(!$conexionBD->multi_query($query)){
    die("Falló la inserción de los ejemplos, log: " . $conexionBD->error);
}
$conexionBD->close();
echo "La instalación se ha realizado de manera correcta";
?>