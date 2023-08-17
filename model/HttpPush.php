<?php
$conexion = null;
include_once '../conf/conexion.php';
include_once './ErrorHandler.php';

set_time_limit(600);
date_default_timezone_set("America/Bogota");

$fecha_actual = 0;
$fecha_bd = 0;

$user_id=null;
$token=null;
extract($_POST,EXTR_OVERWRITE);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $fecha_actual = (isset($_POST['timestamp']) && $_POST['timestamp'] != 'null') ? $_POST['timestamp'] : 0;
} else {
    if (isset($_GET['timestamp']) && $_GET['timestamp'] != 'null') {
        $fecha_actual = $_GET['timestamp'];
    }
}

$maxTry = 2;
$try = 0;

while ($fecha_bd && $fecha_bd <= $fecha_actual) {
    $sql = "SELECT update_time FROM huellas_temp where pc_serial = '$token' and user_id = '$user_id'  ORDER BY update_time DESC LIMIT 1";
    $result = mysqli_query($conexion,$sql);

    usleep(100000);
    clearstatcache();
    if($result->num_rows > 0 && $row = mysqli_fetch_object($result)){
        $fecha_bd = strtotime($row->update_time);
    }
    $try++;
}

$sql = "SELECT id, end_fingerprint, user_id, pc_serial,imgHuella,update_time,texto,statusPlantilla,documento,nombre, opc"
        . " FROM huellas_temp ORDER BY update_time DESC LIMIT 1";
$result = mysqli_query($conexion,$sql);

$output = new stdClass();
$output->success = false;

if (mysqli_num_rows($result) > 0 && $row = mysqli_fetch_object($result)) {
    $output->success = true;
    $output->row_id = "{$row->id}";
    $output->id = "{$row->pc_serial}_$row->user_id";
    $output->pc_serial = $row->pc_serial;
    $output->user_id =$row->user_id;
    $output->timestamp = strtotime($row->update_time);
    $output->texto =$row->texto;
    $output->statusPlantilla =$row->statusPlantilla;
    $output->nombre =$row->nombre;
    $output->documento =$row->documento;
    $output->imgHuella =$row->imgHuella;
    $output->end_fingerprint = boolval($row->end_fingerprint);
    $output->tipo =$row->opc;
}else{
    $output->message = "Sin resultados..";
}

echo json_encode($output);

set_error_handler("ErrorHandler");


