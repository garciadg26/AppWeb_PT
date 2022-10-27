<?php

    class Consulta extends Controller{

        public function __construct(){
            parent::__construct();
        }
        
        public function render(){
            $this->view->render('consulta/index');
        }
        
    }

?>