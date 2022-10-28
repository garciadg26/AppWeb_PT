<?php


    class AltaCurso extends Controller{

        public function __construct(){
            parent::__construct();

            //Definimos la variable del arreglo
            $this->view->categorias = [];
            $this->view->tipos      = [];
            $this->view->softwares  = [];
            #$this->view->mensaje = "";
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
            $mensaje = "";

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

            $this->view->mensaje = $mensaje;
            $this->render();
        }

    }
?>