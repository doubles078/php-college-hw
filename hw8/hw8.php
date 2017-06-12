<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	
	<title>Cafe Burrito</title>
	<style type="text/css">
	legend{
	background-color:#817339;
	color:white;
	font-weight:bold;
}

select{
	color:white;
	background-color:#7E3517;
	height:40px;
	width:200px;
	font-size:20px;
}

#button{
	position:relative;
	bottom:-100px;
	right:-650px;
	color:white;
	background-color:#7E3517;
	height:40px;
	width:200px;
	font-size:20px;
}


#extras{
	background-color:#ECD672;
	width:300px;
	float:right;
	margin-right:50px;
}



#rice{
	background-color:#ECD672;
	width:200px;
}

#beans{
	background-color:#ECD672;
	width:200px;
}

#cheese{
	background-color:#ECD672;
	width:200px;
	margin-left:250px;
	margin-top:-73px;
}

#filling{
	background-color:#ECD672;
	width:250px;
	margin-left:250px;
	margin-top:-200px;
}

#menu{
	background-color:#C9C299;
	width:900px;
	height:300px;

}


#order{
	background-color:#C9C299;
	width:500px;
}
	</style>
</head>
<body>
<?php
if (isset($_GET['formsubmitted'])) {
	$extras = $_GET['extras'];
	$rice = $_GET['rice'];
	$beans = $_GET['beans'];
	$cheese = $_GET['cheese'];
	$filling = $_GET['filling'];
	$entree = $_GET['entree'];
	handleform($entree, $rice, $beans, $cheese, $filling, $extras); 
} else
	$currentmenu = "";

displayform($entree, $rice, $beans, $cheese, $filling, $extras); 
?>
</body>
</html>
<?php
// form to demonstrate getting arrays as input from forms.
function displayform($entree, $rice, $beans, $cheese, $filling, $extras){
?>
<fieldset id='menu'><legend>Welcome to Cafe Burrito!</legend>	
<form method="get">
<article id='extras'><? make_extras_checkboxes($extras); ?></article><br>
<article id='entree'><? make_select($entree); ?></article><br>
<article id='rice'><? make_radio_rice($rice); ?></article><br>
<article id='beans'><? make_radio_beans($beans); ?></article><br>
<article id='cheese'><? make_radio_cheese($cheese); ?></article><br>
<article id='filling'><? make_radio_filling($filling); ?></article><br>

<input type="submit" id="button" name="formsubmitted" value="Submit My Order!"/>
</form>
</fieldset>
<?}?>

<?
function make_select($entree)
{
	$entree = array("Super Burrito", "Naked Burrito", "Quesadilla", "Taco", "Taco Salad Bowl");
	echo '<select name="entree">';
	foreach ($entree as $value){
		if (!empty($entree))
			echo "<option value=\"$value\"> $value</option<br>\n";
		else
			echo "<option value=\"$value\"> $value</option><br>\n";
	}
	echo '</select>';
}
?>
<?
function make_extras_checkboxes($extras)
{
	$extras = array("Corn Salad (mild)", "Gentlemen Dan's Salsa de Casa (medium)", "Chipotle Salsa (hot)", "Seasonal Fruit Salad (medium)", "Pico de Gallo (mild)", "Guacamole", "Jalapeños", "Lettuce", "Pickled Veggies", "Sour Cream");
	
	foreach ($extras as $value){
		if (!empty($extras) and (FALSE !== array_search($value, $extras)))
			echo "<input type=\"checkbox\" name=\"extras[]\" value=\"$value\"> $value<br>\n";
		else
			echo "<input type=\"checkbox\" name=\"extras[]\" value=\"$value\"> $value<br>\n";
	}
}
?>
<?
function make_radio_rice($rice)
{
	$rice = array("Basmati White", "Basmati Brown");
	
	foreach ($rice as $value){
		if (!empty($rice) and (FALSE !== array_search($value, $rice)))
			echo "<input type=\"radio\" name=\"rice[]\" value=\"$value\" > $value<br>\n";
		else
			echo "<input type=\"radio\" name=\"rice[]\" value=\"$value\"> $value<br>\n";
	}
}
?>
<?
function make_radio_beans($favorites)
{
	$beans = array("Pinto", "Black", "Refried");
	
	foreach ($beans as $value){
		if (!empty($beans) and (FALSE !== array_search($value, $beans)))
			echo "<input type=\"radio\" name=\"beans[]\" value=\"$value\" > $value<br>\n";
		else
			echo "<input type=\"radio\" name=\"beans[]\" value=\"$value\"> $value<br>\n";
	}
}
?>
<?
function make_radio_cheese($cheese)
{
	$cheese = array("Chihuahua", "Cheddar", "Cotija");
	
	foreach ($cheese as $value){
		if (!empty($cheese) and (FALSE !== array_search($value, $cheese)))
			echo "<input type=\"radio\" name=\"cheese[]\" value=\"$value\"> $value<br>\n";
		else
			echo "<input type=\"radio\" name=\"cheese[]\" value=\"$value\"> $value<br>\n";
	}
}
?>
<?
function make_radio_filling($filling)
{
	$filling = array("Carne de Casa", "Carnitas", "Pulled BBQ Chicken Pork", "Roasted Chili Lime Chicken", "Roasted Veggies");
	
	foreach ($filling as $value){
		if (!empty($filling) and (FALSE !== array_search($value, $filling)))
			echo "<input type=\"radio\" name=\"filling[]\" value=\"$value\" > $value<br>\n";
		else
			echo "<input type=\"radio\" name=\"filling[]\" value=\"$value\"> $value<br>\n";
	}
}
?>

<?php 
function handleform($entree, $rice, $beans, $cheese, $filling, $extras){
	echo '<fieldset id=\'order\'>';
	echo '<legend>Your Order</legend>';
		
		echo "Your entree is the $entree.<br>";
		
	if(empty($_GET['rice']) === false)	{
		foreach ($rice as $value)
			{echo "You chose $value.<br>";}}
	else { echo "You did not choose any rice.<br>";}
		
	if(empty($_GET['beans']) === false){
		foreach ($beans as $value)
			{echo "You chose $value beans.<br>";}}
		else{ echo "You did not choose any beans. <br>";}
		
	if(empty($_GET['cheese']) === false){
		foreach ($cheese as $value)
			{echo "You chose $value cheese.<br>";}}
		else{ echo "You did not choose any cheese. <br>";}
		
	if(empty($_GET['filling']) === false){	
		foreach ($filling as $value)
			{echo "You chose $value.<br>";}}
		else {echo "You did not choose a filling. <br>";}
			
	if(empty($_GET['extras']) === false){
		echo "You chose these extras: ";
		foreach ($extras as $value)
			{echo "$value ";}}
	else{ echo "You did not choose an extra.";}	
	
	echo '</fieldset>';
}
