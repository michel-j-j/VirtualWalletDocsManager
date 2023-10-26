$(document).ready(function(){

    /*
document.getElementById("modificarEntidad").addEventListener("submit", function (e) {
    e.preventDefault();

    Swal.fire({
        title: "¿Desea modificar la entidad ?",
        text: "¡Confirma el envío del formulario!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sí, enviar",
        cancelButtonText: "Cancelar"
    }).then((result) => {
        if (result.isConfirmed) {
            // Envía el formulario si el usuario confirma
            this.submit();

            // Muestra el mensaje de éxito después de enviar el formulario
            const successMessage = session('success');

            if (successMessage) {
                Swal.fire({
                    title: "¡Éxito!",
                    text: successMessage,
                    icon: "success",
                    //timer: 10000, // Cambia el valor del temporizador a la duración que desees (en milisegundos)
                    showConfirmButton: false // Evita que se muestre el botón "OK"
                });
            }
        }
    });
});*/


    $('#eliminarEntidad').submit(function (e) {
        e.preventDefault();

        Swal.fire({
            title: "¿Desea eliminar la entidad ?",
            text: "¡Esta accion no podra deshacerse!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sí, enviar",
            cancelButtonText: "Cancelar"
        }).then((result) => {
            if (result.isConfirmed) {

        var formData = $(this).serialize();

        $.ajax({
            url: "eliminarEntidad", // URL de ejemplo
            method: "POST",
            data: formData,
            success: function (data) {
                console.log(data);

                if (data.exito=='ok') {
                    Swal.fire({
                        icon: 'success',
                        title: data.msj,
                        showConfirmButton: false,
                        timer: 1500
                    }).then((result) => {
                        window.location.href = data.url;
                    })
                }
                else {
                    Swal.fire({
                        icon: 'error',
                        title: data.msj,
                        showConfirmButton: false,
                        timer: 1500
                        
                    }).then((result) =>{
                        window.location.href = data.url;
                    })
                }

            },
            error: function (xhr, status, error) {
                console.log("Error: " + error + status + xhr);
            }
        });
    }
    });
});






});