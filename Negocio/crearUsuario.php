<?php
require '../Datos/Usuario.php';
require '../Datos/UsuarioRepo.php';

$username=$_POST["username"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$mail = $_POST["mail"];
$contrasena = password_hash($_POST["contrasena"],PASSWORD_BCRYPT,["cost" => 10]);
$rol = $_POST["rol"];


$usuario = new Usuario($username, $nombre, $apellido, $mail, $contrasena, $rol);
$repo = new UsuarioRepo();
$repo->guardar($usuario);
if($rol==="Cliente"){
    include '../Datos/Cliente.php';
    include '../Datos/ClienteRepo.php';

    $repoCliente = new ClienteRepo();
    $cliente = new Cliente(NULL,$nombre,$apellido);
    $repoCliente->guardar($cliente,$username);
}else if($rol==="Coach"){
    include '../Datos/Entrenador.php';
    include '../Datos/EntrenadorRepo.php';

    $repoEntrenador = new EntrenadorRepo();
    $entrenador = new Entrenador(NULL,$nombre);
    $repoEntrenador->guardar($entrenador,$username);
}
else if($rol==="Seleccionador"){
    include '../Datos/Seleccionador.php';
    include '../Datos/SeleccionadorRepo.php';

    $repoSeleccionador = new SeleccionadorRepo();
    $seleccionador = new Seleccionador(NULL,$nombre);
    $repoSeleccionador->guardar($seleccionador,$username);
}
header("Location: ../Presentacion/crearUsuario.php?user=".$_POST["user"]);
exit();
?>