<?php
$conexion = null;
include_once '../conf/conexion.php';
include_once './ErrorHandler.php';
$token = null;
extract($_POST, EXTR_OVERWRITE);
$output = new stdClass();
$output->success = false;

$delete = "delete from huellas_temp where pc_serial = '$token'";
$result = mysqli_query($conexion, $delete);
$insert = "insert into huellas_temp (pc_serial, texto, statusPlantilla, opc, end_fingerprint) "
    . "values ('$token', '', 'Cerrando sensor', 'close',false)";
$result = mysqli_query($conexion,$insert);
$output->success = true;

echo json_encode($output);
set_error_handler("ErrorHandler");