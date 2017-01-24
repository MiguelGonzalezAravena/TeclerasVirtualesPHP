<div class="row">
	 <div class="col-md-12">&nbsp;</div>
<h2>Crear pregunta de alternativa</h2>
<div class="panel panel-default">
	<div class="panel-body">
      <?php
        echo form_open('preguntas/crear/alternativa', array('autocomplete' => 'off'));
      ?>
        <div class="form-group">
        <?php
		$nombreP = array(
		              'name'        => 'nombreP',
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
		              'maxlength'   => '45',
		              'class'       => 'form-control',
		            );
		echo form_label('URL Video:', 'urlVideo');
		echo form_input($urlVideo);
		?>
		</div>
		<div class="form-group">
    <p><?php echo form_label('Escribe las alternativas a la pregunta y selecciona la alternativa correcta'); ?></p>
    <?php echo form_label('Alternativa 1:', 'respuesta'); ?>
      <div class="input-group">
        <span class="input-group-addon">
          <input type="radio" name="respuestaCorrecta" value="1">
        </span>
        <?php
		$respuesta1 = array(
		              'name'        => 'respuesta[]',
		              'maxlength'   => '100',
		              'class'       => 'form-control',
		            );
		echo form_input($respuesta1);
		?>
      </div>
		</div>
		<div class="form-group">
    <?php echo form_label('Alternativa 2:', 'respuesta'); ?>
      <div class="input-group">
        <span class="input-group-addon">
          <input type="radio" name="respuestaCorrecta" value="2">
        </span>
    <?php
		$respuesta2 = array(
		              'name'        => 'respuesta[]',
		              'maxlength'   => '100',
		              'class'       => 'form-control',
		            );
		echo form_input($respuesta2);
		?>
      </div>
		</div>
		<div class="form-group">
    <?php echo form_label('Alternativa 3:', 'respuesta'); ?>
      <div class="input-group">
        <span class="input-group-addon">
          <input type="radio" name="respuestaCorrecta" value="3">
        </span>
        <?php
		$respuesta3 = array(
		              'name'        => 'respuesta[]',
		              'maxlength'   => '100',
		              'class'       => 'form-control',
		            );
		echo form_input($respuesta3);
		?>
      </div>
		</div>
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
		              'maxlength'   => '2000',
		              'class'       => 'form-control',
		            );
		echo form_label('Imagen explicación a respuesta:', 'imagenexplicacionr');
		echo form_input($imagenexplicacionr);
		?>
		</div>
		<?php
		$submit = array('type' => 'submit', 'content' => 'Crear', 'class' => 'btn btn-success');
		echo form_button($submit);
		?>
      <?php
         echo form_close();
      ?>
      <?php echo validation_errors(); ?> 
      </div>
   </div>
</div>
<script type="text/javascript">
  window.i = 4;

  function eliminar_alternativa(numero) {
    $('#respuesta_' + numero).remove();
    i--;
  }
 
  $(document).on('ready', function() {
		$('#agregar_alternativa').on('click', function() {
			$('#html_alternativa').append('<div class="form-group" id="respuesta_' + i + '"><label for="respuesta">Alternativa ' + i + ': <span class="label label-danger" onclick="eliminar_alternativa(' + i + ')">Eliminar</span></label><div class="input-group"><span class="input-group-addon"><input type="radio" name="respuestaCorrecta" value="' + i + '"></span><input type="text" name="respuesta[]" maxlength="100" class="form-control" /></div></div>');
			i++;
		});
	});
</script>