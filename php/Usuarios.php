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
                    <div class="nombre">
                        Nombre: <?php print $row['Nombre'];?>
                    </div>
                    <div class="contraseña">
                        Contraseña: <?php print $row['Contraseña'];?>
                    </div>
                    <div class="id">
                        ID de Usuario: <?php print $row['IDusuario'];?>
                    </div>
                    <div class="email">
                        Email: <?php print $row['Email'];?>
                    </div>
                    <div class="telefono">
                        Telefono: <?php print $row['Telefono'];?>
                    </div>
                    <div class="rol">
                        Rol: <?php print $row['Rol'];?>
                    </div>
                    <div class="imagen">
                        Imagen: <img src="Imagenes/<?php print $row['Imagen'] ?>" alt="">
                    </div>
                </div>
            </div>
            <?php 
        }
    }
?>

