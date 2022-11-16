<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    

    <!-- JavaScript -->
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.1.1.min.js"></script>
   
    <title>Login/Registro</title>

</head>
<?php

require("conectarDB.php");

$nombre = $_POST['Usuario_login'];
$contraseña = $_POST['Contraseña_login'];

$valNombre=false;
$valContraseña=false;

//espresiones regulares
$exp_nombre = "/[A-Za-z]{2}|[0-9]{2}|[A-Za-z][0-9]/";
$exp_contraseña = "/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/";

//comprobaciones que usuario y contraseña cumplen las condiciones
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

if($valNombre==true && $valContraseña==true){

    //comprobamos si hay una sesion iniciada
    session_start();
    //si hay sesion iniciada volvemos a la pagina principal
    if(isset($_SESSION["usuario"])){
        header("Location:../IndexPrincipal.php");
    }
    else{
        
        //si no hay sesion iniciada hacemos la conexion a la base de datos
        //$_COOKIE['Pagina']="login_registro.php";
        $conexion = conectar();
        $sentencia = 'SELECT * FROM usuarios Where Nombre="'.$nombre.'"';
        $consulta = mysqli_query($conexion,$sentencia);
        //comprobamos que el usuario esta en base de datos y coincide con la contraseña
        while($fila=$consulta->fetch_assoc()){
            ?>
            <script>
                    
                    alert("llega");
            </script>
            <?php
            if($fila['Nombre']==$nombre){
                $contraseña_DB = $fila['Contraseña'];
                print("nombre bien");
                $has_pass = password_verify($contraseña, $contraseña_DB);
                if($has_pass){
                    print("pass bien");
                    $_SESSION["usuario"] = $nombre;
                    if($fila['Imagen'] != "0"){
                        $_SESSION["imagen"] = $fila['Imagen'];
                    }
                    if($fila['Rol'] == "Admin"){
                        $_SESSION["rol"] = $fila['Rol'];
                    }
                    header("Location:/IndexPrincipal.php");
                }
                else{
                    ?>
                    <script>
                        document.cookie = "Pagina = login_registro.php";'Path=/'; 
                    </script>
                    <?php
                    header("Location:/IndexPrincipal.php");
                }
            }
            else{
                ?>
                <script>
                    document.cookie = "Pagina = login_registro.php";'Path=/';
                </script>
                <?php
                header("Location:../IndexPrincipal.php");
            }
        }
        ?>
        <script>
            document.cookie = "Pagina = login_registro.php";'Path=/';
        </script>
        <?php
        header("Location:../IndexPrincipal.php");
    }
}else{
    ?>
    <script>
        document.cookie = "Pagina = login_registro.php";'Path=/';
    </script>
    <?php
    header("Location:../IndexPrincipal.php");
}
?>