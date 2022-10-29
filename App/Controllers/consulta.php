<?php

    class Consulta extends Controller{

        public function __construct(){
            parent::__construct();

            //Definimos la variable del arreglo
            $this->view->cursos = [];
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


            //Traemos un objeto con todos los datos enlazados
            $categorias = $this->model->consultarCategoria();
            $tipos = $this->model->consultarTipo();
            $softwares = $this->model->consultarSoftware();

            //ENCONTRAR EL ID PARA CATEGORIA DEL CURSO
            $categoC = $curso->categoriaC;
            echo "Categoria del curso: " . $categoC;

            //RENDERIZAMOS LA INFORMACION
            $this->view->curso = $curso;
            $this->view->categorias = $categorias;
            $this->view->tipos = $tipos;
            $this->view->softwares = $softwares;
            $this->view->render('consulta/detalle');
        }

        //Actualizar curso
        public function actualizarCurso(){
            //$validarCurActual = array();#E

            session_start();
            //PROBAR CON GETTER Y SETTER
            $idC = $_SESSION['id_verCurso'];

            $nombreC   = $_POST['nombreCursoINP'];
            $costoC = $_POST['costoCursoINP'];
            $duracionC   = $_POST['duracionCursoINP'];
            $categoriaC   = $_POST['catCursoINP'];
            $tipoC   = $_POST['tipoCursoINP'];
            $softwareC   = $_POST['softCursoINP'];


            ////////////// BLOQUE 2
            //CONDICIONAL PARA ACTUALIZAR
            if($this->model->actualizar(['id_verCurso' => $idC, 'nombreCursoIN' => $nombreC, 'costoCursoINP' => $costoC, 'duracionCursoINP' => $duracionC, 'catCursoINP' => $categoriaC, 'tipoCursoINP' => $tipoC, 'softCursoINP' => $softwareC])){
                //ACTUALIZAR CURSO EXITO

                //LLAMAMOS DE NUEVO EL MODELO PARA CONSULTAR LOS DATOS
                $curso = new Curso();
                $categorias = $this->model->consultarCategoria();
                $tipos = $this->model->consultarTipo();
                $softwares = $this->model->consultarSoftware();

                $curso->nombreC = $nombreC;
                $curso->costoC = $costoC;
                $curso->duracionC = $duracionC;
                $curso->categoriaC = $categoriaC;
                $curso->tipoC = $tipoC;
                $curso->softwareC = $softwareC;

                //RENDERIZAMOS LOS DATOS ACTUALES
                $this->view->curso = $curso;
                $this->view->categorias = $categorias;
                $this->view->tipos = $tipos;
                $this->view->softwares = $softwares;

                $mensaje = "<div class='msnSuccesLogin'>Curso actualizado exitosamente</div>";
            }else{
                //MENSAJE DE ERROR
                $mensaje = "<div class='msnErrorLogin'>Error: En la base de datos del curso</div>";
            }
            //Mostrar la vista del mensaje
            $this->view->mensaje = $mensaje;
            $this->view->render('consulta/detalle');











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