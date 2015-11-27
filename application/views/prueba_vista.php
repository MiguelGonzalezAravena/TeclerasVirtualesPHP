
<!-- <p><b>Datos de la base de datos</b></p> -->
<table style="border:1px solid black;">
	<tr>
		<?php
          foreach ($enlace->result() as $row) {
            echo '<tr>';
            echo '<td><br><h1> Pregunta ' . $row->PM_ID. ', Clase'.$row->PM_FECHA_CREACION .'</h1></br></td>';
            echo '<td><br></br></td>';
            echo '<td><br>' . $row->PM_NOMBRE . '</br></td>';
            echo '<td><br>' . $row->PM_TEXTO . '</br></td>';
            echo '<td><br>' . $row->PM_EXPLICACION. '</br></td>';
            echo '</tr>';
          }
        ?>
        
	</tr>
</table>




