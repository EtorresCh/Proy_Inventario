<?php
   class Equipo extends Conectar {
        public function get_equipo(){
            $conectar = parent::conexion(); 
            parent::set_names();
            $sql = "SELECT 
                equipo.equi_id,
                equipo.equi_denom,
                equipo.equi_fech_inv,
                equipo.equi_obs,
                equipo.equi_est,
                equipo.equi_ubi,
                equipo.equi_qr_cb,
                categoria.cat_id,
                categoria.cat_nom,
                area.area_id,
                area.area_nom,
                proveedor.prov_id,
                proveedor.prov_nom
            FROM equipo
            INNER JOIN categoria ON equipo.cat_id = categoria.cat_id
            INNER JOIN area ON equipo.area_id = area.area_id
            INNER JOIN proveedor ON equipo.prov_id = proveedor.prov_id";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }
        public function get_equipo_lista(){
            $conectar = parent::conexion(); 
            parent::set_names();
            $sql = "SELECT 
                equipo.equi_id,
                equipo.equi_denom,
                equipo.equi_fech_inv,
                equipo.equi_obs,
                equipo.equi_est,
                equipo.equi_ubi,
                equipo.equi_qr_cb,
                categoria.cat_id,
                categoria.cat_nom,
                area.area_id,
                area.area_nom,
                proveedor.prov_id,
                proveedor.prov_nom
            FROM equipo
            INNER JOIN categoria ON equipo.cat_id = categoria.cat_id
            INNER JOIN area ON equipo.area_id = area.area_id
            INNER JOIN proveedor ON equipo.prov_id = proveedor.prov_id";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }
        public function get_equipo_activo(){
            $conectar = parent::conexion(); 
            parent::set_names();
            $sql = "SELECT count(*) as activo FROM equipo WHERE equi_est = 'activo';";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }
        public function get_equipo_mantenimiento(){
            $conectar = parent::conexion(); 
            parent::set_names();
            $sql = "SELECT count(*) as mantenimiento FROM equipo WHERE equi_est = 'mantenimiento';";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }
        public function get_equipo_total(){
            $conectar = parent::conexion(); 
            parent::set_names();
            $sql = "SELECT count(*) as total FROM equipo";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }
        public function get_ultimo_equipo(){
            $conectar = parent::conexion(); 
            parent::set_names();
            $sql = "SELECT equi_denom FROM equipo ORDER BY equi_id DESC LIMIT 1";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $resultado = $sql->fetch(PDO::FETCH_ASSOC);
        }
        public function get_productos_por_categoria() {
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT c.cat_nom AS categoria, COUNT(e.equi_id) AS cantidad
                    FROM equipo e
                    INNER JOIN categoria c ON e.cat_id = c.cat_id
                    WHERE e.equi_est = 'activo'
                    GROUP BY c.cat_nom
                    ORDER BY cantidad DESC";              
            $stmt = $conectar->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        public function get_productos_por_area() {
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT 
                        area.area_nom AS area, 
                        COUNT(equipo.equi_id) AS cantidad
                    FROM 
                        area
                    LEFT JOIN 
                        equipo ON equipo.area_id = area.area_id AND equipo.equi_est = 'activo'
                    GROUP BY 
                        area.area_nom
                    ORDER BY 
                        cantidad DESC;";              
            $stmt = $conectar->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

    }
?>