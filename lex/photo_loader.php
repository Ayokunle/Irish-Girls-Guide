<?php include('db_config_loader.php'); ?>

<?php

	$member_id = $_POST['mem_id']; //member id


	//Connect to the database using the member_id and insert the photo in the echo. 

	$con = mysql_connect(HOST, USER, PASS) or die(mysql_error());
	mysql_select_db(DB) or die("Database... ".mysql_error());

	$result = mysql_query("SELECT Pic_Link FROM scout  WHERE Scout_id =$member_id");

	$row = mysql_fetch_assoc($result);
	$result=$row['Pic_Link'];

	if (empty($result)){
		echo '<a href="#"><img src="images/user_avatar.jpg" width="80" height="80"/></a>';	
	}else{	
		$photo = "<a href'#'><img src='mem_images/$result' width='80' height='80'/></a> ";
		echo $photo;
}


?>
