<?php

    include_once 'App/models/curso.php';

    class ConsultaModel extends Model{
        
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

        public function getById($id){
            $item = new Curso();

            $query = $this->db->conectar()->prepare('SELECT * FROM curso WHERE idCurso = :idcurso');
            try{
                $query->execute(['idcurso' => $id]);

                while($row = $query->fetch()){
                    $item->idC = $row['idCurso'];
                    $item->nombreC = $row['Nombre_cur'];
                    $item->costoC = $row['Costo_cur'];
                    $item->duracionC = $row['Duracion_cur'];
                    $item->categoriaC = $row['Categoria_idCategoria'];
                    $item->tipoC = $row['Tipo_idTipo'];
                    $item->softwareC = $row['Software_idSoftware'];
                }
                return $item;
            }catch(PDOException $e){
                return null;
            }
        }

        public function actualizar($item){
            $query = $this->db->conectar()->prepare('UPDATE curso SET Nombre_cur = ?, Costo_cur = ?, Duracion_cur = ? WHERE idCurso = ?');
            $query->bindParam(1,$item['nombreCursoIN']);
            $query->bindParam(2,$item['costoCursoINP']);
            $query->bindParam(3,$item['duracionCursoINP']);
            $query->bindParam(4,$item['id_verCurso']);
            
            try{

                $query->execute();
                return true;

            }catch(PDOException $e){
                return false;
            }
        
        }

    }
?>