<h1>Lista de Preguntas <span class="label label-default"></span></h1>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#cargar_html").click(function(){
      $("#contenido").load("<?php echo base_url() ?>ajax/data/");
    });
  });
</script>

<div class="container-fluid">
  <h3>Busqueda de preguntas</h3>
  
  <div class="row">
  <div class="col-lg-6">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Buscar por Palabra Clave">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">Buscar</button>
      </span>
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->
 
 <h3> </h3>
  <div class="container">
 <div class='col-md-4'>
  <label for="inputName" class="control-label col-xs-3">Fecha desde :</label>
        <div class="form-group">
            <div class='input-group date' id='datetimepicker6'>
                <input type='text' class="form-control" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
    </div>
    <div class='col-md-4'>
      <label for="inputName" class="control-label col-xs-3">Hasta :</label>
        <div class="form-group">
            <div class='input-group date' id='datetimepicker7'>
                <input type='text' class="form-control" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
    </div>
    <span class="input-group-btn">
        <button class="btn btn-default" type="button">Buscar</button>
      </span>
    </div>
    <h3> </h3>
<!-- Single button -->
      <div class="btn-group">
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Tipo de Pregunta<span class="caret"></span>
          </button>
            <ul class="dropdown-menu">
                <li><a href="#">Alternativas</a></li>
                <li><a href="#">Dicotomicas</a></li>
                <li><a href="#">Escala de Likert</a></li>   
            </ul>
      </div>
    
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
              <tbody>
              <?php 
                  foreach ($preguntas->result() as $row) {
                    echo "<tr class='fila' id='fila_".$row->PM_ID."'>
                          
                        <td id='nombre_".$row->PM_NOMBRE."'>".$row->PM_NOMBRE."</td>
                        <td id='tipo".$row->PM_TIPO."'>".$row->PM_TIPO."</td>
                        <td id='fecha".$row->PM_FECHA_CREACION."'>".$row->PM_FECHA_CREACION."</td>
                        <td>
                          <span >
                            <input type='radio' aria-label=''>
                          </span>
                        </td>
                      </tr>";
                  }
              ?>
              </tbody>
          </table>
        </div>
        </div>
      </div>
    
  </form>
</div>
<script type="text/javascript">
    $(function () {
        $('#datetimepicker6').datetimepicker();
        $('#datetimepicker7').datetimepicker({
            useCurrent: false //Important! See issue #1075
        });
        $("#datetimepicker6").on("dp.change", function (e) {
            $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
        });
        $("#datetimepicker7").on("dp.change", function (e) {
            $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
        });
    });
</script>
<script type="text/javascript">
  $(".dropdown-menu li a").click(function(){
    var selText = $(this).text();
    $(this).parents('.btn-group').find('.dropdown-toggle').html(selText+' <span class="caret"></span>');
  });
</script>
