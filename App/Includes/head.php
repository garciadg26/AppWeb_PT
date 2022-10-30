<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title>Instituto de Artes Multimedia</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat:wght@300;400;600;700;800&family=Raleway:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?> Public/css/style.css?ver=1.1.2">
</head>
<body>
    <?php 
    echo "Estoy en el encabezado";
        include_once 'App/Includes/user_session.php';
        include_once 'App/Includes/user.php';
        $userSession = new UserSession();
        $user = new User();
        $user->setUser($userSession->getCurrentUser());
    ?>