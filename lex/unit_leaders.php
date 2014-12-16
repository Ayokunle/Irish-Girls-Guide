
		






		<!--Drop down to filter names list -->
		<div id="title_container">

			<p id="title">UNIT LEADERS
				<select id="agefilter">
					<option value="All">Show all leaders</option>
				  	<option value="Unit 1">Unit 1</option>
				  	<option value="Unit 2">Unit 2</option>
				  	<option value="Unit 3">Unit 3</option>
				  	<option value="Unit 4">Unit 4</option>
				  	<option value="Unit 5">Unit 5</option>
				</select>
			</p>

		</div>




<div id="profile-container">
	<!--Member profile gets loaded here uing Ajax -->
	<div id="loading" style="display:none;">Loading member info. Please wait...</div>
	<div id="profile" >

		<section id="left">
			<div id="userStats" class="">

				<div class="pic">
					
				</div>

				<div class="data">

				</div>

			</div>

		</section>

	</div>


</div>



	<!-- Displays the long list of names -->
	<section id="members-container" style="width: 100%;">

		<div class="namesContainer">

			

		</div>

	</div>





	<script>
 	
		  	var load = "unit_leaders";
			var poster = $.post('members.php', {search: load});
				poster.done(function (response, textStatus, jqXHR){
					//alert(response);
					$('#main').html(response);
		   	});

	</script>







	

	
	














