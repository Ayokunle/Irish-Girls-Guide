<?php session_start(); 

	if($_SESSION['level'] == 1 || $_SESSION['level'] == 2){

	}

	else{

		echo "Zero session error.<br><br>";
		
		?>
			<h2>You must be loged in to access this page</h2>
			<a href="login.php"> -> Click here to login</a>
		<?php

		die();
	}

?>

<?php
	/* Don't be doing any echoes in here. If you do,
	Ajax will assume mysql_error, hence alerting 
	user that the form was not submitted. */
	include('db_config_loader.php');
	
?>



<?php

	$leaderID = $_POST['leader_id'];
	$unit = $_POST['unit'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$phone  = $_POST['phone'];
	$username  = $_POST['username'];
	$password  = $_POST['password'];


	$con = mysql_connect(HOST, USER, PASS) or die(mysql_error());
	mysql_select_db(DB) or die("Database... ".mysql_error());

	if($password != ""){

		mysql_query("UPDATE leader SET Leader_id='$leaderID', Unit_id='$unit',
		FirstName='$firstname', Surname='$lastname', Tel='$phone', 
		User_name='$username', Password='$password'
		
					WHERE Leader_id='$leaderID' ");
	}

	else{
		mysql_query("UPDATE leader SET Leader_id='$leaderID', Unit_id='$unit',
		FirstName='$firstname', Surname='$lastname', Tel='$phone', 
		User_name='$username'
		
					WHERE Leader_id='$leaderID' ");
	}


	echo "success";
?>