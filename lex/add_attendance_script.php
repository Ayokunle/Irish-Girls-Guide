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
	$thedate = $_POST['thedate']; 
	$scout_id = $_POST['scout_id'];

	
	
			
	$con = mysql_connect(HOST, USER, PASS) or die(mysql_error());
	mysql_select_db(DB) or die("Database... ".mysql_error());

  	

 	

 	mysql_query("INSERT INTO attendence (Attendence_id, thedate)

 	VALUES ('', '$thedate')") or die(mysql_error());
	$temp = mysql_insert_id();

 	 	
 	mysql_query("INSERT INTO scoutattendence (Scout_id,Attendence_id)
 		VALUES('$scout_id', '$temp')");


 	echo "success";
	mysql_close($con);



?>