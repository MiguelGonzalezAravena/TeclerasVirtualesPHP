<?php
defined('BASEPATH') OR exit('No direct script access allowed');





?>

<div class="page-header">
	<h1>Selecione pregunta</h1>
</div>


<?php
echo form_label('Seleccione Clase: ')
?>
<input type="date" name="fecha">
<br/>


<?php 
echo form_label('Seleccione Pregunta: '), form_dropdown('selPregunta', $arrPregunta);
?>
<br/>

<div><input type="submit" value="Enviar" /></div>