<?php

include_once 'App/Models/curso.php';
//include_once 'App/models/categorias.php';

    class AltaCategoriaModel extends Model{
        
        public function __construct(){
            parent::__construct();

        }

        public function insertarCategoria($datos, $DateF){

            try{
                $query = $this->db->conectar()->prepare('INSERT INTO categoria (Nombre_cat, Fecha_cat) values(?,?)');
                //Mapeamos los datos con un bindParam() para hacer referencia a las variables
                $query->bindParam(1, $datos['nomCategoriaINP']);
                $query->bindParam(2, $DateF);
                $query->execute();
                return true;

            }catch(PDOException $e){
                echo "ERROR: ".$e->getMessage();
                return false;
            }
        }
    }
?>
