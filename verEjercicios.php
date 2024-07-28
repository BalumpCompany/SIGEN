<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver ejercicios - <?php echo $_GET["user"]; ?></title>
    <link rel="stylesheet" href="styleVerEjercicios.css">
</head>
<body>
    <nav>
        <a href="index.html"><img src="recursos/header_beige.jpg" alt="Heracles" id="imgNav"></a>
    </nav>
    <div id="barraLateral">
        <a href="verEjercicios.php?user=<?php echo $_GET["user"]; ?>"><p id="opcionActual">Ver ejercicios</p></a>
        <a href="verCalificaciones.php?user=<?php echo $_GET["user"]; ?>"><p>Ver calificaciones</p></a>
        <a href="seleccionarHorario.php?user=<?php echo $_GET["user"]; ?>"><p>Seleccionar horario</p></a>
        <a href="seleccionarDepFis.php?user=<?php echo $_GET["user"]; ?>"><p>Seleccionar deporte/fisioterapia</p></a>
    </div>
    <h1>Elige una de las opciones</h1>
</body>
</html>