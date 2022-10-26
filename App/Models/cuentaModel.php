<?php
    class CuentaModel extends Model{

        public function __construct(){
            parent::__construct();
        }

        public function insertar($datos){
            //echo "Registro exitoso de usuario";
            var_dump($datos['2']);

            try{
                $usuarioAlumno = 2;
                //insertar datos en la base de datos
                //$query = $this->db->conectar()->prepare('INSERT INTO usuarios (Nombre_usu, Apellidos_usu, Email_usu, Contrasenia_usu, Telefono_usu, Tipo_idTipo_usuario) values(:nombreA, :apellidosA, :emailA, :passA, :celularA, 2)');
                $query = $this->db->conectar()->prepare('INSERT INTO usuarios (Nombre_usu, Apellidos_usu, Email_usu, Contrasenia_usu, Telefono_usu, Tipo_idTipo_usuario) values(?,?,?,?,?,?)');
                //Mapeamos los datos con un bindParam() para hacer referencia a las variables
                $query->bindParam(1, $datos['nombreA']);
                $query->bindParam(2, $datos['apellidosA']);
                $query->bindParam(3, $datos['emailA']);
                $query->bindParam(4, $datos['passA']);
                $query->bindParam(5, $datos['celularA']);
                $query->bindParam(6, $usuarioAlumno, PDO::PARAM_INT);
                $query->execute();
                //$query->execute(['nombreA' => $datos['nombreA'], 'apellidosA' => $datos['apellidosA'], 'emailA' => $datos['emailA'], 'passA' => $datos['passA'], 'celularA' => $datos['celularA'], 2 => $datos[$usuarioAlumno]]);
                return true;
            }catch(PDOException $e){
                echo "ERROR: ".$e->getMessage();
                return false;
            }
        }
    }
?>