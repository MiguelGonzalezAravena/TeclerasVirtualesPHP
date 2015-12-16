<?php
$respuestas =  explode("@", $preguntaBD->PM_TEXTO);
?>
<div class="row">
	 <div class="col-md-12">&nbsp;</div>
<h2>Editar Pregunta</h2>
<div class="panel panel-default">
	<div class="panel-body">
      <?php
        echo form_open('crudpregunta/editarAlternativa/'.$paralelo.'', array('autocomplete' => 'off'));
      ?>
        <div class="form-group">
        <?php
		$nombreP = array(
		              'name'        => 'nombreP',
		              'id'          => '1',
		              'value'       =>  (isset($_POST['nombreP'])) ? $_POST['nombreP'] : $preguntaBD->PM_NOMBRE,
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
			        'value'       => (isset($_POST['pregunta'])) ? $_POST['pregunta'] : $preguntaBD->PM_EXPLICACION,
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
		              'value'       => (isset($_POST['urlImagen'])) ? $_POST['urlImagen'] : $preguntaBD->PM_RUTA_IMAGEN,
		              'maxlength'   => '45',
		              'size'        => '100',
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
		              'value'       => (isset($_POST['urlVideo'])) ? $_POST['urlVideo'] : $preguntaBD->PM_RUTA_VIDEO,
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
		              'value'       => (isset($_POST['respuesta1'])) ? $_POST['respuesta1'] : $respuestas[0],
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
		              'value'       => (isset($_POST['respuesta2'])) ? $_POST['respuesta2'] : $respuestas[1],
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
		              'value'       => (isset($_POST['respuesta3'])) ? $_POST['respuesta3'] : $respuestas[2],
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
		              'value'       => (isset($_POST['respuesta4'])) ? $_POST['respuesta4'] : $respuestas[3],
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
		              'value'       => (isset($_POST['explicacionr'])) ? $_POST['explicacionr'] : $respuestaBD->RES_TEXTO,
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
		              'value'       => (isset($_POST['imagenexplicacionr'])) ? $_POST['imagenexplicacionr'] : $preguntaBD->PM_RUTA_IMAGEN_EXPLICACION,
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
		              'value'       => (isset($_POST['respuestaCorrecta'])) ? $_POST['respuestaCorrecta'] : $respuestaBD->PM_CORRECTA,
		              'maxlength'   => '2000',
		              'size'        => '50',
		              'style'       => 'width:50%',
		              'class'       => 'form-control',
		            );
		echo form_label('Respuesta correcta:', 'respuestaCorrecta');
		echo form_input($respuestaCorrecta);
		?>
		</div>
		<input type='hidden' name='id' value=<?php echo $id ?>>
	<?php
		$submit = array('type' => 'submit', 'content' => 'Editar', 'class' => 'btn btn-success');
		echo form_button($submit);
	?>
      <?php
         echo form_close();
      ?>
      <?php echo validation_errors(); ?> 
      </div>
   </div>
</div>
