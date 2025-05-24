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
    <title>MPCH: Categoria </title>
     <style>
      div.dataTables_filter {
        display: none !important;
      }
      th{
        color: #0054a6 !important;
      }
      .titulo {
        color: #004085;
        display: flex;
        align-items: center;
        gap: 10px;
        background-color: rgb(247, 249, 250);
        padding: 10px 10px;
        border-left: 5px solid #17a2b8;
        border-radius: 6px;
      }
      .header-title {
      font-size: 1.5rem;
      background-color: #17a2b8;
      font-weight: 700;
      text-align: center;
      color: white;
      border-radius: 5px;
      display: flex;
      width: 90%;
      align-items: center;
      justify-content: center;
      gap: 0.5rem;
      margin: 0 auto; 
      }

      .header-title .icon {
      font-size: 1.5rem; 
      color:white;                
      } 
      .swal2-container {
        background: rgba(255, 255, 255, 0.05) !important;
        backdrop-filter: blur(4px);
        -webkit-backdrop-filter: blur(4px);
      }
      .swal2-popup {
        background: rgb(255, 255, 255) !important;
        box-shadow: 0 0.125rem 0.25rem rgba(0,0,0,0.1) !important;
      }
      .categoria-checkbox {
        width: 16px;
        height: 16px;
        border: 1px solid #000;
        border-radius: 50%;
        cursor: pointer;
      }
    </style>
</head>
<body>
    <?php require_once '../html/MainHeader.php';?> 
    <div class="page-wrapper">
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2  mb-5 align-items-center">
                    <div class="col">
                        <div class="page-pretitle mb-3">
                            Categorías
                        </div>
                        <h2 class="page-title" style="color:white;">
                           Gestión de Categorías
                        </h2>
                    </div>
                    <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                            <a href="#" class="btn btn-info d-none d-sm-inline-block"  onclick="nuevo()" data-bs-toggle="modal" data-bs-target="#modalcategoria">
                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-device-imac-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12.5 17h-8.5a1 1 0 0 1 -1 -1v-12a1 1 0 0 1 1 -1h16a1 1 0 0 1 1 1v8.5" /><path d="M3 13h13.5" /><path d="M8 21h4.5" /><path d="M10 17l-.5 4" /><path d="M16 19h6" /><path d="M19 16v6" /></svg>
                              Nuevo Registro
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-list-search"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 15m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" /><path d="M18.5 18.5l2.5 2.5" /><path d="M4 6h16" /><path d="M4 12h4" /><path d="M4 18h4" /></svg>
                        Lista de Categorías
                      </h3>
                    </div>  
                    <div class="table-responsive mx-4">
                      <div class="row my-4">
                        <div class="col-lg-12">
                          <div class="d-flex flex-wrap align-items-center gap-3">
                            <div class="d-flex align-items-center gap-2 mx-2">
                              <label class="form-label mb-0">Eliminar Grupo:</label>
                              <button type="button" class="btn bg-black text-light" id="eliminar_categorias">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-trash">
                                  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                  <path d="M4 7h16M10 11v6M14 11v6M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12M9 7V4a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"/>
                                </svg>
                                Eliminar
                              </button>
                            </div>
                            <div class="d-flex align-items-center gap-2 mx-3">
                              <label for="cantidad_registros" class="form-label mb-0">Mostrar:</label>
                              <div class="input-icon">
                                  <span class="input-icon-addon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                                      <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                                      <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                    </svg>
                                  </span>
                                  <input type="number" id="cantidad_registros"   style="width: 90px;" class="form-control" min="1" max="25" value="10"> 
                                </div>
                              <label>registros por página</label>  
                            </div>
                            <div class="d-flex align-items-center gap-2">
                              <label for="buscar_registros" class="form-label mb-0">Buscar:</label>
                              <div class="input-icon">
                                  <span class="input-icon-addon">
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-search"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M21 21l-6 -6" /></svg>
                                  </span>
                                  <input type="text" id="buscar_registros" class="form-control"> 
                              </div>
                            </div>
                          </div>
                          <div class="d-flex flex-wrap align-items-center gap-3 mx-2 mt-4">
                            <span id="contador_seleccionados" class="fw-normal text-dark">
                              Se encontraron 
                              <span class="px-3 py-1 rounded-4 bg-primary text-white fw-bold mx-1" id="contador_valor">0</span>
                              elementos
                             </span>
                          </div>
                        </div>
                      </div>
                      <table id="categoria_data" class="table card-table table-vcenter text-nowrap datatable">
                        <thead>
                          <tr>
                           <th><input type="checkbox" id="cat_id_all" class="categoria-checkbox"></th>
                            <th>Nombre</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>                
            </div>
        </div>  
    </div>
    <?php require_once 'modalcategoria.php';?>
    <?php require_once '../html/MainJs.php';?> 
    <script type="text/javascript" src="admincategoria.js"></script>
</body>
</html>
<?php
  }else{
    header("Location:".conectar::ruta()."view/404/");
  }
?>