<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" />
<link rel="stylesheet" href="/styles.css" />
<link rel="stylesheet" href="/countdown/jquery.countdown.css" />


<div class="container-fluid">
	<h1>Alumnos respondiendo</h1>

	<div class="panel panel-default">
		<!-- Default panel contents -->
		<div class="panel-heading">Titulo Pregunta:</div>
		<div class="panel-body">
			<div class="progress">
				<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 60%"></div>
			</div>
	  	</div>
	</div>

	<div class="container">
        
        <div class="col-md-3 col-md-offset-5" style="padding:10px">
        
        <!-- <button id="dia"  name="dia"/> -->
        <!-- <button id="hora"  name="hora"/>-->
        <button disabled="true" type="button" class="btn btn-default" id="Minuto"  name="Minuto"></button>
        :
        <button disabled="true" type="button" class="btn btn-default" id="Segundos"  name="Segundos"/></button>
        &nbsp&nbsp
        <button type="button" onclick="contador_regresivo(0, 0,'<?php foreach ($preguntaSeleccionada->result() as $row) {
                echo($row->PR_TIEMPO_MAX);
            }

            ?>',0)" class="btn btn-success">
            <span class="glyphicon glyphicon-star" aria-hidden="true"></span> Iniciar
        </button>
        </div>
    </div>
</div>


<script type="text/javascript">
     
    function contador_regresivo(d, h, m, s){
        var interval = setInterval(function(){
            if(s > 0) { s--; }
            else
            {
                if (m > 0)
                {
                    m--;
                    s = 59;
                }
                else
                {
                    if (h > 0)
                    {
                        h--;
                        m = 59;
                        s = 59;
                    }
                    else
                    {
                        if (d > 0)
                        {
                            d--;
                            h = 24;
                            m = 59;
                            s = 59;
                        }
                        else
                        {
                            clearInterval(interval);
                        }
                    }
                }
            }
            //document.getElementById("dia").innerHTML = d
            //document.getElementById("hora").innerHTML = h
            document.getElementById("Minuto").innerHTML = m;
            document.getElementById("Segundos").innerHTML = s;
            //document.body.innerHTML = d+" d "+h+" h "+m+" m "+s+" s"
            if (d == 0 && h == 0 && m == 0 && s == 0) {

                date = new Date();
                año = date.getFullYear();
                mes = date.getMonth();
                dia = date.getDay();
                horas = date.getHours();
                minutos =  date.getMinutes();
                seg =  date.getSeconds();
                tiempoFinal = año+"-"+mes+"-"+dia+" "+horas+":"+minutos+":"+seg
                alert(tiempoFinal);
                $.post('<?php echo base_url().'index.php/Docentes/insertarTiempoFinal'?>',{
                    tiempoFinal:tiempoFinal
                }, function(data){
                    console.log(data);
                }

                );
            };
        },1000);
    }
</script>


