$(document).ready(function(){
    $( ".datepicker" ).datepicker({
        altFormat: "yy-mm-dd",
        regional: "es",
        dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"],
        dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
        dayNamesShort: [ "Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab" ],
        gotoCurrent: true,
        monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ],
        monthNamesShort: [ "Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic" ],
        nextText: "Siguiente",
        prevText: "Anterior",
        showOtherMonths: true,
        changeYear: true,
        dateFormat: "yy-mm-dd",
        autoClose: true,
    });
})

const mostrar_alerta = (content, title) => {
    $.alert({
        title,
        content,
    });
}