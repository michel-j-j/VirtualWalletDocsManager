$(document).ready(function () {
    $('#formularioRegistro').submit(function (e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            url: "register/signUp", // URL de ejemplo
            method: "POST",
            data: formData,
            success: function (data) {
                Swal.fire({
                    icon: 'success',
                    title: data.msj,
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    window.location.href = data.url;
                })
            },
            error: function (xhr, status) {
                Swal.fire({
                    icon: 'error',
                    title: xhr.responseJSON.messages.error,
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        });
    });
});