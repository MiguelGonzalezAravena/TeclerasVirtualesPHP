<div class="container-fluid">
<form role="form" method="POST">
	<h1>Pregunta a responder</h1>

	<div class="panel panel-default">
		<!-- Default panel contents -->
		<div class="panel-heading">Preguntas</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
						    <th>Id Pregunta</th>
						    <th>Nombre</th>
						    <th>Fecha Creación</th>
						    <th>Texto</th>
						    <th>Tipo</th>
						    
						    
					  	</tr>
				  	</thead>
						<tbody>
							
							<?php 

					        foreach ($preguntaSeleccionada->result() as $row) {
					          echo "<tr class='fila' id='fila_".$row->PM_ID."'>
							          	<td id='id_".$row->PM_ID."'> Pregunta ".$row->PM_ID."</td>
								        <td id='nombre_".$row->PM_NOMBRE."'>".$row->PM_NOMBRE."</td>
								        <td id='fecha".$row->PM_FECHA_CREACION."'>".$row->PM_FECHA_CREACION."</td>
								        <td id='texto".$row->PM_TEXTO."'>".$row->PM_TEXTO."</td>
								        <td id='tipo".$row->PM_TIPO."'>".$row->PM_TIPO."</td>

					        		</tr>";
					        }
					    	?>
					    	
			  		</tbody>
			  	</table>
			</div>
	  	</div>
	</div>
	
	    	<label for="textoResp">Respuesta</label>
	    	<input type="text" id="textoResp" name="textoResp" >
		</div>
		<button type="submit" class="btn btn-default">Responder</button>
	</form>
</div>