<?php
include("conexion_db.php");
$queryLogin="SELECT Contrasena FROM Usuario WHERE Username='".$_GET["user"]."';";
$contra=$conexionBDUsuario->query($queryLogin)->fetch_assoc();
var_dump($contra["Contrasena"]) ;
var_dump($_GET["pass"]);
if ($_GET["pass"]===$contra["Contrasena"]) {
    header("Location:ventanaCliente.php?user=paulo");
}else{
    header("Location:login.html");
}
exit();
?>