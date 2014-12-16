<?php session_start(); 
	if($_SESSION['level'] == 1 || $_SESSION['level'] == 2){}

	else{
		echo "Zero session error.<br><br>";
		?><h2>You must be loged in to access this page</h2>
		<a href="login.php"> -> Click here to login</a> <?php
		die();
	}
?>


	
	<div id="title_container">
		<p id="title">WEEKLY ACTIVITIES</p>
	</div>



	<div class="module">

		

		<div>
			<br><h3>SHOW SAVED ACTIVITIES<input type="checkbox" value="Checkbox One" id="showSavedWeek" style="margin-left:15px;"></h3><br>
			<p id="testOnly"></p>

			<div id="saved_activity_preloader" style="display:none; border-top:0px solid #CDCDCC;">
				<img src="images/loading.gif" /> <p style="margin-left:30px; margin-top:-30px;">Loading saved activities...</p>
			</div>

		</div>
	

	</div>





	<div class="module">
		<h3 style="color:black;"> * ADD A NEW ACTIVITY OR SCROLL DOWN TO ADD FROM CURRENT ACTIVITIES *</h3>
		
		<form id="save_act_new">

			<div>
				<label for="date">What week is it for?:</label>
				<input type="date" name="thedate" id="thedate" value=""  />	
			</div>

			<div>
				<label for="textarea">Describe this new activity:</label>
				<textarea cols="30" rows="4" id="theactivity" name="theactivity"></textarea>
			</div>

			<div>
				<label for="input">What challenge does it fall under?</label>
				<select id="program_filter1" style="width:273px;" name="thechallenge">
					<option value="Guiding">Guiding</option>
					<option value="Outdoors">Outdoors</option>
					<option value="My World">My World</option>
					<option value="Health and Fitness">Health and Fitness</option>
					<option value="Life Skills">Life Skills</option>
					<option value="My Interests">My Interests</option>
					<option value="Generic">Generic</option>
				</select>
			</div>

			<?php

				if($_SESSION['level'] == 2){
					?>
						<div>
							<label for="input">Select Unit:</label>
							<select style="width:273px;" name="unit_id">
								<option value="1">Unit 1</option>
								<option value="2">Unit 2</option>
								<option value="3">Unit 3</option>
								<option value="4">Unit 4</option>
								<option value="5">Unit 5</option>
							</select>
						</div>

					<?php
				}

			?>

			<div id="save_new_preloader" style="display:none; border-top:0px solid #CDCDCC;">
				<img src="images/loading.gif" /> <p style="margin-left:30px; margin-top:-30px;">Saved activity...</p>
			</div>
			
			<div id="savebtn">
				<input type="submit" value="SAVE" style="margin-left:224px;">
			</div>



		</form>

	</div>

	

	 <script>


    $('#save_act_new').submit(function(e){

        e.preventDefault();

        var serializedData = $(this).serialize();

        //var $inputs = $form.find("input, select, button, textarea");

        // fire off the request to /form.php
		    var request = $.ajax({
		        url: "save_activity_script.php",
		        type: "post",
		        data: serializedData
		    });

		    $('#save_new_preloader').show();
	  	 // callback handler that will be called on success
		    request.done(function (response, textStatus, jqXHR){
		    	response = response.replace(/(\r\n|\n|\r)/gm,"");
		    	if(response === "success"){
		    		$('#save_new_preloader').hide();
		    		alert("Activity saved!\n\nYou can view saved activities by checking the SHOW SAVED ACTIVITIES box above.\n")
		    	}

		    	else{
		    		alert(response);
		    	}

		    });
	
    });

</script>




<script>
	/* Doing a simple pop-up each time user presses button. Needs real database values */
	$('#showSavedWeek').click(function(){
		if($(this).is(":checked")){

			$('#saved_activity_preloader').show();
			$.post("saved_activity_loader_script.php", function(data) {
				$('#saved_activity_preloader').hide();
			  $('#testOnly').html('<h3 style="color:red;">SHOWING SAVED ACTIVITIES</h3>'+data+'<h3></h3>');
			});

		}

		else{
			$('#testOnly').html('');
		}

		
	});
