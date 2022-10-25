<?php

    include_once 'user_session.php';
    $userSession = new UserSession();
    $userSession->closeSession();

    //include_once 'App/Views/homePage/index.php';
    header("location: ../../main");
?>