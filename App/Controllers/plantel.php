<?php
    
    class Plantel extends Controller{

        public function __construct(){
            parent::__construct();

            $this->view->aula = [];
            session_start();
            // include_once 'App/Includes/validarUserAdmin.php';
        }

        public function render(){


            $aulas = $this->model->getAulas();

            $this->view->aulas = $aulas;
            $this->view->render('plantel/index');
        }

        public function verAula($param = null){
            include_once 'App/Includes/validarUserAdmin.php';
            //Asignamos solo un parametro
            $idAula = $param[0];
            //Traemos un objeto con todos los datos
            $aula = $this->model->getByIdAula($idAula);
            $_SESSION['id_verAula'] = $aula->idAul;

            $this->view->aula = $aula;
            $this->view->render('plantel/detalle');
        }

        public function actualizarAula(){
            include_once 'App/Includes/validarUserAdmin.php';
            $aula = new Aula();

            $respuesta = [];
            echo json_encode($respuesta);
            //Obtener ID del Aula
            $idAula = $_SESSION['id_verAula'];

            $nomAul = $_POST['nombreAulaINP'];
            $maxAul = $_POST['maxAulaINP'];

            //CONDICIONALES PARA ACTUALIZAR
            if($this->model->actualizar(['id_verAula' => $idAula, 'nombreAulaINP' => $nomAul, 'maxAulaINP' => $maxAul])){
                $aula = new Aula();

                $aula->nomAul = $nomAul;
                $aula->maxAul = $maxAul;

                $this->view->aula = $aula;
                $mensaje = "<div class='msnSuccesLogin'>Curso actualizado exitosamente</div>";
            } else{
                $mensaje = "<div class='msnErrorLogin'>Error: En la base de datos del curso</div>";
            }
            $this->view->mensaje = $mensaje;
            $this->view->render('plantel/detalle');
        }

        public function eliminarAula($param = null){
            include_once 'App/Includes/validarUserAdmin.php';
            $idAula = $param[0];
            //CONDICIONAL PARA ELIMINAR
            if($this->model->eliminar($idAula)){
                //ELIMINAR AULA EXITO
                $mensaje = "<div class='msnSuccesLogin'>Curso ELIMINADO exitosamente</div>";
            }else{
                //MENSAJE DE ERROR
                $mensaje = "<div class='msnErrorLogin'>Error: No se pudo eliminar</div>";
            }
            //Mostrar la vista del mensaje
            $this->view->mensaje = $mensaje;
            $this->render();
        }
    }
?>