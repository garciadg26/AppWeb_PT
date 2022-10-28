<?php

include_once 'App/models/curso.php';
include_once 'App/models/categorias.php';

    class AltaCursoModel extends Model{
        
        public function __construct(){
            parent::__construct();

        }

        public function consultarCurso(){

            $items = [];

            try{

                $query = $this->db->conectar()->query('SELECT * FROM curso');
                //Recorrer el arreglo para almacenar datos
                while($row = $query->fetch()){
                    //Objeto que encapsula las propiedades
                    $item = new Curso();
                    $item->idC = $row['idCurso'];
                    $item->nombreC = $row['Nombre_cur'];
                    $item->costoC = $row['Costo_cur'];
                    $item->duracionC = $row['Duracion_cur'];
                    $item->categoriaC = $row['Categoria_idCategoria'];
                    $item->tipoC = $row['Tipo_idTipo'];
                    $item->softwareC = $row['Software_idSoftware'];

                    //Permite ingresar a un arreglo, un nuevo valor 
                    array_push($items, $item);
                }

                return $items;

            }catch(PDOException $e){
                return [];
            }
        }

        public function consultarCategoria(){

            $items = [];

            try{

                $query = $this->db->conectar()->query('SELECT * FROM categoria');
                //Recorrer el arreglo para almacenar datos
                while($row = $query->fetch()){
                    //Objeto que encapsula las propiedades
                    $item = new Categorias();
                    $item->idCa = $row['idCategoria'];
                    $item->nombreCa = $row['Nombre_cat'];

                    //Permite ingresar a un arreglo, un nuevo valor 
                    array_push($items, $item);
                }

                return $items;

            }catch(PDOException $e){
                return [];
            }
        }

        public function consultarCategorias(){
            $items = [];

            try{


                $query = $this->db->conectar()->query('SELECT * FROM categoria');
                //Recorrer el arreglo para almacenar datos
                while($row = $query->fetch()){
                    $item = new Categorias();
                    $item->$idCat = $row['idCategoria'];
                    $item->$nombreCat = $row['Nombre_cat'];

                    //Permite ingresar a un arreglo, un nuevo valor 
                    array_push($items, $item);
                }

                return $items;

            }catch(PDOException $e){
                return [];
            }
        }
    }

?>
