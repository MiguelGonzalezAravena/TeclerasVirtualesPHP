<h1><font color="Navy blue"> Estudiante </font></h1>
 <div class="panel panel-default" >

  <div class="panel-body">
    <table style="border:1px solid black;">
      <tr>
          <?php
          foreach($fecha_inicio as $row3){
           $arreglo=explode(' ',$row3->PR_HORA_INICIO);//tabla_maestra
                 echo '<h2> Pregunta ' .$row3->PM_ID. ', Clase '.$arreglo[0] .'<br><h5>Realizada a las '.$arreglo[1].'';
          }
           $correcta=1; 
                 foreach($arrPregunta as $row){ 
                         echo '<br></br>';
                         echo '<p></p>'.$row->PM_TEXTO.'<br>';//pregunta
                 foreach ($alternativas as $row2){  //este for, muestra todas las alternativas del ID correspondiente
                          echo '<br> ►'.$row2->RES_TEXTO;
                          if($correcta == $row2->PM_CORRECTA)//revisa cual es la alternativa correspondiente...
                             $CORRECTA=$row2->RES_TEXTO;//sabiendo que PM_CORRECTA 0 si es falta y 1 si es correcta
                            } 
                  echo '<br></br>';
                  foreach ($arrDatos as $row3){  //este for, muestra todas las alternativas del ID correspondiente
                          if($correcta == $row3->RES_ID)//revisa cual es la alternativa correspondiente...
                              echo 'La respuesta es: <font color="red">CORRECTA</font></p>';//sabiendo que PM_CORRECTA 0 si es falta y 1 si es correcta
                          else
                              echo 'La respuesta es: '.$CORRECTA2 ='INCORRECTA';                            
                            } 
                 echo '<p> La respuesta correcta es: <font color="blue"> '.$CORRECTA.' </font></p>';//respondida
                 echo '<p>'.$row->PM_EXPLICACION.'</p>';
            
                }
 ?> 
   
   </tr>
  </table>
</div>
</div>