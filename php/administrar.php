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
                <th>ID</th>
                <th>Contraseña</th>
                <th>Email</th>
                <th>Telefono</th>
                <th>Imagen</th>
                <th>Rol</th>
            </tr>
            <?php
                while ($row = $users->fetch_assoc()){
                    $info = array($row['Nombre'],$row['Rol'])
            ?>    
                    <tr>
                        <td class="nombre"><?php print $row['Nombre']; ?></td>
                        <td class="ID"><?php print $row['IDusuario']; ?></td>
                        <td class="contraseña"><?php print $row['Contraseña']; ?></td>
                        <td class="email"><?php print $row['Email']; ?></td>
                        <td class="telefono"><?php print $row['Telefono']; ?></td>
                        <td class="imagen">
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
                        <td class="rol"><?php print $row['Rol']; ?></td>
                        <td><i class="ri-edit-2-line" id="editar" onclick="return editarUsuario('<?php print $nombre;?>')"></i></td>
                        <td><i class="ri-delete-bin-5-line" id="basura" onclick="return eleminarUsuario('<?php print $info; ?>')"></i></td>
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
        let correcto = true;
        $info.foreach(function(valor){
            if(valor == "Admin"){
                correcto = false;
            }
        })
        if(correcto){
            document.cookie = 'Usuario='+nombre+'; Path=/;';
            document.cookie = 'Pagina=administrar.php; Path=/;';
            window.location.replace("/php/adminEliminaUser.php");
        }
        else{
            alert("No puedes eleminar a un Administrador.")
        }
    }
</script>