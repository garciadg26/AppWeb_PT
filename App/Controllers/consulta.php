<?php

    class Consulta extends Controller{

        public function __construct(){
            parent::__construct();

            //Definimos la variable del arreglo
            $this->view->cursos = [];
        }
        
        public function render(){
            //Renderizamos los datos obtenidos del modelo
            $cursos = $this->model->consultarCurso();
            $this->view->cursos = $cursos;
            $this->view->render('consulta/index');
        }

        //Ver detalle del curso
        public function verCurso(){

        }

        //Actualizar curso
        public function actualizarCurso(){

        }

        //Eliminar curso
        public function eliminarCurso(){

        }

    }
?>