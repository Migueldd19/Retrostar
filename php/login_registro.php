<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="css/login_registro.css">

    <!-- JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"> </script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.1.1.min.js"></script>
    <script src="javaScript/login_registro.js"></script>
    <script src="javaScript/validar_registro.js"></script>
    <script src="javaScript/validar_login.js"></script>
    
    <title>Login/Registro</title>

</head>
<body>
    <div class="fondo">
        <img src="Imagenes/fondo1.jpg" alt="">
        <div class="page">
            <div class="container1">
                <div class="left">
                    <div class="login">REGISTRO</div>
                    <div class="eula"></div>
                </div>
                <div class="right">
                    <div class="form">
                        <!-- formulario login -->
                        <form action="php/validarLogin.php" method="POST" id="formularioLogin">
                            <h1>Login</h1>
                            <label for="Usuario">Usuario</label>
                            <input type="text" name="Usuario_login" id="Usuario_login" autocomplete="off" class="campos">
                            <label for="Contraseña">Contraseña</label>
                            <input type="password" name="Contraseña_login" id="Contraseña_login" autocomplete="off" class="campos">
                            <input type="submit" name="enviar_login" id="Enviar_login" value="Enviar" class="campo_enviar">
                        </form>
                    </div>
                </div>
            </div>
            <div class="container2">
                <div class="right">
                    <div class="form">
                        <!-- formulario registro -->
                        <form action="php/validarRegistro.php" method="POST">
                            <h1>Registro</h1>
                            <label for="Nombre">Nombre</label>
                            <input type="text" name="Nombre_registro" id="Nombre_registro"  autocomplete="off" class="campos">
                            <label for="Contraseña">Contraseña</label>
                            <input type="password" name="Contraseña_registro" id="Contraseña_registro" autocomplete="off" class="campos">
                            <div id="errorPass"></div>
                            <label for="Contraseña2">Repita Contraseña</label>
                            <input type="password" name="Contraseña2_registro" id="Contraseña2_registro" autocomplete="off" class="campos">
                            <label for="Email">Email</label>
                            <input type="email" name="email_registro" id="email_registro" autocomplete="off" class="campos">
                            <label for="Telefono">Telefono</label>
                            <input type="text" name="Telefono_registro" id="Telefono" autocomplete="off" class="campos">
                            <input type="submit" id="Enviar_registro" value="Enviar" class="campo_enviar">
                        </form>
                    </div>
                </div>
                <div class="left">
                    <div class="login">LOGIN</div>
                    <div class="eula"></div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>