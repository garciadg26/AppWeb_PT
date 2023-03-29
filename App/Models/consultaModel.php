<?php

    include_once 'App/Models/curso.php';
    include_once 'App/Models/categoriaModel.php';

    class ConsultaModel extends Model{
        
        public function __construct(){
            parent::__construct();
            $this->categoriaM = new CategoriaModel();

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
                ON curso.Software_idSoftware = software.idSoftware
                INNER JOIN foto_curso
                ON curso.Foto_idFoto = foto_curso.idFoto_curso");
                while($row = $query->fetch()){
                    $item = new Curso();
                    $item->idC = $row['idCurso'];
                    $item->nombreC = $row['Nombre_cur'];
                    $item->costoC = $row['Costo_cur'];
                    $item->duracionC = $row['Duracion_cur'];
                    $item->categoriaC = $row['Nombre_cat'];
                    $item->tipoC = $row['Nombre_tipo'];
                    $item->softwareC = $row['Nombre_software'];
                    $item->fotoURLC = $row['URL_foto_cur'];

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

        //CATEGORÍA 
        public function consultarCategoria(){
            return $this->categoriaM->consultarCategoria();
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

        public function consultarFotoC(){
            $items = [];
            try{
                $query = $this->db->conectar()->query('SELECT * FROM foto_curso');
                // RECORRER EL ARREGLO PARA ALMACENAR LOS DATOS
                while($row = $query->fetch()){
                    // Objeto que encapsula las propiedades
                    $item = new Curso();
                    $item->idFoC = $row['idFoto_curso'];
                    $item->nombreFoC = $row['Titulo_foto_cur'];
                    $item->urlFoC = $row['URL_foto_cur'];
                    $item->fechaFoC = $row['Fecha_subir_foto_cur'];

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
                    $item->fotoC = $row['Foto_idFoto'];
                }
                return $item;
            }catch(PDOException $e){
                return null;
            }
        }

        //MODELO PARA ACTUALIZAR
        public function actualizar($item){
            
            $query = $this->db->conectar()->prepare('UPDATE curso SET Nombre_cur = ?, Costo_cur = ?, Duracion_cur = ?, Categoria_idCategoria = ?, Tipo_idTipo = ?, Software_idSoftware = ? WHERE idCurso = ?');
            $query->bindParam(1,$item['nombreCursoIN']);
            $query->bindParam(2,$item['costoCursoINP']);
            $query->bindParam(3,$item['duracionCursoINP']);
            $query->bindParam(4,$item['catCursoINP']);
            $query->bindParam(5,$item['tipoCursoINP']);
            $query->bindParam(6,$item['softCursoINP']);
            $query->bindParam(7,$item['id_verCurso']);
            try{

                $query->execute();
                return true;

            }catch(PDOException $e){
                //echo "ERROR: AL ACTUALIZAR DATOS: " . $e;
                return false;
            }
        }

        public function actualizarCoverC($item){
            $query = $this->db->conectar()->prepare('UPDATE curso SET Foto_idFoto = ? WHERE idCurso = ?');
            $query->bindParam(1,$item['fotoINP_curso']);
            $query->bindParam(2,$item['id_verCover']);
            try{
                $query->execute();
                return true;
            }catch(PDOException $e){
                return false;
            }
        }

        public function consultaLastCover(){
            $item = new Curso();
            $query = $this->db->conectar()->prepare('SELECT * FROM foto_curso ORDER BY idFoto_curso DESC LIMIT 1');
            try{
                $query->execute();
                //RECORRER EL ARREGLO PARA ALMACENAR LOS DATOS
                while($row = $query->fetch()){
                    // OBJETO QUE ENCAPSULA LAS PROPIEDADES
                    $item->idFoC = $row['idFoto_curso'];
                    $item->nombreFoC = $row['Titulo_foto_cur'];
                    $item->urlFoC = $row['URL_foto_cur'];
                    $item->fechaFoC = $row['Fecha_subir_foto_cur'];
                    //PERMITE INGRESAR A UN ARREGLO, UN NUEVO VALOR
                }
                return $item;
            }catch(PDOException $e){
                echo "Error: " . $e->getMessage();
                return null;
            }
        }

        public function actualizarLastCover($idC, $idCover){
            try{
                $query = $this->db->conectar()->prepare('UPDATE curso SET Foto_idFoto = ? WHERE idCurso = ?');
                $query->bindParam(1,$idCover);
                $query->bindParam(2,$idC);
                $query->execute();
                return true;
            }catch(PDOException $e){
                echo "Error: " . $e->getMessage();
                return false;
            }
        }

        //MODELO PARA ELIMINAR
        public function eliminar($idCurso){
            $query = $this->db->conectar()->prepare('DELETE FROM curso WHERE idCurso = ?');
            $query->bindParam(1,$idCurso);
            
            try{

                $query->execute();
                return true;

            }catch(PDOException $e){
                return false;
            }
        }

        public function eliminarFoto($idFoC){
            $query = $this->db->conectar()->prepare('DELETE FROM foto_curso WHERE idFoto_curso = ?');
            $query->bindParam(1,$idFoC);
            try{
                $query->execute();
                return true;
            }catch(PDOException $e){
                return false;
            }
        }

        public function subirFotoCurso($datos, $archivo_subido, $dateF){
            try{
                $query = $this->db->conectar()->prepare('INSERT INTO foto_curso (Titulo_foto_cur, URL_foto_cur, Fecha_subir_foto_cur) values(?,?,?)');
                // Mapeamos los datos con un bindParam() para hacer referencia a las variables
                $query->bindParam(1, $datos['titNameINP']);
                $query->bindParam(2, $archivo_subido);
                $query->bindParam(3, $dateF);
                $query->execute();
                return true;

            }catch(PDOException $e){
                echo "Error: " . $e->getMessage();
                return false;
            }
        }
    }
?>