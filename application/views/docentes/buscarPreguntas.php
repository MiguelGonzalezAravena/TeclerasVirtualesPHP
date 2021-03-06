<div class="container-fluid">  
<h1>Búsqueda de preguntas</h1>


<script type="text/javascript">
  var combo="";
  function ejecutarPregunta() {
   console.log($('#fecha1').val());
    $.ajax({
      url: '<?php echo base_url("docentes/ajaxbuscarPreguntas"); ?>',
      type: 'GET',
      data: 
        {
          pm_nombre: $('#pm_nombre').val(),
          combo    : combo,
          fecha1   : $('#fecha1').val(),
          fecha2   : $('#fecha2').val(),
        }
    })
    .success(function(data) {
      $('#tabla_datos').html(data);
    });
  }

  $(document).on('ready', function() {
    $("#cargar_html").on('click', function() {
      $("#contenido").load("<?php echo base_url('ajax/data/'); ?>");
    });

    $(".dropdown-menu li a").on('click', function() {
      var selText = $(this).text();
      $(this).parents('.btn-group').find('.dropdown-toggle').html(selText + ' <span class="caret"></span>');
    });

    $('#pm_nombre').on('keyup', function() {
      ejecutarPregunta();
    });
    
  });
</script>

    <div class="form-group">
      <input id="pm_nombre" type="text" class="form-control" placeholder="Buscar por Palabra Clave">
      <span class="input-group-btn">
      </span>
    </div>
      <div class="form-group">
        <?php echo form_label('Fecha desde:', 'fecha1'); ?>
        <div id="datetimepicker1" class="input-append date input-group">
          <input id="fecha1" class="form-control" data-format="dd/MM/yyyy" type="text"></input>
            <span class="input-group-addon add-on">
              <span class="glyphicon glyphicon-calendar"></span>
           </span>
        </div>
      <script type="text/javascript">
      $(function() {
        $('#datetimepicker1').datetimepicker({
            language: 'es',
        })
        .on('changeDate', function(ev) {
          ejecutarPregunta();
        });
      });
      </script>
    </div>

    <div class="form-group">
        <?php echo form_label('Hasta :', 'fecha2'); ?>
        <div id="datetimepicker2" class="input-append date input-group">
          <input id="fecha2" class="form-control" data-format="dd/MM/yyyy" type="text"></input>
            <span class="input-group-addon add-on">
              <span class="glyphicon glyphicon-calendar"></span>
           </span>
        </div>
      <script type="text/javascript">
      $(function() {
        $('#datetimepicker2').datetimepicker({
            language: 'es'
        })
        .on('changeDate', function(ev) {
          ejecutarPregunta();
        });
      });
      </script>
    </div>

      <div id="combo-container" class="btn-group">
          <button id="combo" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Tipo de Pregunta<span class="caret"></span>
          </button>
            <ul class="dropdown-menu">
                <li><a option value="1">Alternativas</a></li>
                <li><a option value="2">Dicotomicas</a></li>
                <li><a option value="3">Escala de Likert</a></li>   
            </ul>
      </div>
       <script language="javascript">
          $(document).ready(function(){
              $(document).on("click","#combo-container .dropdown-menu li a",function () {
                  elegido=$(this).attr('value');  
                  combo=elegido;
                  ejecutarPregunta();
                });
          });
  </script> 
    <h3>Resultados</h3>
         <div class="panel panel-default">
    <!-- Default panel contents -->
      <div class="panel-heading">Selección de las Preguntas</div>
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                  <th>Titulo de la Pregunta</th>
                  <th>Tipo de pregunta</th>
                  <th>Fecha Creación</th>
                  <th>Seleccionar</th>
                  
                </tr>
              </thead>
              <tbody 
                  id="tabla_datos">
              </tbody>
          </table>
        </div>
        </div>
      </div>
    
  </form>
</div>


<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// Issue #14 v3
?>

</div>

