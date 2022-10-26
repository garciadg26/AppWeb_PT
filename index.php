<?php

    //require_once '../App/Models/estudiante_modelo';
    //$estudiante = new Estudiante_modelo();


    //Mandar los routers
    require_once __DIR__ . '/App/Libs/db.php';
    require_once __DIR__ . '/App/Libs/controllers.php';
    require_once __DIR__ . '/App/Libs/models.php';
    require_once __DIR__ . '/App/Libs/views.php';
    include_once __DIR__ . '/App/Libs/app.php';
    include_once __DIR__ . '/App/config/config.php';
    //include_once "App/Controllers/main.php";
    

    #include_once 'App/Includes/user.php';
    #include_once 'App/Includes/user_session.php';
    
    //$archivoController = 'App/Controllers/login.php';
    //require_once $archivoController; 

    //Objeto de sesion
    #$userSession = new UserSession();
    #$user = new User();
    

    // Objeto de la app
    $app = new App();





?>
