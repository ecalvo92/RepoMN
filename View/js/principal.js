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
        events: [
            {
                title: 'Curso 1',
                start: '2026-06-12',
                end: '2026-06-12',
                startTime: '10:00',
                endTime: '12:00',
                color: '#007bff'
            }
        ],
        eventTimeFormat: {
            hour: '2-digit',
            minute: '2-digit',
            hour12: true
        }
    });

    calendario.render();

});