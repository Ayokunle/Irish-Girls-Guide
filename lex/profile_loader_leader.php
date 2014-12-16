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



	$curr_id = $_POST['mem_id']; //get member id from Ajax post

	/* Connect to database so we can load member by id */
	mysql_connect(HOST, USER, PASS) or die(mysql_error());
	mysql_select_db(DB) or die("Database... ".mysql_error());

	$row = mysql_query("SELECT * FROM leader WHERE Leader_id = $curr_id");
	$member = mysql_fetch_assoc($row);


	echo"<div>".$member['FirstName']. " ".$member['SurName']."</div>";

	if($_SESSION['level'] == 2){
		echo '<input type="submit" value="EDIT"  style="margin-top:-21px; float:right; margin-right:20px; margin-left:0px;" id="editBtn">';
	}

	else{

		if($member['Unit_id'] == $_SESSION['unitid']){
			echo '<input type="submit" value="EDIT"  style="margin-top:-21px; float:right; margin-right:20px; margin-left:0px;" id="editBtn">';
		}
	}

	echo "<p>".$member['Address']."</p>";


	echo "<div>";

	echo "<br><br><hr>";

	echo "<p><b>Unit:</b>"." ".$member['Unit_id']."</p>";
	echo "<hr>";

	echo "<p><b>Phone:</b>"." ".$member['Tel']."</p>";
	echo "<hr>";

	echo "<p><b>Username:</b>"." ".$member['User_name']."</p>";
	

	/*echo "<p><b>Availability:</b> 20TH MAR 3012</p>";
	echo "<hr>";*/

	
	echo "</div>";

?>




<div id="member_section_edit" style="display:none; margin-left:-13px;">

	<div id="title_container" style="background-color:#43bdee;">

		<?php

			if($_SESSION['level'] == 2){
				?>
					<h1 style="line-height:39px; font-size:20px; color:#000000;">Edit <?php echo $member['FirstName'];?>'s details</h1>	
				<?php
			}

			else{
				?>
					<h1 style="line-height:39px; font-size:20px; color:#000000;">Edit your details</h1>	
				<?php
			}

		?>
		
	</div>


	<div class="module">

		<form id="addmem" enctype="multipart/form-data" method="post">

			<input type="hidden" id="leader_id" name = "leader_id" value="<?php echo $curr_id;?>">
			
			<div>
				<label for="input">Add photo: </label>
				<input type="file" name="pic" id="pic" accept="image/gif, image/jpg, image/jpeg, image/png" style="font-size:12px;"/>
			</div>

			<div >
				<label for="input">Unit:</label>
				<?php
					if($_SESSION['level'] == 2){
						?>
							<input type="text" id="unit" name = "unit" value="<?php echo $member['Unit_id'];?>">
						<?php
					}

					else{
						?>
							<input type="text" id="unit" name = "unit" value="<?php echo $member['Unit_id'];?>" readonly>
						<?php
					}
				?>
				
			</div>

			<div >
				<label for="input">First Name*:</label>
				<input type="text" id="firstname" name = "firstname" value="<?php echo $member['FirstName'];?>">
			</div>

			<div>
				<label for="input">Last Name*:</label>
				<input type="text" id="lastname" name = "lastname" value="<?php echo $member['SurName'];?>">
			</div>

			<div>
				<label for="input">Phone:</label>
				<input type="tel" id="phone" name = "phone" value="<?php echo $member['Tel'];?>">
			</div>

			<div>
				<label for="input">Username:</label>
				<input type="text" id="username" name = "username" value="<?php echo $member['User_name'];?>">
			</div>

			<div>
				<label for="input">Password (Leave blank if no change):</label>
				<input type="password" id="password" name = "password" value="">
			</div>

			<div id="profile_update_preloader" style="display:none; border-top:0px solid #CDCDCC;">
				<img src="images/loading.gif" /> <p style="margin-left:30px; margin-top:-30px;">Updating details...</p>
			</div>

			<div id="nextbtn">
				<input type="submit" value="Just Save" style="margin-left:193px;">
			</div>

		</form>


	</div>

</div>





<script>

		function uploadFile(myFileObject) {
			// Open Our formData Object
			var formData = new FormData();
		 
			// Append our file to the formData object
			// Notice the first argument "file" and keep it in mind
			formData.append('photo', myFileObject);
			formData.append('theleaderid', "<?php echo $curr_id;?>");
		 
			// Create our XMLHttpRequest Object
			var xhr = new XMLHttpRequest();
		 
			// Open our connection using the POST method
			xhr.open("POST", 'update_photo_leader_script.php');
			
		 
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
			var uid = $("#unit").val();

			if(uid == ""){
				jAlert("You did assign a unit.", 'ERROR!');
				$('#fader').show();
				return false;
			}



			if(fname == "" || lname == ""){
				jAlert("First and Last names required.", 'ERROR!');
				$('#fader').show();
				return false;
			}

			if($('#password').val() == ""){

			}

			else{
				encryptMe();
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

		     $('#profile_update_preloader').show();

		    // fire off the request to /form.php
		    var request = $.ajax({
		        url: "update_leader_script.php",
		        type: "post",
		        data: serializedData
		    });

		    // callback handler that will be called on success
		    request.done(function (response, textStatus, jqXHR){

		    	response = response.replace(/(\r\n|\n|\r)/gm,"");
		    	if(response === "success"){

		    		loadFile();
		    				
		    		$('#profile_update_preloader').hide();
		    		$('#member_section_edit').hide();
		    		jAlert($('#firstname').val()+" "+$('#lastname').val()+"'s details updated!", 'DONE!');
					$('#fader').show();
		    	}

		    	else{
		    		jAlert(response, 'ERROR! Contact your tech admin');
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




<script>

		$("#editBtn").click(function() {

			$('#member_section_edit').show();
			//document.getElementById('member_section_edit').scrollIntoView();
			//$('#profile').scrollTop(800);

			$('#profile').animate({"scrollTop": $('#member_section_edit').offset().top-100}, 500);
		  	
		});

</script>




<script>

	function encryptMe(){
		var hash = CryptoJS.SHA1($('#password').val());
		$('#password').val(hash);
	}

</script>

