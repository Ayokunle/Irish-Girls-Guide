<?php session_start(); 
	if($_SESSION['level'] == 1 || $_SESSION['level'] == 2){}

	else{
		echo "Zero session error.<br><br>";
		?><h2>You must be loged in to access this page</h2>
		<a href="login.php"> -> Click here to login</a> <?php
		die();
	}
?>



<?php

	include('db_config_loader.php');
	$con = mysql_connect(HOST, USER, PASS) or die(mysql_error());
	mysql_select_db(DB) or die("Database... ".mysql_error());

	$challenge = $_POST['challenge'];

	$row = mysql_query("SELECT * FROM challenges WHERE Challenge_Name = '$challenge'");
	$val = mysql_fetch_assoc($row);
	$challengeID = $val['Challenge_id'];

	$row = mysql_query("SELECT * FROM challengeactivity WHERE Challenge_id = '$challengeID'");

	$stack = array();

	while($activity = mysql_fetch_assoc($row)){
		array_push($stack, $activity['Activity_id']);
	}

	$length = count($stack);
	for ($i = 0; $i < $length; $i++){
		$act_id = $stack[$i];
		$row = mysql_query("SELECT * FROM activities WHERE Activity_id = '$act_id'");
		$act = mysql_fetch_assoc($row);
		$activity = $act['Activity_Description'];
		echo '<option value='.$activity.'>'.$activity.'</option>';
	}

?>