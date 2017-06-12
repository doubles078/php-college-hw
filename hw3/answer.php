<!DOCTYPE html>
<html lang="en">
<head>
<title> Answer</title>
<meta charset="utf-8" /> 
</head>

<body>
		

<fieldset style="background:#7FFF00; color:black; font-family:'Comic Sans MS', cursive, sans-serif;">
		<legend style="background:green; color:white; font-family:Arial, Helvetica, sans-serif;"> FARE RESULTS</legend>
							<?php /* This is my first php script */
					
					$distance = $_POST['distance']; 
					$toll = $_POST['toll']; 
					$service = $_POST['service']; 
					 
					if ($distance > 1)
  						{ $fare = 2.60 + ((($distance / (1/7)) - 1) * .4);}
					elseif ($distance < 1 and $distance < 0)
				 		{$fare = 2.60;}
					else {$fare = 0;};
		
				
					
					$tip = 	number_format(($fare + $toll) * $service,2);
					$units = ceil($distance / (1/7));	
					$total = number_format($tip + $fare + $toll,2);
							
					echo "You travelled ".$units." units of 1/7 of a mile and incurred $".$toll." in tolls. With 
					a tip of $".$tip.", you owe a total of $".$total. ".";
					?>
					<br><br>
					<a href='hw3.php'> Click here to calculate another fare</a>
			</fieldset>
		
		
		

</body>
</html>