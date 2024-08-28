<?php
include("conexion_db.php");
session_start();
$queryLogin="SELECT Contrasena,Rol FROM Usuario WHERE Username='".$_POST["user"]."';";
$fetch=$conexionBDUsuario->query($queryLogin)->fetch_assoc();
var_dump($fetch["Contrasena"]) ;
var_dump($_POST["pass"]);
if ($_POST["pass"]===$fetch["Contrasena"]) {
    header("Location: ../Presentacion/ventana".$fetch["Rol"].".php?user=".$_POST["user"]);
    $_SESSION["logueado"]=true;
    $_SESSION["user"]=$_POST["user"];
    $_SESSION["rol"]=$fetch["Rol"];
}else{
    header("Location: ../Presentacion/login.html");
}
exit();
?>