(function ($) {
    $.fn.buttonLoading = function (state) {
        var loadingText = "<span class=\"spinner-border spinner-border-sm\" role=\"status\" aria-hidden=\"true\"></span>\n" +
            "  Cargando...";
        var button = $(this);
        var text = button.html();

        if (state == "loading" && text != loadingText) {
            button.attr("data-original-text", text);
            button.html(loadingText)
            button.prop("disabled", true);
        } else if (state == "reset") {
            text = button.attr("data-original-text");
            button.html(text);
            button.prop("disabled", false);
        }
    };
}(jQuery));

$(function () {
    var form_fingerprint_register = $('#form_fingerprint_register');
    var btn_fingerprint_register = $('#btn_fingerprint_register');
    var container_form_personal_fields = $('.container_form_personal_fields');
    var container_fingerprint = $('.container_fingerprint');
    var fingerprint_cedula = $('#fingerprint_cedula');
    var fingerprint_name = $('#fingerprint_name');
    var sensor_state = $("#sensor_state");
    var sensor_info = $("#sensor_info");
    var sensor_image = $("#sensor_image");
    var timestamp = null;

    form_fingerprint_register.submit(function (event) {
        let form = form_fingerprint_register[0];
        event.preventDefault()
        event.stopPropagation()
        if (form.checkValidity()) {
            $.ajax({
                url: 'model/UsersCreate.php',
                data: form_fingerprint_register.serialize(),
                dataType: 'json',
                type: 'post',
                beforeSend: function () {
                    btn_fingerprint_register.buttonLoading('loading');
                },
                success: (result, status, xhr) => {
                    btn_fingerprint_register.buttonLoading('reset');
                    if (result.success) {
                        toastr.success(result.message)
                        container_form_personal_fields.hide();
                        container_fingerprint.fadeIn();
                        fingerprint_name.val(result.name);
                        fingerprint_cedula.val(result.dni);
                        activarSensor(result.user_id);
                    } else {
                        Swal.fire(
                            'Error',
                            result.message,
                            'error'
                        )
                    }
                },
                error: (xhr, status, error) => {
                    console.log({
                        xhr, status, error
                    });
                    btn_fingerprint_register.buttonLoading('reset');
                    Swal.fire(
                        'Error',
                        error.message,
                        'error'
                    )
                },
            });
        } else {
            form.classList.add('was-validated')
        }
    });

    function activarSensor(user_id) {
        const token = localStorage.getItem("srnPc");
        $.ajax({
            type: "POST",
            url: "model/ActivarSensorAdd.php",
            data: "&token=" + token + "&user_id=" + user_id,
            dataType: "json",
            success: function (data) {
                if (data.success) {
                    cargar_push(user_id, token);
                } else {
                    Swal.fire(
                        'Error',
                        data.message,
                        'error'
                    )
                }
            },
            error: (xhr, status, error) => {
                console.log({
                    xhr, status, error
                });
                Swal.fire(
                    'Error',
                    error.message,
                    'error'
                )
            },
        });
    }

    function cargar_push(user_id, token) {
        $.ajax({
            type: "POST",
            url: "model/HttpPush.php",
            data: "&timestamp=" + timestamp + "&token=" + token + "&user_id=" + user_id,
            dataType: "json",
            timeout: 600000, // set timeout to 10 min
            success: function (data) {
                if(data.success){
                    timestamp = data.timestamp;
                }
                const imageHuella = data.imgHuella;
                const tipo = data.tipo;
                const id = data.id;
                sensor_state.text(data.statusPlantilla);
                sensor_info.text(data.texto);
                if (imageHuella) {
                    sensor_image.attr("src", "data:image/png;base64," + imageHuella);
                }
                // if(tipo === 'stop'){
                if(data.end_fingerprint){
                    registerFingerprint(user_id, token);
                }
                else{
                    setTimeout(function(){
                        cargar_push(user_id, token);
                    }, 1000);
                }
            },
            error: (xhr, status, error) => {
                console.log({
                    xhr, status, error
                });
            },
        });
    }

    function registerFingerprint(user_id, token){
        $.ajax({
            type: 'POST',
            url: "model/RegisterFingerprint.php",
            data: "&token=" + token + "&user_id=" + user_id,
            dataType: "json",
            success: function (data) {
                if(data.success){
                    Swal.fire(
                        data.message,
                        '',
                        'success'
                    )
                }else{
                    Swal.fire(
                        'Error',
                        data.message,
                        'error'
                    )
                }
            },
            error: (xhr, status, error) => {
                console.log({
                    xhr, status, error
                });

            },
        });
    }
});
