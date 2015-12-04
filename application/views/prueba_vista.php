<div style="text-align:center;">
  <table style="border:1px solid black;">
  	<tr>
  		<?php
  		$count=0;
            foreach ($enlace->result() as $row) {
              $arreglo=explode(' ',$row->PM_FECHA_CREACION);
            	if($count<1){
              echo '<tr>';
              echo '<h2> Pregunta ' . $row->PM_ID. ', Clase '.$arreglo[0] .'<br><h5>Realizada a las'.$arreglo[1].'';
              //echo '<h1> Pregunta ' . $row->PM_ID. ', Clase'.$arreglo[0] .'</h1>';
              echo '<br></br>';
              echo '<p></p> ' . $row->PM_NOMBRE . ' ';
              echo '<p></p> ' . $row->PM_TEXTO . ' ';
              echo '<p></p> ' . $row->PM_EXPLICACION. ' ';
              echo '</tr>';
            }
            $count++;
        }
          ?>
          
  	</tr>
  </table>
</div>



