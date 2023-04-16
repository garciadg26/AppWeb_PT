<?php
    include_once 'App/Includes/user_session.php';
    include_once 'App/Includes/user.php';


    class Cursodetalle extends Controller{

        public function __construct(){
            parent::__construct();

            session_start();
        }

        public function render(){

            $this->view->render('cursodetalle/index');
        }

        public function verCursoDetalle($param = null){
            $idCurso = $param[0];
            //Traemos un objeto con todos los datos
            $curso = $this->model->getById($idCurso);

            $this->view->curso = $curso;
            $this->view->render('cursodetalle/detalle');
        }
    }

?>