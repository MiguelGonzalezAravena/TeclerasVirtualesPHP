<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>
<div class="container-fluid">
  <h1>Graficar pregunta</h1>
  <div class="panel panel-default">
    <div class="panel-body">
      <h3>
        <div class="text-center">
          <label class="label label-primary"><?php echo $pregunta; ?></label>
        </div>
      </h3>
      <div id="combo-container"  class="btn-group">
        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
          Seleccione la clase
          <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
          <?php foreach($pregReal->result() as $clases): ?>
            <li><a option value="<?php echo $clases->PR_ID; ?>">Clase #<?php echo $clases->CLA_ID; ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>
      <div class="text-center">
        <span id="grafico_1"></span>
        <hr />
        <span id="grafico_2"></span>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
$(document).on('ready', function() {
  $(".dropdown-menu li a").on('click', function() {
    var selText = $(this).text();
    $(this).parents('.btn-group').find('.dropdown-toggle').html(selText + ' <span class="caret"></span>');
  });

  $(document).on("click","#combo-container .dropdown-menu li a", function() {
    elegido = $(this).attr('value');  
    combo = elegido;

    /**
     * Cargar grafico 1
     */
    $.ajax({
      method: 'GET',
      url: '<?php echo base_url('chart/index_columnas/'); ?>/' + elegido,
    })
    .success(function(data) {
      $('#grafico_1').html(data);
    });


    /**
     * Cargar grafico 2
     */
    $.ajax({
      method: 'GET',
      url: '<?php echo base_url('chart/index_barra/'); ?>/' + elegido,
    })
    .success(function(data) {
      $('#grafico_2').html(data);
    });
  });
});

</script>