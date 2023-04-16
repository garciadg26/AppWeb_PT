<?php

include_once 'App/Libs/db.php';
include_once 'App/Models/curso.php';
include_once 'App/Models/consultaModel.php';
//include_once 'App/Models/usuarioModel.php';
//include_once 'App/Includes/user_session.php';
//$userSession = new UserSession();


class User extends BD{
    private $nombre;
    private $apellido;
    private $username;
    

    //Metodo para comprobar si existe el usuario en la base de datos
    public function userExists($user, $pass){
        
        //////////MODULO 1
        //DESENCRIPTAR LA CONTRASEÑA
        #$md5pass = md5($pass);

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
        #$md5pass = md5($pass);
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
            header('Location:' . constant('URL'));

            //echo '<meta http-equiv="refresh" content="0;URL=\'../iam/main\'">';

        }else{
            //No existe
            echo "El usuario o ontraseña no encontrado";
            include_once 'App/Views/login/index.php';
        }
    }

    public function setUser($user){
        $query = $this->conectar()->prepare('SELECT * 
        FROM usuarios 
        INNER JOIN tipo_usuario
        ON usuarios.Tipo_idTipo_usuario = tipo_usuario.idTipo_usuario
        WHERE Email_usu = :user');
        $query->execute(['user' => $user]);

        foreach($query as $currentUser){
            $this->idUser = $currentUser['idUsuario'];
            $this->nombre = $currentUser['Nombre_usu'];
            $this->apellido = $currentUser['Apellidos_usu'];
            $this->userName = $currentUser['Email_usu'];
            $this->tipoUser = $currentUser['Nombre_tipo_usu'];
            $this->userTelFijo = $currentUser['Telefono_fijo_usu'];
            $this->userCiudad = $currentUser['Ciudad_usu'];
            $this->userCURP = $currentUser['CURP_usu'];
            $this->userTel = $currentUser['Telefono_usu'];
            $this->userPais = $currentUser['Pais_usu'];
            $this->userFechaN = $currentUser['Fecha_nacimiento_usu'];
            $this->userDireccion = $currentUser['Direccion_usu'];
            $this->userCodigoPostal = $currentUser['Codigo_postal_usu'];
        }
    }

    public function idUser(){
        return $this->idUser;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function getUserName(){
        return $this->userName;
    }
    public function getTipoUser(){
        return $this->tipoUser;
    }
    public function getTelFijo(){
        return $this->userTelFijo;
    }
    public function getCiudad(){
        return $this->userCiudad;
    }
    public function getCURP(){
        return $this->userCURP;
    }
    public function getTel(){
        return $this->userTel;
    }
    public function getPais(){
        return $this->userPais;
    }
    public function getFechaNacimiento(){
        return $this->userFechaN;
    }
    public function getDireccion(){
        return $this->userDireccion;
    }
    public function getCodigoPostal(){
        return $this->userCodigoPostal;
    }
    

    //METODO ABSTRACTO - CLASE ABSTRACTA 
    public function getCurso(){
        $this->consultarM = new ConsultaModel();
        return $this->consultarM->get();
    }

    public function getCategorias(){
        $this->consultarM = new ConsultaModel();
        return $this->consultarM->consultarCategoria();
    }

    public function getTipo(){
        $this->consultarM = new ConsultaModel();
        return $this->consultarM->consultarTipo();
    }

    public function getSoftware(){
        $this->consultarM = new ConsultaModel();
        return $this->consultarM->consultarSoftware();
    }

    public function getNumCurso(){
        $this->consultarM = new ConsultaModel();
        return $this->consultarM->consultaNumberCurso();
    }

    public function getNumAlumnos(){
        $item = new Curso();
        try{
            $query = $this->conectar()->query('SELECT COUNT(*) as totalAlu FROM usuarios WHERE Tipo_idTipo_usuario = 2');
            $query->execute();
            while($row = $query->fetch()){
                $item->totalAlu = $row['totalAlu'];
            }
            return $item;
        }catch(PDOException $e){
            echo 'Error SQL: ' . $e;
            return null;
        }
    }

    

}

?>