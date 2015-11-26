<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="page-header">
	<h1>Selecione pregunta</h1>
</div>

<br/>
Seleccione Clase:
<input type="date" name="fecha"><br/>

Seleccione Preguntas: 
<select name="myselect">
<option value="Pregunta1" <?php echo set_select('myselect', 'Pregunta1', TRUE); ?> >Pregunta 1</option>
<option value="Pregunta2" <?php echo set_select('myselect', 'Pregunta2'); ?> >Pregunta 2</option>
<option value="Pregunta3" <?php echo set_select('myselect', 'Pregunta3'); ?> >Pregunta 3</option>
</select>
