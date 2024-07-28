<?php
include("conexion_db.php");
$queryRegistro= "INSERT INTO Usuario VALUES('".$_GET["user"]."','".$_GET["nom"]."','".$_GET["ape"]."','".$_GET["mail"]."','".$_GET["pass"]."');";
echo $queryRegistro;
$conexionBDUsuario->query($queryRegistro);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>