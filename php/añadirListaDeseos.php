<?php
require("conectarDB.php");


session_start();
$nombre = $_SESSION["usuario"];
$juego = $_COOKIE['NombreJuego'];
$valido = true;

$result = conectar()->query('SELECT * FROM listadeseos WHERE Usuario = "'.$nombre.'"');
while ($row = $result->fetch_assoc()) {

    if($row['Juego']== $juego) {

        $valido = false;

    }
}

if($valido == true){
    $conexion = conectar();
    $sentencia = 'INSERT INTO listadeseos (Usuario, Juego) VALUES ("'.$nombre.'", "'.$juego.'")';
    $consulta = mysqli_query($conexion,$sentencia);
    if($consulta){
        print "Juego añadido a tu lista de deseos";
        header("Location:/ProyectoDAW/IndexPrincipal.php");
    }
    else{
        print "Error"; 
    }
                
}
else{
    header("Location:/ProyectoDAW/IndexPrincipal.php");
}

unset($_COOKIE['NombreJuego']);

?>