$(document).ready(function () {
    new DataTable('#tablaCursos', {
        responsive: true,
        pageLength: 10,
        columnDefs: [
            { targets: '_all', className: 'text-start' }
        ],
        language: {
            url: 'https://cdn.datatables.net/plug-ins/2.3.4/i18n/es-ES.json'
        }
    });
});

$(document).on("click", ".btn-cancelar", function () {
    const cursoId = $(this).data("id");
    const cursoNombre = $(this).data("nombre");

    Swal.fire({
        text: `¿Deseas inactivar "${cursoNombre}"?`,
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Sí',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            
            $.ajax({
                url: '../../Controller/CursoController.php',
                type: 'POST',
                data: {
                    InactivarCurso: 'InactivarCurso',
                    consecutivo: cursoId
                },
                success: function (response) {
                    location.reload();
                }
            });

        }
    });

});