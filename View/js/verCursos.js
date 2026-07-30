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