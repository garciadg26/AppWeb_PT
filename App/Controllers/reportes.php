<?php

    class Reportes extends Controller{
        public function __construct(){
            parent::__construct();

            session_start();
            include_once 'App/Includes/validarUserAdmin.php';
        }
        public function render(){
            $this->view->render('reportes/index');
        }

    }

?>