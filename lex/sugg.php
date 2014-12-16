<?php session_start(); 

	if($_SESSION['level'] == 1 || $_SESSION['level'] == 2){

	}

	else{
		echo "Zero session error.<br><br>";
		?><h2>You must be loged in to access this page</h2>
		<a href="login.php"> -> Click here to login</a> <?php
		die();
	}
?>

	<div id="title_container">
		<p id="title">SUGGESTIONS</p>
	</div>

	<?php
		
		include('db_config_loader.php');
		$con = mysql_connect(HOST, USER, PASS) or die(mysql_error());
		mysql_select_db(DB) or die("Database... ".mysql_error());
		$row = mysql_query("SELECT * FROM activities ORDER BY RAND() LIMIT 10");

		while($act = mysql_fetch_assoc($row)){
			$activity = $act['Activity_Description'];

			?>
				<div class="sugg_list">
						<?php $randomsize = mt_rand(15, 30);
							echo '<p id="names" style="font-size:'.$randomsize.'px; color:#6D6D6D;">'.$activity.'</p>';
						?>	
				</div>
			<?php
		}

	?>

<script>$('#loading').hide();</script>








