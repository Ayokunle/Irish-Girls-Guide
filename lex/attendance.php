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

	<?php

		if($_SESSION['level'] == 2){//if admin, give all options

			?>
				<div id="title_container">
					<p id="title">ATTENDANCE
							<select id="agefilter">
								<option value="All">All</option>
							  <option value="Children">Children</option>
							  <option value="Adults">Adults</option>
							  <option value="Unit 1">Unit 1</option>
							  <option value="Unit 2">Unit 2</option>
							  <option value="Unit 3">Unit 3</option>
							  <option value="Unit 4">Unit 4</option>
							  <option value="Unit 5">Unit 5</option>
							</select>
						</p>
				</div>

			<?php
		}

		else{

			?>
				<div id="title_container">
					<p id="title">UNIT <?php echo " ".$_SESSION['unitid']." "; ?>ATTENDANCE
							<select id="agefilter">
								<option value="All">All</option>
							  <option value="Children">Children</option>
							  <option value="Adults">Adults</option>
							</select>
						</p>
				</div>

			<?php

		}

	?>



	<br><br>
	
	<div id="week_title" style="margin-left:39%; color:#878787; margin-top:3px;" ><h1><b><i>SELECT WEEK</i></b></h1></div>

	
	<div id="attendance_week"><input type="date" name="date" id="attendance_date"  style="width: 90%;  top:30%;"/></div>

	<div id="attendance_mark_preloader" style="display:none; border-top:0px solid #CDCDCC; margin-left:35%;" >
		<br>
		<img src="images/loading.gif" /> <p style="margin-left:30px; margin-top:-30px;">Marking attendance. Please wait...</p>
	</div>
	

	<h1><br><br></h1>

	



	<!-- Displays the long list of names -->
	<div id="members-container" style="width: 100%; top:260px;">

		<div class="namesContainer">
			


		</div>


	</div>



	<script>
 			$('#loading').show();
		  	var load = "all";
			var poster = $.post('attendance_loader.php', {filter: load});
				poster.done(function (response, textStatus, jqXHR){
					$('#loading').hide();
					$(".namesContainer").html(response);
		   	});

	</script>



	<script>

		$("#agefilter").change(function(){ 

			//alert($("#agefilter option:selected").text());

			var load = $("#agefilter option:selected").text();

			var poster = $.post('attendance_loader.php', {filter: load});
				poster.done(function (response, textStatus, jqXHR){
					//alert(response);
					$(".namesContainer").html(response);
		   	});


		});

	</script>


	





