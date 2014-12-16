<?php session_start(); 

if($_SESSION['level'] == 1 || $_SESSION['level'] == 2){}

else{
	?> <h2>You must be loged in as admin</h2>
		<a href="login.php"> -> Click here to login</a>
	<?php
	die();
}

?>


<?php include('db_config_loader.php'); ?>

<?php


		$con = mysql_connect(HOST, USER, PASS) or die(mysql_error());
			mysql_select_db(DB) or die("Database... ".mysql_error());

  		$temp = mysql_query("SELECT MAX(Leader_id) FROM leader");
		  	$leaderid = mysql_fetch_row($temp) or die(mysql_error());

		  	//echo $leaderid[0];

	

		$target_path = "leader_images/";
		$pic_name=$_FILES['photo']['name'];		//get file name
		$type=$_FILES['photo']['type'];		//get the type of the file
		$tmpname=$_FILES['photo']['tmp_name'];//temporary name of the file
		$ext=substr($pic_name,strpos($pic_name,'.'));//to get the extention of the file
		

		
		$temp=$leaderid[0].$ext;
		$new = $target_path.$temp;
	
		move_uploaded_file($tmpname,$new);	// move the uploaded file and rename it

		mysql_query("UPDATE leader SET Pic_Link='$temp' WHERE Leader_id = '$leaderid[0]'");	

		
?>		
