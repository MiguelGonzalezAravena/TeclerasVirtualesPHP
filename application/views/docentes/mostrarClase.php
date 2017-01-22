<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container-fluid">
  <h1>Mostrar clase #<?php echo $clase['CLA_ID'] . ' ' . anchor('docentes/mostrarAsignatura', 'Terminar clase', 'class="pull-right label label-danger"'); ?></h1>
  <h4>Estudiantes conectados <code id="conectados">0</code></h4>
  <div class="form-group">
    <button class="btn btn-xs btn-primary" id="asistenciaClase">
      <i class="glyphicon glyphicon-user"></i>
      Asistencia a clase
    </button>
  </div>
<?php if(is_numeric($this->uri->segment(4))) { ?>
    <div class="form-group">
        <div class="alert alert-info">
            <h3>
                <i class="glyphicon glyphicon-time"></i>
                En espera de respuestas para la pregunta:
            </h3>
            <div class="text-center">
                <em>"<?php echo $pregunta; ?>"</em>
            </div>
        </div>

    </div>
<div class="form-group">
  <a href="<?php echo base_url('docentes/mostrarClase/' . $this->uri->segment(3) . '/resultados/' . $this->uri->segment(4) . '/'); ?>" class="btn btn-warning">
    <i class="glyphicon glyphicon-stats"></i>
    Terminar pregunta y ver resultados
  </a>
</div>
<?php } else if($this->uri->segment(4) == 'resultados') { ?>
<h3>Resultados de la pregunta</h3>
<div class="panel panel-default">
  <div class="panel-body text-center">
    <canvas id="graficoResultados" width="1024" height="500"></canvas>
  </div>
</div>
<?php } ?>
   <div class="panel panel-default">
    <div class="panel-body">
      <div class="form-group">
          <?php echo form_label('Password de acceso:', 'passwd'); ?>
        <input type="text" class="form-control disabled" value="<?php echo $clase['CLA_PASSWORD']; ?>">
        <span class="input-group-btn">
        </span>
      </div>
      <hr style="width: 100%;" />

      <div class="col-lg-6">
        <div class="form-group">
          <?php echo form_label('Buscar pregunta:', 'buscarPregunta'); ?>
          <input id="pm_nombre" type="text" class="form-control" placeholder="Buscar por palabra clave">
        </div>
    </div>

      <div class="col-lg-6">
        <div class="form-group">
          <p><?php echo form_label('Tipo de pregunta:'); ?></p> 
          <div id="combo-container" class="btn-group">
            <button id="combo" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="caret"></span> Seleccionar
            </button>
            <ul class="dropdown-menu">
                <li><a option value="1">Alternativas</a></li>
                <li><a option value="2">Dicotomicas</a></li>
                <li><a option value="3">Escala de Likert</a></li>   
            </ul>
          </div>
        </div>
    </div>
      <div class="col-lg-6">
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
      </div>
      <div class="col-md-6">
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
      </div>

    </div>
  </div>
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
              <tbody id="tabla_datos">
              </tbody>
          </table>
        </div>
        </div>
      </div>
    
  </form>
</div>
</div>
<script type="text/javascript">
  var combo = "";
  function ejecutarPregunta() {
   console.log($('#fecha1').val());
    $.ajax({
      url: '<?php echo base_url('docentes/ajaxbuscarPreguntas'); ?>',
      type: 'GET',
      data: 
        {
          pm_nombre: $('#pm_nombre').val(),
          combo    : combo,
          fecha1   : $('#fecha1').val(),
          fecha2   : $('#fecha2').val(),
          clase    : <?php echo $clase['CLA_ID']; ?>
        }
    })
    .success(function(data) {
      $('#tabla_datos').html(data);
    });
  }

  $(document).on('ready', function() {
    // Primera carga
    ejecutarPregunta();

    $(document).on('click', '#combo-container .dropdown-menu li a', function() {
      elegido = $(this).attr('value');  
      combo = elegido;
      ejecutarPregunta();
    });

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

    // Client here
    var socket = null;
    var uri = 'ws://<?php echo $this->config->item('websocket_ip'); ?>:<?php echo $this->config->item('websocket_port'); ?>';
    //var uri = '<?php echo $this->config->item('websocket_external'); ?>';
    var con = 0;
    var docenteMsg = {
      CLA_ID: '<?php echo $clase['CLA_ID']; ?>',
      PR_ID: '<?php echo ($this->uri->segment(4) != 'resultados' && $this->uri->segment(4) != '' ? $this->uri->segment(4) : ''); ?>'
    };
    socket = new WebSocket(uri);
    if(!socket || socket == undefined) return false;
    socket.onopen = function(){
      console.log('Connected to server ' + uri);
      console.log(docenteMsg);
      if(JSON.stringify(docenteMsg).length > 0) {
        console.log('Enviando');
        socket.send(JSON.stringify(docenteMsg));
      }
    }
    socket.onerror = function(){
      console.log('Error');
    }
    socket.onclose = function(){
      console.log('Close');
      con--;
      $('#conectados').html(con);
      socket.close();
    }

    socket.onmessage = function(e) {
      console.log(e);
      //if(e.data != message) {
        if(e.data.indexOf('{') != -1 && e.data != JSON.stringify(docenteMsg)) {
          con++;
          $('#conectados').html(con);
          var json = JSON.stringify(e.data);
          console.log(json);
          if(json.indexOf('EST_ID') != -1) {
            socket.send(JSON.stringify(docenteMsg));
          }
        } else {
        console.log(e);
      }
      //}
    }
    
  });

</script>