function srnPc() {
    var d = new Date();
    var dateint = d.getTime();
    var letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    var total = letters.length;
    var keyTemp = "";
    for (var i = 0; i < 6; i++) {
        keyTemp += letters[parseInt((Math.random() * (total - 1) + 1))];
    }
    keyTemp += dateint;
    return keyTemp;
}

function saveSrnPc() {
    localStorage.setItem("srnPc", srnPc());
//    saveToken();
//    localStorage.removeItem("srnPc");
}

$("#refrescar").click(function () {
    window.location = "index.php"
})


function saveToken() {
    var data = new FormData();
    data.append("token", localStorage.getItem("srnPc"));
    $.ajax({
        async: true,
        type: "POST",
        url: "Model/saveToken.php",
        data: data,
        contentType: false,
        processData: false,
        cache: false,
        dataType: "json",
        success: function (data) {
            console.log(data);
            var json = JSON.parse(data);
            if (json["filas"] === 1) {
                console.log("token Generado")
            }
        }
    });
}

$(function(){

    $('body').on('click','.close_fingerprint',function(e){
        e.preventDefault();
        const token = localStorage.getItem("srnPc");
        const item = $(this);
        let isRedirect = item.hasClass('redirect');

        $.ajax({
            type: "POST",
            url: "model/CloseFingerPrint.php",
            data: "&token=" + token,
            dataType: "json",
            success: function (data) {
                if(isRedirect){
                    window.location.replace(item.attr('href'));
                }else{
                    if (data.success) {
                        Swal.fire(
                            'Cerrado',
                            `Sensor cerrado con exito`,
                            'success'
                        )
                    } else {
                        Swal.fire(
                            'Error',
                            data.message,
                            'error'
                        )
                    }
                }
            },
            error: (xhr, status, error) => {
                if(isRedirect){
                    window.location.replace(item.attr('href'));
                }else{
                    console.log({
                        xhr, status, error
                    });
                    Swal.fire(
                        'Error',
                        error.message,
                        'error'
                    )
                }
            },
        });
    });
});



