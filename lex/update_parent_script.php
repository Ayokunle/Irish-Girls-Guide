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

	$con = mysql_connect(HOST, USER, PASS) or die(mysql_error());
	mysql_select_db(DB) or die("Database... ".mysql_error());

	mysql_query("UPDATE parent SET Parent1_Name='$_POST[parentname1]', Email1='$_POST[email1]',
		Parent2_Name='$_POST[parentname2]', Email2='$_POST[email2]', Address='$_POST[parentaddress]', 
		Tel_Work='$_POST[workphone]', Tel_Home='$_POST[homephone]'
		

	WHERE Scout_id='$_POST[scout_id_p]' ");

  	

  	echo "success"; //Tell Ajax
	mysql_close($con);

?>