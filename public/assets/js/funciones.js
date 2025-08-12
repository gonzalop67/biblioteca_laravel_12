var APP = function () {
    return {
        validacionGeneral: function (id, reglas, mensajes) {
            const formulario = $('#' + id);
            formulario.validate({
                rules: reglas,
                messages: mensajes,
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "", // validate all fields including form hidden input
                highlight: function (element, errorClass, validClass) { // highlight error inputs
                    $(element).closest('.form-group').addClass('has-error'); // set error class to the control group
                },
                unhighlight: function (element) { // revert the change done by highlight
                    $(element).closest('.form-group').removeClass('has-error'); // set error class to the control group
                },
                success: function (label) {
                    label.closest('.form-group').removeClass('has-error') // set success class to the control group
                },
                errorPlacement: function (error, element) {
                    if ($(element).is('select') && element.hasClass('bs-select')) { //PARA LOS SELECTS BOOTSTRAP
                        error.insertAfter(element);
                    } else if ($(element).is('select') && element.hasClass('select2-hidden-accessible')) {
                        element.next().after(error);
                    } else if (element.attr("data-error-container")) {
                        error.appendTo(element.attr("data-error-container"));
                    } else {
                        error.insertAfter(element);
                    }
                },
                invalidHandler: function (event, validator) { // display error alert on form submit

                },
                submitHandler: function(form) {
                    return true;
                }
            });
        },
        notificacion: function (mensaje, titulo, tipo) {
            switch (tipo) {
                case 'error':
                    toastr.error(mensaje, titulo);
                    break;
                case 'success':
                    toastr.success(mensaje, titulo);
                    break;
                case 'info':
                    toastr.info(mensaje, titulo);
                    break;
                case 'warning':
                    toastr.warning(mensaje, titulo);
                    break;
                default:
                    break;
            }
        },
    }
}();
