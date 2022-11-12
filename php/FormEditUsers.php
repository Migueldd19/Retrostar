<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- JAVASCRIPT --> 
    <script src="javaScript/validarAdminEditaUsuario.js"></script>

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
            <div class="compresor">
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
                ?>
            </div>
            <?php 
            }
            ?>

        </div>
        <div class="subcontenedor22">
            <form action="php/adminEditaUsuario.php" method="POST" enctype="multipart/form-data">
                <?php
                $user = conectar()->query('SELECT * FROM usuarios Where Nombre="'.$nombre.'"');
                while ($row = $user->fetch_assoc()) {
                ?>
                    <label class="campos">Nombre:</label>
                    <input type="text" id="nombreUsuario" name="NombreUsuario" value="<?php print $row['Nombre'];?>">
                    <label class="campos">Contraseña:</label>
                    <input type="text"  id="contraseñaUsuario" name="ContraseñaUsuario" value="<?php print $row['Contraseña'];?>">
                    <label class="campos">Email:</label>
                    <input type="text"  id="emailUsuario"  name="EmailUsuario" value="<?php print $row['Email'];?>">
                    <label class="campos">Telefono:</label>
                    <input type="text" id="tlfUsuario"  name="TlfUsuario" value="<?php print $row['Telefono'];?>">
                    <label class="campos">Rol:</label> 
                    <select name="rol">
                        <option>Usuario</option>
                        <option>Administrador</option>
                    <input type="submit" id="enviar" value="Realizar cambios">
                    <button onclick="regresar()" id="cancelar">Cancelar</button>
                <?php
                }
                ?>                     
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