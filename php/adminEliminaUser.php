<?php
    require("conectarDB.php");
    
    $user = $_COOKIE['Usuario'];
    $userValido = false;
    $users = conectar()->query('SELECT * FROM usuarios Where Nombre="'.$user.'"');
    while ($row = $users->fetch_assoc()){
        if($row['Rol'] == 'Admin'){
            $userValido = false;
        }
        else{
            $userValido = true;
        }
    }

    if($userValido){
        $conexion = conectar();
        $sentencia = 'DELETE FROM usuarios WHERE Nombre="'.$user.'"';
        $sentencia2 = 'DELETE FROM biblioteca WHERE Nombre="'.$user.'"';
        $sentencia3 = 'DELETE FROM listadeseos WHERE Nombre="'.$user.'"';
        mysqli_query($conexion,$sentencia);
        mysqli_query($conexion,$sentencia2);
        mysqli_query($conexion,$sentencia3);
        header("location:/IndexPrincipal.php");
    }
    else{
        header("location:/IndexPrincipal.php");
    }
?>