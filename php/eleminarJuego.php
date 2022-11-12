<?php

require("conectarDB.php");   
$juego = $_COOKIE['Juego'];
$conexion = conectar();
$sentencia = 'DELETE FROM juegos WHERE Nombre="'.$juego.'"';
$sentencia2 = 'DELETE FROM biblioteca WHERE Juego="'.$juego.'"';
$sentencia3 = 'DELETE FROM listadeseos WHERE Juego="'.$juego.'"';
mysqli_query($conexion,$sentencia);
mysqli_query($conexion,$sentencia2);
mysqli_query($conexion,$sentencia3);
header("location:/IndexPrincipal.php");

?>