<?php
require '../Datos/Sucursal.php';
require '../Datos/SucursalRepo.php';

$logo = $_FILES["logo"];
$nombre = $_POST["nombre"];
$direccion = $_POST["direccion"];
$lugares_maximos = $_POST["lugares_maximos"];
$textos = $_POST["textos"];

$sucursal = new Sucursal($nombre, $direccion, $lugares_maximos, "Imagenes/$nombre.png", $textos);     
$sucursalRepo = new SucursalRepo();
$sucursalRepo->modificar($sucursal,$_POST["idSede"]);

move_uploaded_file($logo["tmp_name"], "../Imagenes/".$nombre.".png");


header("Location: ../Presentacion/verSucursales.php?user=".$_POST["user"]);
exit();
?>