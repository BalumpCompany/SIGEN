<?php
include("conexion_db.php");
session_start();
$queryLogin="SELECT Contrasena,Rol FROM Usuario WHERE Username='".$_GET["user"]."';";
$fetch=$conexionBDUsuario->query($queryLogin)->fetch_assoc();
var_dump($fetch["Contrasena"]) ;
var_dump($_GET["pass"]);
if ($_GET["pass"]===$fetch["Contrasena"]) {
    header("Location: ../Presentacion/ventana".$fetch["Rol"].".php?user=".$_GET["user"]);
    $_SESSION["logueado"]=true;
    $_SESSION["user"]=$_GET["user"];
    $_SESSION["rol"]=$fetch["Rol"];
}else{
    header("Location: ../Presentacion/login.html");
}
exit();
?>