<?php
$conexion = null;
include_once '../conf/conexion.php';

$output = new stdClass();
$output->success = false;

if(!isset($_POST['id'])){
    $output->message = 'El parametro id es requerido';
    echo json_encode($output);
    exit(1);
}
$user_id = $_POST['id'];

$delete = "delete from huellad where id = $user_id";
$result = mysqli_query($conexion, $delete);
$output->success = true;

echo json_encode($output);
