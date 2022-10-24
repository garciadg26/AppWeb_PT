<?php

include_once 'App/db.php';

class User extends BD{
    private $nombre;
    private $username;

    //Metodo para comprobar si existe el usuario en la base de datos
    public function userExists($user, $pass){
        
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