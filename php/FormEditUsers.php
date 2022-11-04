<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="/css/formeditusers.css">

    <title>Document</title>
</head>
<body>
    <?php
    require("conectarDB.php");
    $nombre = $_COOKIE['Usuario'];

    $users = conectar()->query('SELECT * FROM usuarios Where Nombre="'.$nombre.'"');
    ?>
    <div class="contenedor">
        <div class="subcontenedor1">
            <?php
            while ($row = $users->fetch_assoc()) {
            ?>
                <h1><?php print $row['Nombre']?></h1>
                <?php
                if($row['Imagen']){
                ?>
                    <img src="/Imagenes/<?php print $row['Imagen'] ?>" alt="">
                <?php
                }
                else{
                ?>
                    <img src="/Imagenes/user.png" alt="">
                <?php
                }
            }
                ?>

        </div>
        <div class="subcontenedor22">
            <form action="php/EditarUsuario.php" method="POST" enctype="multipart/form-data">
                <label class="campos">Nombre:</label>
                <input type="text" d="nombreUsuario" name="nombreUsuario">
                <label class="campos">Contraseña:</label>
                <input type="text"  id="contraseñaUsuario" name="ContraseñaUsuario">
                <label class="campos">Email:</label>
                <input type="text"  id="emailUsuario"  name="EmailUsuario">
                <label class="campos">Telefono:</label>
                <input type="text" id="tlfUsuario"  name="TlfUsuario">
                <label class="campos">Rol:</label> 
                <input type="text" id="rolUsuario"  name="rolUsuario">
                <input type="submit" value="Realizar cambios">
                <button onclick="regresar()">Cancelar</button>                     
            </form>
        </div>
    </div>
    

</body>

<script>
    function regresar(){
        document.cookie = 'Pagina=administrar.php; Path=/;';
        window.location.replace("/IndexPrincipal.php");
    }
</script>
</html>