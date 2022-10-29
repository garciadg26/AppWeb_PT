<?php

    class Consulta extends Controller{

        public function __construct(){
            parent::__construct();

            //Definimos la variable del arreglo
            $this->view->cursos = [];
            $this->view->validarCurActual = array();
        }
        
        public function render(){
            //Renderizamos los datos obtenidos del modelo
            $cursos = $this->model->consultarCurso();
            $this->view->cursos = $cursos;
            $this->view->render('consulta/index');
        }

        //Ver detalle del curso
        public function verCurso($param = null){
            //Asignamos solo un parametro
            $idCurso = $param[0];
            //Traemos un objeto con todos los datos
            $curso = $this->model->getById($idCurso); 
            //Iniciamos sesion para evitar que se edite el ID del curso
            session_start();
            $_SESSION['id_verCurso'] = $curso->idC;
            #$id_curso = $curso->idC;

            $this->view->curso = $curso;
            $this->view->render('consulta/detalle');
        }

        //Actualizar curso
        public function actualizarCurso(){
            $validarCurActual = array();

            $nomCurso   = "";
            $costoCurso = "";
            $durCurso   = "";


            ////////////// BLOQUE 1
            ##VALIDACIONES DEL FORMULARIO
            ##VALIDACIONES DEL FORMULARIO
            if(isset($_POST['submit'])){

                $nombreC   = $_POST['nombreCursoINP'];
                $costoC = $_POST['costoCursoINP'];
                $duracionC   = $_POST['duracionCursoINP'];
                /*
                $catCurso   = $_POST['catCursoINP'];
                $tipoCurso  = $_POST['tipoCursoINP'];
                $softCurso  = $_POST['softCursoINP'];*/

                $curso = new Curso();
                $curso->nombreC = $nombreC;
                $curso->costoC = $costoC;
                $curso->duracionC = $duracionC;

                $this->view->curso = $curso;

                //VALIDACIONES DE CAMPOS
                //VALIDACIONES DE CAMPOS
                if($nombreC == ""){
                    array_push($validarCurActual, "El campo Nombre no puede estar vacio.");
                }
                if($costoC == "" || $duracionC == ""){
                    array_push($validarCurActual, "El campo de Costo y Duración no pueden estar vacios.");
                }
                if(!is_numeric($costoC)){
                    array_push($validarCurActual, "El campo Costo sólo puede tener números.");
                }
                if(!is_numeric($duracionC)){
                    array_push($validarCurActual, "El campo Duración sólo puede tener números.");
                }
                if(count($validarCurActual) > 0){
                    //SI EXISTE UN ELEMENTO ALMACENADO  == HAY ERRORES Y MUESTRA LA VISTA
                    $this->view->validarCurActual = $validarCurActual;
                }else{
                    ////////////// BLOQUE 2
                    ##INGRESO DEL REGISTRO VALIDADO
                    session_start();
                    //PROBAR CON GETTER Y SETTER
                    $idC = $_SESSION['id_verCurso'];
                    /*
                    $nombreC = $_POST['nombreCursoINP'];
                    $costoC = $_POST['costoCursoINP'];
                    $duracionC = $_POST['duracionCursoINP'];*/
                    
                    //SE CORTA LA SESION 
                    #unset($_SESSION['id_verCurso']);
        
                    //CONDICIONAL PARA ACTUALIZAR
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
                }
            }







            ////////////// BLOQUE 2
            //Por seguridad se actualiza el id de la sesion
            /*
            session_start();
            //PROBAR CON GETTER Y SETTER
            $idC = $_SESSION['id_verCurso'];
            
            $nombreC = $_POST['nombreCursoINP'];
            $costoC = $_POST['costoCursoINP'];
            $duracionC = $_POST['duracionCursoINP'];
            
            //SE CORTA LA SESION 
            #unset($_SESSION['id_verCurso']);

            //CONDICIONAL PARA ACTUALIZAR
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
            */
            $this->view->validarCurActual = $validarCurActual;
            $this->view->render('consulta/detalle');
        }

        //Eliminar curso
        public function eliminarCurso($param = null){
            //Asignamos solo un parametro
            $idCurso = $param[0];

            
            //CONDICIONAL PARA ACTUALIZAR
            if($this->model->eliminar($idCurso)){
                //ACTUALIZAR CURSO EXITO
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