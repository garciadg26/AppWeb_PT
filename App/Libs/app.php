<?php

require_once __DIR__ . '/../Controllers/errorController.php';
require_once __DIR__ . '/../Controllers/home.php';

    class App{
        public function __construct(){
            echo "<p>Nueva app</p>";


            $url = isset($_GET['url']) ? $_GET['url'] : null;
            $url = rtrim($url, '/');
            $url = explode('/', $url);

            //Validar esta vacio el controlador
            //Cuando se ingresa sin definir controlador
            if(empty($url[0])){
                $archivoController = 'App/Controllers/main.php';
                require_once $archivoController;
                $controller = new Main();
                $controller->loadModel('main');
                $controller->render();
                return false;
            }

            //var_dump($url);
            $archivoController = 'App/Controllers/' . $url[0] . '.php';
            
            //Validamos si la ruta llama al controlador
            if(file_exists($archivoController)){
                require_once $archivoController;

                //Inicializar el controlador y se carga el modelo
                $controller = new $url[0];
                $controller->loadModel($url[0]);

                // si hay un método que se requiere cargar
                if(isset($url[1])){
                    $controller->{$url[1]}();
                }else{
                    $controller->render();
                }
            }else{
                $controller = new ErrorController();
            }
        }
    }
?>