<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instituto de Artes Multimedia</title>
    <link rel="stylesheet" href="css/style.css?ver=1.0">
    
    <!-- FUENTES WEB -->

</head>
<body>

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

    <div id="menu">
        <ul>
            <li>Home</li>
            <li class="cerrar-sesion">
                <a href="../iam/App/Includes/logout.php">Cerrar sesión</a>
            </li>
        </ul>
    </div>
    <section>
        <h1>Bienvenido <?php echo $user->getNombre(); ?></h1>
    </section>

    
    <footer>
        <p class="foote_legales">© 2021. Todos los derechos reservados.</p>
    </footer>

</body>
</html>