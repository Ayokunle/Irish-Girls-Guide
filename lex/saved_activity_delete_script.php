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


	$activity = $_POST['activity'];


	mysql_query("DELETE FROM savedActivities WHERE activity='$activity'");
	
	
	//echo "Will delete ".$activity;


?>