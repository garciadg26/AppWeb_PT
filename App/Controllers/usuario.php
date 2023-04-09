<?php
    include_once 'App/Includes/user_session.php';
    include_once 'App/Includes/user.php';

    

    class Usuario extends Controller{

        public function __construct(){
            parent::__construct();
            $userSession = new UserSession(); 
            $user = new User();    
            
            $this->view->userSession = $userSession;
            $this->view->user = $user;
        }

        public function render(){
        
            $this->view->render('usuario/index');
        }

        public function verUser(){
            $user = new User();

            //Traemos un objeto con todos los datos
            $this->view->user = $user;
            $this->view->render('usuario/detalle');
        }

        public function verFoto(){

            //TRAEMOS UN OBJETO CON TODO LOS DATOS

            $this->view->render('usuario/foto');
        }

        public function actualizarUsuario(){
            $user = new User();

            $respuesta = [];
            echo json_encode($respuesta);

            //Obtener ID del usuario
            $NameUser = $_SESSION['user'];
            $user->setUser($NameUser);

            $idU = $user->idUser();
            $nombreU = $_POST['nombreUserINP'];
            $apellidoU = $_POST['apellidosUserINP'];
            $celularU = $_POST['celUserINP'];
            $telFijoU = $_POST['telUserINP'];
            $curpU = $_POST['curpUserINP'];
            $direccionU = $_POST['direccionUserINP'];
            $codigoPoU = $_POST['codigoPoUserINP'];
            $ciudadU = $_POST['ciudadUserINP'];
            $paisU = $_POST['paisUserINP'];
            $fechaNacU = $_POST['fechaNaUserINP'];

            ////////////// BLOQUE 2
            // CONDICIONES PARA ACTUALIZAR
            echo "Datos para actualizar: " . $nombreU . " " . $apellidoU . " " . $emailU . " " . $celularU . " " . $telFijoU . " " . $curpU . " " . $direccionU . " " . $codigoPoU . " " . $ciudadU . " " . $paisU . " " . $fechaNacU . " "; 
            if($this->model->actualizar(['nombreUserINP' => $nombreU, 'apellidosUserINP' => $apellidoU, 'celUserINP' => $celularU, 'telUserINP' => $telFijoU, 'curpUserINP' => $curpU, 'direccionUserINP' => $direccionU, 'codigoPoUserINP' => $codigoPoU, 'ciudadUserINP' => $ciudadU, 'paisUserINP' => $paisU, 'fechaNaUserINP' => $fechaNacU], $idU)){
                $user = new User();
                $this->view->user = $user;
                $mensaje = "<div class='msnSuccesLogin'>Curso actualizado exitosamente</div>";
            } else {
                $mensaje = "<div class='msnErrorLogin'>Error: En la base de datos del usuario</div>";
            }
            $this->view->mensaje = $mensaje;
            $this->view->render('usuario/detalle');
        }
    }
?>