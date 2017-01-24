<h2>Editar pregunta</h2>
<div class="panel panel-default">
	<div class="panel-body">
      <?php echo form_open('preguntas/editarAlternativa', array('autocomplete' => 'off')); ?>
        <div class="form-group">
        <?php
          $nombreP = array(
            'name'        => 'nombreP',
            'value'       =>  (isset($_POST['nombreP'])) ? $_POST['nombreP'] : $preguntaBD->PM_NOMBRE,
            'maxlength'   => '45',
            'class'       => 'form-control',
          );
          echo form_label('Nombre Pregunta:', 'nombreP');
          echo form_input($nombreP);
        ?>
		</div>
		<div class="form-group">
		<?php
		$pregunta = array(
			        'name'        => 'pregunta',
			        'value'       => (isset($_POST['pregunta'])) ? $_POST['pregunta'] : $preguntaBD->PM_TEXTO,
			        'maxlength'   => '2000',
			        'class'       => 'form-control',
		);
		echo form_label('Pregunta:', 'pregunta');
		echo form_input($pregunta);
		?>
		</div>
		<div class="form-group">
        <?php
		$urlImagen = array(
		              'name'        => 'urlImagen',
		              'value'       => (isset($_POST['urlImagen'])) ? $_POST['urlImagen'] : $preguntaBD->PM_RUTA_IMAGEN,
		              'maxlength'   => '45',
		              'class'       => 'form-control',
		            );
		echo form_label('URL Imagen:', 'urlImagen');
		echo form_input($urlImagen);
		?>
		</div>
		<div class="form-group">
        <?php
		$urlVideo = array(
		              'name'        => 'urlVideo',
		              'value'       => (isset($_POST['urlVideo'])) ? $_POST['urlVideo'] : $preguntaBD->PM_RUTA_VIDEO,
		              'maxlength'   => '45',
		              'class'       => 'form-control',
		            );
		echo form_label('URL Video:', 'urlVideo');
		echo form_input($urlVideo);
		?>
		</div>
    <?php
      $j = 1;
      foreach($respuestas as $resp):
      $input = array(
        'name'        => 'resp[]',
        'value'       => $resp['RES_TEXTO'],
        'maxlength'   => '100',
        'class'       => 'form-control',
      );
    ?>
    <div class="form-group" id="resp_<?php echo $resp['RES_ID']; ?>">
    <?php
    $eliminar = "<span class=\"label label-danger\" onclick=\"eliminar_respuesta(" . $resp['RES_ID'] . ")\">Eliminar</span>";
    echo form_label("Alternativa $j: " . ($j > 3 ? $eliminar : '')); ?>
      <div class="input-group">
        <span class="input-group-addon">
          <input type="radio" name="respuestaCorrecta" value="<?php echo $j; ?>"<?php echo ($resp['PM_CORRECTA'] == 1 ? 'checked' : ''); ?>>
        </span>
        <input type="hidden" name="id_resp[]" value="<?php echo $resp['RES_ID']; ?>" />
    <?php
      echo form_input($input);
      $j++;
    ?>
      </div>
    </div>
    <?php endforeach; ?>
		<div id="html_alternativa" class="form-group"></div>
		<div class="form-group">
			<div class="btn btn-primary" id="agregar_alternativa">
				<span class="glyphicon glyphicon-plus"></span> Agregar otra alternativa
			</div>
		</div>
		<div class="form-group">
        <?php
		$explicacionr = array(
		              'name'        => 'explicacionr',
		              'value'       => (isset($_POST['explicacionr'])) ? $_POST['explicacionr'] : $preguntaBD->PM_EXPLICACION,
		              'maxlength'   => '2000',
		              'class'       => 'form-control',
		            );
		echo form_label('Explicación respuesta:', 'explicacionr');
		echo form_input($explicacionr);
		?>
		</div>
		<div class="form-group">
        <?php
		$imagenexplicacionr = array(
		              'name'        => 'imagenexplicacionr',
		              'id'          => '10',
		              'value'       => (isset($_POST['imagenexplicacionr'])) ? $_POST['imagenexplicacionr'] : $preguntaBD->PM_RUTA_IMAGEN_EXPLICACION,
		              'maxlength'   => '2000',
		              'class'       => 'form-control',
		            );
		echo form_label('Imagen explicación a respuesta:', 'imagenexplicacionr');
		echo form_input($imagenexplicacionr);
		?>
		</div>
		<input type='hidden' name='id' value="<?php echo $id ?>" />
		<div class="form-group">
	<?php
		$submit = array('type' => 'submit', 'content' => 'Editar', 'class' => 'btn btn-success');
		echo form_button($submit);
        echo form_close();
      ?>
      </div>
      <?php echo validation_errors(); ?> 
      </div>
   </div>
</div>
<script type="text/javascript">
  window.i = <?php echo $j; ?>;

  function eliminar_alternativa(numero) {
    $('#respuesta_' + numero).remove();
    i--;
  }

  function eliminar_respuesta(identificador) {
    $('#resp_' + identificador).remove();
    i--;
    $.ajax({
      method: 'GET',
      url: '<?php echo base_url('preguntas/eliminarAlternativa/'); ?>/' + identificador,
    });
  }
 
  $(document).on('ready', function() {
    $('#agregar_alternativa').on('click', function() {
      $('#html_alternativa').append('<div class="form-group" id="respuesta_' + i + '"><label for="respuesta">Alternativa ' + i + ': <span class="label label-danger" onclick="eliminar_alternativa(' + i + ')">Eliminar</span></label><div class="input-group"><span class="input-group-addon"><input type="radio" name="respuestaCorrecta" value="' + i + '"></span><input type="text" name="respuesta[]" maxlength="100" class="form-control" /></div></div>');
      i++;
    });
  });
</script>