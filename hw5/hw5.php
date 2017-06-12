<!DOCTYPE html>

<html>
	<head>
		<link rel="stylesheet" href="cgweb.css">
		<title> Thanksgiving Calculator</title>
		<style>
			hr {color:sienna;}
			p {margin-left:20px;}
			body {background-image:url("thbg.jpg");
				background-size:100% 300%;
				background-repeat:no-repeat;}
			h2{color:white;}
			th{color:white; background:green;}
			#tbl{
				position:static;
				margin-top:-275px;}
			#tky{
				position:static;
				margin-top:50px;
				margin-left:200px;}
		</style>
	</head>
<body>
	<h2>Thanksgiving Date Generator</h2>
	<table id='tbl'>
	<tr>
	<th> Year </th><th>Date</th>
	</tr>
	<img id='tky' src='funtky.jpg' alt='turkeygotguns'>

<?php

for ($year=2013; $year < 2023; $year++){
	$color = swapcolor($color);
	$thdate = thanksgivingdate($year);
	$date =  $dateString;
	printrow($color, $year, $thdate);

}?>

	</table>
</body>
</html>


<?php

function thanksgivingdate($year){
$dayNumber = date("N",mktime(0,0,0,11,1,$year)); 
switch($dayNumber)
{
case 1: $tdate = 25; /* Monday */
	break;
case 2: $tdate= 24; /* Tuesday */
	break;
case 3: $tdate= 23; /* Wednesday */
	break;
case 4: $tdate= 22; /* Thursday */
	break;
case 5: $tdate= 28; /* Friday */
	break;
case 6: $tdate= 27; /* Saturday */
	break;
case 7: $tdate= 26; /* Sunday */
	break;
	default: 
		die("Invalid day of the week $dayNumber");
}
$dateString = date('Y-m-d',mktime(0,0,0,11,$tdate,$year)); 
return $dateString;
}

function swapcolor($color){
if ($color == "gold")
	return "orange";
else
	return "gold";
}

function printrow($color, $data1, $data2){
	echo "<tr style='background-color:$color; color:red;'>
			<td>$data1</td>
			<td>$data2</td>
		</tr>";
	}
	
	?>