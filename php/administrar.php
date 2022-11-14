<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="/css/administrar.css">
    <link rel="stylesheet" href="/css/crearJuego.css">

    <!-- Boostrap -->
    

    <!-- JAVASCRIPT -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"> </script>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="javaScript/nuevoJuego.js"></script>

    <!-- ICONOS -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <title>Administrar</title>
    
    
</head>
<body>
    <?php
    require("conectarDB.php");

    $users = conectar()->query('SELECT * FROM `usuarios`');
    $juegos = conectar()->query('SELECT * FROM `juegos`');
    ?>

    <div class="contenedorAdmin">
        <div class="usuarios">
            <h1>Usuarios</h1>
            <table class="tbUsusarios">
            <tr>
                <th>Nombre</th>
                <th class="ocultar">ID</th>
                <th class="ocultar">Email</th>
                <th class="ocultar">Telefono</th>
                <th class="ocultar">Imagen</th>
                <th class="ocultar">Rol</th>
                <th>Editar</th>
                <th>Eleminar</th>
            </tr>
            <?php
                while ($row = $users->fetch_assoc()){
                    $nombreUsuario = $row['Nombre'];
            ?>    
                    <tr>
                        <td><?php print $row['Nombre']; ?></td>
                        <td class="ocultar"><?php print $row['IDusuario']; ?></td>
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
                        <td><i class="ri-edit-2-line" id="editar" onclick="return editarUsuario('<?php print $nombreUsuario;?>')"></i></td>
                        <td><i class="ri-delete-bin-5-line" id="basura" onclick="return eleminarUsuario('<?php print $nombreUsuario;?>')"></i></td>
                    </tr>
            <?php
                }
            ?>
            </table>
        </div>
        <div class="juegos">
            <h1>Juegos</h1>
            <table class="tbJuegos">
            <tr>
                <th>Nombre</th>
                <th class="ocultar">ID</th>
                <th class="ocultar">Descripcion</th>
                <th class="ocultar">Precio</th>
                <th class="ocultar">Imagen</th>
                <th>Editar</th>
                <th>Eleminar</th>
            </tr>
            <?php
                while ($row = $juegos->fetch_assoc()){
                    $nombreJuego = $row['Nombre'];
            ?> 
                    <tr>
                        <td><?php print $row['Nombre']; ?></td>
                        <td class="ocultar"><?php print $row['IDjuego']; ?></td>
                        <td class="ocultar"><?php print $row['Descripcion']; ?></td>
                        <td class="ocultar"><?php print $row['Precio']; ?> €</td>
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
                        <td><i class="ri-edit-2-line" id="editar" onclick="return editarJuego('<?php print $nombreJuego;?>')"></i></td>
                        <td><i class="ri-delete-bin-5-line" id="basura" onclick="return eleminarJuego('<?php print $nombreJuego;?>')"></i></td>
                    </tr>
            <?php
                }
            ?>
                <tr>
                    <td colspan="7" id="lineaBoton"><button id="botonJuego" onclick="window.modal.showModal();">Crear Juego</button></td>
                </tr>
            </table>

            <dialog id="modal">
                <div id="tituloJuego">
                    <h1>Crea un nuevo juego!</h1>
                </div>
                <div id="subcontenedor">
                    <form action="php/CrearNuevoJuego.php" method="POST" enctype="multipart/form-data">
                        <label class="campos">Nombre:
                        <input type="text" class="text" id="nombreJuego" name="NombreJuego">
                        </label>
                        <label class="campos">Descripcion:
                        <input type="text" class="text" id="descripcionJuego" name="descripcionJuego">
                        </label>
                        <label class="campos">Precio:
                        <input type="number" class="text" id="precioJuego"  name="precioJuego">
                        </label>
                        <label class="campos">Imagen:
                        <input type="file" id="imagenJuego"  name="imagenJuego">
                        </label>
                        <input type="submit" value="Crear Juego" id="enviarJuego" onclick="Pagina()">
                    </form>
                    <button onclick="window.modal.close();" id="cerrar">Cerrar</button>
                </div>
                
                
            </dialog>   
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
    function editarJuego(nombre){
        document.cookie = 'Juego='+nombre+'; Path=/;';
        document.cookie = 'Pagina=FormularioEditarJuegos.php; Path=/;';
        window.location.replace("/IndexPrincipal.php");
    }
    function eleminarJuego(nombre){
        document.cookie = 'Juego='+nombre+'; Path=/;';
        document.cookie = 'Pagina=administrar.php; Path=/;';
        window.location.replace("/php/eleminarJuego.php");
    }

</script>