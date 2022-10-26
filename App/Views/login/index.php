<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN - SISTEMA DE COMERCIAZACIÓN WEB</title>
    <link rel="stylesheet" href="Public/assets/css/style.css?ver=1.1.1">
    <link rel="stylesheet" href="Public/assets/css/login.css?ver=1.0.1">
    <!-- FUENTES WEB -->

</head>
<body>

    <h1>Esta es la vista del LOGIN</h1>

    <div class="container" id="cont_login">
        <section class="cont_login">
            <h3>Iniciar sesión</h3>
            <form action="" method="POST">
                    <?php
                    if(isset($errorLogin)){
                        $errorLogin;
                    }
                ?>
                </br>
                <label for="input_nombre"> Email de usuario<br>
                    <input type="text" id="input_nombre" name="username" placeholder="Usuario" required>
                </label>
                <br>
                <br>
                <label for="input_pass"> Contraseña <br>
                    <input type="password" id="input_pass" name="password" placeholder="Contraseña" required>
                </label>
                <!-- <p class="olvidar_pas"><a href="#">Olvidé mi constraseña</a></p> -->
                <input type="submit" value="Iniciar">
            </form>
            <p class="new_cuenta">¿Deseas crear una nueva cuenta? <a href="<?php echo constant('URL'); ?>cuenta"> Registrar cuenta</a></p>
        </section>                                                       
        <footer>
            <p class="foote_legales">© IAM 2022. Todos los derechos reservados.</p>
        </footer>
    </div>
    <script type="text/javascript" src="<?php echo constant('URL'); ?>Public/assets/js/script.js"></script>                
</body>
</html>