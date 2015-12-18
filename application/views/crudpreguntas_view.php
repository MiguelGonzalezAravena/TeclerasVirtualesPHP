<div class="container-fluid">
   <h1>Lista de Preguntas</h1>
      <?php echo anchor('crearpregunta/index/'. $paralelo, 'Crear Pregunta', 'class="btn btn-success"'); ?>
    <div class="row">
      <div class="col-md-12">&nbsp;</div>
    </div>

    <div class="panel panel-default">
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Nombre Pregunta</th>
              <th>Tipo Pregunta</th>
              <th>Acción</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($preguntas as $user): ?>
              <tr>
                <th class="scope"><?php echo $user['PM_ID'] ?></th>
                <td><?php echo $user['PM_NOMBRE'] ?></td>
                <td><?php echo $user['PM_TIPO'] ?></td>
                <td>
                  <div class="btn-group">
                    <?php
                      echo anchor('crudpregunta/getPregunta/'. $user['PM_ID'].'/'.$user['PM_TIPO'].'/'. $paralelo, 'Editar', 'class="btn btn-warning"');
                      echo anchor('Prueba/ver/'. $user['PM_ID'], 'Ver', 'class="btn btn-primary"');
                      echo anchor('docentes/graficarPregunta/'. $user['PM_ID'], 'Gráficos', 'class="btn btn-info"');
                      echo anchor('crudpregunta/eliminarPregunta/'. $user['PM_ID'].'/'. $paralelo, 'Eliminar', 'class="btn btn-danger"');
                    ?>
                  </div>
                </td>
                  <div class="btn-group">
                  </div>
                </td>
              </tr>
          </tbody>
          <?php endforeach ?>
        </table>
      </div>
    </div>
  </div>