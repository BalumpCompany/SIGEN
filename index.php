<?php
session_start();
$_SESSION["logueado"]=false;
header("Location: ./Presentacion/index.php");
exit();
?>