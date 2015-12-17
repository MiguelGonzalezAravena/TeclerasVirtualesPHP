<div class="container-fluid">
  <h1>Pregunta a responder</h1>
  <?php echo form_open('estudiantes/responderPreguntas'); ?>
  <input type="hidden" name="pregunta_id" value="<?php echo $pregunta; ?>" />
  <input type="hidden" name="clase" value="<?php echo $clase; ?>" />
  <div class="panel panel-primary">
    <div class="panel-body">
    <?php foreach($preguntaSeleccionada->result() as $row): ?>
      <p><h3 class="text-center"><span class="label label-primary"><?php echo $row->PM_TEXTO; ?></span></h3></p>
      <p><b>Escoja una de las alternativas</b></p>
      <?php foreach($respuestas->result() as $res): ?>
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon">
                <input type="radio" name="respuesta" value="<?php echo $res->RES_ID; ?>">
              </span>
              <input type="text" class="form-control" value="<?php echo $res->RES_TEXTO; ?>" disabled>
            </div>
          </div>
      <?php endforeach; ?>
      <div class="form-group">
        <button class="btn btn-danger">
          Enviar respuesta
        </button>
      </div>
    <?php endforeach; ?>
    </div>
  </div>
</div>