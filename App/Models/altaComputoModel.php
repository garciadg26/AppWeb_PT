<?php

    include_once 'App/Models/curso.php';

    class AltaComputoModel extends Model{

        public function __construct(){
            parent::__construct();
        }

        public function insertarEquipo($datos){
            try{
                $query = $this->db->conectar()->prepare('INSERT INTO equipo (Numero_serie_equ, Nombre_equ, Estatus_equ) values(?,?,?)');
                $query->bindParam(1, $datos['numSerieINP']);
                $query->bindParam(2, $datos['nomEquipoINP']);
                $query->bindParam(3, $datos['statusEquipoINP']);
                $query->execute();
                return true;

            }catch(PDOException $e){
                echo "ERROR: " . $e;
                return false;
            }
        }
    }
?>