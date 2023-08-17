<?php

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

$conexion = null;
include_once '../conf/conexion.php';
include_once './ErrorHandler.php';
set_time_limit(0);
date_default_timezone_set("America/Bogota");
$token = $_GET['token'];
$fecha_actual = 0;
$fecha_bd = 0;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $fecha_actual = (isset($_POST['timestamp']) && $_POST['timestamp'] != 'null') ? $_POST['timestamp'] : 0;
} else {
    if (isset($_GET['timestamp']) && $_GET['timestamp'] != 'null') {
        $fecha_actual = $_GET['timestamp'];
    }
}

$elapsedTime = 0;
while ($fecha_bd <= $fecha_actual) {
    $query = "Select fecha_creacion from huellas_temp where pc_serial = '" . $token . "' ORDER BY id DESC LIMIT 1";
    $rs = mysqli_query($conexion,$query);
    usleep(100000);
    clearstatcache();
    if ($rs->num_rows > 0 && $row = mysqli_fetch_object($rs)) {
        $fecha_bd = strtotime($row->fecha_creacion);
    }
    $elapsedTime = $elapsedTime + 1;
    if ($elapsedTime == 1500) {//modificar aqui si se requiere reiniciar em menos tiempo
        break;
    }
}

$query = "Select fecha_creacion, opc from huellas_temp where pc_serial = '" . $token . "' ORDER BY id DESC LIMIT 1";
$datos_query = mysqli_query($conexion,$query);

$array = array('fecha_creacion' => 0, 'opc' => 'reintentar');
if($row = mysqli_fetch_object($datos_query)){
    $array['fecha_creacion'] = strtotime($row->fecha_creacion);
    $array['opc'] = $row->opc;
}
$response = json_encode($array);
//echo "hola Mundo";
echo $response;


set_error_handler("ErrorHandler");