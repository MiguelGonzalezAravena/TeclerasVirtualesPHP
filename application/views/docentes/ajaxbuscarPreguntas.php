<?php
  if(!$preguntas->result()) {
?>
  <tr class="fila text-center">
    <td colspan="4">No se encontraron preguntas.</td>
  </tr>
<?php
  } else {
    foreach ($preguntas->result() as $row) {
?>
  <tr class="fila" id="fila_<?php echo $row->PM_ID; ?>">
    <td id="nombre_<?php echo $row->PM_NOMBRE; ?>"><?php echo $row->PM_NOMBRE; ?></td>
    <td id="tipo<?php echo $row->PM_TIPO; ?>"><?php echo $this->tipoPregunta($row->PM_TIPO); ?></td>
    <td id="fecha<?php echo $row->PM_FECHA_CREACION; ?>"><?php echo $row->PM_FECHA_CREACION; ?></td>
    <td><?php echo anchor('docentes/lanzarPregunta/' . $clase . '/' . $row->PM_ID, '<span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Lanzar', 'class="btn btn-success" id="lanzar"'); ?></td>
  </tr>
<?php
    }
  }
?>