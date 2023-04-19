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
        public $totalCat;
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

    class Alumno{
        public $idAlu;
        public $MatriculaAlu;
        public $NombreAlu;
        public $ApellidosAlu;
        public $EmailAlu;
        public $TelAlu;
        public $TelFijoAlu;
        public $CURPAlu;
        public $DireccionAlu;
        public $CPAlu;
        public $CiudadAlu;
        public $PaisAlu;
        public $FechaNacAlu;
        public $FechaCreadoAlu;
        public $EdadAlu;
    }

    class Aula{
        public $idAul;
        public $nomAul;
        public $maxAul;
    }

    class Equipo{
        public $idEqu;
        public $numSerieEqu;
        public $nomEqu;
        public $estatusEqu;
        public $totalEqu;
    }

?>