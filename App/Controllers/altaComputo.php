<?php 

    class AltaComputo extends Controller{

        public function __construct(){
            parent::__construct();

            $this->view->nomEqu = "";
            $this->view->numSerieEqu = "";
            $this->view->estatusEqu = "";

            session_start();
            include_once 'App/Includes/validarUserAdmin.php';
        }

        public function render(){

            $this->view->render('altaComputo/index');
        }

        public function crearEquipo(){
            $mensaje = "";

            $nomEqu = "";
            $numSerieEqu = "";
            $estatusEqu = "";

            $respuesta = [];
            echo json_encode($respuesta);

            $numSerieEqu = $_POST['numSerieINP'];
            $nomEqu = $_POST['nomEquipoINP'];
            $estatusEqu = $_POST['statusEquipoINP'];
            
            echo ('ENVIO DE DATOS CON EXITO: ' . $nomEqu . " " . $numSerieEqu . " " . $estatusEqu);
            if($this->model->insertarEquipo(['numSerieINP' => $numSerieEqu, 'nomEquipoINP' => $nomEqu, 'statusEquipoINP' => $estatusEqu])){
                $mensaje = "<div class='msnSuccesLogin'>Registro exitoso</div>";
                //REDIRECCIÓN USANDO HTML
                echo '<meta http-equiv="refresh" content="2;URL=\'../altaCurso\'">';
            }else{
                $mensaje = "El correo electrónico ya existe intenta con uno nuevo";
            }
        }
    }
?>