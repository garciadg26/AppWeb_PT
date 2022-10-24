<?php

    const DB = 'mysql';
    const DB_SERVIDOR = 'localhost';
    const DB_CHARSET = 'utf8';

    //CLASE ABSTRACTA PARA LA CONEXION A LA BASE DE DATOS
    abstract class BD{
        private static $db_usuario  = 'root';
        private static $db_pass = '';
        private static $db_servidor = DB_SERVIDOR;
        private static $db_nombre  = 'db_app_web_iam';
        private static $db_charset = DB_CHARSET;
        private $conexion; #conexion con al base de datos
    
        //Metodo conexion a la base de datos
        public function conectar(){
            try{
                
                $dsn = "mysql:host=".self::$db_servidor.";dbname=".self::$db_nombre;
                $pdo = new PDO($dsn, self::$db_usuario, self::$db_pass);
                $pdo->exec("SET CHARACTER SET ".self::$db_charset);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                return $pdo;
                //$conexion = new PDO('mysql:host=' .$db_servidor. ';dbname=' .$db_nombre, $db_usuario, $db_pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        
            }catch (PDOException $e){
                //echo "Error de conexión" . $e->getMessage();
                exit("ERROR: ".$e->getMessage());
            }
        }

        //Metodo desconexion de la base de datos
        public function desconectar(){
            $this->conexion = null;
        }

        # ACTUALIZAR CRUD
        //Consultar
        abstract protected function consultar();

    }

?>