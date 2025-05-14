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
    <title>Document</title>
</head>
<body>
    <?php require_once '../html/MainHeader.php';?> 
    <div class="page-wrapper">
      <div class="page-header d-print-none">
        <div class="container-xl">
          <div class="row g-2  mb-5 align-items-center">
            <div class="col">
                <div class="page-pretitle mb-3">
                    Inicio
                </div>
                <h2 class="page-title" style="color:white;">
                    Dashboard
                </h2>
            </div>
          </div>
          <div class="col-12">
            <div class="row mb-3">
              <div class="col-md-3 col-lg-3 ">
                <div class="card ">
                  <div class="ribbon ribbon-top bg-yellow">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                      <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"></path>
                    </svg>
                  </div>
                  <div class="card-body">
                      <h3 class="card-title text-warning">Equipos Activos</h3>
                      <div class="row text-center">
                        <div class="col-lg-6">
                          <img style ="height:60px;" src="../../static/gif/computadora.gif" alt="Cargando..." />
                        </div>
                        <div class="col-lg-6">
                            <h1 id="lblactivo" style="font-size: 3rem;"></h1>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-lg-3 ">
                <div class="card ">
                  <div class="ribbon ribbon-top bg-green">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-graph"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 18v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" /><path d="M7 14l3 -3l2 2l3 -3l2 2" /></svg>
                  </div>
                  <div class="card-body">
                      <h3 class="card-title text-success">Equipos en Mantenimiento</h3>
                      <div class="row text-center">
                        <div class="col-lg-6">
                          <img style ="height:60px;" src="../../static/gif/ordenador-portatil.gif" alt="Cargando..." />
                        </div>
                        <div class="col-lg-6">
                            <h1 id="lblmantenimiento" style="font-size: 3rem;"></h1>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-lg-3">
                <div class="card">
                  <div class="ribbon ribbon-top bg-red">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-timeline-event-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 20m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M10 20h-6" /><path d="M14 20h6" /><path d="M12 15l-2 -2h-3a1 1 0 0 1 -1 -1v-8a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v8a1 1 0 0 1 -1 1h-3l-2 2z" /><path d="M10 8h4" /><path d="M12 6v4" /></svg>
                  </div>
                  <div class="card-body">
                    <h3 class="card-title text-danger">Ultimo Equipo Registrado</h3>
                    <div class="row text-center">
                        <div class="col-lg-6">
                          <img style ="height:60px;" src="../../static/gif/vlogger.gif" alt="Cargando..." />
                        </div>
                        <div class="col-lg-6">
                            <h4 id="lblultimo"></h4>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-lg-3 ">
                <div class="card ">
                  <div class="ribbon ribbon-top bg-black">
                       <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-align-box-bottom-right"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 3m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" /><path d="M11 15v2" /><path d="M14 11v6" /><path d="M17 13v4" /></svg>
                  </div>
                  <div class="card-body">
                      <h3 class="card-title text-dark">Total de Equipos</h3>
                      <div class="row text-center">
                        <div class="col-lg-6">
                          <img style ="height:60px;" src="../../static/gif/presentacion.gif" alt="Cargando..." />
                        </div>
                        <div class="col-lg-6">
                            <h1 id="lbltotal" style="font-size: 3rem;"></h1>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>  
            <div class="row mb-3">
              <div class="col-md-3 col-lg-4">
                <div class="card">
                  <div class="ribbon ribbon-top bg-azure">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                      <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"></path>
                    </svg>
                  </div>
                  <div class="card-body">
                    <h3 class="card-title text-info">Equipos Activos por Categoría</h3>
                    <div class="row text-center">
                      <div id="grafico_categoria" style="height: 200px;"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-lg-4">
                <div class="card">
                  <div class="ribbon ribbon-top bg-secondary">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-building-community"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8" /><path d="M13 7l0 .01" /><path d="M17 7l0 .01" /><path d="M17 11l0 .01" /><path d="M17 15l0 .01" /></svg>
                  </div>
                  <div class="card-body">
                    <h3 class="card-title text-secondary">Equipos Activos por Area</h3>
                    <div class="row text-center">
                      <div id="grafico_area" style="height: 200px;"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>    
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-list-search"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 15m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" /><path d="M18.5 18.5l2.5 2.5" /><path d="M4 6h16" /><path d="M4 12h4" /><path d="M4 18h4" /></svg>
                  Listado de Equipos.</h3>
              </div>
              <div class="table-responsive m-4">
                <table id="equipo_data" class="table card-table table-vcenter text-nowrap datatable">
                  <thead>
                    <tr>
                      <th>Denominacion</th>
                      <th>Categoria</th>
                      <th>Fecha Inventario</th>
                      <th>Observaciones</th>
                      <th>Estado</th>
                      <th>Ubicacion</th>
                      <th>Área</th>
                      <th>Proveedor</th>
                      <th>QR/CB</th>
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
   <script src="https://code.highcharts.com/highcharts.js"></script>
   <script src="https://code.highcharts.com/highcharts-3d.js"></script>
   <?php require_once '../html/MainJs.php'; ?>
   <script type="text/javascript" src="usuhome.js"></script>
</body>
</html>
<?php
  }else{
    header("Location:".conectar::ruta()."view/404/");
  }
?>