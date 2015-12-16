
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
						if(!$asignatura) {
							echo '<tr><td align="center" colspan="6">No se han encontrado asignaturas.</td></tr>';
						} else {
					        foreach ($asignatura->result() as $row) {
					          echo "<tr class='fila' id='fila_".$row->ASI_ID."'>
							          	<td id='id_".$row->ASI_ID."'> ".$row->ASI_ID."</td>
								        <td id='codigo_".$row->ASI_CODIGO."'>".$row->ASI_CODIGO."</td>
								        <td id='nombre".$row->ASI_NOMBRE."'>".$row->ASI_NOMBRE."</td>
								        <td class='btn-group'>
								        <button class='btn btn-primary' data-toggle='modal' data-target='#myModalParalelo'>
								        	Crear preguntas
								        </button>
								        ";
								        echo anchor('cursos/create/' . $row->ASI_ID, 'Crear curso', 'class="btn btn-info"');
								        echo "<input type='button' name='clase' id='pregunta_".$row->ASI_ID."' value='Iniciar clase #".$row->ASI_ID."' class='btn btn-success' data-toggle='modal' data-target='#myModal'/>
								        <td>
					        		</tr>";
					        }
					      }
				   		?>
				
			  		</tbody>
			  	</table>
			</div>
	  	</div>
	</div>

	
	<div class="container">
	  	<div class="modal fade" id="myModalParalelo" role="dialog">
		    <div class="modal-dialog">
		    
		      <!-- Modal content-->
	      		<div class="modal-content">

		        	<div class="modal-header">
			        	<button type="button" class="close" data-dismiss="modal">&times;</button>
			          	<h4 class="modal-title">Crear preguntas</h4>
			        </div>

			        <div class="modal-body">
			          	Antes de iniciar una clase, primero debe crear preguntas para esta clase. Por favor seleccione el paralelo para el cual desea crear preguntas.
			        </div>

		        	<div class="modal-footer">
		        		<?php
                  echo anchor('crearpregunta/index/1', 'Paralelo 1', 'class="btn btn-warning"');
		        		?>
		        	</div>
		      	</div>
		    </div>
	  	</div>

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

			        <form role="form" action="<?php echo base_url('docentes/crearClase/' . $pass); ?>" method="post">
			        	<div class="modal-footer">
			        		<input type="submit" id="add" class="btn btn-primary" value="Crear clase" onclick="<?php echo base_url('docentes/mostrarPreguntas'); ?>" />
			        	</div>
			       	</form>
		      	</div>
		    </div>
	  	</div>
	</div>
</div>
