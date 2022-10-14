<?php

define('NUM_ITEMS_BY_PAGE', 6);

//aqui hacemos la conexion a la base de datos y comprobamos errores
function conectar() {

    $db = new mysqli("localhost","root","","retrostar");
    $error = $db->connect_errno;
    if ($error!=null){
        print "Error $error conectando a la base de datos: $db->connect_errno";
        return exit();
    }
    else{
        return $db;
    }
}

?>