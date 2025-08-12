$(document).ready(function () {
    $("#tabla-data").on("submit", ".form-eliminar", function (e) {
        e.preventDefault();
        const form = $(this);
        Swal.fire({
            title: "¿ Está seguro que desea eliminar el registro ?",
            text: "Esta acción no se puede deshacer!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sí, elimínelo!",
            cancelButtonText: "Cancelar",
        }).then((result) => {
            if (result.isConfirmed) {
                ajaxRequest(form);
            }
        });
    });

    function ajaxRequest(form) {
        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: form.serialize(),
            success: function (respuesta) {
                if (respuesta.mensaje == "ok") {
                    form.parents('tr').remove();
                    APP.notificaciones('El registro fue eliminado correctamente', 'APP', 'success');
                } else {
                    APP.notificaciones('El registro no pudo ser eliminado, hay recursos usándolo.', 'APP', 'error');
                }
            },
            error: function () {

            }
        });
    }
});
