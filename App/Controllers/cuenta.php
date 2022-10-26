<?php

    include_once 'App/Includes/fechaTiempo.php';
    

    class Cuenta extends Controller{
        public function __construct(){
            parent::__construct();
            $this->view->render('cuenta/index');
        }

        public function crearUsuario(){
            echo "Usuario creado con exito";
            //AUTOMATICAMENTE SE RELACIONA CON UN ALUMNO
            $usuarioAlumno = 2;
            
            $DateAndTime = new FechaTiempo();
            $DateAndTime = $DateAndTime->mostrarTiempo();
  
            $nombreA = $_POST['nombreA'];
            $apellidosA = $_POST['apellidosA'];
            $emailA = $_POST['emailA'];
            $passA = $_POST['passA'];
            $celularA = $_POST['celularA'];

            if($this->model->insertar(['nombreA' => $nombreA, 'apellidosA' => $apellidosA, 'emailA' => $emailA, 'passA' => $passA, 'celularA' => $celularA, $DateAndTime => $DateAndTime, 2 => $usuarioAlumno], $DateAndTime)){
                echo "Nueva descripción creada";
                //REDIRECCIÓN USANDO HTML
                echo '<meta http-equiv="refresh" content="2;URL=\'../cuenta\'">';
                //echo '<meta http-equiv="refresh" content="2;URL=\'http:localhost/iam/cuenta/\'">';
            }
        }
    }
?>
