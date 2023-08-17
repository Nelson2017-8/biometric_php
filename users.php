<?php
$config = array();
$conexion = new StdClass();
include "conf/conexion.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS only -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap5.min.css"/>
    <title>Biometrics</title>
    <link href="css/users.css" rel="stylesheet" type="text/css"/>
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card mb-5">
        <div class="card-header">
            Usuarios
        </div>
        <div class="card-body">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="users-create.php" class="btn btn-primary">Nuevo usuario</a>
                <button type="button" class="btn btn-dark close_fingerprint">Cerrar lector</button>
            </div>
            <hr>
            <div class="row">
                <div class="table-responsive">
                    <table id="users_table" class="responsive nowrap table table-striped table-sm">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Cedula</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/jquery-3.6.0.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="js/datatables.min.js"></script>
<script type="text/javascript" src="js/dataTables.bootstrap5.min.js"></script>
<script src="js/fontawesome.js" crossorigin="anonymous"></script>
<script src="js/sweetalert2@11.js"></script>
<script src="js/users.js"></script>
</body>

</html>
