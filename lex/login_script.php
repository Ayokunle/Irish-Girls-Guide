<?php
	session_start();
?>

<?php
	
	$_SESSION['LOGIN_ERROR'] = "false";
	
	include('db_config_loader.php');

	$con = mysql_connect(HOST, USER, PASS) or die(mysql_error());
	mysql_select_db(DB) or die("Database... ".mysql_error());

	$username = $_POST['username'];
	$password = $_POST['password'];
	//$password = sha1($password);
	$level = 1000;


	

	if($username == "admin"){
		if($password == ADMIN_PASS){
			$level=2;
			$_SESSION['level']=$level;
			echo'<script> window.location="index.php";</script>';
		}

		else{
			$_SESSION['LOGIN_ERROR'] = "true";
			echo'<script> window.location="login.php";</script>';
		}
	}


	else{

		$query ="SELECT * FROM leader WHERE User_name='$username' AND Password='$password'";
		$result= mysql_query($query);

		if(mysql_num_rows($result)==0){
			$_SESSION['LOGIN_ERROR'] = "true";
			echo'<script> window.location="login.php";</script>';
		}

		else{
			$leader = mysql_fetch_array($result);
			$_SESSION['level'] = 1;	
			$_SESSION['leader_id'] = $leader['Leader_id'];
			$_SESSION['unitid'] = $leader['Unit_id'];
			echo'<script> window.location="index.php";</script>';
		}

	}


		/* Note: Level column in the database is irrelevant. The levels are set here*/

?>