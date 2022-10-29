<?php

    include_once 'App/Includes/fechaTiempo.php';
    

    class Cuenta extends Controller{

        public function __construct(){
            parent::__construct();
            #$this->view->mensaje = "";

            $this->view->campos = array();
        }

        public function render(){
            $this->view->render('cuenta/index');
        }

        public function crearUsuario(){
            $campos = array();
            $mensaje = "";

            //BLOQUE 1
            ##VALIDACIONES DEL FORMULARIO
            if(isset($_POST['submit'])){
                
                $nombreA = $_POST['nombreA'];
                $apellidosA = $_POST['apellidosA'];
                $emailA = $_POST['emailA'];
                $passA = $_POST['passA'];
                $passAR = $_POST['passAR'];
                $celularA = $_POST['celularA'];
                
                
                //VALIDACION
                if($nombreA == "" && $apellidosA == ""){
                    array_push($campos, "El campo de Nombre y Apellidos no puede estar vacio.");
                }
                if(!is_numeric($celularA)){
                    array_push($campos, "El campo teléfono sólo puede tener números.");
                }
                if($celularA == "" || strlen($celularA) < 10){
                    array_push($campos, "Ingresa un número de teléfono con 10 digítos.");
                }
                if($emailA == "" || strpos($emailA, "@") === false){
                    array_push($campos, "Ingresa un correo electrónico válido.");
                }
                if($passA == "" || strlen($passA) < 8){
                    array_push($campos, "Ingresa una contraseña con al menos 8 caracteres.");
                }
                if($passA != $passAR ){
                    array_push($campos, "Las contraseñas no coinciden.");
                }
                if(count($campos) > 0){
                    //SI EXISTE UN ELEMENTO ALMACENADO  == HAY ERRORES Y MUESTRA LA VISTA
                    $this->view->campos = $campos;
                }else{
                    ////////////// BLOQUE 2
                    ##INGRESO DEL REGISTRO VALIDADO
                    //echo "<div class='msnSuccesLogin'>Registro exitoso</div>";
                    $usuarioAlumno = 2;
                
                    $DateAndTime = new FechaTiempo();
                    $DateAndTime = $DateAndTime->mostrarTiempo();
        
                    $nombreA = $_POST['nombreA'];
                    $apellidosA = $_POST['apellidosA'];
                    $emailA = $_POST['emailA'];
                    $passA = $_POST['passA'];
                    $celularA = $_POST['celularA'];
        
                    if($this->model->insertar(['nombreA' => $nombreA, 'apellidosA' => $apellidosA, 'emailA' => $emailA, 'passA' => $passA, 'celularA' => $celularA, $DateAndTime => $DateAndTime, 2 => $usuarioAlumno], $DateAndTime)){
                        $mensaje = "<div class='msnSuccesLogin'>Registro exitoso</div>";
                        //REDIRECCIÓN USANDO HTML
                        echo '<meta http-equiv="refresh" content="2;URL=\'../cuenta\'">';
                        //echo '<meta http-equiv="refresh" content="2;URL=\'http:localhost/iam/cuenta/\'">';
                    }else{
                        //$mensaje = "El correo electrónico ya existe intenta con uno nuevo";
                        $mensaje = "<div class='msnErrorLogin'>Error: El correo electrónico ya existe, intenta con uno nuevo</div>";
                    }
                    $this->view->mensaje = $mensaje;
                }
                //echo "</div>";
            }
            


            ////////////// BLOQUE 1
            //AUTOMATICAMENTE SE RELACIONA CON UN ALUMNO
            /*
            $usuarioAlumno = 2;
            //$mensaje = "";
            

            $DateAndTime = new FechaTiempo();
            $DateAndTime = $DateAndTime->mostrarTiempo();

            $nombreA = $_POST['nombreA'];
            $apellidosA = $_POST['apellidosA'];
            $emailA = $_POST['emailA'];
            $passA = $_POST['passA'];
            $celularA = $_POST['celularA'];

            if($this->model->insertar(['nombreA' => $nombreA, 'apellidosA' => $apellidosA, 'emailA' => $emailA, 'passA' => $passA, 'celularA' => $celularA, $DateAndTime => $DateAndTime, 2 => $usuarioAlumno], $DateAndTime)){
                $mensaje = "<div class='msnSuccesLogin'>Registro exitoso</div>";
                //REDIRECCIÓN USANDO HTML
                echo '<meta http-equiv="refresh" content="2;URL=\'../cuenta\'">';
                //echo '<meta http-equiv="refresh" content="2;URL=\'http:localhost/iam/cuenta/\'">';
            }else{
                //$mensaje = "El correo electrónico ya existe intenta con uno nuevo";
                $mensaje = "<div class='msnErrorLogin'>Error: El correo electrónico ya existe, intenta con uno nuevo</div>";
            }

            */
            //$this->view->mensaje = $mensaje;

            $this->render();
            //$this->view->render('cuenta/index');
        }
    }
?>
