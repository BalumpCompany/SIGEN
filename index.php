<?php
session_start();
$_SESSION["logueado"]=false;
header("Location: ./SIGEN/Presentacion/index.php");
exit();
?>