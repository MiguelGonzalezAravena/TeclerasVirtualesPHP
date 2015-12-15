
<div class="container-fluid">
	<h1>Mostrar Asignaturas</h1>

	<div class="panel panel-default">
		<!-- Default panel contents -->
		<div class="panel-heading">Ingresar a Clase</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
						    <th>ID Asignatura</th>
						    <th>ID Codigo</th>
						    <th>Asignatura</th>
						    <th>Acción</th>
					  	</tr>
				  	</thead>
  					<tbody>
  						<?php 
				        foreach ($asignatura->result() as $row) {
				          echo "<tr class='fila' id='fila_".$row->ASI_ID."'>
						          	<td id='id_".$row->ASI_ID."'> ".$row->ASI_ID."</td>
							        <td id='codigo_".$row->ASI_CODIGO."'>".$row->ASI_CODIGO."</td>
							        <td id='nombre".$row->ASI_NOMBRE."'>".$row->ASI_NOMBRE."</td>
							        <td>

										<input type='button' name='clase' id='pregunta_".$row->ASI_ID."' value=".$row->ASI_ID." class='btn btn-default' data-toggle='modal' data-target='#myModal'/>
							        <td>
				        		</tr>";
				        }
				   		?>
				
			  		</tbody>
			  	</table>
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

			          	<h3>El password para ingresar a la clase es: <?php echo $pass; ?> </h3>

			        </div>

			        <form role="form" action="<?php echo base_url().'index.php/Docentes/crearClase/'.$pass.''?>" method="post">
			        	<div class="modal-footer">
			        		<input type="submit" id="add" onclick="<?php echo base_url().'index.php/Docentes/mostrarPreguntas'?>" />
			        	</div>
			       	</form>
		      	</div>
		    </div>
	  	</div>
	</div>
</div>
