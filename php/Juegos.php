<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="/ProyectoDAW/css/juegos.css">

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

$result = conectar()->query('SELECT * FROM juegos');

?>  

    <div class="busqueda">
        <p class="titulo">Juegos</p>
        <div class="lupa">
            <i class='bx bx-search-alt-2' ></i>
        </div>                        
        <input type="text" name="busqueda" id="busqueda" placeholder="Busqueda..." onkeyup=recoger()>
    </div>
    <div class="contenedor">
    <?php
 
    session_start();  
    if(isset($_SESSION["usuario"])){
        while ($row = $result->fetch_assoc()) {
            ?>
                <div class="col-lg-3" id="caja">
                    <div class="imagen">
                        <img src="/ProyectoDAW//Imagenes/<?php print $row['Imagen'] ?>" alt="">
                    </div>
                    <div class="nombre">
                        <?php print $row['Nombre'];?>
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
                                <i class='bx bx-plus-circle' onclick="return mostrar('<?php print $row['Nombre'];?>');"></i>
                            </div>
                            
                            <div class="carrito"><i class="bx bxs-cart" onclick="comprar()"></i></div>
                        </div>   
                    </div>
                </div>
            <?php
            }
    }
    else{
        while ($row = $result->fetch_assoc()) {
            ?>
                <div class="col-lg-3" id="caja">
                    <div class="imagen">
                        <img src="/ProyectoDAW//Imagenes/<?php print $row['Imagen'] ?>" alt="">
                    </div>
                    <div class="nombre">
                        <?php print $row['Nombre'];?>
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
                                <i class='bx bx-plus-circle'></i>
                            </div>
                            
                            <div class="carrito"><i class="bx bxs-cart"></i></div>
                        </div>   
                    </div>
                </div>
            <?php
        }
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
            
        }
        function mostrar(e) {
            document.cookie = "NombreJuego = "+e;
            window.location.replace("/ProyectoDAW/php/añadirListaDeseos.php");                             
        }
                                         
    </script>

</html>