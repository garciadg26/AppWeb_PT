<?php

    include_once 'App/Models/curso.php';

    class CategoriaModel extends Model{
        
        public function __construct(){
            parent::__construct();

        }

        //FUNCION PARA CONSULTAR LA BASE DE DATOS
        public function get(){
            $items = [];

            try{
                // $query = $this->db->conectar()->query("SELECT * FROM curso");
                $query = $this->db->conectar()->query("SELECT * 
                FROM curso 
                INNER JOIN categoria 
                ON curso.Categoria_idCategoria = categoria.idCategoria
                INNER JOIN tipo_curso
                ON curso.Tipo_idTipo = tipo_curso.idTipo
                INNER JOIN software
                ON curso.Software_idSoftware = software.idSoftware");
                while($row = $query->fetch()){
                    $item = new Curso();
                    $item->idC = $row['idCurso'];
                    $item->nombreC = $row['Nombre_cur'];
                    $item->costoC = $row['Costo_cur'];
                    $item->duracionC = $row['Duracion_cur'];
                    $item->categoriaC = $row['Nombre_cat'];
                    $item->tipoC = $row['Nombre_tipo'];
                    $item->softwareC = $row['Nombre_software'];

                    array_push($items, $item);
                }

                return $items;
            }catch(PDOException $e){
                return [];
            }
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
                $query = $this->db->conectar()->query('SELECT * FROM categoria ORDER BY Nombre_cat');
                //Recorrer el arreglo para almacenar datos
                while($row = $query->fetch()){
                    //Objeto que encapsula las propiedades
                    $item = new Curso();
                    $item->idCa = $row['idCategoria'];
                    $item->nombreCa = $row['Nombre_cat'];
                    $item->fechaCa = $row['Fecha_cat'];

                    //Permite ingresar a un arreglo, un nuevo valor 
                    array_push($items, $item);
                }
                return $items;
            }catch(PDOException $e){
                return [];
            }
        }

        public function consultarTipo(){

            $items = [];
            try{
                $query = $this->db->conectar()->query('SELECT * FROM tipo_curso');
                //Recorrer el arreglo para almacenar datos
                while($row = $query->fetch()){
                    //Objeto que encapsula las propiedades
                    $item = new Curso();
                    $item->idTi = $row['idTipo'];
                    $item->nombreTi = $row['Nombre_tipo'];

                    //Permite ingresar a un arreglo, un nuevo valor 
                    array_push($items, $item);
                }
                return $items;
            }catch(PDOException $e){
                return [];
            }
        }

        public function consultarSoftware(){

            $items = [];
            try{
                $query = $this->db->conectar()->query('SELECT * FROM software');
                //Recorrer el arreglo para almacenar datos
                while($row = $query->fetch()){
                    //Objeto que encapsula las propiedades
                    $item = new Curso();
                    $item->idSo = $row['idSoftware'];
                    $item->nombreSo = $row['Nombre_software'];

                    //Permite ingresar a un arreglo, un nuevo valor 
                    array_push($items, $item);
                }
                return $items;
            }catch(PDOException $e){
                return [];
            }
        }

        public function getById($id){
            $item = new Categoria();

            $query = $this->db->conectar()->prepare('SELECT * FROM categoria WHERE idCategoria = :idcategoria');
            try{
                $query->execute(['idcategoria' => $id]);

                while($row = $query->fetch()){
                    $item->idCa = $row['idCategoria'];
                    $item->nombreCa = $row['Nombre_cat'];
                    $item->fechaCa = $row['Fecha_cat'];
                }
                return $item;
            }catch(PDOException $e){
                return null;
            }
        }

        //MODELO PARA ACTUALIZAR
        public function actualizar($item){
            
            $query = $this->db->conectar()->prepare('UPDATE categoria SET Nombre_cat = ? WHERE idCategoria = ?');
            $query->bindParam(1,$item['nomCategoriaINP']);
            $query->bindParam(2,$item['id_verCategoria']);
            try{

                $query->execute();
                return true;

            }catch(PDOException $e){
                //echo "ERROR: AL ACTUALIZAR DATOS: " . $e;
                return false;
            }
        }

        //MODELO PARA ELIMINAR
        public function eliminar($idCategoria){
            $query = $this->db->conectar()->prepare('DELETE FROM categoria WHERE idCategoria = ?');
            $query->bindParam(1,$idCategoria);
            
            try{

                $query->execute();
                return true;

            }catch(PDOException $e){
                return false;
            }
        }
    }
?>