<?php 
    include_once 'App/Models/curso.php';

    class PlantelModel extends Model{
        public function __construct(){
            parent::__construct();
        }

        public function getByIdAula($id){
            $item = new Aula();
            $query = $this->db->conectar()->prepare('SELECT * FROM aulas WHERE idAula = :idaula');
            try{
                $query->execute(['idaula' => $id]);
                while($row = $query->fetch()){
                    $item->idAul = $row['idAula'];
                    $item->nomAul = $row['Nombre_aul'];
                    $item->maxAul = $row['Capacidad_max_aul'];
                }

                return $item;
            }catch(PDOExeption $e){
                echo "Error SQL: " . $e;
            }

        }

        public function getAulas(){
            $items = [];

            try{
                $query = $this->db->conectar()->query("SELECT * FROM aulas");
                while($row = $query->fetch()){
                    $item = new Curso();
                    $item->idAul = $row['idAula'];
                    $item->nomAul = $row['Nombre_aul'];
                    $item->maxAul = $row['Capacidad_max_aul'];

                    array_push($items, $item);
                }

                return $items;
            }catch(PDOExeption $e){
                echo "Error en SQL: " . $e;
                return [];
            }
        }

        public function actualizar($item){
            $query = $this->db->conectar()->prepare('UPDATE aulas SET Nombre_aul = ?, Capacidad_max_aul = ? WHERE idAula = ?');
            $query->bindParam(1,$item['nombreAulaINP']);
            $query->bindParam(2,$item['maxAulaINP']);
            $query->bindParam(3,$item['id_verAula']);
            try{
                $query->execute();
                return true;

            }catch(PDOExeption $e){
                echo "Error sql: " . $e;
                return false;
            }
        }

        public function eliminar($idAula){
            $query = $this->db->conectar()->prepare('DELETE FROM aulas WHERE idAula = ?');
            $query->bindParam(1,$idAula);

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