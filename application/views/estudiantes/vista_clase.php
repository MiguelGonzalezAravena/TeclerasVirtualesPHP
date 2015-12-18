 <div class="container-fluid">
    <h1>Bienvenido, <?php echo $this->session->userdata('name'); ?></h1>
    <div class="alert alert-info" role="alert">
    	<h3>
    		<span class="glyphicon glyphicon-hourglass"></span> Esperando a que el docente empiece la clase...
    	</h3>
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
      socket.send(JSON.stringify(message));
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
