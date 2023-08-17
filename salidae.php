<?php

$conexion = null;
include_once './conf/conexion.php';

?>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema Control de Visitantes ::::::SISCORE::::::</title>
    <meta name="generator" content="Virtual Mechanics SiteSpinner Pro V2 291">
    <meta http-equiv="imagetoolbar" content="false">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link href="css/bootstrap.min.css" rel="stylesheet"
          >
    <style type="text/css">
        <!--
        .dfltt {
            font-family: 'Times New Roman';
            font-size: 12px;
            font-weight: normal;
            font-style: normal;
            text-decoration: none;
            text-align: left;
            color: #000000;
        }

        .dfltc {
            font-family: 'Times New Roman';
            font-size: 12px;
            font-weight: normal;
            font-style: normal;
            text-decoration: none;
            text-align: left;
            color: #000000;
        }

        .lalign {
            position: relative;
            text-align: left;
        }

        .ralign {
            position: relative;
            text-align: right;
        }

        .calign {
            position: relative;
            text-align: center;
        }

        .jalign {
            position: relative;
            text-align: justify;
        }

        a:link {
            color: #0000ff;
        }

        a:visited {
            color: #ff0000;
        }

        a:active {
            color: #ff00ff;
        }

        body {
            margin: 0;
            height: 100%;
            width: 100%;
            text-align: center;
            background-color: #ffffff;
            background-image: url(./image/biz3_bg.gif);
            background-repeat: no-repeat;
        }

        img {
            border-width: 0;
        }


        #centered {
            position: relative;
            width: 984px;
            height: 100%;
            margin: 0px auto 0 auto;
            text-align: left;
            padding-left: 1px;
            cursor: default;
        }

        #Oobj100 {
            position: absolute;
            font-size: 10px;
            z-index: 1;
            left: 0.00em;
            top: 1.90em;
            width: 98.10em;
            height: 71.30em;
        }

        img#Ggeo64 {
            width: 100%;
            height: 100%;
        }

        #Oobj101 {
            position: absolute;
            font-size: 10px;
            z-index: 2;
            left: 0.00em;
            top: 72.70em;
            width: 98.00em;
            height: 4.10em;
        }

        img#Ggeo65 {
            width: 100%;
            height: 100%;
        }

        #Oobj102 {
            position: absolute;
            font-size: 10px;
            z-index: 3;
            text-align: left;
            left: 24.00em;
            top: 71.00em;
            width: 40.00em;
            height: 1.80em;
        }

        .txt0 {
            font-family: Verdana, sans-serif;
            color: #ffffff;
        }

        #Oobj103 {
            position: absolute;
            font-size: 10px;
            z-index: 4;
            left: 0.00em;
            top: -1.70em;
            width: 98.00em;
            height: 4.10em;
        }

        img#Ggeo66 {
            width: 100%;
            height: 100%;
        }

        #Oobj104 {
            position: absolute;
            font-size: 10px;
            z-index: 5;
            left: 0.50em;
            top: 70.10em;
            width: 13.70em;
            height: 2.20em;
        }

        img#Ggeo67 {
            width: 100%;
            height: 100%;
        }

        #Oobj107 {
            position: absolute;
            font-size: 10px;
            z-index: 6;
            text-align: left;
            left: 81.00em;
            top: 2.40em;
            width: 16.00em;
            height: 1.90em;
        }

        #Oobj113 {
            position: absolute;
            font-size: 10px;
            z-index: 7;
            left: 92.00em;
            top: 4.40em;
            width: 4.80em;
            height: 4.80em;
        }

        img#Ggeo70 {
            width: 100%;
            height: 100%;
        }

        #Oobj112 {
            position: absolute;
            font-size: 10px;
            z-index: 8;
            left: 92.00em;
            top: 10.40em;
            width: 5.00em;
            height: 5.00em;
        }

        img#Ggeo69 {
            width: 100%;
            height: 100%;
        }

        #Oobj475 {
            position: absolute;
            font-size: 10px;
            z-index: 9;
            left: 71.00em;
            top: 66.40em;
            width: 25.80em;
            height: 5.90em;
        }

        img#Ggeo272 {
            width: 100%;
            height: 100%;
        }

        #Oobj476 {
            position: absolute;
            font-size: 10px;
            z-index: 10;
            text-align: left;
            left: 1.00em;
            top: 5.00em;
            width: 79.00em;
            height: 40.10em;
        }

        #Oobj500 {
            position: absolute;
            font-size: 10px;
            z-index: 11;
            text-align: left;
            left: 1.00em;
            top: 2.60em;
            width: 45.30em;
            height: 2.20em;
        }

        .txt1 {
            font-family: Arial, sans-serif;
            font-size: 15px;
        }

        .bold {
            font-weight: bold;
        }

        #Oobj671 {
            position: absolute;
            font-size: 10px;
            z-index: 12;
            text-align: left;
            left: 83.00em;
            top: 21.00em;
            width: 6.40em;
            height: 6.50em;
        }

        .card_finger{
            width: 18rem;
            margin: 0 auto;
        }

        #sensor_image{
            width: 165px ;
            margin: 10px auto;
        }
        .title-card-finger{
            text-align: center;
        }
        -->
    </style>
