<?php


    class AltaCurso extends Controller{

        public function __construct(){
            parent::__construct();

            //Definimos la variable del arreglo
            $this->view->categorias    = [];
            $this->view->tipos         = [];
            $this->view->softwares     = [];
            $this->view->validarCursos = array();

            $this->view->nomCurso = "";
            $this->view->costoCurso = "";
            $this->view->durCurso = "";
            $this->view->catCurso = "";
            $this->view->tipoCurso = "";
            $this->view->softCurso = "";

        }

        public function render(){
            ##PRIMERA PARTE - CONSULTAR CATEGORIAS
            //Traemos un objeto con todos los datos
            $categorias = $this->model->consultarCategoria();
            $tipos      = $this->model->consultarTipo();
            $softwares  = $this->model->consultarSoftware();
            //$categoria->$nombreCat;
            $this->view->categorias = $categorias;
            $this->view->tipos = $tipos;
            $this->view->softwares = $softwares;
            $this->view->render('altaCurso/index');
        }

        public function crearCurso(){
            $validarCursos = array();
            $mensaje = "";

            $nomCurso = "";
            $costoCurso = "";
            $durCurso = "";
            $catCurso = "";
            $tipoCurso = "";
            $softCurso = "";


            //BLOQUE 1
            ##VALIDACIONES DEL FORMULARIO
            // if(isset($_POST['submit'])){

                $respuesta = [];
                echo json_encode($respuesta);

                echo('DATOS ENVIADOS CON EXITO: ' . $nomCurso . $costoCurso . $durCurso . $catCurso . $tipoCurso . $softCurso);

                $nomCurso   = $_POST['nomCursoINP'];
                $costoCurso = $_POST['cosCursoINP'];
                $durCurso   = $_POST['durCursoINP'];
                $catCurso   = $_POST['catCursoINP'];
                $tipoCurso  = $_POST['tipoCursoINP'];
                $softCurso  = $_POST['softCursoINP'];

                //VALIDACIONES DE CAMPOS
                if($nomCurso == ""){
                    array_push($validarCursos, "El campo Nombre no puede estar vacio.");
                }
                if($costoCurso == "" && $durCurso == ""){
                    array_push($validarCursos, "El campo de Costo y Duración no pueden estar vacios.");
                }
                if(!is_numeric($costoCurso)){
                    array_push($validarCursos, "El campo Costo sólo puede tener números.");
                }
                if(!is_numeric($durCurso)){
                    array_push($validarCursos, "El campo Duración sólo puede tener números.");
                }
                if($catCurso == ""){
                    array_push($validarCursos, "Selecciona una Categoría.");
                }
                if($tipoCurso == ""){
                    array_push($validarCursos, "Selecciona un Tipo de curso.");
                }
                if($softCurso == ""){
                    array_push($validarCursos, "Selecciona un Software.");
                }
                if(count($validarCursos) > 0){
                    //SI EXISTE UN ELEMENTO ALMACENADO  == HAY ERRORES Y MUESTRA LA VISTA
                    $this->view->validarCursos = $validarCursos;
                }else{
                    ////////////// BLOQUE 2
                    ##INGRESO DEL REGISTRO VALIDADO
                    /*
                    $nomCurso   = $_POST['nomCursoINP'];
                    $costoCurso = $_POST['cosCursoINP'];
                    $durCurso   = $_POST['durCursoINP'];
                    $catCurso   = $_POST['catCursoINP'];
                    $tipoCurso  = $_POST['tipoCursoINP'];
                    $softCurso  = $_POST['softCursoINP'];
                    */
        
                    if($this->model->insertarCurso(['nomCursoINP' => $nomCurso, 'cosCursoINP' => $costoCurso, 'durCursoINP' => $durCurso, 'catCursoINP' => $catCurso, 'tipoCursoINP' => $tipoCurso, 'softCursoINP' => $softCurso])){
                        $mensaje = "<div class='msnSuccesLogin'>Registro exitoso</div>";
                        //REDIRECCIÓN USANDO HTML
                        echo '<meta http-equiv="refresh" content="2;URL=\'../altaCurso\'">';
                        //echo '<meta http-equiv="refresh" content="2;URL=\'http:localhost/iam/cuenta/\'">';
                    }else{
                        $mensaje = "El correo electrónico ya existe intenta con uno nuevo";
                        // $mensaje = "<div class='msnErrorLogin'>Error: No se pudo registrar el curso.</div>";
                    }
                }
            // }



            //BLOQUE 2
            /*
            $nomCurso   = $_POST['nomCursoINP'];
            $costoCurso = $_POST['cosCursoINP'];
            $durCurso   = $_POST['durCursoINP'];
            $catCurso   = $_POST['catCursoINP'];
            $tipoCurso  = $_POST['tipoCursoINP'];
            $softCurso  = $_POST['softCursoINP'];

            if($this->model->insertarCurso(['nomCursoINP' => $nomCurso, 'cosCursoINP' => $costoCurso, 'durCursoINP' => $durCurso, 'catCursoINP' => $catCurso, 'tipoCursoINP' => $tipoCurso, 'softCursoINP' => $softCurso])){
                $mensaje = "<div class='msnSuccesLogin'>Registro exitoso</div>";
                //REDIRECCIÓN USANDO HTML
                echo '<meta http-equiv="refresh" content="2;URL=\'../altaCurso\'">';
                //echo '<meta http-equiv="refresh" content="2;URL=\'http:localhost/iam/cuenta/\'">';
            }else{
                //$mensaje = "El correo electrónico ya existe intenta con uno nuevo";
                $mensaje = "<div class='msnErrorLogin'>Error: No se pudo registrar el curso.</div>";
            }
            */
            $this->view->nomCurso = $nomCurso;
            $this->view->costoCurso = $costoCurso;
            $this->view->durCurso = $durCurso;
            $this->view->catCurso = $catCurso;
            $this->view->tipoCurso = $tipoCurso;
            $this->view->softCurso = $softCurso;
            $this->view->mensaje = $mensaje;
            $this->render();
        }
    }
?>