<?php session_start(); 
	if($_SESSION['level'] == 1 || $_SESSION['level'] == 2){}

	else{
		echo "Zero session error.<br><br>";
		?><h2>You must be loged in to access this page</h2>
		<a href="login.php"> -> Click here to login</a> <?php
		die();
	}
?>




<?php include('db_config_loader.php'); ?>


		<?php
			/* Connect to database so we can list all users */
			$con = mysql_connect(HOST, USER, PASS) or die(mysql_error());
			mysql_select_db(DB) or die("Database... ".mysql_error());
			$temp = mysql_query("SELECT * FROM scout");

		?>



		<?php

			$adultAge = 15;
			$filter = $_POST['filter'];
			$tempo = explode(" ", $filter);
			$found = "";
			$form_head = '<form id="attendance_form">';
			$form_tail = '</form>';
			$submit_btn = "<input type='submit' id='save_btn' onClick='submitAttendance()' value='Save' style='float:left; margin-left:0px; width:100%; height: 40px; margin-top:-9px;'>";

			if($tempo[0] == "Unit"){

				echo $form_head;

				while($member = mysql_fetch_assoc($temp))
	  			{	
	  			
					if($member['Unit_id'] == $tempo[1]){
						$found = "true";
						$i = $member['Scout_id'];
						echo "<div id='$i' class='verticalList'><p id='names'>".$member['FirstName']. " ".$member['SurName']."<span id='check_mark'> <input id='$i' name='cb' type='checkbox'> Present </span></p></div>";
					}
			 	}

			 	

			 	if($found != ""){
			 		echo $submit_btn;
			 		echo $form_tail;
			 	}



			 	if($found == ""){
			 			echo $form_tail;
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


				
			 	

			}


			else{

				/* Do some filtering based on selection */
				if($filter == "Children")
				{
					echo $form_head;
					while($member = mysql_fetch_assoc($temp))
		  			{	
		  				//get age from date or birthdate
						$then = date('Ymd', strtotime($member['DOB']));
						$diff = date('Ymd') - $then;
						$age = substr($diff, 0, -4);

						if($age < $adultAge){
							$i = $member['Scout_id'];
				  			
							if($_SESSION['level'] == 2){
								$found = "true";
								echo "<div id='$i' class='verticalList'><p id='names'>".$member['FirstName']. " ".$member['SurName']."<span id='check_mark'> <input id='$i' name='cb' type='checkbox'> Present </span></p></div>";
							}

							else{

								if($_SESSION['unitid'] == $member['Unit_id']){
									$found = "true";
									echo "<div id='$i' class='verticalList'><p id='names'>".$member['FirstName']. " ".$member['SurName']."<span id='check_mark'> <input id='$i' name='cb' type='checkbox'> Present </span></p></div>";
								}
							}

						}
				 	}

				 	

				 	if($found != ""){
				 		echo $submit_btn;
				 		echo $form_tail;
				 	}


				 	if($found == ""){
				 		echo $form_tail;
				 		echo "<section id='left'> 
							<div id='userStats' >

								<div class='pic'>
									<a href='#'><img src='images/user_avatar.jpg' width='80' height='80' /></a>
								</div>

								<div class='data'>
									<div>Ooops!</div>
									<p>Couldn't find any members below age $adultAge. <br>Try adding a new members.</p>
								</div>

							</div>
						</section>";
					}


				}


				elseif ($filter == "Adults") 
				{
					
					echo $form_head;
					while($member = mysql_fetch_assoc($temp))
		  			{	
		  				//get age from date or birthdate
						$then = date('Ymd', strtotime($member['DOB']));
						$diff = date('Ymd') - $then;
						$age = substr($diff, 0, -4);

						if($age >= $adultAge){
							$i = $member['Scout_id'];
				  			
					  		if($_SESSION['level'] == 2){
								$found = "true";
								echo "<div id='$i' class='verticalList'><p id='names'>".$member['FirstName']. " ".$member['SurName']."<span id='check_mark'> <input id='$i' name='cb' type='checkbox'> Present </span></p></div>";
							}

							else{

								if($_SESSION['unitid'] == $member['Unit_id']){
									$found = "true";
									echo "<div id='$i' class='verticalList'><p id='names'>".$member['FirstName']. " ".$member['SurName']."<span id='check_mark'> <input id='$i' name='cb' type='checkbox'> Present </span></p></div>";
								}
							}

						}

				 	}

				 

				 	if($found != ""){
				 		echo $submit_btn;
				 		echo $form_tail;
				 	}


				 	if($found == ""){
				 		echo $form_tail;
				 		echo "<section id='left'> 
							<div id='userStats' >

								<div class='pic'>
									<a href='#'><img src='images/user_avatar.jpg' width='80' height='80' /></a>
								</div>

								<div class='data'>
									<div>Ooops!</div>
									<p>Couldn't find any members above age $adultAge. <br>Try adding a new members.</p>
								</div>

							</div>
						</section>";
					}



				}

				else
				{
					echo $form_head;
					while($member = mysql_fetch_assoc($temp))
		  			{	
		  				
						//get age from date or birthdate
						$then = date('Ymd', strtotime($member['DOB']));
						$diff = date('Ymd') - $then;
						$age = substr($diff, 0, -4);
						$i = $member['Scout_id'];
			  			

						if($_SESSION['level'] == 2){
							$found = "true";
							echo "<div id='$i' class='verticalList'><p id='names'>".$member['FirstName']. " ".$member['SurName']."<span id='check_mark'> <input id='$i' name='cb' type='checkbox'> Present </span></p></div>";
						}

						else{

							if($_SESSION['unitid'] == $member['Unit_id']){
								$found = "true";
								echo "<div id='$i' class='verticalList'><p id='names'>".$member['FirstName']. " ".$member['SurName']."<span id='check_mark'> <input id='$i' name='cb' type='checkbox'> Present </span></p></div>";
							}
						}



				 	}


				 	
				 	if($found != ""){
				 		echo $submit_btn;
				 		echo $form_tail;
				 	}


				 	if($found == ""){
				 		?>
				 			<script>
				 				$('#week_title').hide();
				 				$('#attendance_week').hide();

				 			</script>

				 		<?php
				 		echo $form_tail;
				 		echo "<section id='left'> 
							<div id='userStats' >

								<div class='pic'>
									<a href='#'><img src='images/user_avatar.jpg' width='80' height='80' /></a>
								</div>

								<div class='data'>
									<div>Ooops!</div>
									<p>Couldn't find any members in the database. <br>Try adding a new members.</p>
								</div>

							</div>
						</section>";
					}



				}




			}


		?>




	<script>


    $('#attendance_form').submit(function(e){

        e.preventDefault();
        var once = 0;
        var nonchecked = true;

        $('#attendance_mark_preloader').show();

        var mem_len = $("#attendance_form").children("div").length;

        $("[name='cb']").each(function() {
        	var thecb = $(this);
			if($(this).is(':checked')){
			  	nonchecked = false;
			  	$('#save_btn').hide();
			  	$.post('add_attendance_script.php', {
	            scout_id: $(this).attr('id'),
	            thedate: $('#attendance_date').val()
		        }, function(d){
		            // Here we handle the response from the script
		            // We are just going to alert the result for now
		            var d = d.replace(/^\s*/,'').replace(/\s*$/,'').toLowerCase();
		           
		           /* if(d==="success"){
		            	//uncheck all checkboxes
		            	thecb.prop('checked', false);
		            }*/

		            if(d === "success" && once <= 0){
		            	alert("Success! Attendance marked.");
		            	once++;
		            }
		        });
			}

		});

		if(nonchecked){
			 $('#attendance_mark_preloader').hide();
			alert("No members have been selected for marking");
		}

		else{
			 $('#attendance_mark_preloader').hide();
			$('#save_btn').show();
		}

    });



</script>
