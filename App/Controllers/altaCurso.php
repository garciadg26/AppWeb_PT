<?php


    class AltaCurso extends Controller{

        public function __construct(){
            parent::__construct();

            //Definimos la variable del arreglo
            $this->view->categorias = [];
        }

        public function render(){
            ##PRIMERA PARTE - CONSULTAR CATEGORIAS
            //Traemos un objeto con todos los datos
            $categorias = $this->model->consultarCategoria();
            //$categoria->$nombreCat;
            var_dump($categorias);
            $this->view->categorias = $categorias;
            $this->view->render('altaCurso/index');
        }

    }
?>