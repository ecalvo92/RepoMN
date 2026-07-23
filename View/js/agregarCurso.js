$(function () {

    $.validator.addMethod("pngOnly", function (value, element) {
        if (this.optional(element)) {
            return true;
        }

        const archivo = element.files && element.files[0] ? element.files[0] : null;
        if (!archivo) {
            return false;
        }

        const extensionEsPng = /\.png$/i.test(archivo.name);
        const mimeEsPng = archivo.type === "image/png";
        return extensionEsPng && mimeEsPng;
    }, "La imagen debe ser formato .png.");

    $.validator.addMethod("fileSize", function (value, element, maxBytes) {
        if (this.optional(element)) {
            return true;
        }

        const archivo = element.files && element.files[0] ? element.files[0] : null;
        if (!archivo) {
            return false;
        }

        return archivo.size <= maxBytes;
    }, "La imagen no puede superar 0.5 MB.");

    $("#formAgregarCurso").validate({
        rules: {
            nombre: {
                required: true
            },
            cantidad: {
                required: true,
                number: true
            },
            fechaInicio: {
                required: true,
                date: true
            },
            fechaFin: {
                required: true,
                date: true
            },
            imagen: {
                required: true,
                pngOnly: true,
                fileSize: 512000
            }
        },
        messages: {
            nombre: {
                required: "Campo obligatorio."
            },
            cantidad: {
                required: "Campo obligatorio.",
                number: "Debe ser un número."
            },
            fechaInicio: {
                required: "Campo obligatorio.",
                date: "Formato de fecha no válido."
            },
            fechaFin: {
                required: "Campo obligatorio.",
                date: "Formato de fecha no válido."
            },
            imagen: {
                required: "Campo obligatorio.",
                pngOnly: "Solo se permiten imágenes .png.",
                fileSize: "La imagen no debe pesar más de 0.5 MB."
            }
        },
        errorElement: "div",
        errorPlacement: function (error, element) {
            error.addClass("invalid-feedback");
            element.closest(".mb-3").append(error);
        },
        highlight: function (element) {
            $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function (element) {
            $(element).addClass("is-valid").removeClass("is-invalid");
        }
    });

});
