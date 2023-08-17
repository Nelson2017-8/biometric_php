<?php

$output = new stdClass();
$output->success = false;
/*
$output->message = "Testing";
exit(0);*/

$conexion = null;
include_once '../conf/conexion.php';
include_once './ErrorHandler.php';
$user_id = null;
$token = null;
extract($_POST,EXTR_OVERWRITE);

$query = "UPDATE huellad
SET 
    fingerprint= (select huella from huellas_temp where pc_serial = '$token'),
    imgHuella= (select imgHuella from huellas_temp where pc_serial = '$token')
WHERE id = $user_id;";

$result = mysqli_query($conexion,$query) ? 1 : 0;


$output->success = !!$result ;

if($output->success){
    $output->message = 'La huella ha sido registrada con exito!';

    $query = "delete from huellas_temp where pc_serial = '$token'";

    $result = mysqli_query($conexion,$query) ? 1 : 0;
    if(!$result){
        $output->message = mysqli_error($conexion);
    }
}else{
    $output->message = mysqli_error($conexion);
}

echo json_encode($output);
set_error_handler("ErrorHandler");