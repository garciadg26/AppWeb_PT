<?php

    //Mandar los routers
    require_once 'App/Libs/db.php';
    require_once 'App/Libs/controllers.php';
    require_once 'App/Libs/models.php';
    require_once 'App/Libs/views.php';
    include_once "App/Controllers/main.php";

    include_once 'App/Includes/user.php';
    include_once 'App/Includes/user_session.php';
    include_once 'App/Libs/app.php';
    
    $userSession = new UserSession();
    $user = new User();
    $mensaje = '';

    //$app = new App();

    //////////// BLOQUE 1
    //IMPLEMENTACION DE ROL DE SESIONES
    if(isset($_SESSION['rol'])){
        //echo 'hay sesion';
        #obtener el usuario
        $user->setUser($userSession->getCurrentUser());

        switch($_SESSION['rol']){
            //ADMINISTRADOR
            case 1:
                include_once 'App/Views/panelAdmin/index.php';
            break;
            //ALUMNO
            case 2:
                include_once 'App/Views/homePage/index.php';
            break;
            default:
        }

    //VALIDACION LOGIN
    }else if(isset($_POST['username']) && isset($_POST['password'])){
        //echo "Nuevo usuario Main";
        $userForm = $_POST['username'];
        $passForm = $_POST['password'];

        $md5pass = md5($passForm);
        ///////////BLOQUE 2
        
        $user = new User();

        //1C+Comprobar si el usuario existe en la base de datos
        if($user->userExists($userForm, $md5pass)){
            //Asignar las sesion de usuario
            $userSession->setCurrentUser($userForm);
            //Llenar los datos del nombre y del username
            $user->setUser($userForm);
            $user->rolUser($userForm, $md5pass);
        //1C-SiNo se indica error en las credenciales
        }else{
            //Mensaje de error en los datos
            $mensaje = "<div class='msnErrorLogin'>Error: El email y/o la contraseña son incorrectos</div>";
        }

        $this->mensaje = $mensaje;
        
        $this->render('login/index');

    //1B-SiNo mandar a la vista del login
    }else{
        //echo "Login";
        include_once 'App/Views/login/index.php';
        //$controller = new Main();
    }

?>

