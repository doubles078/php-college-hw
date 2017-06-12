<!DOCTYPE html>
<head>
<title>World Map HW14</title>
  <style type="text/css">
	body{ font-family: Verdana, sans-serif; 
		background-image: url(wow.jpeg); 
		background-repeat: repeat;
		background-size:390px 200px;}
	#f1 {  
		margin-left:auto;
		margin-right:auto;
		color:white;
		height: 200px; 
		width: 390px;
		background-color:maroon;
		color:gold;
	}
	#f2{
		margin-left:auto;
		margin-right:auto;
		background-color:maroon;
		color:gold;
		height: 200px; 
		width: 390px;
	
	
	}
	legend {
		background-color: gold; 
		color:maroon;
		width: 300px;
		font-size: 18px;
	}
	select {
		background-color: gold; 
		font-size: 18px;
		height: 40px;
	}
	#mybutton {
	  	height:40px;
	  	float:right;
	  	font-size: 26px;
	  	background-color:gold;
	  	font-weight:bold;
	  	font-family:arial;
	  	position:relative;
		bottom:-75px;
	  }
	.status {
		background-color: green;
		color: gold;
		position:absolute;
		top:200px;
	}	
</style>




</head>
<body>
<?php

if (isset($_GET['submitted']))
	handleform($_GET['student']);
	
displayform("student");

?>
</body>
</html>
<?php
function handleform($id){
	$continent = $id;
	$dbc= connectToDB();	
	$query = "SELECT InternetUsers, (InternetUsers/InternetHosts) as Userperhost, MedianAge from countries where Continent = '$continent' group by Continent";
	$result = performQuery($dbc, $query);
	$row=mysqli_fetch_array($result, MYSQLI_ASSOC);
	
	$internetusers = $row['InternetUsers'];
	$userperhost = $row['Userperhost'];
	$medianage = $row['MedianAge'];
	
	echo "<fieldset id=\"f2\" ><legend>$continent</legend>
	There are ".number_format($internetusers)." total internet users, and ".number_format($userperhost)." internet users per host.
	The avergage median age for countries in $continent is ".$medianage."</fieldset>";
		
}
function displayform($menuname){
	echo "<fieldset id=\"f1\"><legend>Select Your Continent and I Will Give You Info On It</legend>
	<form method = \"get\">";
	
	createpulldown($menuname);
	echo "<input id=\"mybutton\" type=\"submit\" name=\"submitted\" value=\"Submit My Query\">
			</form></fieldset>\n";
}
function createpulldown($menuname){
	echo "<select name=\"$menuname\">\n";
	$dbc= connectToDB();	
	$query = "SELECT Continent FROM `countries` group by Continent";
	$result = performQuery($dbc, $query);
	while ($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
	
		$continent = $row['Continent'];
	   
	   	if ($_GET[$menuname] == $continent)
			echo "<option value = \"$continent\" selected>$continent</option>\n";
		else
			echo "<option value = \"$continent\">$continent </option>\n";
	}
		
	echo "</select>";
	disconnectFromDB($dbc, $result);
}

function connectToDB(){
	$dbc= @mysqli_connect("cslab.bc.edu", "donohudb", "4CWh6WaezSAAt8Ax", "wfb2007") or
					die("Connect failed: ". mysqli_connect_error());
	return ($dbc);
}
function disconnectFromDB($dbc, $result){
	mysqli_free_result($result);
	mysqli_close($dbc);
}

function performQuery($dbc, $query){
	
	//echo "My query is >$query< <br />";
	$result = mysqli_query($dbc, $query) or die("bad query".mysqli_error($dbc));
	return ($result);
}
?>