<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="css/menu.css">

    <!-- JAVASCRIPT -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="javaScript/menu.js"></script>
    
    <!-- ICONOS -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <title>Document</title>

</head>
<body>
    <?php
    require("conectarDB.php");

    session_start();
    $nombre = $_SESSION["usuario"];
    $juego = $_COOKIE['NombreJuego'];

    $conexion = conectar();
    $sentencia = 'DELETE FROM listadeseos WHERE Usuario = "'.$nombre.'" AND Juego = "'.$juego.'" ';
    $consulta = mysqli_query($conexion,$sentencia);
    
    header("Location:../IndexPrincipal.php");
    
    ?>

</body>
</html>


