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
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <title>Administrar</title>
    
    
</head>
<body>
    <?php
    require("conectarDB.php");

    $users = conectar()->query('SELECT * FROM `usuarios`');
    ?>

    <div class="contenedorAdmin">
        <div class="usuarios">
            <h1>Usuarios</h1>
            <table class="tbUsusarios">
            <tr>
                <th>Nombre</th>
                <th class="ocultar">ID</th>
                <th class="ocultar">Contraseña</th>
                <th class="ocultar">Email</th>
                <th class="ocultar">Telefono</th>
                <th class="ocultar">Imagen</th>
                <th class="ocultar">Rol</th>
                <th>Editar</th>
                <th>Eleminar</th>
            </tr>
            <?php
                while ($row = $users->fetch_assoc()){
                    $nombre = $row['Nombre'];
            ?>    
                    <tr>
                        <td><?php print $row['Nombre']; ?></td>
                        <td class="ocultar"><?php print $row['IDusuario']; ?></td>
                        <td class="ocultar"><?php print $row['Contraseña']; ?></td>
                        <td class="ocultar"><?php print $row['Email']; ?></td>
                        <td class="ocultar"><?php print $row['Telefono']; ?></td>
                        <td class="ocultar">
                            <?php
                                if($row['Imagen']){
                                ?>
                                    <img src="Imagenes/<?php print $row['Imagen'] ?>" alt="">
                                <?php
                                }
                                else{
                                    ?>
                                    <img src="Imagenes/user.png" alt="">
                                    <?php
                                }
                                ?>
                        </td>
                        <td class="ocultar"><?php print $row['Rol']; ?></td>
                        <td><i class="ri-edit-2-line" id="editar" onclick="return editarUsuario('<?php print $nombre;?>')"></i></td>
                        <td><i class="ri-delete-bin-5-line" id="basura" onclick="return eleminarUsuario('<?php print $nombre;?>')"></i></td>
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

<script>

    function editarUsuario(nombre){
        document.cookie = 'Usuario='+nombre+'; Path=/;';
        document.cookie = 'Pagina=FormEditUsers.php; Path=/;';
        window.location.replace("/IndexPrincipal.php");
    }
    function eleminarUsuario(nombre){
        document.cookie = 'Usuario='+nombre+'; Path=/;';
        document.cookie = 'Pagina=administrar.php; Path=/;';
        window.location.replace("/php/adminEliminaUser.php");
    }

</script>