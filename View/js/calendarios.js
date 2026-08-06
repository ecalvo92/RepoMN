
function InicializarCalendarios() {

  flatpickr(".flatpickr-datetime", {
    locale: "es",
    enableTime: true,
    dateFormat: "Y-m-d\\TH:i",
    altInput: true,
    altFormat: "d/m/Y H:i K",
    time_24hr: false,
    minuteIncrement: 5,
    allowInput: false
  });

}