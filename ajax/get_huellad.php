<?php

header('Content-type: application/json');

$conexion = new StdClass();
include "../conf/conexion.php";

$sql = "SELECT ID id, huellaNombre nombre, cedula, fingerprint FROM huellad";
$result = $conexion->query($sql);

$items = array();


if ($result && $result->num_rows > 0) {
    // output data of each row
    while ($item =mysqli_fetch_object($result) ) {
        $items[] = $item;
    }
}

echo json_encode($items);
