<?php
   class Categoria extends Conectar {
        public function get_categoria(){
        $conectar = parent::conexion(); 
        parent::set_names();
        $sql = "SELECT * FROM categoria where cat_est=1;";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
    }
?>