<?php
require("conectarDB.php");

session_start();
$usuario = $_SESSION["usuario"];

$nombre = $_POST['NombreUsuario'];
$contraseña = $_POST['ContraseñaUsuario'];
$email = $_POST['EmailUsuario'];
$telefono = $_POST['TlfUsuario'];
$imagen = $_POST['ImagenUsuario'];

print($nombre);
//variables para comprobaciones
$valNombre=false;
$valContraseña=false;
$valEmail=false;
$valTelefono=false;
$valImagen=false;

//espresiones regulares
$exp_nombre = "/^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]+[\s]*)+$/";
$exp_contraseña = "/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/";
$exp_email = "/^[\w]+@{1}[\w]+\.+[a-z]{2,3}$/";
$exp_telefono = "/^[9|6]{1}([\d]{2}[-]*){3}[\d]{2}$/";

//hacemos las comprobaciones para saber si los campos cumplen las condiciones
if($nombre =! null){
    if(preg_match($exp_nombre,$nombre)){
        print("correcto");
        $valNombre=true;
    }
    else{
        $valNombre=false;
        print("incorrecto");
    }
}

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

if($imagen != null){
    $valImagen = true;
}
else{
    $valImagen = false;
}

$conexion = conectar();

if($valNombre==true){
    print("entra1");
    $sentencia = 'UPDATE usuarios SET Nombre="'.$nombre.'" WHERE Nombre="'.$usuario.'"';
    $consulta2 = mysqli_query($conexion,$sentencia);
}

if($valContraseña==true){
    print("entra2");
    $sentencia = 'UPDATE usuarios SET Contraseña="'.$contraseña.'" WHERE Nombre="'.$usuario.'"';
    $consulta2 = mysqli_query($conexion,$sentencia);
}

if($valEmail==true){
    print("entra3");
    $sentencia = 'UPDATE usuarios SET Email="'.$email.'" WHERE Nombre="'.$usuario.'"';
    $consulta2 = mysqli_query($conexion,$sentencia);
}

if($valTelefono==true){
    $sentencia = 'UPDATE usuarios SET Telefono="'.$telefono.'" WHERE Nombre="'.$usuario.'"';
    $consulta2 = mysqli_query($conexion,$sentencia);
}

if($valImagen==true){
    $sentencia = 'UPDATE usuarios SET Imagen="'.$imagen.'" WHERE Nombre="'.$usuario.'"';
    $consulta2 = mysqli_query($conexion,$sentencia);
}

$carpetaImagen = "Imagenes/";

if(isset($_FILES["ImagenUsuario"]) && $_FILES["archivo"]["name"][0]){

}