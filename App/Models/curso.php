<?php

    //CLASE PARA MAPEAR LOS DATOS
    class Curso{
        public $idC;
        public $nombreC;
        public $costoC;
        public $duracionC;
        public $categoriaC;
        public $tipoC;
        public $softwareC;
        public $fotoC;
        public $totalC;
        public $totalAlu;
    }
    
    class Categorias{
        public $idCa;
        public $nombreCa;
    }

    class Tipo{
        public $idTi;
        public $nombreTi;
    }

    class Software{
        public $idSo;
        public $nombreSo;
    }

    class Fotos{
        public $idFoC;
        public $nombreFoC;
        public $urlFoC;
        public $fechaFoC;
    }

?>