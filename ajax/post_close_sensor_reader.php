<?php


$conexion = null;
include_once '../conf/conexion.php';

$output = new stdClass();
$output->success = false;

if (!isset($_POST['id'])) {
    $output->message = 'El parametro id es requerido';
    echo json_encode($output);
    exit(1);
}
$id = $_POST['id'];

$delete = "delete from huellas_temp where id = $id";
$result = mysqli_query($conexion, $delete);

$output->success = true;

echo json_encode($output);
