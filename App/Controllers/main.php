<?php

    class Main extends Controller{
        
        public function __construct(){
            parent::__construct();
            $this->view->cursos = [];
        }

        /*Desde la libreria del router
        llamamos el metodo render
        que tiene el nombre de la carpteta y la vista
        */
        public function render(){
            $this->view->render('main/index');
        }

        public function saludo(){
            echo "<p>Ejeutaste el metodo saludo</p>";
        }
    }
?>