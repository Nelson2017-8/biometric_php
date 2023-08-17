<?php


$conexion = null;
include_once '../conf/conexion.php';

$output = new stdClass();
$output->success = false;

if (!isset($_POST['type'])) {
    $output->message = 'El parametro type es requerido';
    echo json_encode($output);
    exit(1);
}
if (!isset($_POST['token'])) {
    $output->message = 'El parametro token es requerido';
    echo json_encode($output);
    exit(1);
}
$token = $_POST['token'];
$type = $_POST['type'];

$delete = "delete from huellas_temp where pc_serial = '$token'";
$result = mysqli_query($conexion, $delete);

$insert = "insert into huellas_temp (pc_serial, texto, opc,type) "
    . "values ('$token', 'El sensor de huella dactilar esta activado','leer','$type')";
$result = mysqli_query($conexion, $insert);
$output->success = true;

echo json_encode($output);
