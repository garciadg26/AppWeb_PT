<?php

include_once 'App/Libs/db.php';
//include_once 'App/Includes/user_session.php';
//$userSession = new UserSession();


class User extends BD{
    private $nombre;
    private $username;

    //Metodo para comprobar si existe el usuario en la base de datos
    public function userExists($user, $pass){

        //////////MODULO 1
        //$md5pass = md5($pass);  
        $query = $this->conectar()->prepare('SELECT * FROM usuarios WHERE Email_usu = :user AND Contrasenia_usu = :pass');
        $query->bindParam(':user', $user);
        $query->bindParam(':pass', $pass);
        
        $query->execute();

        //Comprobamos si el registro es exitoso
        //Validar el login
        
        if($query->rowCount()){
            return true;
        }else{
            return false;
        }

    }

    public function rolUser($user, $pass){
        $query = $this->conectar()->prepare('SELECT * FROM usuarios WHERE Email_usu = :user AND Contrasenia_usu = :pass');
        $query->bindParam(':user', $user);
        $query->bindParam(':pass', $pass);
        $query->execute();

        //////////MODULO 2
        //Transformar en un arreglo que se pueda utilizar
        $row = $query->fetch(PDO::FETCH_NUM);
        if($row == true){
            echo 'Nuevo usuario User: ' . $user;

            $rol = $row[15];
            $_SESSION['rol'] = $rol;
            
            switch($_SESSION['rol']){
                //ADMINISTRADOR
                case 1:
                    //echo '<meta http-equiv="refresh" content="2;URL=\'../iam/nuevo\'">';
                    include_once 'App/Views/nuevo/index.php';
                break;
                //ALUMNO
                case 2:
                    echo 'Ingreso el alumno';
                    //echo '<meta http-equiv="refresh" content="2;URL=\'../iam/main\'">';
                    include_once 'App/Views/homePage/index.php';
                    //include_once 'App/Views/ayuda/index.php';
                break;
                //INSTRUCTOR
                /*
                case 3:
                    echo '<meta http-equiv="refresh" content="2;URL=\'../iam/ayuda\'">';
                    //include_once 'App/Views/ayuda/index.php';
                    //include_once 'App/Views/homePage/index.php';
                break;*/
                default:
            }

        }else{
            //No existe
            echo "El usuario o ontrase;a no encontrado";
            include_once 'App/Views/login/index.php';
        }
    }
    /*
    public function userOptiones($rol){
        switch($rol){
            //ADMINISTRADOR
            case 1:
                include_once 'App/Views/nuevo/index.php';
            break;
            //ALUMNO
            case 2:
                include_once 'App/Views/homePage/index.php';
                //include_once 'App/Views/ayuda/index.php';
            break;
            //INSTRUCTOR
            case 3:
                include_once 'App/Views/ayuda/index.php';
                //include_once 'App/Views/homePage/index.php';
            break;
            default:
        }
    }*/

    public function setUser($user){
        $query = $this->conectar()->prepare('SELECT * FROM usuarios WHERE Email_usu = :user');
        $query->execute(['user' => $user]);

        foreach($query as $currentUser){
            $this->nombre = $currentUser['Nombre_usu'];
            $this->username = $currentUser['Email_usu'];
        }
    }

    public function getNombre(){
        return $this->nombre;
    }

    //METODO ABSTRACTO - CLASE ABSTRACTA 
    public function consultar(){

    }

}

?>