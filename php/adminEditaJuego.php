<?php
require("conectarDB.php");
$nombreJuego = $_COOKIE['Juego'];

$nombre = $_POST['nombreJuego'];
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

$conexion = conectar();

if($valNombre){
    $sentencia = 'UPDATE juegos SET Nombre="'.$nombre.'" WHERE Nombre="'.$nombreJuego.'"';
    $consulta2 = mysqli_query($conexion,$sentencia);
}

if($valDescripcion){
    $sentencia = 'UPDATE juegos SET Descripcion="'.$descripcion.'" WHERE Nombre="'.$nombreJuego.'"';
    $consulta2 = mysqli_query($conexion,$sentencia);
}

if($valPrecio){
    $sentencia = 'UPDATE juegos SET Precio="'.$precio.'" WHERE Nombre="'.$nombreJuego.'"';
    $consulta2 = mysqli_query($conexion,$sentencia);
}

$rutaSemi = '..\Imagenes\ ';
$ruta1 = str_replace(" ","",$rutaSemi);
$rutaDestino = $ruta1.$_FILES['imagenJuego']['name'];
$rutaDestino2= str_replace(" ","",$rutaDestino);
$rutaOrigen = $_FILES['imagenJuego']['tmp_name'];
$extensiones = array(0=>'image/jpg',1=>'image/jpeg',2=>'image/png');

if(isset($_FILES["imagenJuego"]) && $_FILES["imagenJuego"]["name"]){
    if ( in_array($_FILES['imagenJuego']['type'], $extensiones) ) {
        if( move_uploaded_file ( $rutaOrigen, $rutaDestino2 ) ) {
            $sentencia = 'UPDATE juegos SET Imagen="'.$_FILES['imagenJuego']['name'].'" WHERE Nombre="'.$usuario.'"';
            $consulta2 = mysqli_query($conexion,$sentencia); 
        }
   }
}
header("Location:../IndexPrincipal.php");


?>