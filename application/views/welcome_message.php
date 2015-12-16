<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="page-header">
	<h1>Welcome to CodeIgniter!</h1>
</div>
<div class="panel panel-default">
  <div class="panel-body">
  	<p>Ahora se puede ocupar datetime picker (inputs con fecha y hora)</p>
  	<p><i>Ejemplo:</i></p>
    <div class="form-group">
    <?php echo form_label('Fecha:', 'fecha'); ?>
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
    <p><strong>Código a utilizar</strong></p>
    <code>
      &#060;div class="form-group"><br/>
      &nbsp;&nbsp;
      &#060;?php echo form_label('Fecha:', 'fecha'); ?><br />
      &nbsp;&nbsp;
      &#060;div id="datetimepicker1" class="input-append date input-group"><br />
      &nbsp;&nbsp;&nbsp;&nbsp;
      &#060;input class="form-control" data-format="dd/MM/yyyy hh:mm:ss" type="text">&#060;/input><br />
      &nbsp;&nbsp;&nbsp;&nbsp;
      &#060;span class="input-group-addon add-on"><br />
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &#060;span class="glyphicon glyphicon-calendar">&#060;/span><br />
			&nbsp;&nbsp;&nbsp;&nbsp;
      &#060;/span><br />
      &nbsp;&nbsp;
      &#060;/div><br />
      &nbsp;&nbsp;
      &#060;script type="text/javascript"><br />
      &nbsp;&nbsp;
        $(function() {<br />
      &nbsp;&nbsp;&nbsp;&nbsp;
          $('#datetimepicker1').datetimepicker({<br />
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              language: 'es'<br />
      &nbsp;&nbsp;&nbsp;&nbsp;
          });<br />
      &nbsp;&nbsp;
        });<br />
      &nbsp;&nbsp;
        &#060;/script><br />
      &#060;/div>

    </code>
    <i>Enjoy!</i>
	</div>

	<div class="panel-footer">Página cargada en <strong>{elapsed_time}</strong> segundos. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter v<strong>' . CI_VERSION . '</strong>' : '' ?></div>
	</div>

