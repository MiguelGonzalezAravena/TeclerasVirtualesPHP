<div class="container-fluid">
  <p>
    <i class="glyphicon glyphicon-info-sign"></i>
    <b>Asignatura:</b>
    <?php echo $clase; ?>
  </p>
  <p>
    <i class="glyphicon glyphicon-calendar"></i>
    <b>Fecha:</b>
    <?php echo $fecha_actual; ?>
  </p>
  <p></p>
  <?php echo form_open('estudiantes/responderPreguntas'); ?>
  <input type="hidden" name="pregunta_id" value="<?php echo $pregunta; ?>" />
  <input type="hidden" name="clase" value="<?php echo $clase; ?>" />
  <div class="panel panel-primary">
    <div class="panel-body">
      <?php if($fueRespondida) { ?>
        <div class="alert alert-info">
          <i class="glyphicon glyphicon-info-sign"></i>
          Pregunta respondida. Esperando la siguiente pregunta.
        </div>
      <?php } else { ?>
        <?php foreach($preguntaSeleccionada->result() as $row): ?>
          <p class="alert alert-info">
            <i class="glyphicon glyphicon-chevron-right"></i>
            <?php echo $row->PM_TEXTO; ?>
          </p>
          <p><b>Escoja una de las alternativas</b></p>
          <?php foreach($respuestas->result() as $res): ?>
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                    <input type="radio" name="respuesta" value="<?php echo $res->RES_ID; ?>">
                  </span>
                  <input type="text" class="form-control" value="<?php echo $res->RES_TEXTO; ?>" disabled>
                </div>
              </div>
          <?php endforeach; ?>
          <div class="form-group">
            <button class="btn btn-danger">
              Enviar respuesta
            </button>
          </div>
        <?php endforeach; ?>
      <?php } ?>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).on('ready', function() {
    // Client here
    var socket = null;
    var uri = 'ws://<?php echo $this->config->item('websocket_ip'); ?>:<?php echo $this->config->item('websocket_port'); ?>';
    //var uri = '<?php echo $this->config->item('websocket_external'); ?>';
    var estudianteMsg = {
      EST_ID: '<?php echo $this->session->userdata('id_user'); ?>'
    }
    socket = new WebSocket(uri);
    if(!socket || socket == undefined) return false;
    socket.onopen = function(){
      console.log('Connected to server ' + uri);
      //socket.send(JSON.stringify(message));
    }

    socket.onerror = function() {
      console.log('Error');
    }
    socket.onclose = function() {
      console.log('Close');
      socket.close();
    }
    socket.onmessage = function(e) {
      if(e.data != JSON.stringify(estudianteMsg)) {
        if(e.data.indexOf('{') != -1 && e.data != JSON.stringify(estudianteMsg)) {
          var json = JSON.parse(e.data);
          console.log(json);
          if(json.PR_ID != '' && json.PR_ID != 'undefined' && json.PR_ID != 'resultados') {
            location.href = '<?php echo base_url('estudiantes/responderPreguntas'); ?>/' + json.CLA_ID + '/' + json.PR_ID + '/'
          }
        }
      } else {
        console.log(e);
      }
    }
    
  });

</script>