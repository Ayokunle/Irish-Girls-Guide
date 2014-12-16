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



<?php include('db_config_loader.php'); ?>


		<?php
			/* Connect to database so we can list all users */
			$con = mysql_connect(HOST, USER, PASS) or die(mysql_error());
			mysql_select_db(DB) or die("Database... ".mysql_error());
			$temp = mysql_query("SELECT * FROM leader");
		?>



		<?php

			$adultAge = 18;
			$filter = $_POST['filter'];
			$tempo = explode(" ", $filter);
			$found = "";

			/* Do some filtering based on selection */
			if($tempo[0] == "Unit"){

				while($member = mysql_fetch_assoc($temp))
	  			{	
	  				if($member['Unit_id'] == $tempo[1]){
						$found = "true";
						$i = $member['Leader_id'];
						echo "<div id='$i' class='verticalList'><p id='names'>".$member['FirstName']. " ".$member['SurName']."<span id='age_label'>".$member['Unit_id']. "</span></p></div>";
					}

	  			}

	  			if($found == ""){

	  					echo '<script type="text/javascript">';
						echo "$('#members-container').animate({marginLeft: '0%'}, 0);";
						echo 'document.getElementById("members-container").style.width = "100%";';
						echo '</script>';

				 		echo "<section id='left'> 
							<div id='userStats' >

								<div class='pic'>
									<a href='#'><img src='images/user_avatar.jpg' width='80' height='80' /></a>
								</div>

								<div class='data'>
									<div>Ooops!</div>
									<p>No leaders have been assigned to $filter. <br>Try a different unit or add a new leader to $filter.</p>
								</div>

							</div>
						</section>";
				}


			}//end if



			else{

				while($member = mysql_fetch_assoc($temp))
	  			{	
					$i = $member['Leader_id'];
		  			echo "<div id='$i' class='verticalList'><p id='names'>".$member['FirstName']. " ".$member['SurName']."<span id='age_label'>".$member['Unit_id']. "</span></p></div>";
			 	}

			}//end else


		?>



	<script>
		/* Move names list to the right and load member profile page */
		$(".verticalList").click(function(){


		
			var memContainer = document.getElementById("members-container");
			if(memContainer.style.width == "28%"){
				//
				//
				var curr_mem = $(this).attr('id');
				var poster = $.post('profile_loader.php', {mem_id: curr_mem});
				var posterpic = $.post('photo_loader.php', {mem_id: curr_mem});

				
				$('#profile').hide();
			

				$("#loading").show();
				poster.done(function (response, textStatus, jqXHR){
					$("#loading").hide();
					$(".data").html(response);

					$('#profile').fadeIn('slow', function() {
				
   					});
	   			});

	   			posterpic.done(function (response, textStatus, jqXHR){
					$(".pic").html(response);
	   			});


			}


			else{ 
				memContainer.style.width = "28%";
				$('#members-container').animate({marginLeft: "72%"}, 600);
				var curr_mem = $(this).attr('id');
				var poster = $.post('profile_loader.php', {mem_id: curr_mem});
					poster.done(function (response, textStatus, jqXHR){
						$(".data").html(response);
			   	});

				var posterpic = $.post('photo_loader.php', {mem_id: curr_mem});
				posterpic.done(function (response, textStatus, jqXHR){
					$(".pic").html(response);
	   			});
			
			}

		});

	</script>
