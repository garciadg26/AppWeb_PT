<?php

    include_once 'App/Includes/fechaTiempo.php';
    

    class Cuenta extends Controller{

        public function __construct(){
            parent::__construct();
            #$this->view->mensaje = "";
        }

        public function render(){
            $this->view->render('cuenta/index');
        }

        public function crearUsuario(){

            //AUTOMATICAMENTE SE RELACIONA CON UN ALUMNO
            $usuarioAlumno = 2;

            $mensaje = "";

            $DateAndTime = new FechaTiempo();
            $DateAndTime = $DateAndTime->mostrarTiempo();
  
            $nombreA = $_POST['nombreA'];
            $apellidosA = $_POST['apellidosA'];
            $emailA = $_POST['emailA'];
            $passA = $_POST['passA'];
            $celularA = $_POST['celularA'];

            if($this->model->insertar(['nombreA' => $nombreA, 'apellidosA' => $apellidosA, 'emailA' => $emailA, 'passA' => $passA, 'celularA' => $celularA, $DateAndTime => $DateAndTime, 2 => $usuarioAlumno], $DateAndTime)){
                $mensaje = "<div class='msnSuccesLogin'>Registro exitoso</div>";
                //REDIRECCIÓN USANDO HTML
                echo '<meta http-equiv="refresh" content="2;URL=\'../cuenta\'">';
                //echo '<meta http-equiv="refresh" content="2;URL=\'http:localhost/iam/cuenta/\'">';
            }else{
                //$mensaje = "El correo electrónico ya existe intenta con uno nuevo";
                $mensaje = "<div class='msnErrorLogin'>Error: El correo electrónico ya existe, intenta con uno nuevo</div>";
            }

            $this->view->mensaje = $mensaje;
            $this->render();
        }
    }
?>
