<html>
<head>
<style type="text/css"> body{
font-family: Arial, Verdana, sans-serif;
}
legend {
background-color: #648dc7; font-weight: bold; font-size: 20; color:white;
}
input {
width: 200px;
height: 25px; background-color: yellow;
}
input.mybutton {
height:40px; float:right; background-color:yellow; font-weight:bold; position:relative; bottom: -0px;
}
fieldset {
clear: both; padding 5px; width: 500px;
}
label.field {
text-align: left;
float: left;
width: 200px; font-weight: bold; background-color:#648dc7;
}
table {
border-collapse: collapse; border: 3px solid #648dc7; text-align:center;
}
th {font-size: 14; padding:10px;
border: 3px solid #648dc7; text-align: center;
}
td {font-size: 12;
border: 2px solid #648dc7; padding: 3px;
text-align: center;
} 

</style>
</head>

<body>
<?php 
$dan = explode(',',$_POST['data']);

	function findavg($dan){ 
		$sum = 0;
		$count = 0;
 		foreach($dan as $v) {
   			$sum = $sum + $v;
   			$count = $count + 1;		
   			$avg = number_format(($sum / $count),1);}
   			return $avg;}

	function findmax($dan){
		$max = 0;
   		foreach($dan as $v) {
   			if($v > $max){
   			$max = $v;}
   			}
  		 	return $max; }
   	
   function findmin($dan){
  		$min = 9999999999;
   		foreach($dan as $v) {
   			if($v < $min){
   			$min = $v;}}
   			return $min;
   			 }
   	
   $avg = findavg($dan);
   $min = findmin($dan);
   $max = findmax($dan);

   	
   	
?>

</body>
<fieldset>
		<legend>Data Sorter Thingy</legend>
		<form method="post" action="">
							<label>Enter Data Title:<input type='text' name='title' value='<?php if (isset($_POST['title'])) echo $_POST['title']; ?>'></label><br>
							<label>Enter Data Separated <br>By Commas:<input type='text' name='data' value='<?php if (isset($_POST['data'])) echo $_POST['data']; ?>'></label>
							<br><br>
		
		<div id='mybutton'>	<input type='submit' name='go' value='Analyze'></div>
		</form>
</fieldset>



<fieldset>
	<legend> RESULTS</legend>

		<table>
			<tr><th><?php echo $_POST['title'] ?></th></tr>
			<?php
			sort($dan);
			foreach($dan as $value){
			echo '<tr><td>'.$value.'</td></tr>';}
			?>
		</table>		
<?php
echo "The average of ".$_POST['title']." is ".$avg.".<br>";
echo "The minimum of ".$_POST['title']." is ".$min.".<br>";
echo "The maximum of ".$_POST['title']." is ".$max.".";

?>
</fieldset>



</html>