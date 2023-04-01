<?php

    class Home extends Controller{
        
        public function __construct(){
            parent::__construct();
            $this->view->cursos = [];
        }

        public function render(){

            // $cursos = [];
            // $cursos = $user->consultarCursoUser();

            // $cursos = $this->model->getCurso();
            // $cursos = $this->user->consultarCursoUser();
            // $this->view->cursosk = $cursos;
            $this->view->render('homePage/index');

        }
    }
?>