</script>

























	



	<div class="module">
		<h3 style="color:#0299EE;"> * ADD FROM CURREN ACTIVITIES *</h3>
		
		<form id="save_act_prev">

			<div>
				<label for="date">What week is it for?:</label>
				<input type="date" name="thedate" id="thedate" value=""  />	
			</div>

			<div>
				<label for="input">What challenge does it fall under?</label>
				<select id="program_filter2" style="width:273px;" name="thechallenge">
					<option value=""></option>
					<option value="Guiding">Guiding</option>
					<option value="Outdoors">Outdoors</option>
					<option value="My World">My World</option>
					<option value="Health and Fitness">Health and Fitness</option>
					<option value="Life Skills">Life Skills</option>
					<option value="My Interests">My Interests</option>
				</select>
			</div>


			<div id="loading_activity" style="display:none;">
				<img src="images/loading.gif" /> <p style="margin-left:30px; margin-top:-30px;">Loading activities...</p>
			</div>


			<div id="hidden_act" style="display:none;">
				<label for="input">Select from the list of activities</label>
				<select id="current_activities" style="width:273px; height: 100%;" name ="theactivity">
					<option value=""></option>
					
				</select>
			</div>


			<?php

				if($_SESSION['level'] == 2){
					?>
						<div>
							<label for="input">Select Unit:</label>
							<select style="width:273px;" name="unit_id">
								<option value="1">Unit 1</option>
								<option value="2">Unit 2</option>
								<option value="3">Unit 3</option>
								<option value="4">Unit 4</option>
								<option value="5">Unit 5</option>
							</select>
						</div>

					<?php
				}

			?>



			<div id="saving_activity" style="display:none;">
				<img src="images/loading.gif" /> <p style="margin-left:30px; margin-top:-30px;">Saving activity...</p>
			</div>



			<div id="savebtn">
				<input type="submit" value="SAVE" style="margin-left:224px;">
			</div>

		</form>

	</div>


	<script>

	$("#program_filter2").change(function(){ 

		//alert($("#agefilter option:selected").text());
		$('#loading_activity').show();
		var load = $("#program_filter2 option:selected").text();

		var poster = $.post('activity_loader_script.php', {challenge: load});
			poster.done(function (response, textStatus, jqXHR){
				//alert(response);
				$('#loading_activity').hide();
				$('#hidden_act').show();
				$("#current_activities").html(response);
	   	});


	});

</script>



 <script>

    $('#save_act_prev').submit(function(e){

        e.preventDefault();

        var serializedData = $(this).serialize();

        //var $inputs = $form.find("input, select, button, textarea");

        // fire off the request to /form.php
		    var request = $.ajax({
		        url: "save_activity_script.php",
		        type: "post",
		        data: serializedData
		    });

		    $('#saving_activity').show();
	  	 // callback handler that will be called on success
		    request.done(function (response, textStatus, jqXHR){
		    	response = response.replace(/(\r\n|\n|\r)/gm,"");
		    	if(response === "success"){
		    		$('#saving_activity').hide();
		    		alert("Activity saved!\n\nYou can view saved activities by checking the SHOW SAVED ACTIVITIES box above.\n")
		    	}

		    	else{
		    		alert(response);
		    	}

		    });
	
    });

</script>






		<script>

			function readyToDel(){

				var conf = confirm("Are you sure you want to delete this activity?");

				$("[name='cb']").each(function() {

					var thecb = $(this);

					if(conf == true){

						if($(this).is(':checked')){
						  	$.post('saved_activity_delete_script.php', {
				            activity: $(this).parents('.verticalList').children('.activeText').text()
					        }, function(d){
					            //alert(d);
					           	 thecb.parents('.verticalList').fadeOut("normal", function() {
							        thecb.parents('.verticalList').remove();
							    });
					        });
						}

					}//end if conf

					else{
						thecb.prop('checked', false);
					}

					

				});

				
			}

		</script>





<script> $('#loading').hide(); </script>
	










