<?php

    class ErrorControllers extends Controller{

        public function __construct(){
            //Invocamos al metodo constructor del Controller
            parent::__construct();

            /*Desde la libreria del router
              llamamos el metodo render
              que tiene el nombre de la carpteta y la vista
            */
            $this->view->mensaje = "Error genérico";
            $this->view->render('errorViews/index');
            //echo "<p>Error al cargar recurso</p>";
        }
    }

?>