<?php
require("conectarDB.php");

$nombre = $_POST['Nombre_registro'];
$contraseña = $_POST['Contraseña_registro'];
$contraseña2 = $_POST['Contraseña2_registro'];
$email = $_POST['email_registro'];
$telefono = $_POST['Telefono_registro'];

//variables para comprobaciones
$valNombre=false;
$valContraseña=false;
$valContraseña2=false;
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

if($contraseña==$contraseña2){
    $valContraseña2=true;
}
else{
    $valContraseña2=false;
}

if(preg_match($exp_email,$email)){
    $valEmail=true;
}
else{
    $valEmail=false;
}

if(preg_match($exp_telefono,$telefono)){
    $valTelefono=true;
}
else{
    $valTelefono=false;
}

$usuarioValido = true;

//Si todo esta correcta hacemos la conexion a la base de datos
if($valNombre==true && $valContraseña==true && $valContraseña2==true && $valEmail==true && $valTelefono==true){

    //con la conexion comprobamos que ese nombre de usuario no este en uso
    $conexion = conectar();
    $sentencia2 = 'SELECT Nombre FROM `usuarios`';
    $consulta2 = mysqli_query($conexion,$sentencia2);
    while($fila=$consulta2->fetch_assoc()){
        if($fila['Nombre']==$nombre){
            $usuarioValido = false;
            print "Ese Usuario ya existe";
            exit();
        }
    }

    //si el nombre es valido hacemos la sentencia para guardar al usuario en la base de datos
    if($usuarioValido == true){
        $sentencia = 'INSERT INTO usuarios (`Nombre`, `Contraseña`, `Email`, `Telefono`) 
                VALUES ("'.$nombre.'", "'.$contraseña.'", "'.$email.'", "'.$telefono.'")';
    
        $consulta = mysqli_query($conexion,$sentencia);
        if($consulta){
            print "Nuevo usuario creado con exito";
        }
        else{
            print "Error ".$conexion->error; 
        }
    }
    
    $conexion->close();

}

?>