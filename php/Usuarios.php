<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="css/usuarios.css">

    <!-- Boostrap -->
    

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
                    <h1>Bienvenido <?php print $row['Nombre'];?></h1>
                </div>
                <div class="subcontenedor">
                    <form action="EditarUsuario.php" method="POST">
                        <label>Nombre: 
                        <input type="text" name="NombreUsuario" value="<?php print $row['Nombre'];?>">
                        </label>

                        <label>Contraseña: 
                        <input type="text" name="ContraseñaUsuario" value="<?php print $row['Contraseña'];?>">
                        </label>

                        <label>ID de Usuario: <?php print $row['IDusuario'];?></label>

                        <label>Email: 
                        <input type="text" name="EmailUsuario" value="<?php print $row['Email'];?>">
                        </label>

                        <label>Telefono: 
                        <input type="text" name="TlfUsuario" value="<?php print $row['Telefono'];?>">
                        </label>

                        <label>Rol: <?php print $row['Rol'];?></label>

                        <label>Imagen: <img src="Imagenes/<?php print $row['Imagen'] ?>" alt="">
                        <input type="file" name="ImagenUsuario" accept=".jpg" name="Seleccionar imagen">
                        </label>
                        
                    </form>
                </div>
            </div>
            <?php 
        }
    }
?>

