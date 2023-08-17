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
            <h2>Registrar huella</h2>
            <p class="lead"><a href="users.php" class="close_fingerprint redirect">Volver</a></p>
        </div>

        <div class="row g-5 container_form_personal_fields">
            <div class="col-12">
                <h4 class="mb-3">Datos personales</h4>
                <form class="needs-validation" novalidate="" id="form_fingerprint_register">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="name" class="form-label">Nombre</label>
                            <input name="name" type="text" class="form-control" id="name" placeholder="" value=""
                                   required>
                            <div class="invalid-feedback">
                                El nombre es requerido.
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="dni" class="form-label">Cedula</label>
                            <input name="dni" type="text" class="form-control" id="dni" placeholder="" value=""
                                   required>
                            <div class="invalid-feedback">
                                La cedula es requerida.
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <button class="w-100 btn btn-primary btn-lg"
                            id="btn_fingerprint_register"
                            data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Registrando.."
                            type="submit">Registrar
                    </button>
                </form>
            </div>
        </div>
        <div class="row g-5 container_fingerprint" style="display: none">
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
                        <div class="col-12">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="fingerprint_name" placeholder="" value="" required="" readonly>
                        </div>
                        <div class="col-12">
                            <label for="fingerprint_cedula" class="form-label">Cedula</label>
                            <input type="text" class="form-control" id="fingerprint_cedula" placeholder="" value="" required="" readonly>
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
<script src="js/users-create.js"></script>
</body>
</html>
