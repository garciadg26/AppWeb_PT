<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instituto de Artes Multimedia - Error</title>
    <?php include_once 'App/Includes/headEstilos.php' ?>
</head>
<body>
    <div class="cont_error_404">
        <div class="error_404">
            <div class="logitipo_aside">
                <img src="<?php constant('URL') ?>Public/Assets/images/Logotipo_IAM.png" alt="">
            </div>
            <img src="<?php constant('URL') ?>Public/Assets/images/svg/404.svg" alt="">
            <h1 class="tit_2"><?php echo $this->mensaje; ?></h1><br>
            <a class="btn_general btn_principal btn_icon m0-auto" href="<?php echo constant('URL') ?>">
            Regresar al inicio
            <img src="<?php constant('URL') ?>Public/Assets/images/svg/Icon-arrow-next.svg" alt="">
        </a>
        </div>
    </div>
</body>
</html>