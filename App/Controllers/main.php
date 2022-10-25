<?php

    class Main extends Controller{
        
        public function __construct(){
            parent::__construct();

            /*Desde la libreria del router
              llamamos el metodo render
              que tiene el nombre de la carpteta y la vista
            */
            $this->view->render('login/index');
        }

        public function saludo(){
            echo "<p>Ejeutaste el metodo saludo</p>";
        }

    }

?>