<?php session_start();


include('db_config_loader.php'); ?>


		<?php
			/* Connect to database so we can list all users */
			$con = mysql_connect(HOST, USER, PASS) or die(mysql_error());
			mysql_select_db(DB) or die("Database... ".mysql_error());
			$temp = mysql_query("SELECT * FROM scout");

			$isLeader = "false";

			$userLevel = $_SESSION['level'];
			$leaderUnit = $_SESSION['unitid'];

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
	  				
	  				//get age from date or birthdate
					$then = date('Ymd', strtotime($member['DOB']));
					$diff = date('Ymd') - $then;
					$age = substr($diff, 0, -4);

	  				if($member['Unit_id'] == $tempo[1]){
						
						$i = $member['Scout_id'];
						
						if($userLevel == 2){//admin
							$found = "true";
			  				echo "<div id='$i' class='verticalList'><p id='names'>".$member['FirstName']. " ".$member['SurName']."<span id='age_label'>Age ".$age."</span></p></div>";
			  			}
			  			else{
			  				if($leaderUnit == $member['Unit_id']){
			  					$found = "true";
			  					echo "<div id='$i' class='verticalList'><p id='names'>".$member['FirstName']. " ".$member['SurName']."<span id='age_label'>Age ".$age."</span></p></div>";

			  				}
			  			} 


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
									<p>No members have been assigned to $filter. <br>Try a different unit or add a new member to $filter.</p>
								</div>

							</div>
						</section>";
				}


			}//end if



			else{

				/* Do some filtering based on selection */
				if($filter == "Children")
				{
					while($member = mysql_fetch_assoc($temp))
		  			{	
		  				//get age from date or birthdate
						$then = date('Ymd', strtotime($member['DOB']));
						$diff = date('Ymd') - $then;
						$age = substr($diff, 0, -4);

						if($age < $adultAge){
							
							$i = $member['Scout_id'];
				  			
							if($userLevel == 2){//admin
								$found = "true";
			  				echo "<div id='$i' class='verticalList'><p id='names'>".$member['FirstName']. " ".$member['SurName']."<span id='age_label'>Age ".$age."</span></p></div>";
				  			}
				  			else{
				  				if($leaderUnit == $member['Unit_id']){
				  					$found = "true";
				  					echo "<div id='$i' class='verticalList'><p id='names'>".$member['FirstName']. " ".$member['SurName']."<span id='age_label'>Age ".$age."</span></p></div>";

				  				}
				  			} 

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
									<p>Couldn't find any members below age $adultAge. <br>Try adding new members.</p>
								</div>

							</div>
						</section>";
					}

				}


				elseif ($filter == "Adults") 
				{
					while($member = mysql_fetch_assoc($temp))
		  			{	
		  				//get age from date or birthdate
						$then = date('Ymd', strtotime($member['DOB']));
						$diff = date('Ymd') - $then;
						$age = substr($diff, 0, -4);

						if($age >= $adultAge){
							
							$i = $member['Scout_id'];
				  			
							if($userLevel == 2){//admin
								$found = "true";
			  					echo "<div id='$i' class='verticalList'><p id='names'>".$member['FirstName']. " ".$member['SurName']."<span id='age_label'>Age ".$age."</span></p></div>";
				  			}
				  			else{
				  				if($leaderUnit == $member['Unit_id']){
				  					$found = "true";
				  					echo "<div id='$i' class='verticalList'><p id='names'>".$member['FirstName']. " ".$member['SurName']."<span id='age_label'>Age ".$age."</span></p></div>";

				  				}
				  			} 


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
									<p>Couldn't find any members above age $adultAge. <br>Try adding new members.</p>
								</div>

							</div>
						</section>";
					}

				}


				elseif (($filter == "Show all"))
				{
					while($member = mysql_fetch_assoc($temp))
		  			{	
		  				
						//get age from date or birthdate
						$then = date('Ymd', strtotime($member['DOB']));
						$diff = date('Ymd') - $then;
						$age = substr($diff, 0, -4);
						$i = $member['Scout_id'];

						if($userLevel == 2){//admin
							$found = "true";
			  				echo "<div id='$i' class='verticalList'><p id='names'>".$member['FirstName']. " ".$member['SurName']."<span id='age_label'>Age ".$age."</span></p></div>";
			  			}
			  			else{
			  				if($leaderUnit == $member['Unit_id']){
			  					$found = "true";
			  					echo "<div id='$i' class='verticalList'><p id='names'>".$member['FirstName']. " ".$member['SurName']."<span id='age_label'>Age ".$age."</span></p></div>";

			  				}
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
									<p>No members have been added to this unit. <br>Try adding new members.</p>
								</div>

							</div>
						</section>";
					}




				}



				
				//must be looking for leaders only
				elseif ($filter == "leaders_unit") {
					$leadertable = mysql_query("SELECT * FROM leader");
					while($leader = mysql_fetch_assoc($leadertable)){
						$isLeader = "true";
						$found = "true";
						$i = $leader['Leader_id'];
						echo "<div id='$i' class='verticalList'><p id='names'>".$leader['FirstName']. " ".$leader['SurName']."<span id='age_label'>Unit ".$leader['Unit_id']."</span></p></div>";
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
									<p>No leaders have been added. <br>Try adding new leaders.</p>
								</div>

							</div>
						</section>";
					}


				}




				else{//must be a search. 


					$thename = explode(" ", $filter);

					if(count($thename) == 1){
						while($member = mysql_fetch_assoc($temp))
			  			{	
				  			//get age from date or birthdate
							$then = date('Ymd', strtotime($member['DOB']));
							$diff = date('Ymd') - $then;
							$age = substr($diff, 0, -4);
				  			if(strtoupper($member['FirstName']) == strtoupper($thename[0]) || strtoupper($member['SurName']) == strtoupper($thename[0])){
								$i = $member['Scout_id'];
								
					  			
								if($userLevel == 2){//admin
									$found = "true";
					  				echo "<div id='$i' class='verticalList'><p id='names'>".$member['FirstName']. " ".$member['SurName']."<span id='age_label'>Age ".$age."</span></p></div>";
					  			}
					  			else{
					  				if($leaderUnit == $member['Unit_id']){
					  					$found = "true";
					  					echo "<div id='$i' class='verticalList'><p id='names'>".$member['FirstName']. " ".$member['SurName']."<span id='age_label'>Age ".$age."</span></p></div>";

					  				}
					  			} 


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
										<p>Couldn't find member with the name ". $thename[0].". He/She might be in a different unit, or have not been added to the databse.</p>
									</div>

								</div>
							</section>";
						}


					}

					else if(count($thename) == 2){
						while($member = mysql_fetch_assoc($temp))
				  		{	
				  			//get age from date or birthdate
							$then = date('Ymd', strtotime($member['DOB']));
							$diff = date('Ymd') - $then;
							$age = substr($diff, 0, -4);
				  			if(strtoupper($member['FirstName']) == strtoupper($thename[0]) && strtoupper($member['SurName']) == strtoupper($thename[1])){
								$i = $member['Scout_id'];
								
					  			

					  			if($userLevel == 2){//admin
					  				$found = "true";
					  				echo "<div id='$i' class='verticalList'><p id='names'>".$member['FirstName']. " ".$member['SurName']."<span id='age_label'>Age ".$age."</span></p></div>";
					  			}
					  			else{
					  				if($leaderUnit == $member['Unit_id']){
					  					$found = "true";
					  					echo "<div id='$i' class='verticalList'><p id='names'>".$member['FirstName']. " ".$member['SurName']."<span id='age_label'>Age ".$age."</span></p></div>";

					  				}
					  			} 



							}
				  		}//end wh


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
										<p>Couldn't find a ".$thename[0]." ".$thename[1].". He/She might be in a different unit, or have not been added to the databse.</p>
									</div>

								</div>
							</section>";
						}


					}

				}//end else



			}//end else


		?>



	<script>
		/* Move names list to the right and load member profile page */
		$(".verticalList").click(function(){

			var isLeader = "<?php echo $isLeader; ?>"; 

			var memContainer = document.getElementById("members-container");
			if(memContainer.style.width == "28%"){
				//
				//
				var curr_mem = $(this).attr('id');

				if(isLeader === "true"){

					//alert(isLeader+" SUPPOSED TO BE TRUE");

					var poster = $.post('profile_loader_leader.php', {mem_id: curr_mem});
					var posterpic = $.post('photo_loader_leader.php', {mem_id: curr_mem});

					$('#profile').hide();
					$('#paymentBtn').hide();
					$('#title_container').hide();
					$("#loading").show();
					poster.done(function (response, textStatus, jqXHR){
						$("#loading").hide();
						$('#title_container').show();
						$(".data").html(response);
						$('#profile').fadeIn('slow', function() {
					
	   					});
		   			});

		   			posterpic.done(function (response, textStatus, jqXHR){
						$(".pic").html(response);
		   			});

				}

				else{

					//alert(isLeader+" SUPPOSED TO BE FALSE");
					var poster = $.post('profile_loader.php', {mem_id: curr_mem});
					var posterpic = $.post('photo_loader.php', {mem_id: curr_mem});

					$('#profile').hide();
					$('#title_container').hide();
					$("#loading").show();
					poster.done(function (response, textStatus, jqXHR){
						$('#title_container').show();
						$("#loading").hide();
						$(".data").html(response);
						$('#profile').fadeIn('slow', function() {
					
	   					});
		   			});

		   			posterpic.done(function (response, textStatus, jqXHR){
						$(".pic").html(response);
		   			});
				}


				
			}//end if


			else{ 
				memContainer.style.width = "28%";
				$('#members-container').animate({marginLeft: "72%"}, 600);
				var curr_mem = $(this).attr('id');
				

				if(isLeader === "true"){

					var poster = $.post('profile_loader_leader.php', {mem_id: curr_mem});
					var posterpic = $.post('photo_loader_leader.php', {mem_id: curr_mem});

					$('#profile').hide();
					$('#paymentBtn').hide();
					$('#title_container').hide();
					$("#loading").show();
					poster.done(function (response, textStatus, jqXHR){
						$('#title_container').show();
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

					var poster = $.post('profile_loader.php', {mem_id: curr_mem});
					var posterpic = $.post('photo_loader.php', {mem_id: curr_mem});

					$('#profile').hide();
					$('#title_container').hide();
					$("#loading").show();
					poster.done(function (response, textStatus, jqXHR){
						$('#title_container').show();
						$("#loading").hide();
						$(".data").html(response);
						$('#profile').fadeIn('slow', function() {
					
	   					});
		   			});

		   			posterpic.done(function (response, textStatus, jqXHR){
						$(".pic").html(response);
		   			});
				}


			}
		});

	</script>
