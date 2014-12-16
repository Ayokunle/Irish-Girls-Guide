
<?php session_start(); 
	if($_SESSION['level'] == 1 || $_SESSION['level'] == 2){}

	else{
		?><h2>You must be loged in to access this page</h2>
		<a href="login.php"> -> Click here to login</a> <?php
		die();
	}
?>






<!-- Menu begin -->

	<aside id="sidebar">

		<div class="sidebar-scroll">


			<!-- ... -->

			<section id="newsletter">

				<h2>Search Member</h2>

				<!-- Make sure to add a working action and method -->

				<form id="searchinput">

					<div>


						<input name="search" id="newsletter-input" placeholder = "Insert name"/>

						

					</div>

				</form>

			</section>


	

			<!-- Main Navigation -->

			<nav>

				<ul>

					<li id="prog"><a href="#" title="Page">Manage Activities</a></li>

					<li id="add_unit_leader"><a href="#" title="Page">Add New Unit Leader</a></li>

					<li id="add_mem"><a href="#" title="Page">Add New Member</a></li>

					<li id="view_unit_leaders"><a href="#" title="Page">View Unit Leaders</a></li>

					<li id="mem"><a href="#" title="Page">View Members</a></li>

					<li id="att"><a href="#" title="Blog" id = "att">Mark Attendance</a></li>

					<li id="sugg"><a href="#" title="Page">Activity Suggestions</a></li>

				</ul>

			</nav>

			

		

		</div>

	</aside>

	<!-- Sidebar End -->





	   	<script type="text/javascript">
       
		 // variable to hold request
		var request;
		// bind to the submit event of our form
		$("#searchinput").submit(function(event){

		    // abort any pending request
		    if (request) {
		        request.abort();
		    }
		    // setup some local variables
		    var $form = $(this);
		    // let's select and cache all the fields
		    var $inputs = $form.find("input, select, button, textarea");
		    // serialize the data in the form
		    var serializedData = $form.serialize();

		    // let's disable the inputs for the duration of the ajax request
		    $inputs.prop("disabled", true);

		     $('#nextbtn').hide();

		    // fire off the request to /form.php
		    var request = $.ajax({
		        url: "members.php",
		        type: "post",
		        data: serializedData
		    });

		    $('#loading').show();
		    // callback handler that will be called on success
		    request.done(function (response, textStatus, jqXHR){
		    	$('#main').html(response);
		    	$('#loading').hide();

		    });

		    // callback handler that will be called on failure
		    request.fail(function (jqXHR, textStatus, errorThrown){
		    	
		        // log the error to the console
		        alert(
		            "Contact your tech admin. "+
		            textStatus, errorThrown
		        );
		    });

		    // callback handler that will be called regardless
		    // if the request failed or succeeded
		    request.always(function () {
		        // reenable the inputs
		        $inputs.prop("disabled", false);
		    });

		    // prevent default posting of form
		    event.preventDefault();
		});
				     
					   
    </script>