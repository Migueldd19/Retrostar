<?php
    require("conectarDB.php");
    
    $user = $_COOKIE['Usuario'];
    $
    $users = conectar()->query('SELECT * FROM usuarios');
    while ($row = $users->fetch_assoc()){
        print($row['Nombre']);
    }
/*
    $sentencia = 'DELETE FROM usuarios WHERE Nombre="'.$user.'"';
    $consulta2 = mysqli_query($conexion,$sentencia);
    */

?>