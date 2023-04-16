<?php

    class Categoria extends Controller{

        public function __construct(){
            parent::__construct();
            $this->view->cursos = [];
            //Definimos la variable del arreglo
            //$this->view->cursos = [];
        }
        
        public function render(){
            session_start();
            include_once 'App/Includes/validarUserAdmin.php';
            ##PRIMERA PARTE - CONSULTAR CATEGORIAS
            //Traemos un objeto con todos los datos
            $categorias = $this->model->consultarCategoria();
            $tipos      = $this->model->consultarTipo();
            $softwares  = $this->model->consultarSoftware();
            //$categoria->$nombreCat;
            $this->view->categorias = $categorias;
            $this->view->tipos = $tipos;
            $this->view->softwares = $softwares;
            $this->view->render('categoria/index');
        }

        //Ver detalle de la categoria
        public function verCategoria($param = null){
            session_start();
            //Asignamos solo un parametro
            $idCategoria = $param[0];
            //Traemos un objeto con todos los datos
            $categoria = $this->model->getById($idCategoria); 
            //Iniciamos sesion para evitar que se edite el ID del curso
            $_SESSION['id_verCategoria'] = $categoria->idCa;


            //Traemos un objeto con todos los datos enlazados
            $categorias = $this->model->consultarCategoria();
            // $tipos = $this->model->consultarTipo();
            // $softwares = $this->model->consultarSoftware();

            //RENDERIZAMOS LA INFORMACION
            $this->view->categoria = $categoria;
            $this->view->categorias = $categorias;
            // $this->view->tipos = $tipos;
            // $this->view->softwares = $softwares;
            $this->view->render('categoria/detalle');
        }

        //Actualizar curso
        public function actualizarCategoria(){
            //$validarCurActual = array();#E


            $respuesta = [];
            echo json_encode($respuesta);
            
            //PROBAR CON GETTER Y SETTER
            $idCa = $_SESSION['id_verCategoria'];
            $nombreCa   = $_POST['nomCategoriaINP'];

            ////////////// BLOQUE 2
            //CONDICIONAL PARA ACTUALIZAR
            if($this->model->actualizar(['id_verCategoria' => $idCa, 'nomCategoriaINP' => $nombreCa])){
                //ACTUALIZAR CURSO EXITO

                //LLAMAMOS DE NUEVO EL MODELO PARA CONSULTAR LOS DATOS
                $curso = new Curso();
                $categoria = $this->model->consultarCategoria();
                $tipos = $this->model->consultarTipo();
                $softwares = $this->model->consultarSoftware();

                // $curso->nombreCa = $nombreCa;
                $curso->nombreCa = $nombreCa;
                $categorias->nombreCa = $nombreCa;

                //RENDERIZAMOS LOS DATOS ACTUALES
                $this->view->curso = $curso;
                $this->view->categoria = $categoria;

                $mensaje = "<div class='msnSuccesLogin'>Curso actualizado exitosamente</div>";
            }else{
                //MENSAJE DE ERROR
                $mensaje = "<div class='msnErrorLogin'>Error: En la base de datos del curso</div>";
            }
            //Mostrar la vista del mensaje
            $this->view->mensaje = $mensaje;
            $this->view->render('categoria/detalle');











            ////////////// BLOQUE 2
            //Por seguridad se actualiza el id de la sesion
            /*
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
        public function eliminarCategoria($param = null){
            //Asignamos solo un parametro
            $idCategoria = $param[0];

            
            //CONDICIONAL PARA ACTUALIZAR
            if($this->model->eliminar($idCategoria)){
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