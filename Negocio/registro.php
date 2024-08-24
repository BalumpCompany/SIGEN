<?php
include("conexion_db.php");
if($_GET["pass"]===$_GET["pass2"]){
$queryRegistro= "INSERT INTO Usuario VALUES('".$_GET["user"]."','".$_GET["nom"]."','".$_GET["ape"]."','".$_GET["mail"]."','".$_GET["pass"]."','Cliente');";
}else{
    header("Location: ../Presentacion/registro.html");
    exit();
}
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
<body style="background-color:black; display:flex; flex-direction:column; align-items:center; width:100vw;">
    <img src="recursos/logo_registro.jpg" alt="logo" style="width:10vw; margin-bottom:12vw; margin-top:-23vw;">

    <div style="background-color:gray; border-style:none; border-radius:10px; text-align:center; padding:1.5vw; font-family:Arial; font-size:1.2vw;">Se ha registrado con éxito <br><a style="color:#f9e8b2;" href="../Presentacion/login.html">Ir al login</a></div>
</body>
</html>