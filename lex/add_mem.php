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


	<script>

		function uploadFile(myFileObject) {
			// Open Our formData Object
			var formData = new FormData();
		 
			// Append our file to the formData object
			// Notice the first argument "file" and keep it in mind
			formData.append('photo', myFileObject);
		 
			// Create our XMLHttpRequest Object
			var xhr = new XMLHttpRequest();
		 
			// Open our connection using the POST method
			xhr.open("POST", 'photo_uploader.php');
		 
			// Send the file
			xhr.send(formData);
		}





		function loadFile() {
			// Retrieve the FileList object from the referenced element ID
			var myFileList = document.getElementById('pic').files;
		 
			if(myFileList[0] === undefined){
				//do nothing
			}

			else{

				// Grab the first File Object from the FileList
				var myFile = myFileList[0];
			 
				// Set some variables containing the three attributes of the file
				var myFileName = myFile.name;
				var myFileSize = myFile.size;
				var myFileType = myFile.type;

				// Let's upload the complete file object
				uploadFile(myFile);

			}
		 
		}



	</script>

    <script type="text/javascript">


		 // variable to hold request
		var request;
		// bind to the submit event of our form
		$("#addmem").submit(function(event){

			var fname = $("#firstname").val();
			var lname = $("#lastname").val();

			if(fname == "" || lname == ""){
				jAlert("First and Last names required.", 'ERROR!');
				$('#fader').show();
				return false;
			}

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
		        url: "add_mem_script.php",
		        type: "post",
		        data: serializedData
		    });

		    // callback handler that will be called on success
		    request.done(function (response, textStatus, jqXHR){

		    	//response = response.replace(/(\r\n|\n|\r)/gm,"");
		   
		    	var res = response.replace(/^\s*/,'').replace(/\s*$/,'').toLowerCase();
		    	//alert (res);
		    	if(res === "success"){
		    		$('#parent_section').show();
		    		document.getElementById('parent_section').scrollIntoView();
		    		loadFile();
		    	}

		    	else{
		    		jAlert(response, 'ERROR(01)! Contact your tech admin');
					$('#fader').show();
					$('#nextbtn').show();
		    	}

		    });

		    // callback handler that will be called on failure
		    request.fail(function (jqXHR, textStatus, errorThrown){
		    	$('#nextbtn').show();
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



<div id="member_section">


	<div id="title_container">
		<p id="title">ADD A NEW MEMBER</p>
	</div>


	<div class="module">

		<h3> * INFO GIVEN HERE WILL BE SAVED INTO THE DATABASE *</h3>
		
		<form id="addmem" enctype="multipart/form-data" method="post">

			<div>
				<label for="input">Add photo: { 150x150 px } </label>
				<input type="file" name="pic" id="pic" accept="image/gif, image/jpg, image/jpeg, image/png" style="font-size:12px;"/>
			</div>

			<div>
				<label for="input">Unit ID:</label>
				<?php
					if($_SESSION['level'] == 1){
						?>	
							<input type="text" id="input" name = "unitid" value="<?php echo $_SESSION['unitid']; ?>" readonly>
						<?php
					}

					else{
						?>	
							<input type="text" id="input" name = "unitid" value="">
						<?php
					}
				?>
				
			</div>

			<div>
				<label for="input">First Name*:</label>
				<input type="text" id="firstname" name = "firstname">
			</div>

			<div>
				<label for="input">Last Name*:</label>
				<input type="text" id="lastname" name = "lastname">
			</div>

			<div>
				<label for="date">DOB:</label>
				<input type="date" name="dob" id="dobdate" value=""/>	
			</div>
		
			<div>
				<label for="textarea">Address:</label>
				<textarea cols="30" rows="4" id="textarea" name = "address"></textarea>
			</div>

			<div>
				<label for="input">Phone:</label>
				<input type="tel" id="input" name = "phone">
			</div>


			<div>
				<label for="input">Health Info (allergies etc):</label>
				<input type="text" id="input" name = "allergies">
			</div>

			<div>
				<label for="input">Doctor's Name:</label>
				<input type="text" id="input" name = "doctorsname">
			</div>

			<div>
				<label for="input">Doctor's Number:</label>
				<input type="tel" id="input" name = "doctorsnumber">
			</div>

		

			<div>
				<label for="textarea">School:</label>
				<textarea cols="30" rows="4" id="textarea" name = "school"></textarea>
			</div>

			<div>
				<label for="input">Ethnicity:</label>
				<input type="text" id="input" name = "ethnicity">
			</div>

			<div>
				<label for="input">Nationality:</label>
				<input type="text" id="input" name = "nationality">
			</div>

			<div>
				<label for="input">Religion:</label>
				<input type="text" id="input" name = "religion">
			</div>

			<div>
				<label for="input">Active member?</label>
				<select id="isActive" name="isActive" style="margin-left:220px;">
					<option value="Yes">Yes</option>
					<option value="No">No</option>
				</select>
			</div>

	<!-- 
			<div>
				<label>Active Member</label>
				<input type="radio" name="radio" value="Radio One"><small>Yes</small><br>
				<input type="radio" name="radio" value="Radio Two"><small>No</small>
			</div>
	-->
			
			<div id="nextbtn">
				<input type="submit" value="ADD GUARDIAN DETAILS" style="margin-left:135px;">
			</div>

		</form>


	</div>

</div>





<script type="text/javascript">
       
		 // variable to hold request
		var request;
		// bind to the submit event of our form
		$("#addparent").submit(function(event){

			var pname1 = $("#parentname1").val();
			var pname2 = $("#parentname2").val();

			if(pname1 == "" && pname2 == ""){
				jAlert("At least one guardian name required.", 'ERROR!');
				$('#fader').show();
				return false;
			}

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

		    $('#savebtn').hide();


		    // fire off the request to /form.php
		    var request = $.ajax({
		        url: "add_parent_script.php",
		        type: "post",
		        data: serializedData
		    });

		    // callback handler that will be called on success
		    request.done(function (response, textStatus, jqXHR){

		    	response = response.replace(/(\r\n|\n|\r)/gm,"");
		    	if(response === "success"){
		    		$('#form_completed').show();
		    		$('#parent_section').hide();
		    		$('#member_section').hide();

		    		$('#feedbackmsg').text($('#firstname').val()+" "+$('#lastname').val()+" just became a member!");
		    	}

		    	else{
		    		jAlert(response, 'ERROR! Contact your tech admin.');
					$('#fader').show();
					$('#savebtn').show();
		    	}

		    });

		    // callback handler that will be called on failure
		    request.fail(function (jqXHR, textStatus, errorThrown){
		    	$('#savebtn').show();
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





<div id = "parent_section" style="display:none;">

	<div id="title_container">
		<p id="title">ADD GUARDIAN DETAILS</p>
	</div>


	<div class="module">

		
		
		<form id="addparent">


			<div>
				<label for="input">Parent/Guardian Name*:</label>
				<input placeholder = "1:" type="text" id="parentname1" name = "parentname1">
			</div>

			<div>
				<label for="input">Email:</label>
				<input placeholder = "1:" type="text" id="input" name = "email1">
			</div>

			<div>
				<label for="input">Parent/Guardian Name:</label>
				<input placeholder = "2:" type="text" id="parentname2" name = "parentname2">
			</div>

			<div>
				<label for="input">Email:</label>
				<input placeholder = "2:" type="text" id="input" name = "email2">
			</div>

			<div>
				<label for="input">Address:</label>
				<input type="text" id="input" name = "parentaddress">
			</div>

		
			<div>
				<label for="input">Home Contact Number:</label>
				<input type="tel" id="input" name = "homephone">
			</div>

			<div>
				<label for="input">Work Contact Number:</label>
				<input type="tel" id="input" name = "workphone">
			</div>



			<div id="savebtn">
				<input type="submit" value="SAVE" style="margin-left:224px;">
			</div>


		</form>

	</div>

</div>



<div id ="form_completed" style="display:none;">

	<section id="left"> 
		<div id="userStats" class="">

			<div class="pic">
				<a href="#"><img src="images/user_avatar.jpg" width="80" height="80" /></a>
			</div>

			<div class="data">
				<div>Success!</div>
				<p id="feedbackmsg"></p>
			</div>

		</div>
	</section>

</div>


<script>$('#loading').hide();</script>

