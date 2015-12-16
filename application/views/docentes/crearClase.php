

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#cargar_html").click(function(){
			$("#contenido").load("<?php echo base_url() ?>ajax/data/");
		});
	});
</script>

<div class="container-fluid">
	<h1>Crear Clase</h1>
	
			

	<form role="form" method="POST">
		<div class="form-group">
	    	<label for="idClase">ID Clase</label>
	    	<input class="form-control" id="idClase" name="idClase" value="<?php echo "$i";  ?>" readonly="true">
	  	</div>

	  	<div class="form-group">
	    	<label for="idDocente">ID Docente</label>
			<input class="form-control" id="idClase" name="idClase" value="<?php echo "$idDocente";  ?>" readonly="true">
	  	</div>


	  	<div class="form-group">
	    	<label for="idParalelo">ID Paralelo</label>
	        <select class="form-control" id="idParalelo" name="idParalelo">
	        	<?php  
					foreach ($idParalelo->result() as $row) {
						echo "<option>".$row->PAR_ID."</option>";
						
					}	
			  	?>
			</select>
	  	</div>

	  	<div class="form-group">
	    	<label for="idAsignatura">ID Asignatura</label>
	    	<select class="form-control" id="idAsignatura" name="idAsignatura">
	        	<?php  
					foreach ($idAsignatura->result() as $row) {
						echo "<option>".$row->ASI_ID."</option>";
						
					}	
			  	?>
			</select>
	  	</div>

	  	
	  	
	  	<div class="form-group">
	    	<label for="fechaInicio">Fecha Inicio</label>
	    	<input type="datetime" class="form-control" id="fechaInicio" name="fechaInicio" 
	           placeholder="Fecha de inicio">
	  	</div>

	  	<div class="form-group">
	    	<label for="nombreClase">Password</label>

	        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Generar Password</button>

		  	<!-- Modal -->
		  	<div class="modal fade" id="myModal" role="dialog">
		   		<div class="modal-dialog">
			      	<!-- Modal content-->
			      	<div class="modal-content">
			        	<div class="modal-header">
				          	<button type="button" class="close" data-dismiss="modal">&times;</button>
				          	<h4 class="modal-title">Para que es el Password</h4>
			        	</div>
			        	<div class="modal-body">
			          		Hola soy el pass
			        	</div>
			        	<div class="modal-footer">
			        		
			          			<button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
			          		
			        	</div>
			      	</div>
		    	</div>
		  	</div>
		  	<br>
		  	<br>


		  	<input value="<?php echo $pass; ?>" class="form-control" id="nombreClase" name="nombreClase" readonly="true">

	  	</div>

	    <div class="panel panel-default">
		<!-- Default panel contents -->
			<div class="panel-heading">Seleccionar Preguntas</div>
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
							    <th>Seleccionar</th>
						  	</tr>
					  	</thead>
	  					<tbody>
	  					<?php 
					        foreach ($enlaces->result() as $row) {
					          echo "<tr class='fila' id='fila_".$row->PM_ID."'>
							          	<td id='id_".$row->PM_ID."'> Pregunta ".$row->PM_ID."</td>
								        <td id='nombre_".$row->PM_NOMBRE."'>".$row->PM_NOMBRE."</td>
								        <td id='fecha".$row->PM_FECHA_CREACION."'>".$row->PM_FECHA_CREACION."</td>
								        <td id='texto".$row->PM_TEXTO."'>".$row->PM_TEXTO."</td>
								        <td id='tipo".$row->PM_TIPO."'>".$row->PM_TIPO."</td>
								        
								        <td>
								        	<span >
							        		<input type='checkbox' name='pregunta[]' id='pregunta_".$row->PM_ID."' value=".$row->PM_ID.">
							        	</span>
								        </td>
					        		</tr>";
					        }
					    ?>
				  		</tbody>
				  </table>
				</div>
		  	</div>
		</div>
		<button type="submit" class="btn btn-default">Crear Clase</button>
	</form>
</div>

<script type="text/javascript">
	$(".dropdown-menu li a").click(function(){
	  var selText = $(this).text();
	  $(this).parents('.btn-group').find('.dropdown-toggle').html(selText+' <span class="caret"></span>');
	});
</script>