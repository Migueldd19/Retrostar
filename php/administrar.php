<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="/css/administrar.css">

    <!-- Boostrap -->
    

    <!-- JAVASCRIPT -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"> </script>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>

    <!-- ICONOS -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <title>Administrar</title>
    
    
</head>
<body>
    <?php
    require("conectarDB.php");

    $users = conectar()->query('SELECT * FROM `usuarios`');
    ?>

    <div class="contenedor">
        <div class="usuarios">
            <h1>Usuarios</h1>
            <table class="tbUsusarios">
            <tr>
                <th>Nombre</th>
                <th>ID</th>
                <th>Contraseña</th>
                <th>Email</th>
                <th>Telefono</th>
                <th>Imagen</th>
                <th>Rol</th>
            </tr>
            <?php
                while ($row = $users->fetch_assoc()){
            ?>
                    <tr>
                        <td><?php print $row['Nombre']; ?></td>
                        <td><?php print $row['IDusuario']; ?></td>
                        <td><?php print $row['Contraseña']; ?></td>
                        <td><?php print $row['Email']; ?></td>
                        <td><?php print $row['Telefono']; ?></td>
                        <td><img src="/Imagenes/<?php print $row['Imagen'] ?>" alt=""></td>
                        <td><?php print $row['Rol']; ?></td>
                        <i class="fa-solid fa-pen-to-square"></i>
                    </tr>
            <?php
                }
            ?>
            </table>
        </div>
        <div class="juegos">

        </div>
    </div>



</body>