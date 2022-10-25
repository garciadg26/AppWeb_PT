<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN - SISTEMA DE COMERCIAZACIÓN WEB</title>
    <link rel="stylesheet" href="css/style.css?ver=1.0">
    <!-- FUENTES WEB -->

</head>
<body>

    <h1>Esta es la vista del LOGIN</h1>
    <!-- <header class="menu_principal menu_navegacion">
        <nav class="wrapper">
            <div class="col_1">
                <h1>DANSUTOL</h1>
            </div>
            <div class="col_2">
                <ul class="wrapper">
                    <li><a href="index.html"> Inicio</a></li>
                </ul>
            </div>
            <div class="col_3">
                <ul class="wrapper">
                    <li><a href="php/registro.php"> Registrarse</a></li>
                </ul>
            </div>
        </nav>
    </header> -->


    <div class="container">
        <section class="sect_right">
            <div class="imagen_encabezado"></div>
        </section>
        <section class="sect_login">
            <article class="cont_login">
                <h3>Ingresa al sistema</h3>
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
                    <p class="olvidar_pas"><a href="#">Olvidé mi constraseña</a></p>
                    <input type="submit" value="Iniciar">
                </form>
                <p class="new_cuenta">¿Deseas crear una nueva cuenta? <a href="php/registro.php"> Registrar cuenta</a></p>
            </article>
        </section>
    </div>
    <footer>
        <p class="foote_legales">© 2021. Todos los derechos reservados.</p>
    </footer>

</body>
</html>