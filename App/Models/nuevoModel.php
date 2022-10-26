<?php

    class NuevoModel extends Model{

        public function __construct(){
            parent::__construct();
        }

        public function insertar(){
            echo "Registro insertado correctamente";
            /*
            try{
                //insertar datos en la base de datos
                $query = $this->db->conectar()->prepare('INSERT INTO descripcion (Acerca_des, Que_aprenderas_des, para_quien_des) values(:acercaDe, :queAprenderas, :paraQuien)');
                //Mapeamos los datos con un bindParam() para hacer referencia a las variables
                $query->execute(['acercaDe' => $datos['acercaDe'], 'queAprenderas' => $datos['queAprenderas'], 'paraQuien' => $datos['paraQuien']]);
                return true;
            }catch(PDOException $e){
                echo "Ya existe correo";
                return false;
            }*/


        }
    }
?>