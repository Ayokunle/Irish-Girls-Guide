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
			
	$con = mysql_connect(HOST, USER, PASS) or die(mysql_error());
	mysql_select_db(DB) or die("Database... ".mysql_error());

  	$temp = mysql_query("SELECT MAX(Scout_id) FROM scout");
		  	$scoutid = mysql_fetch_row($temp) or die(mysql_error());

 	mysql_query("INSERT INTO parent (Parent_id, Scout_id, 
 									Parent1_Name, Parent2_Name, 
 									Address, Tel_Work, Tel_Home, 
 									Email1, Email2)

 	VALUES ('', '$scoutid[0]','$_POST[parentname1]', 
 			'$_POST[parentname2]' ,'$_POST[parentaddress]',
 			'$_POST[workphone]','$_POST[homephone]',
 			'$_POST[email1]','$_POST[email2]')") or die(mysql_error());

  	echo "success"; //Tell Ajax
	mysql_close($con);

?>