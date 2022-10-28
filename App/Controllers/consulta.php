<?php

    class Consulta extends Controller{

        public function __construct(){
            parent::__construct();

            //Definimos la variable del arreglo
            $this->view->cursos = [];
            $this->view->categorias = [];
        }
        
        public function render(){
            //Renderizamos los datos obtenidos del modelo
            $cursos = $this->model->consultarCurso();
            $this->view->cursos = $cursos;
            $this->view->render('consulta/index');
        }

        public function crearCurso(){
            ##PRIMERA PARTE - CONSULTAR CATEGORIAS
            //Traemos un objeto con todos los datos
            $categorias = $this->model->consultarCategorias();
            //$categoria->$nombreCat;
            var_dump($categorias);
            $this->view->categorias = $categorias;
            $this->view->render('consulta/index');
        }

        //Ver detalle del curso
        public function verCurso($param = null){
            //Asignamos solo un parametro
            $idCurso = $param[0];
            //Traemos un objeto con todos los datos
            $curso = $this->model->getById($idCurso); 
            //Iniciamos sesion para evitar que se edite el ID del curso
            #session_start();
            $_SESSION['id_verCurso'] = $curso->idC;
            #$id_curso = $curso->idC;

            $this->view->curso = $curso;
            $this->view->render('consulta/detalle');
        }

        //Actualizar curso
        public function actualizarCurso(){
            //Por seguridad se actualiza el id de la sesion
            #session_start();
            //PROBAR CON GETTER Y SETTER
            $idC = $_SESSION['id_verCurso'];
            
            $nombreC = $_POST['nombreCursoINP'];
            $costoC = $_POST['costoCursoINP'];
            $duracionC = $_POST['duracionCursoINP'];


            //
            if($this->model->actualizar(['id_verCurso' => $idC, 'nombreCursoIN' => $nombreC, 'costoCursoINP' => $costoC, 'duracionCursoINP' => $duracionC])){
                //ACTUALIZAR CURSO EXITO

                $curso = new Curso();
                $curso->nombreC = $nombreC;
                $curso->costoC = $costoC;
                $curso->duracionC = $duracionC;

                $this->view->curso = $curso;
                $mensaje = "<div class='msnSuccesLogin'>Curso actualizado exitosamente</div>";
            }else{
                //MENSAJE DE ERROR
                $mensaje = "<div class='msnErrorLogin'>Error: En la base de datos del curso</div>";
            }
            //Mostrar la vista del mensaje
            $this->view->mensaje = $mensaje;
            $this->view->render('consulta/detalle');
        }

        //Eliminar curso
        public function eliminarCurso(){

        }

    }
?>