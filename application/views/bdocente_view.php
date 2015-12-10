<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>




<div class="page-header">
  <h1>
    Selecione pregunta
  </h1>
</div>


<?php
echo form_open('bdocente/submit');

//probando cambo fecha
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


<?php 
echo form_label('Seleccione Pregunta: '), form_dropdown('selPregunta', $arrPregunta);
echo form_submit($date);
echo form_close();
?>