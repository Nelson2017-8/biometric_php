<?php

$conexion = new StdClass();
include "conf/conexion.php";
$id = isset($_GET['id']) ? intval($_GET['id']) : null ;
if(!$id){
    echo "ID desconocido";
    exit(0);
}
$sql = "SELECT ID id, huellaNombre nombre, cedula,fingerprint FROM huellad where id=$id limit 1";
$result = $conexion->query($sql);
$item = null;

if (!($result && $result->num_rows)) {
    echo "ID desconocido";
    exit(0);
}else{
    $item = mysqli_fetch_object($result);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="600">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS only -->
    <link href="css/bootstrap.min.css" rel="stylesheet"
          >
    <title>Biometrics</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="css/users-create.css">
</head>
<body class="bg-light">
<div class="container">
    <main>
        <div class="py-5 text-center">
            <h2><?php echo is_null($item->fingerprint) ? 'Registrar' : 'Actualizar' ?> huella</h2>
            <p class="lead"><a href="users.php" class="close_fingerprint redirect">Volver</a></p>
        </div>

        <div class="row g-5 container_fingerprint">
<!--        <div class="row g-5 container_fingerprint" >-->
            <div class="col-md-7 col-lg-8 order-md-last">
                <h4 class="mb-3 title-card-finger">
                    Huella
                </h4>
                <div class="card card_finger">
                    <img id="sensor_image" src="imagenes/finger.jpg" class="card-img-top" alt="Finger" >
                    <div class="card-body">
                        <h5 class="card-title" id="sensor_state">Estado del sensor: Inactivo</h5>
                        <p class="card-text" id="sensor_info"></p>
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-lg-4">
                <h4 class="mb-3">Datos personales</h4>
                    <div class="row g-3">
                        <input type="hidden" id="id" name="id" value="<?php echo $item->id ?>">
                        <div class="col-12">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="fingerprint_name" placeholder="" value="<?php echo $item->nombre ?>" required="" readonly>
                        </div>
                        <div class="col-12">
                            <label for="fingerprint_cedula" class="form-label">Cedula</label>
                            <input type="text" class="form-control" id="fingerprint_cedula" placeholder="" value="<?php echo $item->cedula ?>" required="" readonly>
                        </div>
                    </div>
                    <!--<hr class="my-4">-->
            </div>
        </div>
    </main>
</div>
<script src="js/jquery-3.6.0.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/sweetalert2@11.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="js/utils.js"></script>
<script src="js/users-register-fingerprint.js"></script>
</body>
</html>
