
function InicializarCalendarios() {

  flatpickr(".flatpickr-datetime", {
    locale: "es",
    enableTime: false,
    dateFormat: "Y-m-d",
    altInput: true,
    altFormat: "d/m/Y",
    time_24hr: false,
    minuteIncrement: 5,
    allowInput: false
  });

}