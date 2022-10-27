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
        echo 'hay sesion';
        #obtener el usuario
        $user->setUser($userSession->getCurrentUser());

        switch($_SESSION['rol']){
            //ADMINISTRADOR
            case 1:
                include_once 'App/Views/nuevo/index.php';
            break;
            //ALUMNO
            case 2:
                include_once 'App/Views/homePage/index.php';
            break;
            default:
        }
    }else if(isset($_POST['username']) && isset($_POST['password'])){
        //echo "Nuevo usuario Main";
        $userForm = $_POST['username'];
        $passForm = $_POST['password'];


        $user = new User();
        
        //1C+Comprobar si el usuario existe en la base de datos
        if($user->userExists($userForm, $passForm)){
            //Asignar las sesion de usuario
            $userSession->setCurrentUser($userForm);
            //Llenar los datos del nombre y del username
            $user->setUser($userForm);
            $user->rolUser($userForm, $passForm);
        //1C-SiNo se indica error en las credenciales
        }else{
            #echo "<p>El Email y/o la contraseña son incorrectos</p>";
            $mensaje = "<div class='msnErrorLogin'>Error: El email y/o la contraseña son incorrectos</div>";
            //Mensaje de error en los datos

            //$this->mensaje = $mensaje;

            //$controller = new Main();
            
            //include '/main';
            #include_once 'App/Views/login/index.php';
        }

        $this->mensaje = $mensaje;
        $this->render('login/index');

        /*
        if($user->userExists($userForm, $passForm)){
            $userSession->setCurrentUser($userForm);
            //Asignar las sesion de usuario
            //Llenar los datos del nombre y del username
            $user->setUser($userForm);
            //Manda a llamar a la vista del home
            //include_once "App/Controllers/home.php";
            //$controller = new HomePage();
            //include_once 'App/Views/homePage/index.php';
            
            #COMENTARIO
            //include_once 'App/Views/homePage/index.php';
            
        }else{
            echo "<p>El Email y/o la contraseña son incorrectos</p>";
            //Mensaje de error en los datos
            
            $errorLogin = "El Email y/o la contraseña son incorrectos";
            //$controller = new Main();
            
            //include '/main';
            include_once 'App/Views/login/index.php';
        }*/

    //1B-SiNo mandar a la vista del login
    }else{
        echo "Login";
        include_once 'App/Views/login/index.php';
        //$controller = new Main();
    }

    //////////// BLOQUE 2 
    //AUTENTICACION DEL USUARIO
    #Validacion del login
    //1A+Comprobar si ya inicio sesion el usuario

    /*
    if(isset($_SESSION['user'])){
        echo 'hay sesion';
        #obtener el usuario
        $user->setUser($userSession->getCurrentUser());
        #Incluir la vista del MAIN
        //include_once "App/Controllers/home.php";
        //$controller = new HomePage();
        include_once 'App/Views/homePage/index.php';
        //1A-1B+SiNo Comprobar si el usuario ingresa datos
    }else if(isset($_POST['username']) && isset($_POST['password'])){
        echo "Nuevo usuario";
        $userForm = $_POST['username'];
        $passForm = $_POST['password'];

        $user = new User();

        //1C+Comprobar si el usuario existe en la base de datos
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
            //1C-SiNo se indica error en las credenciales
        }else{
            echo "<p>El Email y/o la contraseña son incorrectos</p>";
            //Mensaje de error en los datos
            
            $errorLogin = "El Email y/o la contraseña son incorrectos";
            //$controller = new Main();
            
            //include '/main';
            include_once 'App/Views/login/index.php';
        }

    //1B-SiNo mandar a la vista del login
    }else{
        echo "Login";
        include_once 'App/Views/login/index.php';
        //$controller = new Main();
    }*/
?>

