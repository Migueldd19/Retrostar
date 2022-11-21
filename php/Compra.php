<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="/css/compra.css">

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

    $nombreJuego = $_COOKIE["NombreJuego"];

    $juego = conectar()->query('SELECT * FROM `juegos` WHERE juegos.Nombre ="'.$nombreJuego.'"');
    $juego2 = conectar()->query('SELECT * FROM `juegos` WHERE juegos.Nombre ="'.$nombreJuego.'"');
    ?>

    <div class="contenedor">
        <div class="subcontenedor1">
            <div class="titulo">
                <div class="texto">
                    <h3>Finalizar compra</h3>
                </div>
                <div class="usuario">
                    <?php
                    session_start();
                        $user = $_SESSION["usuario"];
                        $result = conectar()->query('SELECT * FROM usuarios Where Nombre="'.$user.'"');
                        while ($row = $result->fetch_assoc()) {
                            if($row['Imagen'] != null){
                    ?>
                                <img src="/Imagenes/<?php print ($row['Imagen']) ?>" alt="">
                                
                    <?php
                                print($user);
                            }
                            else{
                    ?>
                                <img src="/Imagenes/user.png" alt="">
                    <?php
                                print($user);
                            }  
                        }
                    ?>      
                </div>
            </div>
            <div class="cuerpo">
                <h3>Revisar y realizar pedido</h3>
                <div class="juego">
                    <?php
                        while ($row = $juego->fetch_assoc()) {
                    ?>       
                            <div class="caja">
                                <div class="nombre">
                                    <?php print $row['Nombre'];?>
                                </div>
                                <div class="imagen">
                                    <img src="/Imagenes/<?php print $row['Imagen'] ?>" alt="">
                                </div>
                                <div class="descripcion">
                                    <?php print $row['Descripcion'] ?>
                                </div>   
                            </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="subcontenedor2">
            <div class="cabecera">
                <div class="texto2">
                    <h3>Resumen de compra</h3>
                </div>
                <div class="cierre">
                    <h2 onclick="cancelar()">X</h2>
                </div>   
            </div>
            <div class="contenido">
                <?php
                    while ($row = $juego2->fetch_assoc()) {
                ?> 
                        <div class="principal">
                            <div class="imagen2">
                                <img src="/Imagenes/<?php print $row['Imagen'] ?>" alt="">
                            </div>
                            <div class="nombre2">
                                <?php print $row['Nombre'];
                                    $_COOKIE['NombreJuego'] = $row['Nombre'];
                                ?>
                            </div>
                        </div>
                        <div class="secundario">
                            <div class="precio">
                                <div class="text">
                                    <p>Precio:</p>
                                    <p>Descuento:</p>
                                    <p>Total:</p>
                                </div>
                                <div class="operaciones">
                                    <p><?php print $row['Precio']."€";?></p>
                                    <p>-0€</p>
                                    <p><?php print $row['Precio']."€";?></p>
                                </div>
                            </div>
                            <div class="politica">
                                <p>Tu dirección de correo electrónico se compartira con Retrostar Games Ltd. Retrostar Games Ltd usará tu dirección de correo electrónico de conformidad con su política de privacidad.</p>
                            </div>
                        </div>
                <?php
                    }
                ?>
            </div>
            <div class="pedido">
                <button class="boton" onclick="window.modal1.showModal();">Realizar Pedido</button>
            </div>
        </div>
    </div>

    <dialog id="modal1">
        <h2>INFORMACIÓN SOBRE EL REEMBOLSO Y EL DERECHO DE DESISTIMIENTO</h2>
        <p>Cualquier juego comprado en la tienda de Epic Games puede ser objeto de reembolso dentro de los 14 días siguientes a la compra (o en el caso de pre-compras, dentro de los 14 días siguientes al lanzamiento) y siempre que usted haya jugado al juego por menos de 2 horas.</p>
        <div id="contenedorBotones">
            <button class="cerrarmodal" onclick="window.modal1.close();">Cerrar</button>
            <button class="confirmarmodal" onclick="redirecion()">Confirmar</button>
        </div>
        
    </dialog>

</body>

<script>

    function cancelar (){
        document.cookie = 'Pagina=Juegos.php; Path=/;';
        window.location.replace("/IndexPrincipal.php");
    }

    function redirecion (){
        document.cookie = 'Pagina=Juegos.php; Path=/;';
        window.location.replace("/php/añadirBiblioteca.php");
    }
    
</script>