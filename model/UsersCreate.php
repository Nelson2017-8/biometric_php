<?php

/*echo '{"success":true,"user_id":1042,"dni":"123","name":"123","message":"Usuario #1042 registrado con exito!"}';
exit(0);*/

$conexion = null;
include_once '../conf/conexion.php';
include_once './ErrorHandler.php';

$dni=null;
$name=null;
extract($_POST,EXTR_OVERWRITE);

$sql = "insert into huellad (huellaNombre, cedula) "
        . "values('$name', '$dni')";

$result = mysqli_query($conexion,$sql);

$output = new stdClass();
$output->success = false;

$user_id = mysqli_insert_id($conexion);
if($user_id){
    $output->success = true;
    $output->user_id = $user_id;
    $output->dni = $dni;
    $output->name = $name;
    $output->message = "Usuario #$user_id registrado con exito!";
}else{
    $output->message =  $conexion->error;
}

echo json_encode($output);
set_error_handler("ErrorHandler");