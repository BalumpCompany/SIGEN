<?php
require '../Datos/Sucursal.php';
require '../Datos/SucursalRepo.php';

$logo = $_FILES["logo"];
$nombre = $_POST["nombre"];
$direccion = $_POST["direccion"];
$lugares_maximos = $_POST["lugares_maximos"];
//$logo = $_POST["logo"];
$textos = $_POST["textos"];

$sucursal = new Sucursal($nombre, $direccion, $lugares_maximos, "Imagenes/$nombre.png", $textos);    
$sucursalRepo = new SucursalRepo();
$sucursalRepo->guardar($sucursal);

move_uploaded_file($logo["tmp_name"], "../Imagenes/".$nombre.".png");

//$usuario = new Usuario($username, $nombre, $apellido, $mail, $contrasena, $rol);
//$repo = new UsuarioRepo();
//$repo->guardar($usuario);


header("Location: ../Presentacion/crearSucursal.php?user=".$_POST["user"]);
exit();
?>