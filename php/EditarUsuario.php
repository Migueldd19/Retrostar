<?php
require("conectarDB.php");

session_start();
$usuario = $_SESSION["usuario"];

$contraseña = $_POST['ContraseñaUsuario'];
$email = $_POST['EmailUsuario'];
$telefono = $_POST['TlfUsuario'];


//variables para comprobaciones
$valContraseña=false;
$valEmail=false;
$valTelefono=false;
$valImagen=false;

//espresiones regulares
$exp_contraseña = "/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/";
$exp_email = "/^[\w]+@{1}[\w]+\.+[a-z]{2,3}$/";
$exp_telefono = "/^[9|6]{1}([\d]{2}[-]*){3}[\d]{2}$/";

//hacemos las comprobaciones para saber si los campos cumplen las condiciones

if($contraseña != null){
    if(preg_match($exp_contraseña,$contraseña)){
        $valContraseña=true;

    }
    else{
        $valContraseña=false;
    }
}

if($email != null){
    if(preg_match($exp_email,$email)){
        $valEmail=true;
    }
    else{
        $valEmail=false;
    }
}

if($telefono != null){
    if(preg_match($exp_telefono,$telefono)){
        $valTelefono=true;
    }
    else{
        $valTelefono=false;
    }
}



$conexion = conectar();

if($valContraseña==true){
    $sentencia = 'UPDATE usuarios SET Contraseña="'.$contraseña.'" WHERE Nombre="'.$usuario.'"';
    $consulta2 = mysqli_query($conexion,$sentencia);
}

if($valEmail==true){
    $sentencia = 'UPDATE usuarios SET Email="'.$email.'" WHERE Nombre="'.$usuario.'"';
    $consulta2 = mysqli_query($conexion,$sentencia);
}

if($valTelefono==true){
    $sentencia = 'UPDATE usuarios SET Telefono="'.$telefono.'" WHERE Nombre="'.$usuario.'"';
    $consulta2 = mysqli_query($conexion,$sentencia);
}


$rutaSemi = "..\Imagenes\ ";
$rutaDestino = $rutaSemi.$rutaDestino;
$rutaDestino2= str_replace(" ","",$rutaDestino);
$rutaOrigen = $_FILES['ImagenUsuario']['tmp_name'];
$extensiones = array(0=>'image/jpg',1=>'image/jpeg',2=>'image/png');
//$max_tamaño = 1024 * 1024 * 8;
if(isset($_FILES["ImagenUsuario"]) && $_FILES["ImagenUsuario"]["name"]){
    if ( in_array($_FILES['ImagenUsuario']['type'], $extensiones) ) {
        //if ( $_FILES['ImagenUsuario']['size']< $max_tamaño ) {
            if( move_uploaded_file ( $rutaOrigen, $rutaDestino2 ) ) {
                $sentencia = 'UPDATE usuarios SET Imagen="'.$_FILES['ImagenUsuario']['name'].'" WHERE Nombre="'.$usuario.'"';
                $consulta2 = mysqli_query($conexion,$sentencia); 
                ?>
                cargarPagina(e);
                <?php 
            }
        //}
   }
}
header("Location:../IndexPrincipal.php");
?>