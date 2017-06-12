<html>
	<link type='css/text' rel='stylesheet' href='club.css'>


</html>

<?

// Check that all fields are entered


if (empty($_POST) === false){
		$required_fields = array('name','email','password', 'passagain');
		foreach($_POST as $key=>$value){
			if(empty($value) && in_array($key, $required_fields) === true){
				echo "All fields are required. Try again! <a href='index.php'>Homepage</a>";
				break 1;
			}
		
		// Check if the passwords are equal

		if($_POST['password'] != $_POST['passagain']){
				echo "Passwords must be the same! <a href='index.php'>Homepage</a><br>";
				die();}		
				}
	

	// Email Validation
	$email = $_POST['email'];

	$dbc= connectToDB();	
	$query = "SELECT email from campusgamer where email = '$email'";
	$result = performQuery($dbc, $query);
	$row=mysqli_fetch_array($result, MYSQLI_ASSOC);
	
	$emailcheck = $row['email'];
	
	if ($emailcheck === $email){
	echo "Email already in database! <a href='index.php'>Homepage</a>";
	}else{ 
	
	// Insert into database	
	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$passwordencrypt = sha1($_POST['password']);
	
	$query = "INSERT INTO campusgamer(name, email, password, registrationdate) 
	VALUES ('$name', '$email', '$passwordencrypt', Now())";
	
	performQuery($dbc, $query);
	
	echo "<fieldset id='fieldsetthanks'><legend id='legendthanks'>Thanks for Joining!</legend>
			<form id='formthanks'>
				<h2>We can not wait to start gaming with you.<br> Thanks for the application </h2>
			</form>
			</fieldset>";
	
		}
	}
	
	


	// Connect to DB functions

function connectToDB(){
	$dbc= @mysqli_connect("cslab.bc.edu", "donohudb", "4CWh6WaezSAAt8Ax", "donohudb") or
					die("Connect failed: ". mysqli_connect_error());
	return ($dbc);}
	
function disconnectFromDB($dbc, $result){
	mysqli_free_result($result);
	mysqli_close($dbc);}

	function performQuery($dbc, $query){

	//echo "My query is >$query< <br />";
	$result = mysqli_query($dbc, $query) or die("bad query".mysqli_error($dbc));
	return ($result);
	echo $result;}
	



?>