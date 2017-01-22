/**
 * Idioma español para bootstrap-datetimepicker
 */
;(function($){
  $.fn.datetimepicker.dates['es'] = {
    days: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'],
    daysShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb', 'Dom'],
    daysMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa', 'Do'],
    months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
    monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
    today: 'Hoy',
    suffix: [],
    meridiem: []
  };
}(jQuery));
/* Recorrer un objeto según la propiedad */
Array.prototype.mapProperty = function(property) {
  return this.map(function(obj) {
    return obj[property];
  });
};

$(document).on('ready', function() {
  var enlace = 'http://127.0.0.1/TeclerasVirtuales';
  /* Gráfico de estudiantes */
  var ctx = $('#graficoResultados');
  var url = window.location.pathname;
  var mostrarClase = url.indexOf('mostrarClase');
  var primerId = url.substring(mostrarClase + 13, url.length);
  var clase_id = primerId.substring(0, primerId.indexOf('/'));
  var preguntaRealizada_id = primerId.substring(primerId.lastIndexOf('/') + 1, primerId.length);
  console.log(clase_id + ' y ' + preguntaRealizada_id);
  if(ctx.length > 0) {
    $.ajax({
      url: '../../../../docentes/mostrarResultados/' + clase_id + '/' + preguntaRealizada_id + '/',
      dataType: 'json'
    })
    .fail(function() {
      console.log('Error al general el gráfico.');
    })
    .done(function(data) {
      var myData = (data);
      var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: myData.mapProperty('alternativa'),
          datasets: [{
            label: 'Respuestas',
            backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
              'rgba(255,99,132,1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)',
              'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1,
            data: myData.mapProperty('dato')
          }]
        },
        options: {}
      });
    });
  }

  $('#asistenciaClase').on('click', function() {
    var str_enlace = window.location.href;
    var arr_enlace = str_enlace.split('/');
    var pos_mostrarClase = arr_enlace.indexOf('mostrarClase');
    var clase_id = arr_enlace[pos_mostrarClase + 1]

    // Obtener información de los estudiantes que asistieron a la clase
    $.ajax({
      url: enlace + '/docentes/asistenciaClase/' + clase_id,
      method: 'GET',
      dataType: 'JSON'
    })
      .fail(function(err) {
        console.log('Error');
        console.log(err);
      })
      .done(function(data) {
        console.log('Asistencia clase');
        var str_html = '';
        str_html += '<div class="table-responsive">' +
          '<table class="table table-bordered table-striped">' +
          '<thead>' +
          '<tr>' +
          '<th>Nombre estudiante</th>' +
          '</tr>' +
          '</thead>' +
          '<tbody>';
        for(var x = 0; x < data.length; x++) {
          str_html += '' +
            '<tr>' +
            '<td>' + data[x].nombre + '</td>' +
            '</tr>';
        }

        str_html += '</tbody>' +
          '</table>';

        if(data.length == 0) {
          str_html = '<div class="alert alert-info">' +
            '<i class="glyphicon glyphicon-info-sign"></i>' +
            ' No existen asistencias para esta clase.' +
            '</div>';
        }
        bootbox.dialog({
          title: 'Asistencia a la clase ' + clase_id,
          message: str_html
        });
      });
  });
});