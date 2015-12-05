<?php
defined('BASEPATH') OR exit('No direct script access allowed');





?>

<div class="page-header">
	<h1>Selecione pregunta</h1>
</div>

<?= form_open('bdocente/validar', array('name'=>'mi_form','id'=>'form'));?>

<?php

?>

<?php 
echo form_label('Seleccione Clase: ');
$date = array(
	'type'=> 'text',
	'id' => 'validate_dd_id',
	'name' => 'date',
	'class' => 'input_box',
	'placeholder' => 'dd/mm/yyyy',
	'required' => ''
	);
echo form_input($date);

?>
<br/>

<?php 
echo form_label('Seleccione Pregunta: '), form_dropdown('selPregunta', $arrPregunta,'', 'required="required"');
?>
<br/>
<?= form_submit('submit','Enviar Datos','class="submit"');?>

<?= form_close(); ?>
<?= validation_errors();?>




<?php
/* PRUEBAS

<div><input type="submit" value="Enviar Consulta" /></div>     [Boton sin frame]


echo form_label('Seleccione Clase: ')	[Titulo de date sin frame]	
<input type="date" name="fecha">		[seleccion de fecha sin frame]
<br/>



*/
?>