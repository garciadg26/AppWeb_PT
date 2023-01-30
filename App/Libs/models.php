<?php

    include_once 'App/Libs/db.php';

    class Model{
        public function __construct(){
            $this->db = new BD();
        }


    }

?>