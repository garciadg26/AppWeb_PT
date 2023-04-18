<?php 

    class AltaAula extends Controller{

        public function __construct(){
            parent::__construct();

            $this->view->nomAula = "";
            $this->view->maxAula = "";
            $this->view->plantelAula = "";

            session_start();
            include_once 'App/Includes/validarUserAdmin.php';
        }

        public function render(){
            $this->view->render('altaAula/index');
        }

        public function crearAula(){
            $mensaje = "";
            $nomAula = "";
            $maxAula = "";

            $respuesta = [];
            echo json_encode($respuesta);

            echo ('ENVIO DE DATOS CON EXITO: ' . $nomAula . " " . $maxAula);
            $nomAula = $_POST['nomAulaINP'];
            $maxAula = $_POST['maxAulaINP'];

            if($this->model->insertarAula(['nomAulaINP' => $nomAula, 'maxAulaINP' => $maxAula])){
                $mensaje = "<div class='msnSuccesLogin'>Registro exitoso</div>";
                //REDIRECCIÓN USANDO HTML
                echo '<meta http-equiv="refresh" content="2;URL=\'../altaCurso\'">';
            }else{
                $mensaje = "El correo electrónico ya existe intenta con uno nuevo";
            }
        }

    }

?>