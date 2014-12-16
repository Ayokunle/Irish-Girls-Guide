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
	

<?php $search = $_POST['search']; ?>


	<!--Drop down to filter names list -->
	<div id="title_container">

		<?php

			if($search == "unit_leaders"){
				?> <p id="title">LEADERS <?php
			}

			elseif($search == ""){//if not search

				if($_SESSION['level'] == 2){//if admin, give all options

					?>
						<p id="title">MEMBERS

						<select id="agefilter">
							<option value="Show all">Show all</option>
							<option value="Children">Children</option>
							<option value="Adults">Adults</option>
							<option value="Unit 1">Unit 1</option>
							<option value="Unit 2">Unit 2</option>
							<option value="Unit 3">Unit 3</option>
							<option value="Unit 4">Unit 4</option>
							<option value="Unit 5">Unit 5</option>
						</select>

					<?php
					
				}


				else{

					?>
					<p id="title">UNIT<?php echo " ".$_SESSION['unitid']." "; ?>MEMBERS

						<select id="agefilter">
							<option value="Show all">Show all</option>
							<option value="Children">Children</option>
							<option value="Adults">Adults</option>
						</select>

					<?php

				}
			}//end elseif

			else{
				?><p id="title">SEARCH RESULT<?php
			}

		?>
			
		</p>

	</div>




<div id="profile-container">
<!--Member profile gets loaded here uing Ajax -->
<div id="profile" >

	<section id="left">
		<div id="userStats" class="">

			<div class="pic">
				
			</div>

		<div id="nextbtn">
				<input type="submit" id="paymentBtn" value="ADD PAYMENT" style="margin-top:100px; margin-left:-105px; float:left; width:94px;">
			</div>


			<div class="data"></div>


		</div>

	</section>

</div>


</div>



<!-- Displays the long list of names -->
<section id="members-container" style="width: 100%;">

	<div class="namesContainer">

			

	</div>

</div>






<?php

	if($search == ""){ //show all members

		?>
			<script>
				$('#loading').show();
			  	var load = "Show all";
				var poster = $.post("names_loader.php", {filter: load});
					poster.done(function (response, textStatus, jqXHR){
						//alert(response);
						$(".namesContainer").html(response);
						$('#loading').hide();
			   	});

			</script>

		<?php
	}

	elseif ($search == "unit_leaders"){ //show unit leaders only
		?>
			<script>
				$('#loading').show();
			  	var load = "leaders_unit";
				var poster = $.post("names_loader.php", {filter: load});
					poster.done(function (response, textStatus, jqXHR){
						//alert(response);
						$(".namesContainer").html(response);
						$('#loading').hide();
			   	});
			</script>

		<?php

	}

	else{// must be a search

		?>
			<script>
				$('#loading').show();
			  	var load = "<?php echo $search; ?>";
				var poster = $.post("names_loader.php", {filter: load});
					poster.done(function (response, textStatus, jqXHR){
						//alert(response);
						$(".namesContainer").html(response);
						$('#loading').hide();
			   	});
			</script>

		<?php

	}


?>


<script>

	$("#agefilter").change(function(){ 

		//alert($("#agefilter option:selected").text());
		$('#loading').show();
		var load = $("#agefilter option:selected").text();

		var poster = $.post('names_loader.php', {filter: load});
			poster.done(function (response, textStatus, jqXHR){
				//alert(response);
				$('#loading').hide();
				$(".namesContainer").html(response);
	   	});


	});

</script>





















