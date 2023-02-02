<?php

include_once 'App/Libs/db.php';
include_once 'App/Models/curso.php';
//include_once 'App/Includes/user_session.php';
//$userSession = new UserSession();


class User extends BD{
    private $nombre;
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
            echo "El usuario o ontrase;a no encontrado";
            include_once 'App/Views/login/index.php';
        }
    }

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
    public function consultarCurso(){

        $items = [];

        try{

            $query = $this->conectar()->query('SELECT * FROM curso');
            //Recorrer el arreglo para almacenar datos
            while($row = $query->fetch()){
                //Objeto que encapsula las propiedades
                $item = new Curso();
                $item->idC = $row['idCurso'];
                $item->nombreC = $row['Nombre_cur'];
                $item->costoC = $row['Costo_cur'];
                $item->duracionC = $row['Duracion_cur'];
                $item->categoriaC = $row['Categoria_idCategoria'];
                $item->tipoC = $row['Tipo_idTipo'];
                $item->softwareC = $row['Software_idSoftware'];

                //Permite ingresar a un arreglo, un nuevo valor 
                array_push($items, $item);
            }

            return $items;

        }catch(PDOException $e){
            return [];
        }
    }

}

?>