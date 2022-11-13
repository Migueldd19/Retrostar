<?php
require("conectarDB.php");

$nombre = trim($_POST['NombreUsuario']);
$contraseña = trim($_POST['ContraseñaUsuario']);
$email = trim($_POST['EmailUsuario']);
$tlf = trim($_POST['TlfUsuario']);
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



//Si todo esta correcta hacemos la conexion a la base de datos
if($valNombre==true && $valContraseña==true && $valEmail==true && $valTelefono==true){
    $usuarioValido = 0;
    //con la conexion comprobamos que ese nombre de usuario no este en uso
    $conexion = conectar();
    $sentencia2 = 'SELECT Nombre FROM `usuarios`';
    $consulta2 = mysqli_query($conexion,$sentencia2);
    while($fila=$consulta2->fetch_assoc()){
        if($fila['Nombre']==$_COOKIE['Usuario']){
            $usuarioValido++; 
        }
    }

    //si el nombre es valido hacemos la sentencia para guardar al usuario en la base de datos
    if($usuarioValido!=0){
        $conexion = conectar();
        $sentencia = 'UPDATE usuarios SET Nombre="'.$nombre.'", Contraseña="'.$contraseña.'", Email="'.$email.'", Telefono="'.$tlf.'", Rol="'.$rol.'" WHERE Nombre="'.$nombre.'"';
        $consulta = mysqli_query($conexion,$sentencia);
    }
}
header('location:../IndexPrincipal.php');

?>