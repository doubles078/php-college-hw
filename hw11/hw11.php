<!DOCTYPE html>
<!-- Daniel Donohue *Note to self.. comment more on work so you know wtf is going on.-->
<head>
  <title>Periodic Table HW</title>
  <style type="text/css">
	body{ font-family: arial; 
		background-color: gray;}
	
	fieldset {  
		margin-left:100px;
		width:80%;
		min-width:850px;
		margin-top:50px;
		background-color: gold;

	}
	
	
	legend {
		background-color: maroon;
		color:white; 
		font-size: 20px;
		width:180px;
		text-align:center;
	}
		
	.button{
	  	height:45px;
	  	font-size: 20px;
	  	color:white;
	  	float:right;
	  	background-color:maroon;
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
    	$xml = simplexml_load_file('http://cslab.bc.edu/~cs254/data/periodic.xml');
    
      	if (isset($_GET['atom'])) {
		handleForm($xml, $atom);
	} else {
		displayForm($atom);
	}
	
	function handleForm($xml, $atom) {
	 
     $atom = $_GET['atom'];

      
    $bp1040 = $xml->xpath('//ATOM[BOILING_POINT>"5000" and BOILING_POINT<"5200"]');
	$gas = $xml->xpath('//ATOM[@STATE="GAS"]');
	$boilpoint = $xml->xpath('//ATOM');
	$highbp = 0;
	
	foreach($boilpoint as $boilp){
		$superbp = intval($boilp->BOILING_POINT);
		if($superbp > $highbp)
			{
			$highbp = $superbp;
			$highbpatom = $boilp->NAME;}
			};
			
      
			echo "<fieldset>
	    		<div style='float:left;'>
					<legend><b>My Report</b></legend>
		    		<table>
			      		<tr><td>These elements are gasses at 300K: <span style='font-weight:bold;'>";
				foreach($gas as $gas)
					echo $gas->NAME.' ';
			echo "</span></td></tr>
			      	<tr><td>These elements have boiling points between 5000K and 5200K: <span style='font-weight:bold;'>";
			  	foreach($bp1040 as $bp)
					echo $bp->NAME.' ';	
			echo "</span></td></tr>
				<tr><td>The element with the highest boiling point <span style='font-weight:bold;'>($highbp)</span> is: <span style='font-weight:bold;'>$highbpatom</span></td></tr>
      				</table>
						</div> 	
						  </fieldset>";
      
     
     	
		$electrons = $xml->xpath("//ATOM[NAME='$atom']/ATOMIC_NUMBER");
		$protons = $electrons[0];
		$symbol = $xml->xpath("//ATOM[NAME='$atom']/SYMBOL");
		$atomicWeight = $xml->xpath("//ATOM[NAME='$atom']/ATOMIC_WEIGHT");
		$neutrons = $atomicWeight[0]-$protons;
     
     echo "<fieldset>
        <div style='float:left;'>
	      		<legend><b>Result</b></legend>
		      		<table>
			      		<tr><td><span style='font-weight:bold;'>$symbol[0]</span> 
			      		has: <span style='font-weight:bold;'>$electrons[0]</span> electrons, <span style='font-weight:bold;'>$protons</span> protons, 
			      		and <span style='font-weight:bold;'>$neutrons</span> neutrons. </td></tr>
		      		</table>
		      	</div> 	
      		</fieldset>";
      		
    
      		
      		
      displayform($xml, $atom);
}


function displayform($xml) { 

$xml = simplexml_load_file('http://cslab.bc.edu/~cs254/data/periodic.xml');


?>


<fieldset>
<legend><b>Look Up an Atom</b></legend>
	<form method="GET" action="" style="padding:10px;">
			<select name="atom" >
				 <?php foreach($xml->ATOM as $atom){
       				 	echo "<option>".$atom->NAME."</option>";}?>
			</select>
		
		<br />
		
		<input type = "submit" class='button' name = "formsubmitted" value = "How Many Protons, Electrons, and Neutrons?" />
	</form>
</fieldset>

<?php } ?>

</body>