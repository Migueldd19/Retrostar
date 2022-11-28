<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="css/juegos.css">

    <!-- Boostrap -->
    

    <!-- JAVASCRIPT -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"> </script>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    

    <!-- ICONOS -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <title>Mis Juegos</title>
    
</head>
<body>
    <?php
        require("conectarDB.php");

        

        session_start();
        $nombre = null;
        if(isset($_SESSION["usuario"])){
            $nombre = $_SESSION["usuario"];
        }
        
    ?>
    <div class="busqueda">
        <p class="tituloPagina">Mis Juegos</p>
        <div class="lupa">
            <i class='bx bx-search-alt-2' ></i>
        </div>                        
        <input type="text" name="busqueda" id="busqueda" placeholder="Busqueda..." onkeyup=recoger()>
    </div>
    <div class="contenedorJuegos">
        
    <?php
        $result = conectar()->query('SELECT * FROM juegos INNER JOIN biblioteca ON juegos.Nombre = biblioteca.Juego WHERE biblioteca.Usuario = "'.$nombre.'"');
        while ($row = $result->fetch_assoc()){
                ?>
                <div class="col-lg-3" id="caja">
                    <div class="imagenJuegos">
                        <img src="Imagenes/<?php print $row['Imagen'] ?>" alt="">
                    </div>
                    <div class="nombreJuegos">
                        <?php print $row['Nombre'];?>
                    </div>
                    <div class="subcontenedor">
                        <div class="descripcionJuegos">
                            <?php print $row['Descripcion'] ?>
                        </div>
                    </div>
                    <div class="subsuelo">
                        <div class="precio">
                            <?php
                            if($row['Precio']!="0") {
                                print $row['Precio'].'€';
                            }
                            else{
                                print 'Gratis';
                            }
                            ?>
                        </div> 
                    </div>
                </div>
            <?php
        }
    ?>
    </div>

</body>
</html>