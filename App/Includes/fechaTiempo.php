<?php

    class FechaTiempo{
        public function __construct(){
            
        }

        public function mostrarTiempo(){
            $Object = new DateTime();  
            $Object->setTimezone(new DateTimeZone('America/Mexico_City'));
            $DateAndTime = $Object->format("Y-m-d h:i:s"); 
            return $DateAndTime;
        }
    }
?>