<?php
  class Categoria extends Conectar {
    public function get_categoria(){
     $conectar = parent::conexion(); 
     parent::set_names();
     $sql = "SELECT * FROM categoria where cat_est=1 ORDER BY cat_id DESC;";
     $sql = $conectar->prepare($sql);
     $sql->execute();
     return $resultado = $sql->fetchAll();
    }
    public function delete_categoria($cat_id) {
      $conectar = parent::conexion(); 
      parent::set_names();
      $sql = "UPDATE categoria SET cat_est = 0 WHERE cat_id = ?";
      $stmt = $conectar->prepare($sql);         
      $stmt->execute([$cat_id]);                
    }
    public function insert_categoria($cat_nom){
        $conectar = parent::conexion(); 
        parent::set_names();
        $sql = "INSERT INTO categoria (cat_id,cat_nom, cat_est) VALUES (null,?, 1);";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cat_nom);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }
    public function update_categoria($cat_id, $cat_nom){
        $conectar = parent::conexion(); 
        parent::set_names();
        $sql = "UPDATE categoria SET cat_nom=? WHERE cat_id=?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cat_nom);
        $sql->bindValue(2, $cat_id);
        $sql->execute();
        return true; 
    }
    public function get_categoria_id($cat_id){
        $conectar = parent::conexion(); 
        parent::set_names();
        $sql="SELECT * FROM categoria WHERE cat_est = 1 and cat_id=?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$cat_id);
        $sql->execute();
        return $resultado=$sql->fetchAll();    
    }
  }
?>