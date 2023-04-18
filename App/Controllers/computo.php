<?php

    class Computo extends Controller{

        public function __construct(){
            parent::__construct();

            $this->view->aula = [];
            session_start();
            include_once 'App/Includes/validarUserAdmin.php';
        }

        public function render(){


            $equipos = $this->model->getEquipos();

            $this->view->equipos = $equipos;
            $this->view->render('computo/index');
        }

        public function verEquipo($param = null){
            //Asignamos solo un parametro
            $idEquipo = $param[0];
            //Traemos un objeto con todos los datos
            $equipo = $this->model->getByIdEquipo($idEquipo);
            $_SESSION['id_verEquipo'] = $equipo->idEqu;

            $this->view->equipo = $equipo;
            $this->view->render('computo/detalle');
        }

        public function actualizarEquipo(){
            $aula = new Equipo();

            $respuesta = [];
            echo json_encode($respuesta);
            //Obtener ID del Aula
            $idEquipo = $_SESSION['id_verEquipo'];

            $numeroSerieEquipo = $_POST['numSerieEquINP'];
            $nombreEquipo = $_POST['nombreEquINP'];
            $estatusEquipo = $_POST['estatusEquINP'];

            //CONDICIONALES PARA ACTUALIZAR
            if($this->model->actualizar(['id_verEquipo' => $idEquipo, 'numSerieEquINP' => $numeroSerieEquipo, 'nombreEquINP' => $nombreEquipo, 'estatusEquINP' => $estatusEquipo])){
                $equipo = new Equipo();

                $equipo->numSerieEqu = $numSerieEqu;
                $equipo->nomEqu = $nomEqu;
                $equipo->estatusEqu = $estatusEqu;

                $this->view->equipo = $equipo;
                $mensaje = "<div class='msnSuccesLogin'>Equipo actualizado exitosamente</div>";
            } else{
                $mensaje = "<div class='msnErrorLogin'>Error: En la base de datos del curso</div>";
            }
            $this->view->mensaje = $mensaje;
            $this->view->render('computo/detalle');
        }

        public function eliminarEquipo($param = null){
            $idEquipo = $param[0];
            //CONDICIONAL PARA ELIMINAR
            if($this->model->eliminar($idEquipo)){
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