<?php

    //require_once '../App/Models/estudiante_modelo';
    //$estudiante = new Estudiante_modelo();


    //Mandar los routers
    require_once __DIR__ . '/App/Libs/controllers.php';
    require_once __DIR__ . '/App/Libs/models.php';
    require_once __DIR__ . '/App/Libs/views.php';
    include_once "App/Controllers/main.php";
    

    include_once 'App/Includes/user.php';
    include_once 'App/Includes/user_session.php';
    include_once __DIR__ . '/App/Libs/app.php';

    //$archivoController = 'App/Controllers/login.php';
    //require_once $archivoController; 

    //Objeto de sesion
    $userSession = new UserSession();
    $user = new User();

    // Objeto de la app
    //$app = new App();

    #Validacion del login
    //Si existe sesion del usuario
    if(isset($_SESSION['user'])){
        echo 'hay sesion';
        #obtener el usuario
        $user->setUser($userSession->getCurrentUser());
        #Incluir la vista del MAIN
        //include_once "App/Controllers/home.php";
        //$controller = new HomePage();
        include_once 'App/Views/homePage/index.php';
    }else if(isset($_POST['username']) && isset($_POST['password'])){
        
        $userForm = $_POST['username'];
        $passForm = $_POST['password'];

        $user = new User();
        //
        
        if($user->userExists($userForm, $passForm)){
            //Asignar las sesion de usuario
            $userSession->setCurrentUser($userForm);
            //Llenar los datos del nombre y del username
            $user->setUser($userForm);
            //Manda a llamar a la vista del home
            //include_once "App/Controllers/home.php";
            //$controller = new HomePage();
            //include_once 'App/Views/homePage/index.php';
            include_once 'App/Views/homePage/index.php';
        }else{
            echo "<p>El Email y/o la contraseña son incorrectos</p>";
            //Mensaje de error en los datos
            
            $errorLogin = "El Email y/o la contraseña son incorrectos";
            //$controller = new Main();
            
            //include '/main';
            include_once 'App/Views/login/index.php';
        }


    }else{
        echo "Login";
        include_once 'App/Views/login/index.php';
        //$controller = new Main();
    }



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