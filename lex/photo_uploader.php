<?php include('db_config_loader.php'); ?>

<?php


		$con = mysql_connect(HOST, USER, PASS) or die(mysql_error());
			mysql_select_db(DB) or die("Database... ".mysql_error());

  		$temp = mysql_query("SELECT MAX(Scout_id) FROM scout");
		  	$scoutid = mysql_fetch_row($temp) or die(mysql_error());

		  	//echo $scoutid[0];

	

		$target_path = "mem_images/";
		$pic_name=$_FILES['photo']['name'];		//get file name
		$type=$_FILES['photo']['type'];		//get the type of the file
		$tmpname=$_FILES['photo']['tmp_name'];//temporary name of the file
		$ext=substr($pic_name,strpos($pic_name,'.'));//to get the extention of the file
		

		
		$temp=$scoutid[0].$ext;
		$new = $target_path.$temp;
	
		move_uploaded_file($tmpname,$new);	// move the uploaded file and rename it

		$result = mysql_query("UPDATE scout SET Pic_Link='$temp' WHERE Scout_id = '$scoutid[0]'");	

		
?>		
