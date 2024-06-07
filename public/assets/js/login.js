$(document).ready(function () {
    $('#formularioLogin').submit(function (e) {
        e.preventDefault();

        var formData = $(this).serialize();
        console.log(formData);

        $.ajax({
            url: "login/logear", // URL de ejemplo
            method: "POST",
            headers: { 'X-Requested-With': 'XMLHttpRequest' },
            data: formData,
            success: function (data) {
                Swal.fire({
                    icon: 'success',
                    title: data.msj,
                    showConfirmButton: false,
                    timer: 1500
                }).then((result) => {
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