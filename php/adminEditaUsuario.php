<?php
require("conectarDB.php");

$nombre = trim($_POST['NombreUsuario']);
$contraseña = trim($_POST['ContraseñaUsuario']);
$email = trim($_POST['EmailUsuario']);
$tlf = trim($_POST['TlfUsuario']);
$rol = $_POST['RolUsuario'];

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
if(preg_match($exp_nombre,$nombre)){
    $valNombre=true;
}
else{
    $valNombre=false;
}

if(preg_match($exp_contraseña,$contraseña)){
    $valContraseña=true;
}
else{
    $valContraseña=false;
}

if(preg_match($exp_email,$email)){
    $valEmail=true;
}
else{
    $valEmail=false;
}

if(preg_match($exp_telefono,$tlf)){
    $valTelefono=true;
}
else{
    $valTelefono=false;
}

$usuarioValido = true;

//Si todo esta correcta hacemos la conexion a la base de datos
if($valNombre==true && $valContraseña==true && $valEmail==true && $valTelefono==true){

    //con la conexion comprobamos que ese nombre de usuario no este en uso
    $conexion = conectar();
    $sentencia2 = 'SELECT Nombre FROM `usuarios`';
    $consulta2 = mysqli_query($conexion,$sentencia2);
    while($fila=$consulta2->fetch_assoc()){
        if($fila['Nombre']==$nombre){
            $usuarioValido = false;
            exit();
        }
    }

    //si el nombre es valido hacemos la sentencia para guardar al usuario en la base de datos
    if($usuarioValido == true){
        $conexion = conectar();
        $sentencia2 = 'SELECT FROM `usuarios` where Nombre = "'.$nombre.'"';
        $consulta2 = mysqli_query($conexion,$sentencia2);
        $sentencia = 'INSERT INTO usuarios (`Nombre`, `Contraseña`, `Email`, `Telefono`, `Rol`) 
                VALUES ("'.$nombre.'", "'.$contraseña.'", "'.$email.'", "'.$telefono.'", "'.$rol.'")';
    
        $consulta = mysqli_query($conexion,$sentencia);
        if($consulta){
            session_start();
            $_SESSION['usuario'] = $nombre;
        }
    }
}
header('location:../IndexPrincipal.php');

?>