<?php
function make_password($num_chars){
	if (is_numeric($num_chars) && $num_chars > 0 && ! is_null($num_chars)){
	$password = '';
	$accepted_chars = "abcdefghijklmnopqrstuvwxyz123456789";
	
	// seed the generator if necessary
	srand(((int)((double)microtime()*1000003)));
	
	for ($i=0; $i<=$num_chars; $i++) {
		$random_number = rand(0, (strlen($accepted_chars) -1));
		// The .= means take a string of characters
		$password .= $accepted_chars[$random_number];
	}	
		return $password;
	};
}


$five_char_long_password = make_password(5);

?>

<html>
<body>
	<p><? echo $five_char_long_password; ?>
	

</body>
</html>