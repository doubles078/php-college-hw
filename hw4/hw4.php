<!DOCTYPE html>
<html lang="en">
<head>
<title> Speeding Ticket</title>
<meta charset="utf-8" /> 
	<link rel="stylesheet" href="hw4.css">

</head>

<body>
	<?php
	
	
	
		$home = 
		"<fieldset style=\"height:175px; width:400px; background:gold; color:black; font-family:'Comic Sans MS', cursive, sans-serif;\">
		<legend style=\"background:maroon; color:white; font-family:Arial, Helvetica, sans-serif;\"> TICKET CALCULATOR</legend>
		<form method=\"post\">
				<div id='box'>	<label><b>Driver Name:</b> <input type=\"text\" name=\"name\"></label><br>
					<label><b>Driver Speed:</b> <input type=\"text\" name=\"speed\"></label><br>
					<label><b>Speed Limit:</b> <input type=\"text\" name=\"limit\"></label>
					</div>
				<input id='buttons' type='submit' name='submit' value='Compute Fine'><br>
				</form>
		</fieldset>";		

    					

	
	if(empty($_POST["name"] ) === true and empty($_POST["speed"]) === true and empty($_POST["limit"]) === true){
	echo $home;
    			
    	}
    	
    else{
    	if (empty($_POST["name"])) {
       		 die('Enter a name!'."<br><br><a href='hw4.php'><span style=\"color:black;\">Try Again!</span></a>
");}
  		else if(is_numeric($_POST["name"])) {
   			 die("'$_POST[name]' is not a name... is it?"."<br><br><a href='hw4.php'><span style=\"color:black;\">Try Again!</span></a>
");}				  
   		 else {
     		   $name = $_POST["name"];
 									   }

  		if (empty($_POST["speed"]))  {
       		 die('Wait... how fast were you going?'."<br><br><a href='hw4.php'><span style=\"color:black;\">Try Again!</span></a>
");
   									 }
   		
   		else if(!is_numeric($_POST["speed"])) {
   			 die("Dude, '$_POST[speed]' is not a number..."."<br><br><a href='hw4.php'><span style=\"color:black;\">Try Again!</span></a>
");}
   			
   		else if($_POST["speed"] <= 0 or $_POST["speed"] >= 150) {
   			 die("Please enter a valid speed."."<br><br><a href='hw4.php'><span style=\"color:black;\">Try Again!</span></a>
");}
   		 
   		 else {
     	   $speed = $_POST["speed"];
   			 }

   		 if (empty($_POST["limit"])) {
   		      die('Enter a speed limit!'."<br><br><a href='hw4.php'><span style=\"color:black;\">Try Again!</span></a>
");
   									 }
   		else if(!is_numeric($_POST["limit"])) {
   			die("Dude, enter a number for your speed limit."."<br><br><a href='hw4.php'><span style=\"color:black;\">Try Again!</span></a>
");}
   			
   		else if($_POST["limit"] <= 0 or $_POST["limit"] >= 150) {
   			 die("Please enter a valid limit."."<br><br><a href='hw4.php'><span style=\"color:black;\">Try Again!</span></a>
");}
   			
   		 else {
       			 $limit = $_POST["limit"];
    			};
    	$fine = 0;
		$over = $speed - $limit;

		$speeding = 
		"<fieldset style=\"height:300px; width:400px; background:url('speeding.jpg'); color:black; font-family:'Comic Sans MS', cursive, sans-serif;\">
		<legend style=\"background:maroon; color:white; font-family:Arial, Helvetica, sans-serif;\">Slow Down There Sonic</legend>
		<a href='hw4.php'><span style=\"color:white;\">Try Again!</span></a>
		</fieldset>";
		$notspeeding = 
		"<fieldset style=\"height:300px; width:475px; background:url('ricky.jpg'); color:black; font-family:'Comic Sans MS', cursive, sans-serif;\">
		<legend style=\"background:maroon; color:white; font-family:Arial, Helvetica, sans-serif;\"> You Were Within the Limit!</legend>
				<a href='hw4.php'><span style=\"color:white;\">Try Again!</span></a>
		</fieldset>";	
		
		if	($speed > ($limit + 9))
  			{ $fine = 100 + (($over - 10) * 10);
  				
  				echo $speeding."$name, you were $over mph over the speed limit! $$fine fine for you.";
  				die();
  			}
		else 
				{$info = "Good job, $name, you weren't speeding";
		 		echo $notspeeding;
		 		die();};};
	
	?>
	
