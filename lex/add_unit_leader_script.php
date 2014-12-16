<?php session_start(); 

	if($_SESSION['level'] == 2){

	}

	else{

		echo "Zero session error.<br><br>";
		
		?>
			<h2>You must be loged in as admin to access this page</h2>
			<a href="login.php"> -> Click here to login</a><br><br><br><br>
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
	$con = mysql_connect(HOST, USER, PASS) or die(mysql_error());
	mysql_select_db(DB) or die("Database... ".mysql_error());

	$uid = $_POST['unitid'];
	$fname = $_POST['firstname'];
	$lname = $_POST['lastname'];
	$phone = $_POST['phone'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	//$password = sha1($password);
	

	$result = mysql_query("SELECT * FROM unit");

	while($temp = mysql_fetch_assoc($result)){
		if($temp['Unit_id'] == $uid){
			//die("boo!");

			$lookup = mysql_query("SELECT * FROM leader");
			while($temp2 = mysql_fetch_assoc($lookup)){
				if($temp2['Unit_id'] == $uid){
					die("".$temp2['FirstName']." ".$temp2['SurName']." is already assigned to unit $uid");
				}
			}

			die("Unit ".$uid." already has a leader");
		}
	}


	$unitid = "";
	if($uid != ""){
		mysql_query("INSERT INTO unit (Unit_id)
			VALUES ('$uid')") or die(mysql_error());
		
		$unitid = mysql_insert_id();
	}


	
	mysql_query("INSERT INTO leader (Leader_id, Unit_id, 
 									FirstName, SurName, 
 									Tel, User_name, Password)

 	VALUES ('', '$unitid','$_POST[firstname]','$_POST[lastname]' ,'$_POST[phone]', '$username', '$password')") or die(mysql_error());	  	

	echo "success";

?>