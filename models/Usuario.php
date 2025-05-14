<?php
   class Usuario extends Conectar {
        public function login() {
            $conectar = parent::conexion();
            parent::set_names();
            if (isset($_POST["enviar"])) {
                $correo = $_POST["usu_corr"];
                $pass = $_POST["usu_pass"];
                if (empty($correo) || empty($pass)) {
                    header("Location:".conectar::ruta()."index.php?m=2");
                    exit();
                } else {
                        $sql = "SELECT * FROM usuario WHERE usu_corr = ? AND usu_pass =? and est = 1";
                        $stmt = $conectar->prepare($sql);
                        $stmt->bindValue(1, $correo);
                        $stmt->bindValue(2, $pass);
                        $stmt->execute();
                        $resultado = $stmt->fetch();
                        if (is_array($resultado) && count($resultado) > 0) {
                            $_SESSION["usu_id"] = $resultado["usu_id"];
                            $_SESSION["usu_nom"] = $resultado["usu_nom"];
                            $_SESSION["usu_apep"] = $resultado["usu_apep"];
                            $_SESSION["usu_corr"] = $resultado["usu_corr"];
                            $_SESSION["rol_id"] = $resultado["rol_id"];
                            header("Location:".conectar::ruta()."view/Usu_Home/");
                            exit();
                        } else {
                            header("Location:".conectar::ruta()."index.php?m=1");
                            exit();
                        }
                }
            }
        }
        public function get_usuario(){
            $conectar = parent::conexion(); 
            parent::set_names();
            $sql = "SELECT 
            usuario.usu_id,
            usuario.usu_nom,
            usuario.usu_apep,
            usuario.usu_apem,
            usuario.usu_corr,
            usuario.usu_pass,
            usuario.usu_sex,
            usuario.telefono,
            rol_usuario.rol_id,
            rol_usuario.tipo_rol
            FROM usuario
            INNER JOIN rol_usuario ON usuario.rol_id = rol_usuario.rol_id
            WHERE usuario.est = 1;";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }
        public  function get_usuario_x_id($usu_id){
         $conectar = parent::conexion(); 
             parent::set_names();
             $sql="SELECT 
                usuario.usu_id,
                usuario.usu_nom,
                usuario.usu_apep,
                usuario.usu_apem,
                usuario.usu_corr,
                usuario.usu_pass,
                usuario.telefono,
                usuario.usu_sex,
                rol_usuario.tipo_rol
                FROM usuario
                INNER JOIN rol_usuario ON usuario.rol_id = rol_usuario.rol_id
                WHERE usuario.est = 1 AND usuario.usu_id = ?;";
             $sql=$conectar->prepare($sql);
             $sql->bindValue(1, $usu_id);
             $sql->execute();
            return $resultado=$sql->fetchAll();
        }
    }
?>