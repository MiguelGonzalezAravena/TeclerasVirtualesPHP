<div style="text-align:center;">
  <table style="border:1px solid black;">
  	<tr>
  		<?php
  		  $count=0;
         
           foreach ($join->result() as $row2){
             $arreglo=explode(' ',$row2->PR_HORA_INICIO);
             $alternativas=explode(',',$row2->PM_TEXTO);
               if($count<1){
                   echo '<h2> Pregunta ' . $row2->PM_ID. ', Clase '.$arreglo[0] .'<br><h5>Realizada a las '.$arreglo[1].'';
                   echo '<br></br>';
                   echo '<p></p>'.$row2->PM_NOMBRE .'<br>';
                   echo '<br> ►'.$alternativas[0].'<br>►'.$alternativas[1]. '<br>►'.$alternativas[2]. '</br>';
                   echo '<br> La respuesta correcta es: <font color="red"> '.$row2->PM_CORRECTA.' </font><br>';
                   echo '<p></p>'.$row2->PM_EXPLICACION;
                     }
                    $count++;
         } 
        // foreach ($enlace->result() as $row) {
        //   $arreglo=explode(' ',$row->PR_HORA_INICIO);
        //   if($count<1){
        //       echo '<h2> Pregunta ' . $row->PM_ID. ', Clase '.$arreglo[0] .'<br><h5>Realizada a las '.$arreglo[1].'';
        //       echo '<br></br>';

        //   }
        //   $count++;
        // }


          ?>
          
  	</tr>
  </table>
</div>



