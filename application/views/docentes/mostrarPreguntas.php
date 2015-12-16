<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>


<div class="panel panel-default">
<!-- Default panel contents -->
	<div class="panel-heading">Seleccionar Preguntas</div>
	<div class="panel-body">
		<div class="table-responsive">
			<form name="formulario" id="formulario" action="mostrarPreguntaSeleccionada" method="POST">
				<table class="table table-striped">
					<thead>
						<tr>
						    <th>Id Pregunta</th>
						    <th>Nombre</th>
						    <th>Fecha Creación</th>
						    <th>Texto</th>
						    <th>Tipo</th>
						    <th>Seleccionar</th>
					  	</tr>
				  	</thead>
						<tbody>
							
							<?php 
					        foreach ($preguntas->result() as $row) {
					          echo "<tr class='fila' id='fila_".$row->PM_ID."'>
							          	<td id='id_".$row->PM_ID."'> Pregunta ".$row->PM_ID."</td>
								        <td id='nombre_".$row->PM_NOMBRE."'>".$row->PM_NOMBRE."</td>
								        <td id='fecha".$row->PM_FECHA_CREACION."'>".$row->PM_FECHA_CREACION."</td>
								        <td id='texto".$row->PM_TEXTO."'>".$row->PM_TEXTO."</td>
								        <td id='tipo".$row->PM_TIPO."'>".$row->PM_TIPO."</td>
								        
								        <td>
								        	<!--
								        	<span >
								        		<input type='button' name='pregunta' id='pregunta_".$row->PM_ID."' value=".$row->PM_ID.">
								        	</span>
								        	-->

								        	<button type='radio' name='pregunta' id='pregunta_".$row->PM_ID."' value=".$row->PM_ID." class='btn btn-default' aria-label='Left Align'>
	  											<span class='glyphicon glyphicon-log-in' aria-hidden='true'></span>
											</button>
								        </td>
					        		</tr>";
					        }
					    	?>
			  		</tbody>
			  	</table>
			</form>
		</div>
  	</div>
</div>

