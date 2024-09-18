<?php

$archivos = array(
    './ejerciciosEjemplo.sql',
    './usuariosEjemplo.sql'
);


$server = "localhost";
$usuario = "root";
$contrasena = "";
$nombreBDUsuario = "heracles_bd";
$conexionBD = new mysqli($server, $usuario, $contrasena, $nombreBDUsuario);
if ($conexionBD->connect_error) {
    die("Falló la conexión " . $conexionBD->connect_error);
}


foreach ($archivos as $archivo) {
    $query = file_get_contents($archivo);
    if ($conexionBD->multi_query($query)) {
        do {
            if ($result = $conexionBD->store_result()) {
                $result->free();
            }
        } while ($conexionBD->next_result());
        echo "Inserciones realizadas correctamente <br>";
    } else {
        echo "Error: " . $conexionBD->error;
    }
}
$conexionBD->close();
?>