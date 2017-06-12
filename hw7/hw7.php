<?php
$president = array(
	"George Washington"=>"John Adams",
	"John Adams"=>"Thomas Jefferson",
	"Thomas Jefferson"=>"James Madison",
	"James Madison"=>"James Monroe",
	"James Monroe"=>"John Quincy Adams",
	"John Quincy Adams"=>"Andrew Jackson",
	"Andrew Jackson"=>"Martin Van Buren",
	"Martin Van Buren"=>"William Henry Harrison",
	"William Henry Harrison"=>"John Tyler",
	"John Tyler"=>"James K. Polk",
	"James K. Polk"=>"Zachary Taylor",
	"Zachary Taylor"=>"Millard Fillmore",
	"Millard Fillmore"=>"Franklin Pierce",
	"Franklin Pierce"=>"James Buchanan",
	"James Buchanan"=>"Abraham Lincoln",
	"Abraham Lincoln"=>"Andrew Johnson",
	"Andrew Johnson"=>"Ulysses S. Grant",
	"Ulysses S. Grant"=>"Rutherford B. Hayes",
	"Rutherford B. Hayes"=>"James Garfield",
	"James Garfield"=>"Chester A. Arthur",
	"Chester A. Arthur"=>"Grover Cleveland",
	"Grover Cleveland"=>"Benjamin Harrison",
	"Benjamin Harrison"=>"Grover Cleveland",
	"Grover Cleveland"=>"William McKinley",
	"William McKinley"=>"Theodore Roosevelt",
	"Theodore Roosevelt"=>"William Howard Taft",
	"William Howard Taft"=>"Woodrow Wilson",
	"Woodrow Wilson"=>"Warren G. Harding",
	"Warren G. Harding"=>"Calvin Coolidge",
	"Calvin Coolidge"=>"Herbert Hoover",
	"Herbert Hoover"=>"Franklin D. Roosevelt",
	"Franklin D. Roosevelt"=>"Harry S. Truman",
	"Harry S. Truman"=>"Dwight D. Eisenhower",
	"Dwight D. Eisenhower"=>"John F. Kennedy",
	"John F. Kennedy"=>"Lyndon B. Johnson",
	"Lyndon B. Johnson"=>"Richard M. Nixon",
	"Richard M. Nixon"=>"Gerald R. Ford",
	"Gerald R. Ford"=>"James Carter",
	"James Carter"=>"Ronald Reagan",
	"Ronald Reagan"=>"George H. W. Bush",
	"George H. W. Bush"=>"William J. Clinton",
	"William J. Clinton"=>"George W. Bush",
	"George W. Bush"=>"Barack Obama",
	"Barack Obama"=>"George Washington");
?>
<!DOCTYPE html>
<head>
  <title>President Flashcards</title>
  <style type="text/css">
	body{ font-family: Verdana, sans-serif; }
	fieldset {  
		height: 200px; 
		width: 390px;
		background-image: url(whitehouse.jpg); 
		background-repeat: no-repeat;
		background-size:390px 200px;
	}
	legend {
		background-color: gold; 
		width: 300px;
		font-size: 18px;
	}
	select {
		background-color: gold; 
		font-size: 18px;
		height: 40px;
	}
	input.mybutton {
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
<!--<pre>
<?php/* print_r($_GET); */?>
</pre>-->
<fieldset>
	
		
<?php
	if (isset($_GET['answerpres'])) {
		handleForm($president);

	} else {
		$qpres = "George Washington";
		$legend="Who comes after $qpres?";
		displayForm($president, $legend, $qpres, 0, 0);
	}
?>



</form>
</fieldset>
</body>
</html>



<?php
/* handleForm - this function handles a submitted form.  It determines if the user
 * selected the correct president.
 * Argument - the array of president/next presidents
 * Called by - main
 * Calls - displayForm
 * If the correct president is selected, 
 *			increment total and correct, 
 *			create the legend with the "correct" message
 *			call displayForm
 * If the incorrect president is selected
 * 			increment total only
 *			create the legend with the "incorrect" message
 *			call displayForm
 */
function handleForm($president){
	$total = $_GET['total'];
	$correct = $_GET['correct'];
	$qpres = $_GET['qpres'];
	
	if ($_GET['answerpres'] == $president[$qpres]){
		
		$correct++;
		$total++;
		
		$qpres = $president[$qpres];
		
		$legend = 'That is correct! Who is the president after '.$qpres.'?';
		
		displayForm($president, $legend, $qpres, $correct, $total);
		
		
	}else{
		$total++;
		$legend = 'Sorry that wasn\'t right, who is the president after '.$qpres.'?';
		displayForm($president, $legend, $qpres, $correct, $total);
	}

}?>
<?php
/*
 * displayForm - displays the input form
 * Called by - handleForm
 * Calls -  makepresidentmenu
 * Arguments - the array of president/next presidents
 *			 - the legend for the form's fieldset
 *			 - the president the user will be asked about
 *			 - the number of correct answers the user has given
 *			 - the total number of answers the user has given.
 */
function displayForm($president, $legend, $qpres, $correct, $total){
	
	echo '<legend>'.$legend.'</legend>';
	echo '<form method="GET" action="">';
	makepresidentmenu($president, 'Presidents', $qpres);
	echo '<input class="mybutton" type="submit" value="Submit">';  
	echo '<div class="status">You have '.$correct.' of '.$total.' correct.</div>';
	echo '<input type="hidden" name="correct" value="'.$correct.'">';
	echo '<input type="hidden" name="total" value="'.$total.'">';
	echo '<input type="hidden" name="qpres" value="'.$qpres.'">';
	echo '</form>';
 } ?>
<?php
/*
 * makepresidentmenu - make a selection menu with all the presidents.  
 * Called by - displayForm
 * Calls - ksort
 * Arguments - the array of president/next presidents
 *			 - the menu name
 *			 - the current selection, defaults to NONE
 * Note that the displayed name and the value are the keys of the array.
 */
 function makepresidentmenu($president, $menuname, $currentpres = "")
{
	ksort($president);

	echo '<select name="answerpres">';	
	echo '<option value="" selected ></option>';
		foreach($president as $answerpres){
        	echo "<option>".$answerpres."</option>";}
	echo '</select>';

}
?>