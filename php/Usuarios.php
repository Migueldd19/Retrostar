<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="css/usuarios.css">

    <!-- JAVASCRIPT -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"> </script>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>

    <!-- ICONOS -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <title>Juegos</title>
    
    
</head>
<body>
<?php 

require("conectarDB.php");

session_start();  
    if(isset($_SESSION["usuario"])){
        $user = $_SESSION["usuario"];
        $result = conectar()->query('SELECT * FROM usuarios Where Nombre="'.$user.'"');
        while ($row = $result->fetch_assoc()) {
            ?>
            <div class="contenedor">
                <div class="titulo">
                    <h1>Bienvenido/a <?php print $row['Nombre'];?></h1>
                </div>
                <div class="subcontenedor">
                    <form action="php/EditarUsuario.php" method="POST" enctype="multipart/form-data">
                        <label class="campos">Nombre: <?php print $row['Nombre'];?> </label>
                    
                        <label class="campos">Contraseña: 
                        <input type="password"  id="contraseñaUsuario" name="ContraseñaUsuario">
                        </label>

                        <label class="campos">ID de Usuario: <?php print $row['IDusuario'];?></label>

                        <label class="campos">Email: 
                        <input type="text"  id="emailUsuario"  name="EmailUsuario" value="<?php print $row['Email'];?>">
                        </label>

                        <label class="campos">Telefono: 
                        <input type="text" id="tlfUsuario"  name="TlfUsuario" value="<?php print $row['Telefono'];?>">
                        </label>

                        <label class="campos">Rol: <?php print $row['Rol'];?></label>

                        <label class="campos" id="imagen">Imagen: 
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
                            
                            <input type="file" class="imagen_formulario"  name="ImagenUsuario">
                        </label>

                        <input type="submit" class="campo_enviar" onclick="cargarPagina()" value="Realizar Cambios" id="enviar">
                        
                    </form>

                    <div class="btn_eleminar">
                        <a href="php/eleminarUsuario.php" class="eleminar" onclick="cargarPagina2()">
                            <button class="eleminar">Eleminar Usuario</button>
                        </a>
                    </div>
                    
                </div>
            </div>
            <?php 
        }
    }
?>
<script>
    function cargarPagina() {
            document.cookie = "Pagina = Usuarios.php";                             
        }
    function cargarPagina2() {
        document.cookie = "Pagina = Juegos.php";                             
    }
</script>
</body>
</html>
