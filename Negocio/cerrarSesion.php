<?php
session_start();
$_SESSION["logueado"]=false;
header("Location:../Presentacion/login.html");
exit();
?>