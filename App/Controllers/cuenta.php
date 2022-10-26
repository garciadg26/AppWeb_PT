<?php

    class Cuenta extends Controller{
        public function __construct(){
            parent::__construct();
            $this->view->render('cuenta/index');
        }

        public function crearUsuario(){
            echo "Usuario creado con exito";
            //AUTOMATICAMENTE SE RELACIONA CON UN ALUMNO
            $usuarioAlumno = 2;
            
            $nombreA = $_POST['nombreA'];
            $apellidosA = $_POST['apellidosA'];
            $emailA = $_POST['emailA'];
            $passA = $_POST['passA'];
            $celularA = $_POST['celularA'];

            if($this->model->insertar(['nombreA' => $nombreA, 'apellidosA' => $apellidosA, 'emailA' => $emailA, 'passA' => $passA, 'celularA' => $celularA, 2 => $usuarioAlumno])){
                echo "Nueva descripción creada";
                
            }
        }
    }
?>
