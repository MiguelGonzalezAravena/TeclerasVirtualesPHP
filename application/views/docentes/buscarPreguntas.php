<h1>Lista de Preguntas <span class="label label-default"></span></h1>


<script type="text/javascript">
  $(document).ready(function(){
    $("#cargar_html").click(function(){
     $("#contenido").load("<?php echo base_url('ajax/data/'); ?>");
    });
  });
</script>

<div class="container-fluid">
  <h3>Busqueda de preguntas</h3>
  
    <div class="form-group">
      <input id="pm_nombre" type="text" class="form-control" placeholder="Buscar por Palabra Clave">
      <span class="input-group-btn">
      </span>
    </div>

 

      <div class="form-group">
        <?php echo form_label('Fecha desde:', 'fecha'); ?>
        <div id="datetimepicker1" class="input-append date input-group">
          <input class="form-control" data-format="dd/MM/yyyy hh:mm:ss" type="text"></input>
            <span class="input-group-addon add-on">
              <span class="glyphicon glyphicon-calendar"></span>
           </span>
        </div>
      <script type="text/javascript">
      $(function() {
        $('#datetimepicker1').datetimepicker({
            language: 'es'
        });
      });
      </script>
    </div>

    <div class="form-group">
        <?php echo form_label('Hasta :', 'fecha'); ?>
        <div id="datetimepicker2" class="input-append date input-group">
          <input class="form-control" data-format="dd/MM/yyyy hh:mm:ss" type="text"></input>
            <span class="input-group-addon add-on">
              <span class="glyphicon glyphicon-calendar"></span>
           </span>
        </div>
      <script type="text/javascript">
      $(function() {
        $('#datetimepicker2').datetimepicker({
            language: 'es'
        });
      });
      </script>
    </div>

  
      <div class="btn-group">
          <button id="combo" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Tipo de Pregunta<span class="caret"></span>
          </button>
            <ul class="dropdown-menu">
                <li><a href="#">Alternativas</a></li>
                <li><a href="#">Dicotomicas</a></li>
                <li><a href="#">Escala de Likert</a></li>   
            </ul>
      </div>
    <h3></h3>
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
              <tbody id="tabla_datos">
              
              </tbody>
          </table>
        </div>
        </div>
      </div>
    
  </form>
</div>

<script type="text/javascript">
  $(".dropdown-menu li a").click(function(){
    var selText = $(this).text();
    $(this).parents('.btn-group').find('.dropdown-toggle').html(selText+' <span class="caret"></span>');
  });
  $(document).on('ready', function(){
    $('#pm_nombre').on('keyup', function() {
      $.ajax({
        url: '<?php echo base_url("docentes/ajaxbuscarPreguntas") ?>',
        type: 'GET',
        data: {pm_nombre: $('#pm_nombre').val()}
      })
      .success(function(data) {
        $('#tabla_datos').html(data);
      });  
    } );
    
  });

</script>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

   
    

  </div>

