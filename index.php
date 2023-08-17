<?php
    if(!empty($_REQUEST['getToken'])){
    ?>
        <span id="Token"></span>
            <script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
            <script>
                $("#Token").html(localStorage.getItem("srnPc"));
            </script>

        <?php
        return;
    }

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSS only -->
        <link href="css/bootstrap.min.css" rel="stylesheet" >
        <title>Biometrics</title>
    </head>
    <body style="text-align: center;padding-top:  10%;font-family: sans-serif;">
        <div id="content" style="display: none">
            <label style="font-size:250%;">Aviso: Token no configurado para este navegador..!</label>
            <br>
            <br>
            <label>
                <b>1)</b> Si es la primera vez que abre la aplicación en este navegador debe configurar el token en el plugin..!
            </label>
            <br>
            <br>
            <label>
                <b>2)</b> Si el token ya habia sido configurado, es posible que alguna aplicacion lo haya eliminado, por favor configurelo nuevamente..!
            </label>
            <br>
            <br>
            <label>
                <b>Token: </b>
                <span id="Token" style="font-size:20px;"></span>
            </label>
            <br>
            <br>
            <label>
                <a href="index.php">Refrescar</a>
            </label>
            <br>
            <br>
            <label>
                <a href="Biometrics.exe">Aqui el enlace de tu plugin para descargar.</a>
            </label>
        </div>
    </body>
    <script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
    <script src="js/utils.js" type="text/javascript"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
//        localStorage.removeItem("srnPc");
        if (localStorage.getItem("srnPc")) {
            window.location = "home.php?token=" + localStorage.getItem("srnPc");
        } else {
            saveSrnPc();
            $("#Token").html(localStorage.getItem("srnPc"));
            $("#content").css("display", "block");
//        window.location = "home.php?token=" + localStorage.getItem("srnPc");
        }
    </script>
</html>
