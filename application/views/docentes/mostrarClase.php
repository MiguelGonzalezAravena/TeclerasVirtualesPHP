
<div class="container-fluid">
	<h1>Preguntas selccionadas</h1>

	<div class="panel panel-default">
		<!-- Default panel contents -->
		<div class="panel-heading">Preguntas</div>
		<div class="panel-body">
			<div class="table-responsive">
				<form name="formulario" id="formulario" action="mostrarClase" method="POST">
					<table class="table table-striped">
						<thead>
							<tr>
							    <th>Id Pregunta</th>
							    <th>Nombre</th>
							    <th>Fecha Creación</th>
							    <th>Texto</th>
							    <th>Tipo</th>
							    <th>Accion</th>
							    
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

									        <td>
								        	<button type='button' class='btn btn-default' data-toggle='modal' data-target='#myModal'  aria-label='Left Align'>
  												<span class='glyphicon glyphicon-log-in' aria-hidden='true'></span>
											</button>

								        <td>
						        		</tr>
						        		
						        		";


						        }
						    	?>
						    	
				  		</tbody>
				  	</table>
				  	<input type="submit" name="submit" value="Iniciar Preguntas"/>	
				</form>
			</div>
	  	</div>
	</div>

	<div class="container">

 	<!-- Modal -->
	  	<div class="modal fade" id="myModal" role="dialog">
		    <div class="modal-dialog">
		    
		      <!-- Modal content-->
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h4 class="modal-title">Ingresar a Clase</h4>
		        </div>
		        <div class="modal-body">
		          	Esta a punto de iniciar una clase, esto mostrará la clase a los alumnos que esten alrededor
		          	<div class="form-group">
		          		<br>
				    	<label for="IngresarPass">Ingrese Password de la Clase:</label>
		          		<br>
						<br>
				    	<input type="text" class="form-control" id="ingresarPass" name="ingresarPass" 
				           placeholder="Password">
			  		</div>

		        </div>
		        <div class="modal-footer">
		          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        </div>
		      </div>
		      
		    </div>
	  	</div>
	</div>
</div>