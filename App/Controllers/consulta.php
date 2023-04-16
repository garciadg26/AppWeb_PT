<?php

    include_once 'App/Includes/fechaTiempo.php';

    class Consulta extends Controller{

        public function __construct(){
            parent::__construct();

            $this->view->categorias = [];
            $this->view->cursos = [];
            //Definimos la variable del arreglo
            //$this->view->cursos = [];
            
            //VALIDAMOS SI EL USUARIO ES ADMINISTRADOR
            session_start();
            include_once 'App/Includes/validarUserAdmin.php';
        }
        
        public function render(){
            //Renderizamos los datos obtenidos del modelo
            //$cursos = $this->model->consultarCurso();
            $categorias = $this->model->consultarCategoria();
            $tipos      = $this->model->consultarTipo();
            $softwares  = $this->model->consultarSoftware();
            $cursos = $this->model->get();
            $this->view->categorias = $categorias;
            $this->view->tipos = $tipos;
            $this->view->softwares = $softwares;
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
            $_SESSION['id_verCurso'] = $curso->idC;


            //Traemos un objeto con todos los datos enlazados
            $categorias = $this->model->consultarCategoria();
            $tipos = $this->model->consultarTipo();
            $softwares = $this->model->consultarSoftware();
            $fotos = $this->model->consultarFotoC();

            //RENDERIZAMOS LA INFORMACION
            $this->view->curso = $curso;
            $this->view->categorias = $categorias;
            $this->view->tipos = $tipos;
            $this->view->softwares = $softwares;
            $this->view->fotos = $fotos;
            $this->view->render('consulta/detalle');
        }

        // VER GALERÍA DE FOTOS
        public function verCover($param = null){
            //ASIGNAMOS SOLO UN PARÁMETRO
            $idCurso = $param[0];
            //TRAEMOS UN OBJETO CON TODO LOS DATOS
            $curso = $this->model->getById($idCurso);
            //INICIAMOS SESIÓN PARA EVITAR QUE SE EDITE EL ID DEL CURSO
            $_SESSION['id_verCover'] = $curso->idC;

            //TRAEMOS UN OBJETO CON TODOS LOS DATOS ENLAZADOS
            $categorias = $this->model->consultarCategoria();
            $tipos = $this->model->consultarTipo();
            $softwares = $this->model->consultarSoftware();
            $fotos = $this->model->consultarFotoC();
            
            //RENDERIZAMOS LA INFORMACIÓN
            $this->view->curso = $curso;
            $this->view->categorias = $categorias;
            $this->view->tipos = $tipos;
            $this->view->softwares = $softwares;
            $this->view->fotos = $fotos;
            $this->view->render('consulta/foto');
        }

        //Actualizar curso
        public function actualizarCurso(){
            //$validarCurActual = array();#E


            $respuesta = [];
            echo json_encode($respuesta);
            
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

        //ACTUALIZAR FOTO
        public function actualizarFotoC(){


            $idC = $_SESSION['id_verCover'];
            $fotoC = $_POST['fotoINP_curso'];

            if($this->model->actualizarCoverC(['id_verCover' => $idC, 'fotoINP_curso' => $fotoC])){
                $curso = new Curso();
                $fotos = $this->model->consultarFotoC();
                $curso = $this->model->getById($idC); 
                $this->view->fotos = $fotos;
                $this->view->curso = $curso;


                $mensaje = "<div class='msnSuccesLogin'>Foto actualizada exitosamente</div>";
            }else{
                //MENSAJE DE ERROR
                $mensaje = "<div class='msnErrorLogin'>Error: No se pudo actualizar </div>";
            }
            //Mostrar la vista del mensaje
            $this->view->mensaje = $mensaje;
            $this->view->render('consulta/foto');
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


        public function eliminarCover($param = null){
            //Asignamos solo un parametro

            $idC = $_SESSION['id_verCover'];
            $idFoC = $param[0];

            $curso = new Curso();
            $fotos = $this->model->consultarFotoC();
            $curso = $this->model->getById($idC); 

            //CONDIIONAL PARA ACTUALIZAR
            if($this->model->eliminarFoto($idFoC)){
                //Mostrar la vista del mensaje
                $mensaje = "<div class='msnSuccesLogin'>Foto <b>eliminada</b> exitosamente</div>";
            }else{
                $mensaje = "<div class='msnErrorLogin'>Error: No se puede eliminar la foto de un curso vigente.</div>";
            }
            //Mostrar la vista del mensaje
            $this->view->fotos = $fotos;
            $this->view->curso = $curso;
            $this->view->mensaje = $mensaje;
            header("Location: " . constant('URL') . "consulta/verCover/" . $idC);
            //$this->view->render('consulta/foto');
        }

        public function subirImg(){

            
            $idC = $_SESSION['id_verCover'];
            $curso = $this->model->getById($idC);
            $idfoto =  $curso->fotoC;
            
            // if(!empty($_FILES)){
            //     echo "vacio";
            // }else{
            //     echo "lleno";
            // }

            if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES)){
                $check = @getimagesize($_FILES['foto']['tmp_name']);

                //COMPROBAMOS SI ES FORMATO JPG
                if($check !== false){

                    //RUTA DEL ARCHIVO
                    $carpeta_destino = 'Public/upload/';

                    $archivo_subido = $carpeta_destino . $_FILES['foto']['name'];
                    $titImgCur = $_POST['titNameINP'];
                    $dateF = new FechaTiempo();
                    $dateF = $dateF->mostrarFecha();

                    // CONDICONAL PARA SUBIR LA 
                    if($this->model->subirFotoCurso(['titNameINP' => $titImgCur], $archivo_subido, $dateF)){
                        // SUBIMOS LA IMAGEN A UNA CARPETA DENTRO DEL SERVIDOR
                        move_uploaded_file($_FILES['foto']['tmp_name'], $archivo_subido);
                        $mensaje = "<div class='msnSuccesLogin'>Registro exitoso</div>";
                    } else{
                        $mensaje = "<div class='msnErrorLogin'>Error: No se pudo registrar la imagen.</div>";
                    }

                    $cover = $this->model->consultaLastCover();
                    $idCover = $cover->idFoC;

                    // ACTUALIZAMOS FOTO DEL CURSO
                    if($this->model->actualizarLastCover($idC, $idCover)){
                        //Mostrar la vista del mensaje
                        $curso = new Curso();
                        $fotos = $this->model->consultarFotoC();
                        $curso = $this->model->getById($idC); 
                        $this->view->fotos = $fotos;
                        $this->view->curso = $curso;
                    } else{
                        $mensaje = "<div class='msnErrorLogin'>Error: No se pudo registrar la imagen.</div>";
                    }
                }else{
                    $mensaje = "<div class='msnErrorLogin'>Error: No se pudo registrar la imagen.</div>";
                }
            } else{
                $mensaje = "<div class='msnErrorLogin'>Error: No se pudo registrar la imagen.</div>";
            }


            $this->view->mensaje = $mensaje;
            $this->view->render('consulta/foto');
        }
    }
?>