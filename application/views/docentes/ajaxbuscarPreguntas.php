<?php
  if(!$preguntas->result()) {
?>
  <tr class="fila text-center">
    <td colspan="4">No se encontraron preguntas.</td>
  </tr>
<?php
  } else {
    foreach ($preguntas->result() as $row) {
      echo "<tr class='fila' id='fila_".$row->PM_ID."'>
            
          <td id='nombre_".$row->PM_NOMBRE."'>".$row->PM_NOMBRE."</td>
          <td id='tipo".$row->PM_TIPO."'>".$row->PM_TIPO."</td>
          <td id='fecha".$row->PM_FECHA_CREACION."'>".$row->PM_FECHA_CREACION."</td>
          <td>";
      echo anchor('docentes/lanzarPregunta/' . $clase . '/' . $row->PM_ID, '<span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Lanzar', 'class="btn btn-success"');
      echo "</td>  
        </tr>";
    }
  }
?>