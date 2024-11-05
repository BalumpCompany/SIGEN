<?php
require '../Datos/Usuario.php';
require '../Datos/UsuarioRepo.php';
session_start();
$repo = new UsuarioRepo();
$usuario = $repo->obtener($_POST["user"])[0];

if (password_verify($_POST["pass"], $usuario->Contrasena)) {
    header("Location: ../Presentacion/ventana" . $usuario->Rol . ".php?user=" . $_POST["user"]);
    $_SESSION["logueado"] = true;
    $_SESSION["user"] = $_POST["user"];
    $_SESSION["rol"] = $usuario->Rol;
    if($usuario->Rol=="Cliente"){
        require '../Datos/ClienteRepo.php';
        $repoCliente=new ClienteRepo();
        $cliente=$repoCliente->obtener($_POST["user"]);
        $_SESSION["estado"]=$cliente[0]->activo;
    }
} else {
    header("Location: ../Presentacion/login.html");
}
exit();
