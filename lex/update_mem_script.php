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
	
	$active = $_POST['isActive'];
	$scout_id = $_POST['scout_id'];
	$uid = $_POST['unitid'];
	$fname = $_POST['firstname'];
	$lname = $_POST['lastname'];
	$dob = $_POST['dob'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$school = $_POST['school'];
	$religion = $_POST['religion'];
	$ethnicity = $_POST['ethnicity'];
	$nationality = $_POST['nationality'];
	//$parentid = 0;
	$doctorsname = $_POST['doctorsname'];
	$doctorsnumber = $_POST['doctorsnumber'];
	//$contactid = 0;
	$allergies = $_POST['allergies'];


	//---------------------------
	$amountpaid = $_POST['amountpaid'];


	$con = mysql_connect(HOST, USER, PASS) or die(mysql_error());
	mysql_select_db(DB) or die("Database... ".mysql_error());

	mysql_query("UPDATE scout SET Unit_id='$uid', FirstName='$fname', SurName='$lname',
		DOB='$dob', Address='$address', Telephone='$phone', School='$school',
		Religion='$religion', Ethenic='$ethnicity', Nationality='$nationality',
		Child_Doc='$doctorsname', Doc_Phone='$doctorsnumber', allergies='$allergies', isActive='$active'

	WHERE Scout_id='$scout_id' ");

  	

  	echo "success"; //Tell Ajax
	mysql_close($con);

?>