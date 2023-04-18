<?php

    include_once 'App/Models/curso.php';

    class AltaAulaModel extends Model{

        public function __construct(){
            parent::__construct();
        }

        public function insertarAula($datos){
            try{
                $query = $this->db->conectar()->prepare('INSERT INTO aulas (Nombre_aul, Capacidad_max_aul) values(?,?)');
                $query->bindParam(1, $datos['nomAulaINP']);
                $query->bindParam(2, $datos['maxAulaINP']);
                $query->execute();
                return true;

            }catch(PDOException $e){
                echo "ERROR: " . $e;
                return false;
            }
        }
    }
?>