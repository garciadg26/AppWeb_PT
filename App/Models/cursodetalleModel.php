<?php
    include_once 'App/Models/curso.php';
    include_once 'App/Models/consultaModel.php';

    class CursodetalleModel extends Model{

        public function __construct(){
            parent::__construct();
            $this->consultaM = new ConsultaModel();
        }

        //CONSULTA MODEL
        public function getById($id){
            return $this->consultaM->getById($id);
        }

    }

?>