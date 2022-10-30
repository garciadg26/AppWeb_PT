<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> -->

<?php include_once __DIR__ . "/../../Includes/head.php"; ?>
<?php include_once __DIR__ . "/../../Template/header.php"; ?>

<?php
    //Soluciona las sesiones para consultar el nombre

    
    //Comprobar si el usuario NO inicio sesion
    if(!isset($_SESSION['rol'])){
        header("Location:../../../iam");
    }else{
        //Comprobamos si el usuario NO es ADMINISTRADOR
        if($_SESSION['rol'] != 1){
            header("Location:../../../iam");
        }
    }

?>



    <h2>Sección de ayuda</h2>
    <h3>Bienvenido <?php echo $user->getNombre(); ?></h3>
    <a href="../iam/App/Includes/logout.php">Cerrar sesión</a>
    <?php include_once __DIR__ . "/../../Includes/footer.php"; ?>
</body>
</html>