</head>
<body>
<div id="centered">
    <div id="Oobj100">
        <img id="Ggeo64" src="./geometry/obj100geo64shd35pg5p7.png" alt="">
    </div>
    <div id="Oobj101">
        <img id="Ggeo65" src="./geometry/obj101geo65shd36pg5p7.png" alt="">
    </div>
    <div id="Oobj102">
        <div id="Grtf79" class="dfltt">
            <div class="dfltt calign txt0">Copyright Exabyte<br>
            </div>
        </div>
    </div>
    <div id="Oobj103">
        <img id="Ggeo66" src="./geometry/obj103geo66shd37pg5p7.png" alt="">
    </div>
    <div id="Oobj104">
        <a href="http://www.exabyte.com.co"><img id="Ggeo67" src="./image/obj104geo67pg5p7.png" alt=""></a>
    </div>
    <div id="Oobj107">
        <div id="Gcode148" class="dfltc">
            <font size="1">
                <script languaje="JavaScript">
                    var mydate = new Date()
                    var year = mydate.getYear()
                    if (year < 1000)
                        year += 1900
                    var day = mydate.getDay()
                    var month = mydate.getMonth()
                    var daym = mydate.getDate()
                    if (daym < 10)
                        daym = "0" + daym
                    var dayarray = new Array("Domingo,", "Lunes,", "Martes,", "Mi�rcoles,", "Jueves,", "Viernes,", "S�bado,")
                    var montharray = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre")
                    document.write("<font color='black' face='Arial' style='font-size:8pt'>" + dayarray[day] + " " + daym + " de " + montharray[month] + " de " + year + "</font>")
                </script>
            </font>
        </div>
    </div>
    <div id="Oobj113">
        <a href="xcerrar.php"><img id="Ggeo70" src="./image/obj113geo70pg5p7.jpg" alt=""></a>
    </div>
    <div id="Oobj112">
        <a href="index.php" title="Volver al Home"><img id="Ggeo69" src="./image/inicio.jpg" alt="Volver al Home">
        </a>
    </div>
    <div id="Oobj475">
        <img id="Ggeo272" src="./image/obj475geo272pg5p7.jpg" alt="">
    </div>
    <div id="Oobj476">
        <div id="Gcode291" class="dfltc">
            <div>Lector Biometrico</div>
            <div class="container-fluid mt-5 ms-5">
                <div class="row g-5 container_fingerprint">
                    <!--        <div class="row g-5 container_fingerprint" >-->
                    <div class="col-md-7 col-lg-8 order-md-last">
                        <h4 class="mb-3 title-card-finger">
                            Huella
                        </h4>
                        <div class="card card_finger">
                            <img id="sensor_image" src="imagenes/finger.jpg" class="card-img-top" alt="Finger">
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
                                <input type="text" class="form-control" id="fingerprint_name" placeholder="" value=""
                                       required="" readonly>
                            </div>
                            <div class="col-12">
                                <label for="fingerprint_cedula" class="form-label">Cedula</label>
                                <input type="text" class="form-control" id="fingerprint_cedula" placeholder="" value=""
                                       required="" readonly>
                            </div>
                        </div>
                        <!--<hr class="my-4">-->
                    </div>
                </div>
                <div class="row mt-5" style="display: none">
                    <div class="col-4"></div>
                    <div class="col-4">
                        <div class="d-grid gap-1">
                            <div class="btn btn-primary py-3 text-center" id="btn_continuar" type="button">CONTINUAR</div>
                        </div>
                    </div>
                    <div class="col-4"></div>
                </div>
            </div>
        </div>
    </div>

    <div id="Oobj500">
        <div id="Grtf359" class="dfltt">
<span class="txt1"><span class="bold">Registrar Fin de Jornada</span><br>
</span>
        </div>
    </div>

    <div id="Oobj671">
        <div id="Gcode657" class="dfltc">
        </div>
    </div>
</div>
<script src="js/jquery-3.6.0.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/sweetalert2@11.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    var fingerprinter_type = 'end_work_day'
</script>
<script src="js/utils.js"></script>
<script src="js/ingresoe.js"></script>
</body>
</html>
