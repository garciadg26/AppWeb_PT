<?php

    //Mandar los routers
    require_once __DIR__ . '/App/Libs/db.php';
    require_once __DIR__ . '/App/Libs/controllers.php';
    require_once __DIR__ . '/App/Libs/models.php';
    require_once __DIR__ . '/App/Libs/views.php';
    include_once __DIR__ . '/App/Libs/app.php';
    include_once __DIR__ . '/App/config/config.php';    

    // Objeto de la app
    $app = new App();
?>
