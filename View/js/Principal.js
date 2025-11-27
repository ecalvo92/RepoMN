function soloNumerosASCII(input) {
    let limpio = "";

    for (let i = 0; i < input.value.length; i++) {
        let code = input.value.charCodeAt(i);

        if (code >= 48 && code <= 57) {
            limpio += input.value[i];
        }
    }

    input.value = limpio;
}

function validarFormulario(consecutivo) {
    var cantidad = document.getElementById("Cantidad" + consecutivo).value;
    var inventario = document.getElementById("Inventario" + consecutivo).value;

    if (cantidad === "" || isNaN(cantidad) || parseInt(cantidad) <= 0) {
        ShowAlert("Por favor, ingrese una cantidad válida.", "warning");
        return false;
    }

    if( parseInt(cantidad) > parseInt(inventario)) {
        ShowAlert("La cantidad solicitada excede el inventario disponible.", "error");
        return false;
    }

    return true;
}

function ShowAlert(message, type) {
     Swal.fire({
        position: "top-end",
            title: "Información",
            text: message,
            icon: type,
            showConfirmButton: false,
            timer: 1500,
            customClass: {
                popup: "swal2-border-radius",
            }
        });
}