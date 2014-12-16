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
	
	$found = "";
	include('db_config_loader.php');
	$con = mysql_connect(HOST, USER, PASS) or die(mysql_error());
	mysql_select_db(DB) or die("Database... ".mysql_error());

	$challenge = "Guiding";

	$row = null;

	if($_SESSION['level'] == 2){
		$row = mysql_query("SELECT * FROM savedActivities");
	}

	else{
		$unit_id = $_SESSION['unitid'];
		$row = mysql_query("SELECT * FROM savedActivities WHERE unit_id=$unit_id");
	}

	

	while ($activity = mysql_fetch_assoc($row)) {
		$found = "true";

		if($_SESSION['level'] == 2){

			?>
				<div id="prod_desc1" class="verticalList">
					<p id="names" style="color:#009ECF;"><?php echo $activity['thedate']." -> ".$activity['challenge']." -> (UNIT ".$activity['unit_id'].")"; ?>
						<span id="check_mark" style="color:#6B6B6B;">
							<input id="delete" name="cb" type="checkbox" onclick="readyToDel()"/> 
						Mark as done 
						</span>

						<p class="activeText" style="margin-left:20px;"><?php echo $activity['activity']; ?></p>
					</p>
				</div>

			<?php
		}

		else{
			?>
				<div id="prod_desc1" class="verticalList">
					<p id="names" style="color:#009ECF;"><?php echo $activity['thedate']." -> ".$activity['challenge']; ?>
						<span id="check_mark" style="color:#6B6B6B;">
							<input id="delete" name="cb" type="checkbox" onclick="readyToDel()"/> 
						Mark as done 
						</span>

						<p class="activeText" style="margin-left:20px;"><?php echo $activity['activity']; ?></p>
					</p>
				</div>

			<?php
		}

	}

	if($found == ""){
		echo '<div id="prod_desc1" class="verticalList"><p id="names" style="color:#009ECF; font-size">You have no saved activities.<br>Try saving some.</p><br></div>';
	}


	

?>