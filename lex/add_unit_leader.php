<?php session_start(); 

	if($_SESSION['level'] != 2){
		
		?>
			<h2>You must be loged in as an administrator to access this page</h2>
			<a href="login.php">Click here to login</a>

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
			xhr.open("POST", 'photo_uploader_leader.php');
		 
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

<div id="member_section">


	<div id="title_container">
		<p id="title">ADD A NEW UNIT LEADER</p>
	</div>


	<div class="module">

		<h3> * INFO GIVEN HERE WILL BE SAVED INTO THE DATABASE *</h3>
		
		<form id="addleader" enctype="multipart/form-data" method="post">

			<div id="theunits">
				<label for="input">Unit ID:</label>
				<input type="text" id="unitId" name = "unitid">
			</div>

			<div>
				<label for="input">Add photo: { 150x150 px } </label>
				<input type="file" name="pic" id="pic" accept="image/gif, image/jpg, image/jpeg, image/png" style="font-size:12px;"/>
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
				<label for="input">Phone:</label>
				<input type="tel" id="phone" name = "phone">
			</div>




			<div>
				<label for="input">UserName:</label>
				<input type="text" id="username" name = "username">
			</div>

			<div>
				<label for="input">Password:</label>
				<input type="password" id="password" name = "password">
			</div>

			
			<div id="nextbtn">
				<input type="submit" value="Save" style="margin-left:220px;">
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




<script>


    $('#addleader').submit(function(e){

    	if($('#firstname').val() == ""){
    		alert("First name required!");
    		return false;
    	}

    	if($('#unitId').val() == ""){
    		alert("No unit ID entered!");
    		return false;
    	}

    	if($('#password').val() == ""){
    		alert("Password field cannot be empty!");
    		return false;
    	}

        e.preventDefault();


        encryptMe();


        var serializedData = $(this).serialize();

        //var $inputs = $form.find("input, select, button, textarea");

        // fire off the request to /form.php
		    var request = $.ajax({
		        url: "add_unit_leader_script.php",
		        type: "post",
		        data: serializedData
		    });


	  	 // callback handler that will be called on success
		    request.done(function (response, textStatus, jqXHR){
		    	response = response.replace(/(\r\n|\n|\r)/gm,"");
		    	if(response === "success"){
		    		loadFile();
		    		$('#member_section').hide();
		    		$('#form_completed').show();
		    		$('#feedbackmsg').text($('#firstname').val()+" "+$('#lastname').val()+" has been assigned to unit "+$('#unitId').val());
		    	}

		    	else{
		    		alert(response);
		    	}

		    });
	
    });

</script>



<script>
	$('#loading').hide();
</script>


<script>

	function encryptMe(){
		var hash = CryptoJS.SHA1($('#password').val());
		$('#password').val(hash);
	}

</script>


