$(document).ready(function () {
    
    var cal = document.getElementById('calendario');

    var calendario = new FullCalendar.Calendar(cal, {

        initialView: 'dayGridMonth',
        locale: 'es',
        buttonText: {
            today: 'Hoy',
            month: 'Mes',
            week: 'Semana',
            day: 'Día',
            list: 'Lista'
        },
        headerToolbar: {
            left: 'prev,today,next',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek'
        },
        events: ConsultarEventos,
        eventTimeFormat: {
            hour: '2-digit',
            minute: '2-digit',
            hour12: true
        }
    });

    calendario.render();

});

function ConsultarEventos(info, successCallback, failureCallback) {

    $.ajax({
        url: "../../Controller/CursoController.php",
        method: "POST",
        data: {
            ConsultarCursosProfesorCalendario: 'ConsultarCursosProfesorCalendario'
        },
        dataType: "json",
        success: function (response) {
            successCallback(response);
        },
        error: function () {
            failureCallback();
        }
    });
}