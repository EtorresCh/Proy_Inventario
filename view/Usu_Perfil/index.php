<?php
  require_once '../../conf/conexion.php';
  if (isset($_SESSION["usu_id"])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php require_once '../html/MainHead.php';?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MPCH: Perfil</title>
</head>
<body>
    <?php require_once '../html/MainHeader.php';?> 
    <div class="page-wrapper">
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2  mb-5 align-items-center">
                    <div class="col">
                        <div class="page-pretitle mb-3">
                            Perfil
                        </div>
                        <h2 class="page-title" style="color:white;">
                           Informacion de Datos Generales
                        </h2>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row row-cards">
                        <div class="col-12">
                            <form class="card" method="POST">
                                <div class="card-body">
                                    <div class="row row-cards">
                                        <div class="col-md-4 text-center">
                                            <h3 class="card-title mb-3">
                                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-pencil-check"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" /><path d="M13.5 6.5l4 4" /><path d="M15 19l2 2l4 -4" /></svg>
                                                Actualize sus datos
                                            </h3>
                                            <img src="../../static/illustrations/foto_perfil.png" class="rounded-circle mb-5" width="150" height="150" alt="Foto de perfil">
                                            <div class="mb-3">
                                                <label for="fotoPerfil" class="form-label">Cambiar foto</label>
                                                <input type="file" class="form-control" id="fotoPerfil" accept="image/*">
                                            </div>
                                        </div>
                                       <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="mb-5">
                                                    <label class="form-label">Nombres</label>
                                                    <input type="text" class="form-control" disabled=""  name="usu_nom" id="usu_nom" >
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-5">
                                                    <label class="form-label">Apellido Paterno</label>
                                                    <input type="text" class="form-control" disabled="" name="usu_apep" id="usu_apep" >
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-5">
                                                    <label class="form-label">Materno</label>
                                                    <input type="text" class="form-control" disabled="" name="usu_apem" id="usu_apem">
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="mb-5">
                                                    <label class="form-label">Correo</label>
                                                    <input type="text" class="form-control" disabled=""  name="usu_corr" id="usu_corr">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-5">
                                                    <label class="form-label">Contraseña</label>
                                                    <input type="password" class="form-control" name="usu_pass" id="usu_pass" >
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-5">
                                                    <label class="form-label">Telefono</label>
                                                    <input type="text" class="form-control" disabled="" name="telefono" id="telefono">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-5">
                                                    <label class="form-label">Rol</label>
                                                    <input type="text" class="form-control" disabled="" name="tipo_rol"  id="tipo_rol">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-5">
                                                    <label class="form-label">Sexo</label>
                                                    <input type="text" class="form-control" disabled="" name="usu_sex"  id="usu_sex">
                                                </div>                  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-end">
                                    <button type="submit" class="btn btn-primary">
                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-check"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                                        Editar Perfil
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div> 
    <?php require_once '../html/MainJs.php';?>  
    <script type="text/javascript" src="usuperfil.js"></script>
</body>
</html>
<?php
  }else{
    header("Location:".conectar::ruta()."view/404/");
  }
?>