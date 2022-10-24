<?php

    class View{
        public function __construct(){
            echo "<p>Vista base</p>";
        }

        public function render($nombre){
            require_once(__DIR__ . "/../Views/" . $nombre . '.php');
        }
    }

?>