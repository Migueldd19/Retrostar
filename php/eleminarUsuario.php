<?php

require("conectarDB.php");
session_start();
$conexion = conectar();
if(isset($_SESSION["usuario"])){
    $user = $_SESSION["usuario"];
    $sentencia = 'DELETE FROM usuarios WHERE Nombre="'.$user.'"';
    $consulta2 = mysqli_query($conexion,$sentencia);
}
session_destroy();
header("Location:../IndexPrincipal.php");

?>

