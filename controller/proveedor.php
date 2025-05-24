<?php
require_once("../conf/conexion.php");
require_once("../models/Proveedor.php");
$proveedor = new Proveedor();
switch ($_GET["op"]) {
    case "listar":
        $datos = $proveedor->get_proveedor();
        $data= Array();
        foreach($datos as $row) {
        $sub_array = array();
        $sub_array[] = $row["prov_nom"];
        $sub_array[] = $row["prov_raz"];
        $sub_array[] = $row["prov_ruc"];
        $sub_array[] = $row["prov_tipo"];
        $sub_array[] = $row["prov_corr"];
        $sub_array[] = $row["prov_tel"];
        $sub_array[] = $row["prov_dir"];
        $sub_array[] = $row["prov_ciu"];
        $sub_array[] = $row["prov_dep"];
        $sub_array[] = '<button type="button"  onClick="editar(' . $row["prov_id"] . ');" id="' . $row["prov_id"] . '" class="btn btn-warning btn-xs d-flex text-center" style="width: 40px; height: 40px; padding: 0;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-edit">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                <path d="M16 5l3 3" />
                            </svg>
                        </button>'; 
        $sub_array[] = '<button type="button" onClick="eliminar(' . $row["prov_id"] . ');" id="' . $row["prov_id"] . '" class="btn btn-danger btn-xs d-flex tex-center"  style="width: 40px; height: 40px; padding: 0;">
                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-backspace">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M20 6a1 1 0 0 1 1 1v10a1 1 0 0 1 -1 1h-11l-5 -5a1.5 1.5 0 0 1 0 -2l5 -5z" />
                                <path d="M12 10l4 4m0 -4l-4 4" />
                            </svg>
                        </button>';
        $data[] = $sub_array;
        }
        $result = array(
        "sEcho"=>1,
        "iTotalRecords"=>count($data),
        "iTotalDisplayRecords"=>count($data),
        "aaData"=>$data);
        echo json_encode($result);  
        break;  
}
