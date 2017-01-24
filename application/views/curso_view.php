<div class="container">
   <h1>Lista de cursos <?php echo $this->session->userdata('perfil'); ?></h1>
      <?php echo anchor('cursos/create', 'Crear curso', 'class="btn btn-success"'); ?>
    <div class="row">
      <div class="col-md-12">&nbsp;</div>
    </div>

    <div class="panel panel-default">
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>ID Asignatura</th>
              <th>ID Docente</th>
              <th>Acción</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($docentes as $user): ?>
              <tr>
                <td><?php echo $user['PAR_NUMERO'] ?></td>
                <td><?php echo $user['ASI_ID'] ?></td>
                <td><?php echo $user['TV_DOCENTE_DOC_ID'] ?></td>
                <td>
                  <div class="btn-group">
                  </div>
                </td>
              </tr>
          </tbody>
          <?php endforeach ?>
        </table>
      </div>
    </div>
    <?php echo anchor('docentes/mostrarAsignaturas', 'Volver a asignaturas', 'class="btn btn-primary"'); ?>
  </div>

  
