$(document).ready(function () {
    let datatable = $('#users_table').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
        },
        ajax: {
            url: "ajax/get_huellad.php",
            dataSrc: '',
        },
        responsive: true,
        "columns": [
            {"data": "id"},
            {"data": "cedula"},
            {"data": "nombre"},
            {
                "render": function (data, type, row, meta) {
                    let html = '';
                    html += `<a href="users-register-fingerprint.php?id=${row.id}" class="btn btn-${row.fingerprint ===null ? 'primary' : 'dark'} me-1" data-id="${row.id}" title="${row.fingerprint ===null ? 'Registrar' : 'Actualizar'} huella" data-bs-toggle="tooltip">
                                    <i class="fas fa-fingerprint"></i>
                                </a>`
                    html += `<button class="btn btn-danger delete_user me-1" data-id="${row.id}" title="Eliminar" data-bs-toggle="tooltip">
                                    <i class="fas fa-user-times"></i>
                                </button>`;
                    return html;
                }
            },
        ],
        "drawCallback": function (settings) {
            var selector = document.querySelectorAll('[data-bs-toggle="tooltip"]')
            var tooltipTriggerList = [].slice.call(selector)
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        }
    });

    $('body').on('click', '.delete_user', function () {
        const btn = $(this);
        Swal.fire({
            title: '¿Estas seguro?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Sí, bórralo!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "ajax/delete_users.php",
                    data: {
                        id: btn.data('id')
                    } ,
                    dataType: "json",
                    success: function (data) {
                        if (data.success) {
                            Swal.fire(
                                '¡Eliminado!',
                                'El usuario ha sido eliminado con exito.',
                                'success'
                            )
                            datatable.ajax.reload();
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
        })
    });
    $('body').on('click', '.close_fingerprint', function () {
        const token = localStorage.getItem("srnPc");
        $.ajax({
            type: "POST",
            url: "model/CloseFingerprint.php",
            data: {
                token
            } ,
            dataType: "json",
            success: function (data) {
                if (data.success) {
                    Swal.fire(
                        '¡Cerrado!',
                        'El lector ha sido cerrado con exito.',
                        'success'
                    )
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
    });

});
