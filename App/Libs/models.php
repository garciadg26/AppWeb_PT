<?php

    include_once 'App/Libs/db.php';

    class Model{
        public function __construct(){
            echo "Estoy en la clase Model";
            $this->db = new BD();
        }


    }

?>