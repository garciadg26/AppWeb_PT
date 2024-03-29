<?php

    //Clase del controlador base
    class Controller{
        public function __construct(){

            $this->view = new View();
            $this->view->mensaje = "";

        }

        //Funcion especial para cargar el modelo
        function loadModel($model){
            //Nomenclatura para todos los archivos de modelo
            $url = 'App/Models/' . $model . 'Model.php';

            //Validar si existe el archivo
            if(file_exists($url)){
                require $url;
                //Mandar a llamar al modelo especificado por el controlador
                $modelName = $model . 'Model';
                $this->model = new $modelName();
            }
        }
    }
?>