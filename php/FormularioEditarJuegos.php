<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- JAVASCRIPT --> 
    <script src="javaScript/nuevoJuego.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="/css/formeditusers.css">

    <title>Document</title>
</head>
<body>
    <?php
    require("conectarDB.php");
    $nombre = $_COOKIE['Juego'];

    $users = conectar()->query('SELECT * FROM juegos Where Nombre="'.$nombre.'"');
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
            <form action="php/adminEditaJuego.php" method="POST" enctype="multipart/form-data">
                <?php
                $user = conectar()->query('SELECT * FROM juegos Where Nombre="'.$nombre.'"');
                while ($row = $user->fetch_assoc()) {
                ?>
                    <label class="campos">Nombre:</label>
                    <input type="text" id="nombreUsuario" name="nombreJuego" value="<?php print $row['Nombre'];?>">
                    <label class="campos">Descripcion:</label>
                    <input type="text"  id="descripcionJuego" name="descripcionJuego" value="<?php print $row['Descripcion'];?>">
                    <label class="campos">Precio:</label>
                    <input type="number"  id="PrecioJuego"  name="precioJuego" value="<?php print $row['Precio'];?>">
                    <label class="campos">Imagen:</label>
                    <input type="file" id="imagenJuego"  name="imagenJuego" >
                    <input type="submit" id="enviar" value="Realizar cambios">
                <?php
                }
                ?>                     
            </form>
            <button onclick="volver()" id="cancelar">Cancelar</button>
        </div>
    </div>
    

</body>
<script>
    $(document).ready(e);
    function e(){
        document.cookie = 'Pagina=administrar.php; Path=/;';
    }
    function volver(){
        document.cookie = 'Pagina=administrar.php; Path=/;';
        window.location.replace("/IndexPrincipal.php");
    }
</script>