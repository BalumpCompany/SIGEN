<?php
require '../Datos/Ejercicio.php';
require '../Datos/EjercicioRepo.php';

$nombre = $_POST["nombre"];
$descripcion = $_POST["desc"];
$id = $_POST["id"];
$gif = $_POST["gif"];

$ejercicio = new Ejercicio($id, $nombre, $descripcion, $gif);
$repo = new EjercicioRepo();
var_dump($repo->modificar($ejercicio));

header("Location: ../Presentacion/modificarEjercicios.php?user=".$_POST["user"]);
exit();
?>