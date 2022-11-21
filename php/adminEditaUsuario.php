<?php
require("conectarDB.php");

$usuario = $_COOKIE['Usuario'];
$nombre = trim($_POST['NombreUsuario']);
$contraseña = trim($_POST['ContraseñaUsuario']);
$email = trim($_POST['EmailUsuario']);
$telefono = trim($_POST['TlfUsuario']);
$rol = $_POST['rol'];


$valNombre=false;
$valContraseña=false;
$valEmail=false;
$valTelefono=false;

//espresiones regulares
$exp_nombre = "/[A-Za-z]{2}|[0-9]{2}|[A-Za-z][0-9]/";
$exp_contraseña = "/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/";
$exp_email = "/^[\w]+@{1}[\w]+\.+[a-z]{2,3}$/";
$exp_telefono = "/^[9|6]{1}([\d]{2}[-]*){3}[\d]{2}$/";

//hacemos las comprobaciones para saber si los campos cumplen las condiciones
if($nombre != null){
    if(preg_match($exp_nombre,$nombre)){
        $valNombre=true;
    }
    else{
        $valNombre=false;
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


$conexion = conectar();

$sentenciarol = 'UPDATE usuarios SET Rol="'.$rol.'" WHERE Nombre="'.$usuario.'"';
$consulta2 = mysqli_query($conexion,$sentenciarol);

if($valContraseña==true){
    $has_pass = password_hash($contraseña, PASSWORD_DEFAULT);
    $sentencia = 'UPDATE usuarios SET Contraseña="'.$has_pass.'" WHERE Nombre="'.$usuario.'"';
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

if($valNombre==true){
    $sentencia = 'UPDATE usuarios SET Nombre="'.$nombre.'" WHERE Nombre="'.$usuario.'"';
    $consulta2 = mysqli_query($conexion,$sentencia);
}

header('location:../IndexPrincipal.php');

?>