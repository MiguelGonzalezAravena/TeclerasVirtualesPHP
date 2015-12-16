<div class="row">
	 <div class="col-md-12">&nbsp;</div>
<h2>Crear Pregunta De alternativa</h2>
<br /><br /><br />
<div class="panel panel-default">
	<div class="panel-body">
      <?php
        echo form_open('crearpregunta/insertarPA/'.$paralelo.'', array('autocomplete' => 'off'));
      ?>
        <div class="form-group">
        <?php
		$nombreP = array(
		              'name'        => 'nombreP',
		              'id'          => '1',
		              'value'       => '',
		              'maxlength'   => '45',
		              'size'        => '50',
		              'style'       => 'width:50%',
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
		            'id'          => '2',
			        'value'       => '',
			        'maxlength'   => '2000',
			        'size'        => '100',
			        'style'       => 'width:50%',
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
		              'id'          => '3',
		              'value'       => '',
		              'maxlength'   => '45',
		              'size'        => '50',
		              'style'       => 'width:50%',
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
		              'id'          => '4',
		              'value'       => '',
		              'maxlength'   => '45',
		              'size'        => '50',
		              'style'       => 'width:50%',
		              'class'       => 'form-control',
		            );
		echo form_label('URL Video:', 'urlVideo');
		echo form_input($urlVideo);
		?>
		</div>
		<div class="form-group">
        <?php
		$respuesta1 = array(
		              'name'        => 'respuesta1',
		              'id'          => '5',
		              'value'       => '',
		              'maxlength'   => '100',
		              'size'        => '50',
		              'style'       => 'width:50%',
		              'class'       => 'form-control',
		            );
		echo form_label('Alternativa 1:', 'respuesta1');
		echo form_input($respuesta1);
		?>
		</div>
		<div class="form-group">
        <?php
		$respuesta2 = array(
		              'name'        => 'respuesta2',
		              'id'          => '6',
		              'value'       => '',
		              'maxlength'   => '100',
		              'size'        => '50',
		              'style'       => 'width:50%',
		              'class'       => 'form-control',
		            );
		echo form_label('Alternativa 2:', 'respuesta2');
		echo form_input($respuesta2);
		?>
		</div>
		<div class="form-group">
        <?php
		$respuesta3 = array(
		              'name'        => 'respuesta3',
		              'id'          => '7',
		              'value'       => '',
		              'maxlength'   => '100',
		              'size'        => '50',
		              'style'       => 'width:50%',
		              'class'       => 'form-control',
		            );
		echo form_label('Alternativa 3:', 'respuesta3');
		echo form_input($respuesta3);
		?>
		</div>
		<div class="form-group">
        <?php
		$respuesta4 = array(
		              'name'        => 'respuesta4',
		              'id'          => '8',
		              'value'       => '',
		              'maxlength'   => '100',
		              'size'        => '50',
		              'style'       => 'width:50%',
		              'class'       => 'form-control',
		            );
		echo form_label('Alternativa 4:', 'respuesta4');
		echo form_input($respuesta4);
		?>
		</div>
		<div class="form-group">
        <?php
		$explicacionr = array(
		              'name'        => 'explicacionr',
		              'id'          => '9',
		              'value'       => '',
		              'maxlength'   => '2000',
		              'size'        => '50',
		              'style'       => 'width:50%',
		              'class'       => 'form-control',
		            );
		echo form_label('explicacion respuesta:', 'explicacionr');
		echo form_input($explicacionr);
		?>
		</div>
		<div class="form-group">
        <?php
		$imagenexplicacionr = array(
		              'name'        => 'imagenexplicacionr',
		              'id'          => '10',
		              'value'       => '',
		              'maxlength'   => '2000',
		              'size'        => '50',
		              'style'       => 'width:50%',
		              'class'       => 'form-control',
		            );
		echo form_label('imagen explicacion respuesta:', 'imagenexplicacionr');
		echo form_input($imagenexplicacionr);
		?>
		</div>
		<div class="form-group">
        <?php
		$respuestaCorrecta = array(
		              'name'        => 'respuestaCorrecta',
		              'id'          => '11',
		              'value'       => '',
		              'maxlength'   => '2000',
		              'size'        => '50',
		              'style'       => 'width:50%',
		              'class'       => 'form-control',
		            );
		echo form_label('Respuesta correcta:', 'respuestaCorrecta');
		echo form_input($respuestaCorrecta);
		?>
		</div>
	<!--
		<div class="form-group">
		<?php
		echo "<p><label for='id_paralelo'>Paralelo: </label>";
		echo "<select name=\"idparalelo\" id='17'>";
		if (count($id_paralelo)) {
			foreach ($id_paralelo as $list) {
       				 echo "<option value='". $list['PAR_ID'] . "'>" . $list['PAR_ID'] . "</option>";
   				 }
		}
		echo "</select><br/>"
		?>
		</div>
	-->
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
