<h1><font color="Navyblue"> Docente </font></h1>
 <div class="panel panel-default" >

  <div class="panel-body">
    <table style="border:1px solid black;">
      <tr>


<?php
 $correcta=1; 
 foreach($arrPregunta as $row){ 
      $arreglo=explode(' ',$row->PM_FECHA_CREACION);//tabla_maestra
       echo '<h2> Pregunta ' .$row->PM_ID. ', Clase '.$arreglo[0] .'<br><h5>Realizada a las '.$arreglo[1].'';
       echo '<br></br>';
       echo '<p></p>'.$row->PM_TEXTO.'<br>';//pregunta
       foreach ($arrDatos as $row2){  //este for, muestra todas las alternativas del ID correspondiente
                             echo '<br> ►'.$row2->RES_TEXTO;
                             if($correcta == $row2->PM_CORRECTA)//revisa cual es la alternativa correspondiente...
                               $CORRECTA=$row2->RES_TEXTO;//sabiendo que PM_CORRECTA 0 si es falta y 1 si es correcta
                  } 
        echo '<br></br>';
        echo '<p> La respuesta correcta es: <font color="red"> '.$CORRECTA.' </font></p>';//respondida
       echo '<p>'.$row->PM_EXPLICACION.'</p>';
  
      }

      
        ?> 
   
   </tr>
  </table>
</div>
</div>
<!-- <div class="panel panel-default" >
  <div class="panel-body">
    <table style="border:1px solid black;">
      <tr> -->
         <?php
        //   $count=0;
        //   $correcta=1; 
        //   $num=0;
        //     foreach ($join->result() as $row2){
        //        $arreglo=explode(' ',$row2->PR_HORA_INICIO);//realizada
        //         //$alternativas=explode(',',$row2->RES_ID);//maestra
        //        $talter=count($row2->RES_ID)-1;
        //        if($count<1){
        //            echo '<h2> Pregunta ' . $row2->PM_ID. ', Clase '.$arreglo[0] .'<br><h5>Realizada a las '.$arreglo[1].'';
        //            echo '<br></br>';
        //            echo '<p></p>'.$row2->PM_TEXTO.'<br>';//pregunta
        //            foreach ($respuesta->result() as $row){  
        //                     echo '<br> ►'.$row->RES_TEXTO;
        //                     if($correcta == $row->PM_CORRECTA)
        //                       $CORRECTA=$row->RES_TEXTO;
        //            } 
        //            echo '<p> La respuesta correcta es: <font color="red"> '.$CORRECTA.' </font></p>';//respondida
        //            echo '<p></p>'.$row2->PM_EXPLICACION.'<br>';//maestra
        //         }
        //             $count++;
                    
        //  } 
        // foreach ($enlace->result() as $row) {
        //   $arreglo=explode(' ',$row->PR_HORA_INICIO);
        //   if($count<1){
        //       echo '<h2> Pregunta ' . $row->PM_ID. ', Clase '.$arreglo[0] .'<br><h5>Realizada a las '.$arreglo[1].'';
        //       echo '<br></br>';
        //   }
        //   $count++;
        // }

        ?>
         
<!--     </tr>
  </table>
</div>
</div> -->
