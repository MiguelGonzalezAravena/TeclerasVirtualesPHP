<?php 
    foreach ($preguntas->result() as $row) {
      echo "<tr class='fila' id='fila_".$row->PM_ID."'>
            
          <td id='nombre_".$row->PM_NOMBRE."'>".$row->PM_NOMBRE."</td>
          <td id='tipo".$row->PM_TIPO."'>".$row->PM_TIPO."</td>
          <td id='fecha".$row->PM_FECHA_CREACION."'>".$row->PM_FECHA_CREACION."</td>
          <td> 
           

            <button type='radio' name='pregunta' id='pregunta_".$row->PM_ID."' value=".$row->PM_ID." class='btn btn-default' aria-label='Left Align'>
            <span class='glyphicon glyphicon-log-in' aria-hidden='true'></span>
            </button>
          </td>  
        </tr>";
    }
?>