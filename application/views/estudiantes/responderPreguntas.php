<div class="container-fluid">
  <h1>Pregunta a responder</h1>
  <?php echo form_open('estudiantes/responderPreguntas'); ?>
  <input type="hidden" name="pregunta_id" value="<?php echo $pregunta; ?>" />
  <input type="hidden" name="clase" value="<?php echo $clase; ?>" />
  <div class="panel panel-primary">
    <div class="panel-body">
      <?php if($fueRespondida) { ?>
        <div class="alert alert-danger">
          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
          Esta pregunta ya fue respondida. Espera a la siguiente pregunta...
        </div>
      <?php } else { ?>
        <?php foreach($preguntaSeleccionada->result() as $row): ?>
          <p><h3 class="text-center"><span class="label label-primary"><?php echo $row->PM_TEXTO; ?></span></h3></p>
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
    var uri = "ws://localhost:2207";
    var message = '{EST_ID: <?php echo $this->session->userdata('id_user'); ?>}';
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
      if(e.data != JSON.stringify(message)) {
        if(e.data.indexOf('{') != -1 && e.data != message) {
          var json = JSON.parse(JSON.stringify(eval('(' + e.data + ')')));
          console.log(json);
          location.href='<?php echo base_url('estudiantes/responderPreguntas'); ?>/' + json.CLA_ID + '/' + json.PR_ID + '/'
        }
      }
    }
    
  });

</script>