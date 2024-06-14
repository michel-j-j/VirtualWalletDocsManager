$(document).ready(function () {
    $('#formularioRecuperacion').submit(function (e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            url: "recuperar/recuperarse", // URL de ejemplo
            method: "POST",
            data: formData,
            success: function (data) {
                Swal.fire({
                    icon: 'success',
                    title: data.title,
                    text: data.msj,
                    showConfirmButton: false,
                    timer: 1500
                })
            },
            error: function (xhr, status, error) {
                Swal.fire({
                    icon: 'error',
                    title: error.msj,
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        });
    });
});