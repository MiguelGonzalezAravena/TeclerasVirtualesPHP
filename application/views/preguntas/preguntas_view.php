<div class="container-fluid">
   <h1>Lista de Preguntas</h1>
    <?php echo anchor('preguntas/crear', 'Crear Pregunta', 'class="btn btn-success"'); ?>
    <div class="row">
      <div class="col-md-12">&nbsp;</div>
    </div>
    <div class="panel panel-default">
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre pregunta</th>
              <th>Tipo</th>
              <th>Opciones</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($preguntas as $p): ?>
              <tr>
                <th class="scope"><?php echo $p['PM_ID']; ?></th>
                <td><?php echo $p['PM_NOMBRE']; ?></td>
                <td><?php echo $this->tipoPregunta($p['PM_TIPO']); ?></td>
                <td>
                  <div class="btn-group">
                    <?php
                      echo anchor('preguntas/editar/' . $this->tipoPregunta_enlace($p['PM_TIPO']) . '/' . $p['PM_ID'], 'Editar', 'class="btn btn-warning"');
                      echo anchor('Prueba/ver/'. $p['PM_ID'], 'Ver', 'class="btn btn-primary"');
                      // echo anchor('docentes/graficarPregunta/'. $user['PM_ID'], 'Gráficos', 'class="btn btn-info"');
                      echo anchor('preguntas/eliminar/'. $p['PM_ID'], 'Eliminar', 'class="btn btn-danger"');
                    ?>
                  </div>
                </td>
                  <div class="btn-group">
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>