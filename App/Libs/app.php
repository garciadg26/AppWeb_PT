<?php

require_once __DIR__ . '/../Controllers/errorControllers.php';

    class App{
        public function __construct(){
            echo "<p>Nueva app</p>";


            $url = $_GET['url'];

            //Comprobar si la dirección esta vacia
            if($url == ''){
                //Redirreccionar la ruta al main
                header("Location:/iam/main");
            }

            $url = rtrim($url, '/');
            $url = explode('/', $url);
        
            //var_dump($url);
            $archivoController = 'App/Controllers/' . $url[0] . '.php';
            
            //Validamos si la ruta llama al controlador
            if(file_exists($archivoController)){
                require_once $archivoController;
                $controller = new $url[0];

                if(isset($url[1])){
                    $controller->{$url[1]}();
                }
            }else{
                $controller = new ErrorControllers();
            }
        }
    }
?>