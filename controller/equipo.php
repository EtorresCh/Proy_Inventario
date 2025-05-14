<?php
require_once("../conf/conexion.php");
require_once("../models/Equipo.php");
$equipo = new Equipo();
switch ($_GET["op"]) {
    case "listar":
        $datos = $equipo->get_equipo();
        $data= Array();
        foreach($datos as $row) {
            $sub_array = array();
            $sub_array[] = $row["equi_denom"];
            $sub_array[] = $row["cat_nom"];  
            $sub_array[] = $row["equi_fech_inv"];
            $sub_array[] = $row["equi_obs"];
            $sub_array[] = $row["equi_est"];            
            $sub_array[] = $row["equi_ubi"];  
            $sub_array[] = $row["area_nom"];                                         
            $sub_array[] = $row["prov_nom"];  
            $sub_array[] = $row["equi_qr_cb"];           
            $sub_array[] = '<button type="button"  onClick="editar(' . $row["equi_id"] . ');" id="' . $row["equi_id"] . '" class="btn btn-warning btn-xs d-flex text-center" style="width: 40px; height: 40px; padding: 0;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-edit">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                    <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                    <path d="M16 5l3 3" />
                                </svg>
                            </button>'; 
            $sub_array[] = '<button type="button" onClick="eliminar(' . $row["equi_id"] . ');" id="' . $row["equi_id"] . '" class="btn btn-danger btn-xs d-flex tex-center"  style="width: 40px; height: 40px; padding: 0;">
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
    case "lista_home":
        $datos = $equipo->get_equipo_lista();
        $data= Array();
        foreach($datos as $row) {
            $sub_array = array();
            $sub_array[] = $row["equi_denom"];
            $sub_array[] = $row["cat_nom"];  
            $sub_array[] = $row["equi_fech_inv"];
            $sub_array[] = $row["equi_obs"]; 
            $sub_array[] = $row["equi_est"];                      
            $sub_array[] = $row["equi_ubi"];  
            $sub_array[] = $row["area_nom"];                                        
            $sub_array[] = $row["prov_nom"];  
            $sub_array[] = $row["equi_qr_cb"];
            $data[] = $sub_array;           
            }
            $result = array(
            "sEcho"=>1,
            "iTotalRecords"=>count($data),
            "iTotalDisplayRecords"=>count($data),
            "aaData"=>$data);
        echo json_encode($result);  
    break;
    case "activo":
        $datos = $equipo->get_equipo_activo();
        if (is_array($datos) && count($datos) > 0) {
            foreach ($datos as $row) {
                $output["activo"] = $row["activo"];
            }
            echo json_encode($output);
        }
    break;
    case "mantenimiento":
        $datos = $equipo->get_equipo_mantenimiento();
        if (is_array($datos) && count($datos) > 0) {
            foreach ($datos as $row) {
                $output["mantenimiento"] = $row["mantenimiento"];
            }
            echo json_encode($output);
        }
    break;
    case "total":
        $datos = $equipo->get_equipo_total();
        if (is_array($datos) && count($datos) > 0) {
            foreach ($datos as $row) {
                $output["total"] = $row["total"];
            }
            echo json_encode($output);
        }
    break;
    case "ultimo":
         $datos = $equipo->get_ultimo_equipo();  
        if ($datos) {  
            echo json_encode($datos);  
        } else {
            echo json_encode(["error" => "No se encontró el último equipo."]); 
        }
    break;
    case "por_categoria":
        $datos = $equipo->get_productos_por_categoria();
        echo json_encode($datos);
    break;
    case "por_area":
        $datos = $equipo->get_productos_por_area();
        echo json_encode($datos);
    break;

   

}
