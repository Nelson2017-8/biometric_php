<?php

$conexion = null;
include_once '../conf/conexion.php';
include_once './ErrorHandler.php';
$user_id=null;
$token=null;
extract($_POST,EXTR_OVERWRITE);
$output = new stdClass();
$output->success = false;

if($user_id){
    $delete = "delete from huellas_temp where pc_serial = '$token'";
    $result = mysqli_query($conexion,$delete);
    $insert = "insert into huellas_temp (pc_serial, texto, statusPlantilla, opc, user_id,end_fingerprint) "
        . "values ('$token', 'El sensor de huella dactilar esta activado', 'Muestras Restantes: 4', 'capturar',$user_id,false)";
    $result = mysqli_query($conexion,$insert);
    $output->success = true;

}else{
    $output->message = 'Parametro user_id desconocido';
}


echo json_encode($output);
set_error_handler("ErrorHandler");