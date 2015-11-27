
<table style="border:1px solid black;">
	<tr>
		<?php
		$count=0;
          foreach ($enlace->result() as $row) {
          	if($count<1){
            echo '<tr>';
            echo '<td><h1> Pregunta ' . $row->PM_ID. ', Clase'.$row->PM_FECHA_CREACION .'</h1></td>';
            echo '<td>' . $row->PM_NOMBRE . '</td>';
            echo '<td>' . $row->PM_TEXTO . '</td>';
            echo '<td>' . $row->PM_EXPLICACION. '</td>';
            echo '</tr>';
          }
          $count++;
      }
        ?>
        
	</tr>
</table>




