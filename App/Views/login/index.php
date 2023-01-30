<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN - SISTEMA DE COMERCIAZACIÓN WEB</title>

</head>
<body> -->

    <?php include_once __DIR__ . "/../../Includes/headLogin.php"; ?>
    <div class="container bgc_ilus_login" id="cont_login">
        <section class="cont_login">
            <div class="logotipo_img_login">
                <img src="<?php echo constant('URL') ?>Public/Assets/images/Logotipo_IAM.png" alt="">
            </div>
            <h2 class="tit_3">Iniciar sesión</h2>
            <div ><?php echo $this->mensaje; ?></div>
            <form action="" method="POST">
                </br>
                <label for="input_nombre"> Correo de usuario<br>
                    <input type="text" id="input_nombre" name="username" placeholder="ejemplo@mail.com" >
                </label>
                <br>
                <br>
                <label for="input_pass"> Contraseña <br>
                    <input type="password" id="input_pass" name="password" placeholder="Ingresa tu contraseña" >
                </label>
                <!-- <p class="olvidar_pas"><a href="#">Olvidé mi constraseña</a></p> -->
                <div class="btn_form btn_form_crear">
                    <input class type="submit" value="Iniciar">
                </div>
            </form>
            <p class="new_cuenta">¿Deseas crear una nueva cuenta? <a href="<?php echo constant('URL'); ?>cuenta"> Registrar cuenta</a></p>
        </section>                                                       
    </div>
    <footer id="cont_foot_login">
        <div class="before_ilus_left"></div>
        <p class="foote_legales">© IAM 2023. Todos los derechos reservados.</p>
        <div class="before_ilus_right"></div>
    </footer>
    
    
                    
</body>
</html>