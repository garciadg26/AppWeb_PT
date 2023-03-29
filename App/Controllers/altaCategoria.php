<?php

    include_once 'App/Includes/fechaTiempo.php';
    

    class AltaCategoria extends Controller{

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
            // $categorias = $this->model->consultarCategoria();
            // $tipos      = $this->model->consultarTipo();
            // $softwares  = $this->model->consultarSoftware();
            //$categoria->$nombreCat;
            // $this->view->categorias = $categorias;
            // $this->view->tipos = $tipos;
            // $this->view->softwares = $softwares;
            $this->view->render('altaCategoria/index');
        }

        public function crearCategoria(){
            $validarCategoria = array();
            $mensaje = "";

            $nomCategoria = "";

            //BLOQUE 1
            ##VALIDACIONES DEL FORMULARIO
            // if(isset($_POST['submit'])){

                $respuesta = [];
                echo json_encode($respuesta);

                echo('DATOS ENVIADOS CON EXITO: ' . $nomCategoria);

                $nomCategoria   = $_POST['nomCategoriaINP'];
                $DateF = new FechaTiempo();
                $DateF = $DateF->mostrarFecha();
                echo "Valor fecha: " . $DateF;

                //VALIDACIONES DE CAMPOS
                if($nomCategoria == ""){
                    array_push($validarCategoria, "El Nombre de la categoria no puede estar vacio.");
                }
                if(count($validarCategoria) > 0){
                    //SI EXISTE UN ELEMENTO ALMACENADO  == HAY ERRORES Y MUESTRA LA VISTA
                    $this->view->validarCategoria = $validarCategoria;
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
        
                    if($this->model->insertarCategoria(['nomCategoriaINP' => $nomCategoria], $DateF)){
                        $mensaje = "<div class='msnSuccesLogin'>Registro exitoso</div>";
                        //REDIRECCIÓN USANDO HTML
                        echo '<meta http-equiv="refresh" content="2;URL=\'../altaCategoria\'">';
                        //echo '<meta http-equiv="refresh" content="2;URL=\'http:localhost/iam/cuenta/\'">';
                    }else{
                        //$mensaje = "El correo electrónico ya existe intenta con uno nuevo";
                        $mensaje = "<div class='msnErrorLogin'>Error: No se pudo registrar la categoria.</div>";
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
            $this->view->nomCategoria = $nomCategoria;
            $this->view->mensaje = $mensaje;
            $this->render();
        }

    }
?>