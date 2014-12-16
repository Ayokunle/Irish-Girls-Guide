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

	$scoutId = $_POST['scout_id_payment'];
	$paymentDate = $_POST['paydate'];
	$amount = $_POST['amount'];


	mysql_connect(HOST, USER, PASS) or die(mysql_error());
	mysql_select_db(DB) or die("Database... ".mysql_error());



	$query ="INSERT INTO payements (Payment_id,Amount,Date) VALUES ('','$amount','$paymentDate')";
	$result = mysql_query($query);

	$insertId = mysql_insert_id();

	$query1 ="INSERT INTO scoutpayments (scout_id,payement_id) VALUES ('$scoutId','$insertId')";
	$result1 = mysql_query($query1);

	echo "success";

?>