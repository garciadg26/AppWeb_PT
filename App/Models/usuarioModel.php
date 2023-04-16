<?php 

    include_once 'App/Models/curso.php';

    class UsuarioModel extends Model{

        public function __construct(){
            parent::__construct();
        }

        public function actualizar($datos, $idU){
            $query = $this->db->conectar()->prepare('UPDATE usuarios SET Nombre_usu = ?, Apellidos_usu = ?, Telefono_usu = ?, Telefono_fijo_usu = ?, CURP_usu = ?, Direccion_usu = ?, Codigo_postal_usu = ?, Ciudad_usu = ?, Pais_usu = ?, Fecha_nacimiento_usu = ? WHERE idUsuario = ?');
            $query->bindParam(1,$datos['nombreUserINP']);
            $query->bindParam(2,$datos['apellidosUserINP']);
            $query->bindParam(3,$datos['celUserINP']);
            $query->bindParam(4,$datos['telUserINP']);
            $query->bindParam(5,$datos['curpUserINP']);
            $query->bindParam(6,$datos['direccionUserINP']);
            $query->bindParam(7,$datos['codigoPoUserINP']);
            $query->bindParam(8,$datos['ciudadUserINP']);
            $query->bindParam(9,$datos['paisUserINP']);
            $query->bindParam(10,$datos['fechaNaUserINP']);
            $query->bindParam(11,$idU);
            try{
                $query->execute();
                return true;
            }catch(PDOException $e){
                echo "ERROR: AL ACTUALIZAR DATOS: " . $e;
                return false;
            }
        }
    }

?>