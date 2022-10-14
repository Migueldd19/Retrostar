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
    <div class="contenedor">
            <div class="menu active">
                <div class="logo_contenido">
                    <div class="logo">

                        <i class='bx bx-ghost bx-tada' ></i>
                        <i class='bx bx-game' ></i>
                        <div class="nombre_logo">RetroStar</div>
                        <i class='bx bx-game bx-flip-horizontal' ></i>
                        <i class='bx bx-ghost bx-tada' ></i>
                    </div>
                    <i class='bx bx-menu'id='btn_menu'></i>
                </div>
                <li id="home">
                    <a href="#">
                        <i class='bx bx-home'></i>
                        <span class="nombres">Juegos</span>
                    </a>
                    <span class="tooltip">Inicio</span>
                </li>
                <?php
                session_start();
                if(isset($_SESSION["usuario"])){
                ?>
                    <li id="biblioteca">
                        <a href="#">
                            <i class='bx bx-book' ></i>
                            <span class="nombres">Mi Biblioteca</span>
                        </a>
                        <span class="tooltip">Mi Biblioteca</span>
                    </li>
                    <li id="deseos">
                        <a href="#">
                            <i class='bx bx-file' ></i>
                            <span class="nombres">Lista de deseos</span>
                        </a>
                        <span class="tooltip">Lista de deseos</span>
                    </li>
                    <li id="usuarios">
                        <a href="#">
                            <i class='bx bx-user'></i>
                            <span class="nombres">Usuario</span>
                        </a>
                        <span class="tooltip">Usuario</span>
                    </li>
                <?php
                if(isset($_SESSION["rol"])){
                    ?>
                    <li id="administrar">
                        <a href="#">
                            <i class='bx bx-file' ></i>
                            <span class="nombres">Administrar</span>
                        </a>
                        <span class="tooltip">Administrar</span>
                </li>
                <?php
                }
                }
                ?>
                <div class="contenido_perfil">
                    <div class="perfil">
                        <div class="detalles_perfil">
                        <?php
                            if(isset($_SESSION["imagen"])){
                                ?>
                                <img src="Imagenes/<?php print $_SESSION["imagen"] ?>" alt="">
                                <?php             
                            }
                            else{
                                ?>
                                <img src="Imagenes/user.png" alt="">
                                <?php             
                            }
                            ?> 
                            
                            <div class="name_job">
                                <div id="cambioNombre" class="name">
                                    <?php
                                        if(isset($_SESSION["usuario"])){
                                            print $_SESSION["usuario"];
                                        }
                                        else{
                                            $otro = "Usuario";
                                            print $otro;
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="btn_sesion">
                                <?php
                                    if(isset($_SESSION["usuario"])){
                                        ?>
                                        <i class='bx bx-log-out' id="btn_sesion2"></i>
                                        <?php
                                    }
                                    else{
                                        ?>
                                        <i class='bx bx-log-in' id="btn_sesion1"></i>
                                        <?php
                                    }
                                ?> 
                            </div>
                        </div>
                        <i class='bx bx-expand-vertical' id="log_out"></i>
                    </div>
                </div>
            </div>
        <div class="subcontenedor2">
            BIENVENIDO A RETROSTAR
        </div>
    </div>
    
</body>
</html>