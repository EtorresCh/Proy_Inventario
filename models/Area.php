<?php
   class Area extends Conectar {
        public function get_area(){
        $conectar = parent::conexion(); 
        parent::set_names();
        $sql = "SELECT * FROM area where area_est=1;";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
    }
?>