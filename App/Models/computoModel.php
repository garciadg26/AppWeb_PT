<?php 
    include_once 'App/Models/curso.php';

    class ComputoModel extends Model{
        public function __construct(){
            parent::__construct();
        }

        public function getByIdEquipo($idEquipo){
            $item = new Equipo();
            $query = $this->db->conectar()->prepare('SELECT * FROM equipo WHERE idEquipo = :idequipo');
            try{
                $query->execute(['idequipo' => $idEquipo]);
                while($row = $query->fetch()){
                    $item->idEqu = $row['idEquipo'];
                    $item->numSerieEqu = $row['Numero_serie_equ'];
                    $item->nomEqu = $row['Nombre_equ'];
                    $item->estatusEqu = $row['Estatus_equ'];
                }

                return $item;
            }catch(PDOExeption $e){
                echo "Error SQL: " . $e;
            }
        }

        public function getEquipos(){
            $items = [];

            try{
                $query = $this->db->conectar()->query("SELECT * FROM equipo");
                while($row = $query->fetch()){
                    $item = new Curso();
                    $item->idEqu = $row['idEquipo'];
                    $item->numSerieEqu = $row['Numero_serie_equ'];
                    $item->nomEqu = $row['Nombre_equ'];
                    $item->estatusEqu = $row['Estatus_equ'];

                    array_push($items, $item);
                }

                return $items;
            }catch(PDOExeption $e){
                echo "Error en SQL: " . $e;
                return [];
            }
        }

        public function actualizar($item){
            $query = $this->db->conectar()->prepare('UPDATE equipo SET Numero_serie_equ = ?, Nombre_equ = ?, Estatus_equ = ? WHERE idEquipo = ?');
            $query->bindParam(1,$item['numSerieEquINP']);
            $query->bindParam(2,$item['nombreEquINP']);
            $query->bindParam(3,$item['estatusEquINP']);
            $query->bindParam(4,$item['id_verEquipo']);
            try{
                $query->execute();
                return true;

            }catch(PDOExeption $e){
                echo "Error sql: " . $e;
                return false;
            }
        }

        public function eliminar($idEquipo){
            $query = $this->db->conectar()->prepare('DELETE FROM equipo WHERE idEquipo = ?');
            $query->bindParam(1,$idEquipo);

            try{
                $query->execute();
                return true;
                
            }catch(PDOException $e){
                echo "Error sql : " . $e;
                return false;
            }
        }

    }

?>