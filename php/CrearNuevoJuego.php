<?php
require("conectarDB.php");
$nombre = $_POST['NombreJuego'];
$descripcion = $_POST['descripcionJuego'];
$precio = $_POST['precioJuego'];

$valNombre=false;
$valDescripcion=false;
$valPrecio=false;

if($nombre != ''){
    $valNombre=true;
}
if($descripcion != '' || $descripcion != null){
    $valDescripcion=true;
}
if(is_numeric($precio)){
    $valPrecio=true;
}

if($valNombre == true && $valDescripcion == true && $valPrecio == true){
    $conexion = conectar();
    $rutaSemi = '..\Imagenes\ ';
    $ruta1 = str_replace(" ","",$rutaSemi);
    $rutaDestino = $ruta1.$_FILES['imagenJuego']['name'];
    $rutaDestino2= str_replace(" ","",$rutaDestino);
    $rutaOrigen = $_FILES['imagenJuego']['tmp_name'];
    $extensiones = array(0=>'image/jpg',1=>'image/jpeg',2=>'image/png');
    if ( in_array($_FILES['imagenJuego']['type'], $extensiones)) {
        if( move_uploaded_file ( $rutaOrigen, $rutaDestino2 ) ) {
            $sentencia = 'INSERT INTO juegos (`Nombre`, `Descripcion`, `Precio`, `Imagen`) 
            VALUES ("'.$nombre.'", "'.$descripcion.'", "'.$precio.'", "'.$_FILES['imagenJuego']['name'].'")';
            $consulta2 = mysqli_query($conexion,$sentencia); 
        }
    }
}
header("Location:../IndexPrincipal.php");


?>
