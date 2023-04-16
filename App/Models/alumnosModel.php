<?php 
    include_once 'App/Models/curso.php';

    class AlumnosModel extends Model{

        public function __construct(){
            parent::__construct();
        }

        //FUNCIÓN PARA CONSULTAR SOLO ALUMNOS
        public function getAlumnos(){
            $items = [];

            try{
                $query = $this->db->conectar()->query("SELECT * FROM usuarios WHERE Tipo_idTipo_usuario = 2");
                while($row = $query->fetch()){
                    $item = new Alumno();
                    $item->idAlu = $row['idUsuario']; 
                    $item->MatriculaAlu = $row['Numero_usu'];
                    $item->NombreAlu = $row['Nombre_usu'];
                    $item->ApellidosAlu = $row['Apellidos_usu'];
                    $item->EmailAlu = $row['Email_usu'];
                    $item->TelAlu = $row['Telefono_usu'];
                    $item->TelFijoAlu = $row['Telefono_fijo_usu'];
                    $item->CURPAlu = $row['CURP_usu'];
                    $item->DireccionAlu = $row['Direccion_usu'];
                    $item->CodigoPostalAlu = $row['Codigo_postal_usu'];
                    $item->CiudadAlu = $row['Ciudad_usu'];
                    $item->PaisAlu = $row['Pais_usu'];
                    $item->FechaNacAlu = $row['Fecha_nacimiento_usu'];
                    $item->FechaCreadoAlu = $row['Fecha_creado_usu'];
                    array_push($items, $item);
                }
                return $items;
            }catch(PDOExeption $e){
                echo "Error en SQL: " . $e;
                return [];
            }
        }

    }
?>