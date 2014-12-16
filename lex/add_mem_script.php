<?php session_start(); 

	if($_SESSION['level'] == 1 || $_SESSION['level'] == 2){

	}

	else{

		echo "Zero session error.<br><br>";
		
		?>
			<h2>You must be loged in to access this page</h2>
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

	//$scout_id = 0;
	$active = $_POST['isActive'];
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
	$uploads_dir = '/mem_images';



	$con = mysql_connect(HOST, USER, PASS) or die(mysql_error());
	mysql_select_db(DB) or die("Database... ".mysql_error());

	mysql_query("INSERT INTO scout (Unit_id, FirstName, SurName, 
		DOB, Address, Telephone, School, 
		Religion, Ethenic, Nationality, 
		Parents_id, Child_Doc, Doc_Phone, 
		Contact_id, allergies, isActive)


	VALUES ('$uid', '$fname', '$lname', '$dob', 
		'$address', '$phone', '$school', '$religion', 
		'$ethnicity', '$nationality', 0, '$doctorsname', 
		'$doctorsnumber', '', '$allergies', '$active' )") or die(mysql_error()) ;

	
		
  	echo "success"; //Tell Ajax
  	mysql_close($con);
  
 ?>