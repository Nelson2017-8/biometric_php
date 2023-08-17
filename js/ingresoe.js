$(function(){
    var timestamp = null;
    var sensor_state = $("#sensor_state");
    var sensor_info = $("#sensor_info");
    var sensor_image = $("#sensor_image");
    var fingerprint_cedula = $('#fingerprint_cedula');
    var fingerprint_name = $('#fingerprint_name');
    var btn_continuar = $('#btn_continuar');
    var current_type = fingerprinter_type ? fingerprinter_type :  'start_work_day'

    start();
    btn_continuar.click(function(){
        window.location.replace('verificar.php?document='+fingerprint_cedula.val()+'&type='+current_type);
    });

    function start(){
        const token = localStorage.getItem("srnPc");
        $.ajax({
            type: "POST",
            url: "ajax/post_active_sensor_reader.php",
            data: {
                token,
                type: current_type
            },
            dataType: "json",
            success: function (data) {
                if (data.success) {
                    cargar_push(token);
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

    function cargar_push(token) {
        $.ajax({
            type: "POST",
            url: "model/HttpPush.php",
            data: "&timestamp=" + timestamp + "&token=" + token,
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

                if (tipo === "leer" && data.documento !== null) {
                    fingerprint_name.val(data.nombre);
                    fingerprint_cedula.val(data.documento);
                    btn_continuar.closest('.row').fadeIn();

                    if(data.end_fingerprint){
                        close_fingerprint_read( data.row_id);
                    }else{
                        setTimeout(function(){
                            cargar_push(token);
                        }, 1000);
                    }
                    // $("#imageUser").attr("src", "Model/imageUser.php?documento=" + json["documento"]);
                }else{
                    btn_continuar.closest('.row').hide();
                    setTimeout(function(){
                        cargar_push(token);
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
    $(this).closest();
    function close_fingerprint_read(id){
        $.ajax({
            type: "POST",
            url: "ajax/post_close_sensor_reader.php",
            data: {
                id,
            },
            dataType: "json",
            success: function (data) {
                if (!data.success) {
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
});
