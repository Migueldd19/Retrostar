<?php
require("conectarDB.php");

session_start();
$nombre = $_SESSION["usuario"];
$juego = $_COOKIE['NombreJuego'];

$valido = true;

$result = conectar()->query('SELECT * FROM biblioteca WHERE Usuario = "'.$nombre.'"');
while ($row = $result->fetch_assoc()) {

    if($row['Juego']== $juego) {

        $valido = false;

    }
}

if($valido == true){
    $conexion = conectar();
    $sentencia = 'INSERT INTO biblioteca (Usuario, Juego) VALUES ("'.$nombre.'", "'.$juego.'")';
    $consulta = mysqli_query($conexion,$sentencia);
    if($consulta){

        header("Location:../IndexPrincipal.php");
    }            
}
else{
    header("Location:../IndexPrincipal.php");
}

unset($_COOKIE['NombreJuego']);

?>