$(document).on("click", ".btn-matricular", function () {

    const cursoId     = $(this).data("id");
    const cursoNombre = $(this).data("nombre");

    Swal.fire({
        title: "¿Matricularse?",
        text: `¿Deseas matricularte en "${cursoNombre}"?`,
        icon: "question",
        showCancelButton: true,
        confirmButtonText: "Sí",
        cancelButtonText: "No"
    }).then((result) => {
        if (result.isConfirmed) {

            $.ajax({
                url: "../../Controller/CursoController.php",
                type: "POST",
                data: {
                    MatricularCurso: "MatricularCurso",
                    consecutivo: cursoId
                },
                dataType: "json",
                success: function (response) {
                    
                    Swal.fire({
                        title: "Matriculado",
                        text: "Te has matriculado correctamente.",
                        icon: "success",
                        confirmButtonText: "Aceptar"
                    }).then(() => {
                        location.reload();
                    });
                    
                }
            });

        }
    });

});
