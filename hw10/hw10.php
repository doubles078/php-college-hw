<!DOCTYPE html>
<head>
  <title>Weather & Stuff</title>
  <style type="text/css">
	body{ font-family: arial; 
		background-color: gray;}
	
	fieldset {  
		margin-left:100px;
		width:80%;
		min-width:850px;
		margin-top:50px;
		background-color: gold;
		border-radius:10px;

	}
	
	td{ 
	font-weight:bold;}
	
	legend {
		background-color: maroon;
		color:white; 
		font-size: 20px;
		border-radius:10px;
	}
		
	.button{
	  	height:45px;
	  	font-size: 20px;
	  	color:white;
	  	float:right;
	  	background-color:maroon;
	  	border-radius:10px;
	  }
	  .sun{
	  	float:right;
	  	margin-left:50px;
	  }
	  select {
		background-color: maroon; 
		height: 40px;
		color:white;
		font-size: 20px;}

</style>
</head>
<body>


    <?php // Load and parse the XML document
      	if (isset($_GET['cities'])) {
		makeForm($city);
	} else {
		displayForm($city);
	}
	
	function makeForm($city) {
	  $city = $_GET['cities'];
      if($city == "boston") {
      				$xml = simplexml_load_file('http://w1.weather.gov/xml/current_obs/KBOS.xml');
      				} else if ($city == "dallas") {
	      			$xml = simplexml_load_file('http://w1.weather.gov/xml/current_obs/KDFW.xml');
      				} else if ($city == "denver") {
	      			$xml = simplexml_load_file('http://w1.weather.gov/xml/current_obs/KDEN.xml');
      				} else {
	      			$xml = simplexml_load_file('http://w1.weather.gov/xml/current_obs/KSMX.xml');
	      			}
	  		
      $location =  $xml->location;
      $temperature =  $xml->temperature_string;
      $windchill =  $xml->windchill_string;
      $mph =  $xml->wind_mph;
      $weather =  $xml->weather;
      $wind =  $xml->wind_string;
      $lastUpdated =  $xml->observation_time;
      

      
      
      echo "<fieldset>
      	<div class='sun'><img src='sun.jpg' alt='Happy Sun' width='200'></div>
      		<div style='float:left;'>
	      		<legend><b>Latest $location Observation</b></legend>
		      		<table>
			      		<tr><td>Location:</td><td>$location</td></tr>
			      		<tr><td>Temperature:</td><td>$temperature</td></tr>
			      		<tr><td>Wind Chill:</td><td>$windchill</td></tr>
			      		<tr><td>Weather:</td><td>$weather</td></tr>
			      		<tr><td>Wind:</td><td>$wind</td></tr>
			      		<tr><td>Wind MPH:</td><td>$mph</td></tr>
			      		<tr><td>Last Updated:</td><td>$lastUpdated</td></tr>
		      		</table>
		      	</div>
		      
			      	
		      	
      		</fieldset>";
      		
      		
      displayform($city);
}


function displayform($city) { ?>

<fieldset>
<legend>Select a location:</legend>
	<form method="get" style="padding:10px;">
		<select name='cities' value='if (isset($_GET["cities"])) echo $_GET["cities"];' >
			<option value="boston">Boston, MA</option>
			<option value="dallas">Dallas, TX</option>
			<option value="denver">Denver, CO</option>
			<option value="santa">Santa Maria, CA</option>
		</select>
		<br />
		<br />
		<input type = "submit" class='button' name = "formsubmitted" value = "Tell Me The Weather" />
	</form>
</fieldset>

<?php } ?>

</body>