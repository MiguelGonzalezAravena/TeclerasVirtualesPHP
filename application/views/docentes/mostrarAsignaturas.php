<div class="container-fluid">
	<h1>Mostrar Asignaturas</h1>
	<div class="panel panel-default">
		<!-- Default panel contents -->
		<div class="panel-heading">Lista de asignaturas</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
              <th>ID</th>
              <th>Código</th>
              <th>Nombre</th>
              <th>Opciones</th>
            </tr>
          </thead>
  				<tbody>
  					<?php if(!$asignatura) { ?>
  					<tr><td align="center" colspan="6">No se han encontrado asignaturas.</td></tr>
            <?php
              } else {
                foreach ($asignatura->result() as $row) {
            ?>
            <tr class="fila" id="fila_<?php echo $row->ASI_ID; ?>">
              <td id="id_<?php echo $row->ASI_ID; ?>"><?php echo $row->ASI_ID; ?></td>
              <td id="codigo_<?php echo $row->ASI_CODIGO; ?>"><?php echo $row->ASI_CODIGO; ?></td>
              <td id="nombre_<?php echo $row->ASI_NOMBRE; ?>"><?php echo $row->ASI_NOMBRE; ?></td>
              <td class="btn-group">
                <?php
                  echo anchor('crudpregunta/index/1', 'Crear preguntas', 'class="btn btn-primary"');
                  // echo anchor('cursos/create/' . $row->ASI_ID, 'Crear curso', 'class="btn btn-info"');
                  echo anchor('docentes/crearClase/' . strtolower(random_string('alnum', 6)) . '/' . $row->ASI_ID . '', 'Iniciar clase', 'class="btn btn-success"');
                ?>
              </td>
            </tr>
            <?php
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
		        <?php echo anchor('crearpregunta/index/1', 'Paralelo 1', 'class="btn btn-warning"'); ?>
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
              Está a punto de iniciar una clase, esto mostrará la clase a los alumnos que esten alrededor
              <h3>El password para ingresar a la clase es: <?php echo $pass; ?> </h3>
          </div>
          <div class="modal-footer">
            <?php echo anchor('docentes/crearClase/' . $pass . '/asd/1/', 'Crear clase', 'class="btn btn-primary"'); ?>
            <input type="submit" id="add" class="btn btn-primary" value="Crear clase" onclick="<?php echo base_url('docentes/crearClase/' . $pass . '//1/'); ?>" />
          </div>
        </div>
      </div>
    </div>
	</div>
</div>