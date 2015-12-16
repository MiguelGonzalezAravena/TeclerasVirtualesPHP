<?php 
    foreach ($preguntas->result() as $row) {
      echo "<tr class='fila' id='fila_".$row->PM_ID."'>
            
          <td id='nombre_".$row->PM_NOMBRE."'>".$row->PM_NOMBRE."</td>
          <td id='tipo".$row->PM_TIPO."'>".$row->PM_TIPO."</td>
          <td id='fecha".$row->PM_FECHA_CREACION."'>".$row->PM_FECHA_CREACION."</td>
          <td>
            <span >
            <label class="checkbox-inline">
                <input type="checkbox" id="checkboxEnLinea2" value="opcion_2"> 2
             </label>
            </span>
          </td>
        </tr>";
    }
?>