<?php 
    
    class Alumnos extends Controller{

        public function __construct(){
            parent::__construct();
        }
        
        public function render(){
            session_start();
            include_once 'App/Includes/validarUserAdmin.php';

            $alumnos = $this->model->getAlumnos();

            $this->view->alumnos = $alumnos;
            $this->view->render('alumnos/index');
        }

        public function descargar(){
            $alumnos = $this->model->getAlumnos();

            $this->view->alumnos = $alumnos;
            $this->view->render('alumnos/descargar');
        }

        public function getEdad($fechaNacimiento){

            // COMPROBAMOS QUE SI TENGA FECHA
            $valores = explode('-',$fechaNacimiento);
            if(count($valores) == 3 && checkdate($valores[1],$valores[2],$valores[0])){

                // Formateamos la fecha de nacimiento
                $nacimiento = new DateTime($fechaNacimiento);
                $fechaActual = new DateTime(date("Y-m-d"));
                $diferencia = $fechaActual->diff($nacimiento); 
                
                return $diferencia->format("%y");
            } else {
                return "Vacio";
            }
        }
    }
?>