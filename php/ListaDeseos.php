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

    <title>Lista de Deseos</title>
    
</head>
<body>
    <?php
        require("conectarDB.php");

        session_start();
        $nombre = $_SESSION["usuario"];
            
    ?>
    <div class="busqueda">
        <p class="titulo">Lista de Deseos</p>
        <div class="lupa">
            <i class='bx bx-search-alt-2' ></i>
        </div>                        
        <input type="text" name="busqueda" id="busqueda" placeholder="Busqueda..." onkeyup=recoger()>
    </div>
    <div class="contenedor">
        
    <?php
        $result = conectar()->query('SELECT * FROM juegos INNER JOIN listadeseos ON juegos.Nombre = listadeseos.Juego WHERE listadeseos.Usuario = "'.$nombre.'"');
        while ($row = $result->fetch_assoc()){
            $compraValida = true;
                ?>
                <div class="col-lg-3" id="caja">
                    <div class="imagen">
                        <img src="Imagenes/<?php print $row['Imagen'] ?>" alt="">
                    </div>
                    <div class="nombre">
                        <?php
                            $nombreJuego = $row['Nombre'];
                            print $row['Nombre'];
                        ?>
                    </div>
                    <div class="subcontenedor">
                        <div class="descripcion">
                            <?php print $row['Descripcion'] ?>
                        </div>
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
                        <div class="iconos">
                            <div class="deseos" >
                                <i class='bx bx-trash-alt' onclick="return eleminarJuego('<?php print $row['Nombre'];?>');"></i>
                            </div>
                            <?php
                                $result2 = conectar()->query('SELECT * FROM biblioteca');
                                while ($row = $result2->fetch_assoc()){
                                    if($nombreJuego == $row['Juego'] && $row['Usuario'] == $nombre){
                                        $compraValida = false;
                                    }
                                }
                                if ($compraValida){
                                ?>
                                    <div class="carrito">
                                        <i class="bx bxs-cart" onclick="comprar2('<?php print $nombreJuego; ?>')"></i>
                                    </div>
                                <?php
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
<script>                  
        
    function eleminarJuego(e) {
        alert("Juego elemindo correctamente.");
        document.cookie = "NombreJuego = "+e;
        document.cookie = "Pagina = ListaDeseos.php";
        window.location.replace("php/eleminarListaDeseos.php");                             
    }

    function comprar2(e){
            document.cookie = "NombreJuego = "+e;
            window.location.replace("php/compra.php");
        }
                                         
</script>