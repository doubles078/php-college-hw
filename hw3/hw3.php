<!DOCTYPE html>
<html lang="en">
<head>
<title> Toll Booth</title>
<meta charset="utf-8" /> 
	<link rel="stylesheet" href="hw3.css">

</head>

<body>
		
		<fieldset style="height:275px; background:gold; color:black; font-family:'Comic Sans MS', cursive, sans-serif;">
		<legend style="background:maroon; color:white; font-family:Arial, Helvetica, sans-serif;"> CALCULATE FARE AND TIP</legend>
		<form method="post" action='answer.php'>
				<div id='box'>	<label><b>Distance (miles):</b> <input type="number" name="distance"></label><br>
					<label><b>Toll (amount):</b> <input type="number" name="toll"></label></div>
				
					<div id='radios'><p><b>Quality of service:</b><br>
							<label>Poor<input type='radio' name='service' value='.10'></label><br>
							<label>Acceptable<input type='radio' name='service' value='.15'></label><br>
							<label>Good<input type='radio' name='service' value='.20'></label><br>
							<label>Outstanding<input type='radio' name='service' value='.25'></label><br>
						</p></div><br>
				<div id='buttons'>	<input type='submit' name='go' value='Calculate Fare and Tip'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type='reset' name='reset' value='Start Over'>
				</div>
				</form>
		</fieldset>
		

</body>
</html>