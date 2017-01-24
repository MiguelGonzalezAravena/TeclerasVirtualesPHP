<h1>Tipo de pregunta</h1>
<div class="panel panel-default">
  <div class="panel-body text-center">
    <h3>Crear pregunta de:</h3>
    <?php echo anchor('preguntas/crear/alternativa', 'Alternativas', 'class="btn btn-warning"'); ?>
    <?php echo anchor('', 'Dicotómica', 'class="btn btn-info"'); ?>
    <?php echo anchor('', 'Escala de Likert', 'class="btn btn-danger"'); ?>
  </div>
</div>
  <?php echo anchor('preguntas/', 'Ver banco de preguntas', 'class="btn btn-primary"'); ?>
  <?php echo anchor('docentes/mostrarAsignaturas', 'Volver a Asignauras', 'class="btn btn-success"'); ?>
  <div class="row">
    <div class="col-md-12">&nbsp;</div>
  </div>
