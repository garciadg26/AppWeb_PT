<?php

    //require_once '../App/Models/estudiante_modelo';
    //$estudiante = new Estudiante_modelo();


    //Mandar los routers
    require_once __DIR__ . '/App/Libs/controllers.php';
    require_once __DIR__ . '/App/Libs/models.php';
    require_once __DIR__ . '/App/Libs/views.php';
    //include_once "App/Controllers/main.php";
    

    #include_once 'App/Includes/user.php';
    #include_once 'App/Includes/user_session.php';
    
    //$archivoController = 'App/Controllers/login.php';
    //require_once $archivoController; 
    
    //Objeto de sesion
    #$userSession = new UserSession();
    #$user = new User();
    
    include_once __DIR__ . '/App/Libs/app.php';
    // Objeto de la app
    $app = new App();





?>


<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba</title>
</head>
<body>
    <h3>R: Leer / Consultar</h3>

</body>
</html> -->