<?php
    class Area extends Conectar {
        public function get_area(){
            $conectar = parent::conexion(); 
            parent::set_names();
            $sql = "SELECT * FROM area where area_est=1 ORDER BY area_id DESC;";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }
        public function delete_area($area_id) {
            $conectar = parent::conexion(); 
            parent::set_names();
            $sql = "UPDATE area SET area_est = 0 WHERE area_id = ?";
            $stmt = $conectar->prepare($sql);         
            $stmt->execute([$area_id]);                
        }
    }
?>