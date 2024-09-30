<?php
$conexion->query("INSERT INTO usuario VALUES ('cliente', 'Usuario1', 'Cliente', 'cliente@gmail.com', password_hash('Contrasena',PASSWORD_DEFAULT), 'Cliente'");
$conexion->query("INSERT INTO usuario VALUES ('admin', 'Usuario2', 'Admin', 'Admin@gmail.com', password_hash('Contrasena',PASSWORD_DEFAULT), 'Admin'");
$conexion->query("INSERT INTO usuario VALUES ('coach', 'Usuario3', 'Coach', 'coach@gmail.com', password_hash('Contrasena',PASSWORD_DEFAULT), 'Coach'");
$conexion->query("INSERT INTO usuario VALUES ('avanzado', 'Usuario4', 'Avanzado', 'avanzado@gmail.com', password_hash('Contrasena',PASSWORD_DEFAULT), 'Avanzado'");
$conexion->query("INSERT INTO usuario VALUES ('seleccionador', 'Usuario5', 'Seleccionador', 'seleccionador@gmail.com', password_hash('Contrasena',PASSWORD_DEFAULT), 'Seleccionador'");
$conexion->query("INSERT INTO usuario VALUES ('adminit', 'Usuario6', 'AdminIT', 'adminIT@gmail.com', password_hash('Contrasena',PASSWORD_DEFAULT), 'AdminTI'");
?>