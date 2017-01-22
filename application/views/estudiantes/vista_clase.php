 <div class="container-fluid">
    <h1>Bienvenido, <?php echo $this->session->userdata('name'); ?></h1>
    <div class="alert alert-info" role="alert">
    	<h3>
    		<span class="glyphicon glyphicon-hourglass"></span> Esperando a que el docente realice una pregunta...
    	</h3>
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
      socket.send(JSON.stringify(estudianteMsg));
    }

    socket.onerror = function() {
      console.log('Error');
    }
    socket.onclose = function() {
      console.log('Close');
      socket.close();
    }
    socket.onmessage = function(e) {
      console.log(e);
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
