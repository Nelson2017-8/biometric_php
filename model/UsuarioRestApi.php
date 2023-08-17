<?php

//Api Rest
header("Acces-Control-Allow-Origin: *");
header("Content-Type: application/json");

$conexion = null;
include_once '../conf/conexion.php';
include_once './ErrorHandler.php';
$method = $_SERVER['REQUEST_METHOD'];


// Metodo para peticiones tipo GET
if ($method == "GET") {
//    eliminar el token
    $token = $_GET['token'];
    $desde = $_GET['desde'];
    $hasta = $_GET['hasta'];

    $sql = "select * from huellad where fingerprint is not null limit " . $desde . "," . $hasta . " ";
    $rs = mysqli_query($conexion, $sql);


    $sql_ = "select count(*) total from huellad where fingerprint is not null";
    $rs_c = mysqli_query($conexion, $sql_);
    $total = 0;
    if ($row = mysqli_fetch_object($rs_c)) {
//        echo json_encode($row);
        $total = $row->total;
    }

    $arrayResponse = array();
    while ($row = mysqli_fetch_object($rs)) {
        $arrayObject = array();
        $arrayObject["count"] = $total;
        $arrayObject["cedula"] = $row->cedula;
        $arrayObject["huellaNombre"] = $row->huellaNombre;
//        $arrayObject["nombre_dedo"] = $row->nombre_dedo;
        $arrayObject["nombre_dedo"] = 'Indice D';
        $arrayObject["fingerprint"] = $row->fingerprint;
        $arrayObject["imgHuella"] = $row->imgHuella;
        $arrayResponse[] = $arrayObject;
    }
//echo count($arrayResponse); die;
    echo json_encode($arrayResponse);
}

// Metodo para peticiones tipo POST
if ($method == "POST") {
    $jsonString = file_get_contents("php://input");
    $jsonOBJ = json_decode($jsonString, true);
    $query = "update huellas_temp set huella = '" . $jsonOBJ['huella'] . "', imgHuella = '" . $jsonOBJ['imageHuella'] . "',"
        . "update_time = NOW(), statusPlantilla = '" . $jsonOBJ['statusPlantilla'] . "',"
        . "texto = '" . $jsonOBJ['texto'] . "' "
        . "where pc_serial = '" . $jsonOBJ['serial'] . "'";


//    echo $query;
    $row = mysqli_query($conexion,$query) ? 1 : 0;
    echo json_encode("Filas Agregadas: " . $row);
}


// Metodo para peticiones tipo PUT
if ($method == "PUT") {
    $jsonString = stripslashes(file_get_contents("php://input"));
    $jsonOBJ = json_decode($jsonString);

    if ($jsonOBJ->option == "verificar") {
        $query = "update huellas_temp set imgHuella = '" . $jsonOBJ->imageHuella . "',"
            . "update_time = NOW(),"
            . "statusPlantilla = '" . $jsonOBJ->statusPlantilla . "',"
            . "texto = '" . $jsonOBJ->texto . "',"
            . "documento =  '" . $jsonOBJ->documento . "',"
            . "nombre = '" . $jsonOBJ->nombre . "',"
            . "dedo =  '" . $jsonOBJ->dedo . "', 
                end_fingerprint = ". ($jsonOBJ->endFingerprint ? "TRUE" : "FALSE")
            . " where pc_serial = '" . $jsonOBJ->serial . "'";
    } else {
        $query = "update huellas_temp set imgHuella = '" . $jsonOBJ->imageHuella . "',"
            . "update_time = NOW(), statusPlantilla = '" . $jsonOBJ->statusPlantilla . "',"
            . " texto = '" . $jsonOBJ->texto . "', opc = 'stop', end_fingerprint = ". ($jsonOBJ->endFingerprint ? "TRUE" : "FALSE")
            . " where pc_serial = '" . $jsonOBJ->serial . "'";
    }

    $row = mysqli_query($conexion,$query) ? 1 : 0;

    $output = new stdClass();
    $output->success = !!$row;
    if($output->success){
        $output->message = "Huella actualizada con exito!";
    }else{
        $output->message = mysqli_error($conexion);
        $output->query = str_replace($jsonOBJ->imageHuella,'xxx',$query);
    }
/*    $log = json_encode(array(
        "value" => $jsonOBJ->endFingerprint,
        "type" => gettype($jsonOBJ->endFingerprint)
    ));
    $dir = dirname(__DIR__);
    file_put_contents("$dir/peticion-".rand().".json", $log);*/

    echo json_encode($output);

}


// Metodo para peticiones tipo PATCH
if ($method == "PATCH") {
    $jsonString = file_get_contents("php://input");
    $jsonOBJ = json_decode($jsonString, true);
    $query = "update huellas_temp set imgHuella = '" . $jsonOBJ['imgHuella'] . "',"
        . "update_time = NOW(), statusPlantilla = '" . $jsonOBJ['statusPlantilla'] . "', texto = '" . $jsonOBJ['texto'] . "', "
        . "documento = '" . $jsonOBJ['documento'] . "', nombre = '" . $jsonOBJ['nombre'] . "',"
        . "dedo = '" . $jsonOBJ['dedo'] . "' where pc_serial = '" . $jsonOBJ['serial'] . "'";
    $row = mysqli_query($conexion,$query) ? 1 : 0;
    echo json_encode("Filas Actualizadas: " . $row);
}
if ($method == "DELETE") {
    $jsonString = file_get_contents("php://input");
    $data = json_decode($jsonString, true);
    $token = $data['token'];
    $delete = "delete from huellas_temp where pc_serial = '$token'";
    $result = mysqli_query($conexion, $delete);
    $response = array(
        "success" => true,
    );
    echo json_encode($response);
}
set_error_handler("ErrorHandler");