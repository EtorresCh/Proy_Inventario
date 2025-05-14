<?php
   class Proveedor extends Conectar {
        public function get_proveedor(){
        $conectar = parent::conexion(); 
        parent::set_names();
        $sql = "SELECT * FROM proveedor where prov_est=1;";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
    }
?>