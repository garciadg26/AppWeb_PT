<?php
            $url = $_SERVER['REQUEST_URI'];
            $host = $_SERVER['HTTP_HOST'];
            $ritch = "ritchman.com";
            $tanchy = "tanchy.com.mx";
            // BUSCAR
            $iamMain = "main";
            // CONTROLLADORES
            $alumnos = "alumnos";
            $consulta = "consulta";
            $plantel = "plantel";
            $computo = "computo";
            $altaAula = "altaAula";
            $altaComputo = "altaComputo";
            $altaCurso = "altaCurso";
            $categoria = "categoria";
            $altaCategoria = "altaCategoria";
            $posIamMain = strpos($url, $iamMain);
            $posAlumnos = strpos($url, $alumnos);
            $posConsulta = strpos($url, $consulta);
            $posPlantel = strpos($url, $plantel);
            $posComputo = strpos($url, $computo);
            $posAltaAula = strpos($url, $altaAula);
            $posAltaComputo = strpos($url, $altaComputo);
            $posaltaCurso = strpos($url, $altaCurso);
            $poscategoria = strpos($url, $categoria);
            $posaltaCategoria = strpos($url, $altaCategoria);
            $iam = "/";
            // $iam = "/iam" . "/";
            $usuario = "/iam/usuario";
            // if(strcmp($url, $iamMain) !== 0){
            //     // $userName = $this->userSession->getCurrentUser();
            //     // $this->user->setUser($userName);
            //     if(strcmp($url, $iam) == 0){
                    
            //     }else{
            //         session_start();
            //     }
            // }  else {
                
            // }
            $userTipo = $_SESSION['rol'];
            $userName = $_SESSION['user'];
            
            //VALIDACIÓN
            if( $userTipo == 'Administrador'){
                
            } else if($userTipo == 'Alumno'){
                
            }
?>