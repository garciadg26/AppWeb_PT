<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title>Instituto de Artes Multimedia</title>
    <?php include_once 'App/Includes/headEstilos.php';?>
</head>
<body>
    <?php 
    //echo "Estoy en el encabezado head.php con inicio de sesion";
        include_once 'App/Includes/user_session.php';
        include_once 'App/Includes/user.php';
        $userSession = new UserSession();
        $user = new User();
        $user->setUser($userSession->getCurrentUser());
    ?>