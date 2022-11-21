<?php

require("conectarDB.php");
session_start();
$conexion = conectar();
if(isset($_SESSION["usuario"])){
    $user = $_SESSION["usuario"];
    $sentencia = 'DELETE FROM usuarios WHERE Nombre="'.$user.'"';
    $sentencia2 = 'DELETE FROM biblioteca WHERE Usuario="'.$user.'"';
    $sentencia3 = 'DELETE FROM listadeseos WHERE Usuario="'.$user.'"';
    mysqli_query($conexion,$sentencia);
    mysqli_query($conexion,$sentencia2);
    mysqli_query($conexion,$sentencia3);
}
session_destroy();
header("Location:../IndexPrincipal.php");

?>

