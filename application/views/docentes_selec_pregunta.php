<h1>Lista de Preguntas <span class="label label-default"></span></h1>


<script type="text/javascript">
  $(document).ready(function(){
    $("#cargar_html").click(function(){
     $("#contenido").load("<?php echo base_url('ajax/data/'); ?>");
    });
  });
</script>

<div class="container-fluid">

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
                  <th>Id pregunta</th>
                  <th>Nombre de la pregunta</th>
                  <th>Pregunta</th>
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
