<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="css/juegos.css">
    <link rel="stylesheet" href="css/compra.css">

    <!-- JAVASCRIPT -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"> </script>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="javaScript/compra.js"></script>

    <!-- ICONOS -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <title>Juegos</title>
    
    
</head>
<body>

<?php 

require("conectarDB.php");
session_start();
if(isset($_SESSION["usuario"])){
    $usuario = $_SESSION["usuario"];
}

?>  

    <div class="busqueda">
        <p class="tituloPagina">Juegos</p>
        <div class="lupa">
            <i class='bx bx-search-alt-2' ></i>
        </div>                        
        <input type="text" name="busqueda" id="busqueda" placeholder="Busqueda..." onkeyup=recoger()>
    </div>

    <div class="contenedorJuegos">
    <?php
 
    $result = conectar()->query('SELECT * FROM juegos');
   
        
    while ($row = $result->fetch_assoc()) {
        $compraValida = true;
        $listaValida = true;
    ?>
        <div class="col-lg-3" id="caja">
            <div class="imagenJuegos">
                <img src="Imagenes/<?php print $row['Imagen'] ?>" alt="">
            </div>
            <div class="nombreJuegos">
    <?php 
                $nombreJuego = $row['Nombre'];
                print $row['Nombre'];
    ?>
            </div>
                <div class="subcontenedor">
                    <div class="descripcionJuegos">
                        <?php print $row['Descripcion'] ?>
                    </div>
                </div>
                <div class="subsuelo">
                    <div class="precio" id="prueba_precio">
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
    <?php
                        if(isset($_SESSION["usuario"])){
                            $result3 = conectar()->query('SELECT * FROM listadeseos');
                            while ($row = $result3->fetch_assoc()){
                                if($nombreJuego == $row['Juego'] && $row['Usuario'] == $usuario){
                                    $listaValida = false;
                                }
                            }
                            if ($listaValida){
    ?>
                                <div class="deseos" >
                                    <i class='bx bx-plus-circle' onclick="return listaDeseos('<?php print $nombreJuego;?>');"></i>
                                </div>
    <?php
                            }
                                
                            $result2 = conectar()->query('SELECT * FROM biblioteca');
                            while ($row = $result2->fetch_assoc()){
                                if($nombreJuego == $row['Juego'] && $row['Usuario'] == $usuario){
                                    $compraValida = false;
                                }
                            }
                            if ($compraValida){
    ?>
                                <div class="carrito">
                                    <i class="bx bxs-cart" onclick="return comprar('<?php print $nombreJuego; ?>');"></i>
                                </div>
    <?php
                            }
                              
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
    <script> 

        function recoger() {

            let busqueda = $("#busqueda").val().toUpperCase();
            
            let juegos = $(".nombre");
            
            if(busqueda != null || busqueda != ""){
                for(let i = 0; i<juegos.length; i++){
                    let texto = juegos[i].innerHTML.toUpperCase();
                    
                    if(texto.includes(busqueda)){
                        $(".col-lg-3").eq(i).show(); 
                    }
                    else{
                        $(".col-lg-3").eq(i).hide();
                    } 
                }
            }
        }
    
        function comprar(e){
            document.cookie = "NombreJuego = "+e;
            window.location.replace("php/compra.php");
        }

        function listaDeseos(e) {
            alert("Juego añadido a tu lista de deseos");
            document.cookie = "NombreJuego = "+e;
            window.location.replace("php/añadirListaDeseos.php");                            
        } 

    </script>
</html>