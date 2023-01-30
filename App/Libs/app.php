<?php

require_once __DIR__ . '/../Controllers/errorController.php';
require_once __DIR__ . '/../Controllers/home.php';

    class App{
        public function __construct(){
            //Nueva App
           
            $url = isset($_GET['url']) ? $_GET['url'] : null;
            $url = rtrim($url, '/');
            $url = explode('/', $url);

            //Validar esta vacio el controlador
            //Cuando se ingresa sin definir controlador
            if(empty($url[0])){
                $archivoController = 'App/Controllers/main.php';
                require_once $archivoController;
                $controller = new Main();
                $controller->render();
                $controller->loadModel('main');
                return false;
            } else{
                //var_dump($url);
                $archivoController = 'App/Controllers/' . $url[0] . '.php';
            }

            
            //Validamos si la ruta llama al controlador
            if(file_exists($archivoController)){
                require_once $archivoController;

                //Inicializar el controlador y se carga el modelo
                $controller = new $url[0];
                $controller->loadModel($url[0]);

                // Obtener el número de elementos del arreglo
                $nparam = sizeof($url);


                //Evaluar si hay parametros 
                //Si hay 1 parametro = controlador
                if($nparam > 1){
                    //si hay 2 parametros = controlador/metodo
                    if($nparam > 2 ){
                        $param = [];
                        for($i = 2; $i<$nparam; $i++){
                            array_push($param, $url[$i]);
                        }
                        $controller->{$url[1]}($param);
                    }else{
                        // solo se llama al método
                        $controller->{$url[1]}();
                    }
                }else{
                    // si se llama a un controlador
                    $controller->render();
                }

                // si hay un método que se requiere cargar
                /*
                if(isset($url[1])){
                    $controller->{$url[1]}();
                }else{
                    $controller->render();
                }*/
            }else{
                $controller = new ErrorController();
            }
        }
    }
?>