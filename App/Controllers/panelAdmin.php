<?php

    include_once 'App/Models/usuarioModel.php';

    class PanelAdmin extends Controller{
        
        public function __construct(){
            parent::__construct();

        }
    
        public function render(){
            $usuarioM =  new UsuarioModel();

            $alumno = $this->usuarioM->consultaNumberAlumno();

            $this->view->alumno = $alumno;
            $this->view->render('panelAdmin/index');
        }



        function regisAlu(){
            echo "Alumno creado";

            #Se puede validar
            //validar la estructura de los datos correctos

            /*
            $acercaDe = $_POST['acercaDe'];
            $queAprenderas = $_POST['queAprenderas'];
            $ParaQuien = $_POST['paraQuien'];

            if($this->model->insertar(['acercaDe' => $acercaDe, 'queAprenderas' => $queAprenderas, 'paraQuien' => $ParaQuien])){
                echo "Nueva descripción creada";
            }*/
            $this->model->insertar();
        }
    }
?>