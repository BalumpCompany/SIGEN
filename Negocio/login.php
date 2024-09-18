<?php
require '../Datos/Usuario.php';
require '../Datos/UsuarioRepo.php';
session_start();
$repo = new UsuarioRepo();
$usuario = $repo->obtener($_POST["user"], $_POST["pass"])[0];

if (isset($usuario->Contrasena)) {
    header("Location: ../Presentacion/ventana".$usuario->Rol.".php?user=".$_POST["user"]);
    $_SESSION["logueado"]=true;
    $_SESSION["user"]=$_POST["user"];
    $_SESSION["rol"]=$usuario->Rol;
}else{
    //header("Location: ../Presentacion/login.html");
    echo "<script>alert($usuario)</script>";
}
exit();
?>