<?php

include_once 'App/Models/curso.php';
//include_once 'App/models/categorias.php';

    class AltaCursoModel extends Model{
        
        public function __construct(){
            parent::__construct();

        }

        
        public function consultarCategoria(){

            $items = [];
            try{
                $query = $this->db->conectar()->query('SELECT * FROM categoria');
                //Recorrer el arreglo para almacenar datos
                while($row = $query->fetch()){
                    //Objeto que encapsula las propiedades
                    $item = new Curso();
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

        public function insertarCurso($datos){
            //echo "Registro exitoso de usuario";

            try{
                //$usuarioAlumno = 2;

                //insertar datos en la base de datos
                //$query = $this->db->conectar()->prepare('INSERT INTO usuarios (Nombre_usu, Apellidos_usu, Email_usu, Contrasenia_usu, Telefono_usu, Tipo_idTipo_usuario) values(:nombreA, :apellidosA, :emailA, :passA, :celularA, 2)');
                $query = $this->db->conectar()->prepare('INSERT INTO curso (Nombre_cur, Costo_cur, Duracion_cur, Categoria_idCategoria, Tipo_idTipo, Software_idSoftware) values(?,?,?,?,?,?)');
                //Mapeamos los datos con un bindParam() para hacer referencia a las variables
                $query->bindParam(1, $datos['nomCursoINP']);
                $query->bindParam(2, $datos['cosCursoINP']);
                $query->bindParam(3, $datos['durCursoINP']);
                $query->bindParam(4, $datos['catCursoINP']);
                $query->bindParam(5, $datos['tipoCursoINP']);
                $query->bindParam(6, $datos['softCursoINP']);
                $query->execute();
                //$query->execute(['nombreA' => $datos['nombreA'], 'apellidosA' => $datos['apellidosA'], 'emailA' => $datos['emailA'], 'passA' => $datos['passA'], 'celularA' => $datos['celularA'], 2 => $datos[$usuarioAlumno]]);
                return true;

            }catch(PDOException $e){
                //echo "Error: Correo ya existe en el sistema";
                echo "ERROR: ".$e->getMessage();
                return false;
            }
        }
    }
?>
