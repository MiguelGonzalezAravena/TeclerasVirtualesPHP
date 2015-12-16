<h1><font color="Navyblue">Docente</font></h1>
<?php
  foreach($arrPregunta->result() as $row):
    $fecha = explode(' ',$row->PM_FECHA_CREACION);//tabla_maestra
    $respuestas = explode('@', $row->PM_TEXTO);
    foreach ($arrDatos->result() as $row2):
      $correcta = $row2->PM_CORRECTA;
      $texto = $row2->RES_TEXTO;
    endforeach;
?>
<div class="panel panel-primary">
  <div class="panel-body">
  <h2>Pregunta <?php echo $row->PM_ID; ?>, Clase <span class="label label-info"><?php echo $fecha[0]; ?></span></h2>
  <p><i>Realizada a las <?php echo $fecha[1]; ?></i></p>
  <p ><h3 class="text-center"><span class="label label-primary"><?php echo $row->PM_EXPLICACION; ?></span></h3></p>
  <p><b>Alternativas</b></p>
  <ul class="list-group">
    <?php for($i = 0; $i < count($respuestas); $i++): ?>
    <li class="list-group-item <?php echo ($respuestas[$i] == $correcta ? 'list-group-item-success' : ''); ?>"><?php echo $respuestas[$i]; ?></li>
    <?php endfor; ?>
  </ul>
  <p>La respuesta correcta es: <code><?php echo $correcta; ?></code></p>
  <p><i>► <?php echo $texto; ?></i></p>
</div>
</div>
<?php echo anchor('crudpregunta/index/1', 'Ver banco de preguntas', 'class="btn btn-primary"'); ?>
  <?php endforeach; ?>
