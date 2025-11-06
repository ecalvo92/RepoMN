$(function () {

    $("#formActualizarProducto").validate({
        rules: {
            Nombre: {
                required: true
            },
            Descripcion: {
                required: true
            },
            Precio: {
                required: true
            }
        },
        messages: {
            Nombre: {
                required: "* Requerido"
            },
            Descripcion: {
                required: "* Requerido"
            },
            Precio: {
                required: "* Requerido"
            }
        }
    });

});