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


<html>

<head>

<style type="text/css">

.numbers {

    text-align: right;

    font-family: Arial;

    font-size: 28px;

    font-weight: bold;    /* options are normal, bold, bolder, lighter */

    font-style: italic;   /* options are normal or italic */

    color: #80FF00;       /* change color using the hexadecimal color codes for HTML */

}

.title {    /* the styles below will affect the title next to the numbers, i.e., “Days”, “Hours”, etc. */

    margin: 12px 0px 0px 0px;

    padding: 0px 8px 0px 3px;

    text-align: left;

    font-family: Arial;

    font-size: 10px;

    font-weight: bold;    /* options are normal, bold, bolder, lighter */

    font-style: italic;   /* options are normal or italic */

    color: #80FF00;       /* change color using the hexadecimal color codes for HTML */

}

#table {

    width: auto;

    margin: 0px auto;

    position: relative;    /* leave as "relative" to keep timer centered on your page, or change to "absolute" then change the values of the "top" and "left" properties to position the timer */

    top: 0px;        /* change to position the timer */

    left: 0px;       /* change to position the timer; delete this property and it's value to keep timer centered on page */

}

</style>


<script type="text/javascript">


/*

Count down until any date script-

By JavaScript Kit (www.javascriptkit.com)

Over 200+ free scripts here!

Modified by Robert M. Kuhnhenn, D.O.

on 5/30/2006 to count down to a specific date AND time,

on 10/20/2007 to a new format, and 1/10/2010 to include

time zone offset.

*/


/*  Change the items below to create your countdown target date and announcement once the target date and time are reached.  */

var current="Winter is here!";    //-->enter what you want the script to display when the target date and time are reached, limit to 20 characters

var year=2010;    //-->Enter the count down target date YEAR

var month=12;     //-->Enter the count down target date MONTH

var day=21;       //-->Enter the count down target date DAY

var hour=18;      //-->Enter the count down target date HOUR (24 hour clock)

var minute=38;    //-->Enter the count down target date MINUTE

var tz=-5;        //-->Offset for your timezone in hours from UTC (see http://wwp.greenwichmeantime.com/index.htm to find the timezone offset for your location)


//-->    DO NOT CHANGE THE CODE BELOW!    <--

var montharray=new Array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");


function countdown(yr,m,d,hr,min){

theyear=yr;themonth=m;theday=d;thehour=hr;theminute=min;

    var today=new Date();

    var todayy=today.getYear();

    if (todayy < 1000) {todayy+=1900;}

    var todaym=today.getMonth();

    var todayd=today.getDate();

    var todayh=today.getHours();

    var todaymin=today.getMinutes();

    var todaysec=today.getSeconds();

    var todaystring1=montharray[todaym]+" "+todayd+", "+todayy+" "+todayh+":"+todaymin+":"+todaysec;

    var todaystring=Date.parse(todaystring1)+(tz*1000*60*60);

    var futurestring1=(montharray[m-1]+" "+d+", "+yr+" "+hr+":"+min);

    var futurestring=Date.parse(futurestring1)-(today.getTimezoneOffset()*(1000*60));

    var dd=futurestring-todaystring;

    var dday=Math.floor(dd/(60*60*1000*24)*1);

    var dhour=Math.floor((dd%(60*60*1000*24))/(60*60*1000)*1);

    var dmin=Math.floor(((dd%(60*60*1000*24))%(60*60*1000))/(60*1000)*1);

    var dsec=Math.floor((((dd%(60*60*1000*24))%(60*60*1000))%(60*1000))/1000*1);

    if(dday<=0&&dhour<=0&&dmin<=0&&dsec<=0){

        document.getElementById('count2').innerHTML=current;

        document.getElementById('count2').style.display="block";

        document.getElementById('count2').style.width="390px";

        document.getElementById('dday').style.display="none";

        document.getElementById('dhour').style.display="none";

        document.getElementById('dmin').style.display="none";

        document.getElementById('dsec').style.display="none";

        document.getElementById('days').style.display="none";

        document.getElementById('hours').style.display="none";

        document.getElementById('minutes').style.display="none";

        document.getElementById('seconds').style.display="none";

        return;

    }

    else {

        document.getElementById('count2').style.display="none";

        document.getElementById('dday').innerHTML=dday;

        document.getElementById('dhour').innerHTML=dhour;

        document.getElementById('dmin').innerHTML=dmin;

        document.getElementById('dsec').innerHTML=dsec;

        setTimeout("countdown(theyear,themonth,theday,thehour,theminute)",1000);

    }

}


</script>


</head>


<body onload="countdown(year,month,day,hour,minute);">

<table id="table" cellspacing="0" cellpadding="0" border="0">

    <tr>

        <td colspan="8"><div class="numbers" id="count2" style="text-align: center;"></div></td>

    </tr>

    <tr>

        <td align="right"><div class="numbers" id="dday"></div></td>       

        <td align="left"><div class="title" id="days">Days</div></td>

        <td align="right"><div class="numbers" id="dhour"></div></td>

        <td align="left"><div class="title" id="hours">Hours</div></td>

        <td align="right"><div class="numbers" id="dmin"></div></td>

        <td align="left"><div class="title" id="minutes">Minutes</div></td>

        <td align="right"><div class="numbers" id="dsec"></div></td>

        <td align="left"><div class="title" id="seconds">Seconds</div></td>

    </tr>

</table>





	</div>

</div>
