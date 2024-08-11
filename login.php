<?php
include("conexion_db.php");
$queryLogin="SELECT Contrasena,Rol FROM Usuario WHERE Username='".$_GET["user"]."';";
$fetch=$conexionBDUsuario->query($queryLogin)->fetch_assoc();
var_dump($fetch["Contrasena"]) ;
var_dump($_GET["pass"]);
if ($_GET["pass"]===$fetch["Contrasena"]) {
    header("Location:ventana".$fetch["Rol"].".php?user=".$_GET["user"]);
}else{
    header("Location:login.html");
}
exit();
?>