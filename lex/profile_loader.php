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
	$maxamount=95;

	$Spurce_id=1;
	$Cooper_id=2;
	$Silver_id=3;
	$Gold_id=4;

	//Maximun Activity by Award
	$SpurceMax=34;
	$CooperMax=44;
	$SilverMax=31;
	$GoldMax=37;






	/* Connect to database so we can load member by id */
	mysql_connect(HOST, USER, PASS) or die(mysql_error());
	mysql_select_db(DB) or die("Database... ".mysql_error());

	$row = mysql_query("SELECT * FROM scout WHERE Scout_id = $curr_id");
	$member = mysql_fetch_assoc($row);

	$row2 = mysql_query("SELECT * FROM parent WHERE Scout_id = $curr_id");
	$guardian = mysql_fetch_assoc($row2);


	$row3=mysql_query("SELECT payement_id FROM scoutpayments WHERE Scout_id = $curr_id " );
	
	while ($payment = mysql_fetch_assoc($row3)) {

		$payid= $payment['payement_id'];
		$row4=mysql_query(" SELECT Amount FROM payements WHERE Payment_id = $payid ");
		while ($amount = mysql_fetch_assoc($row4)) {
			$total= $total +$amount['Amount'];

		}
}

	//$row4= mysql_query("SELECT Challenge_id FROM  challenges");
	//$row5=mysql_query("SELECT COUNT(Activity_id) FROM scoutactivity,activityaward WHERE Scout_id =1 AND Award_id =1"); 
	//SELECT COUNT( * ) , ActivityID FROM scoutactivity, activityaward WHERE Award_id =1

	/*$rowSpurce= mysql_query("SELECT COUNT( Activity_id )  FROM  scoutactivity JOIN activityaward ON Activity_id = ActivityID WHERE Award_id =$Spurce_id");
	$totalSpurce=mysql_fetch_assoc($rowSpurce);
	$rowCooper= mysql_query("SELECT COUNT( Activity_id )  FROM  `scoutactivity` JOIN activityaward ON Activity_id = ActivityID WHERE Award_id =$Cooper_id");
	$totalCooper=mysql_fetch_assoc($rowCooper);
	$rowSilver= mysql_query("SELECT COUNT( Activity_id )  FROM  `scoutactivity` JOIN activityaward ON Activity_id = ActivityID WHERE Award_id =$Silver_id");
	$totalSilver=mysql_fetch_assoc($rowSilver);
	$rowGold= mysql_query("SELECT COUNT( Activity_id )  FROM  `scoutactivity` JOIN activityaward ON Activity_id = ActivityID WHERE Award_id =$Gold_id");
	$totalGold=mysql_fetch_assoc($rowGold);*/


	//$row4= mysql_query("SELECT Challenge_id FROM  challenges");


	

	echo"<div>".$member['FirstName']. " ".$member['SurName']."</div>";
	echo '<input type="submit" value="EDIT"  style="margin-top:-21px; float:right; margin-right:20px; margin-left:0px;" id="editBtn">';
	echo "<p>".$member['Address']."</p>";

	//get age from date or birthdate
	$then = date('Ymd', strtotime($member['DOB']));
	$diff = date('Ymd') - $then;
	$age = substr($diff, 0, -4);


	
	echo "<ul class='numbers'>";
	echo "<li>Age<strong>".$age."</strong></li>";
	echo "<script>$('#paymentBtn').show();</script>";
	
		if($total>=$maxamount){
			echo "<li>Amount paid<strong>Full</strong></li>";
			//echo "<script>$('#paymentBtn').hide();</script>";
			
		}else if($total <= 0){
			echo "<li>Amount paid<strong>€0</strong></li>";
		}else{
			echo "<li>Amount paid<strong>€".$total."</strong></li>";
		}
	
	
	echo "<li class='nobrdr'>Active<strong>".$member['isActive']."</strong></li>";
	echo "</ul>";


	echo "<div>";

	echo "<br><br><hr>";

	echo "<p><b>Unit ID:</b>"." ".$member['Unit_id']."</p>";
	echo "<hr>";

	echo "<p><b>D.O.B:</b>"." ".$member['DOB']."</p>";
	echo "<hr>";

	echo "<p><b>Health:</b>"." ".$member['allergies']."</p>";
	echo "<hr>";

	echo "<p><b>Phone:</b>"." ".$member['Telephone']."</p>";
	echo "<hr>";

	echo "<p><b>School:</b>"." ".$member['School']."</p>";
	echo "<hr>";

	echo "<p><b>Nationality:</b>"." ".$member['Nationality']."</p>";
	echo "<hr>";

	echo "<p><b>Ethnicity:</b>"." ".$member['Ethenic']."</p>";
	echo "<hr>";

	echo "<p><b>Religion:</b>"." ".$member['Religion']."</p>";
	echo "<hr>";

	echo "<p><b>Doctor's name:</b>"." ".$member['Child_Doc']."</p>";
	echo "<hr>";

	echo "<p><b>Doctor's number:</b>"." ".$member['Doc_Phone']."</p>";
	echo "<hr>";

    echo "<p><b>First Parent/Guardians Name:</b>"." ".$guardian['Parent1_Name']."</p>";
    echo "<hr>";

    echo "<p><b>Second Parent/Guardians Name:</b>"." ".$guardian['Parent2_Name']."</p>";
    echo "<hr>";

    echo "<p><b>Address:</b>"." ".$guardian['Address']."</p>";
    echo "<hr>";

    echo "<p><b>Work Phone:</b>"." ".$guardian['Tel_Work']."</p>";
    echo "<hr>";

    echo "<p><b>Home Phone:</b>"." ".$guardian['Tel_Home']."</p>";
    echo "<hr>";

    echo "<p><b>Email 1:</b>"." ".$guardian['Email1']."</p>";
    echo "<hr>";
    
    echo "<p><b>Email 2:</b>"." ".$guardian['Email2']."</p>";
    echo "<hr>";

    echo "<p><b>Badge:</b>"." "."Badges...</p>";

	/*echo "<p><b>Availability:</b> 20TH MAR 3012</p>";
	echo "<hr>";*/

	
	echo "</div>";

?>




<div id="member_section_edit" style="display:none; margin-left:-13px;">

	<div id="title_container" style="background-color:#43bdee;">
		<h1 style="line-height:39px; font-size:20px; color:#000000;">Edit <?php echo $member['FirstName'];?>'s details</h1>	
	</div>


	<div class="module">

		
		
		<form id="addmem" enctype="multipart/form-data" method="post">

			
			
			<input type="hidden" id="scout_id" name = "scout_id" value="<?php echo $curr_id;?>">
			

			<div>
				<label for="input">Add photo: </label>
				<input type="file" name="pic" id="pic" accept="image/gif, image/jpg, image/jpeg, image/png" style="font-size:12px;"/>
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
				<label for="date">DOB:</label>
				<input type="date" name="dob" id="dobdate" value="<?php echo $member['DOB'];?>"/>	
			</div>

			<div>
				<label for="input">Amount Paid:</label>
				<input type="tel" id="input" name = "amountpaid" value="TODO">
			</div>
		
			<div>
				<label for="textarea">Address:</label>
				<textarea cols="30" rows="4" id="textarea" name = "address"><?php echo $member['Address'];?></textarea>
			</div>

			<div>
				<label for="input">Phone:</label>
				<input type="tel" id="input" name = "phone" value="<?php echo $member['Telephone'];?>">
			</div>


			<div>
				<label for="input">Health Info (allergies etc):</label>
				<input type="text" id="input" name = "allergies" value="<?php echo $member['allergies'];?>">
			</div>

			<div>
				<label for="input">Doctor's Name:</label>
				<input type="tel" id="input" name = "doctorsname" value="<?php echo $member['Child_Doc'];?>">
			</div>

			<div>
				<label for="input">Doctor's Number:</label>
				<input type="tel" id="input" name = "doctorsnumber" value="<?php echo $member['Doc_Phone'];?>">
			</div>

		

			<div>
				<label for="textarea">School:</label>
				<textarea cols="30" rows="4" id="textarea" name = "school"><?php echo $member['School'];?></textarea>
			</div>

			<div>
				<label for="input">Ethnicity:</label>
				<input type="text" id="input" name = "ethnicity" value="<?php echo $member['Ethenic'];?>">
			</div>

			<div>
				<label for="input">Nationality:</label>
				<input type="text" id="input" name = "nationality" value="<?php echo $member['Nationality'];?>">
			</div>

			<div>
				<label for="input">Religion:</label>
				<input type="text" id="input" name = "religion" value="<?php echo $member['Religion'];?>">
			</div>

			<div>
				<label for="input">Unit ID:</label>
				<input type="text" id="input" name = "unitid" value="<?php echo $member['Unit_id'];?>">
			</div>

			<div>
				<label for="input">Active member?</label>

				<?php

					if($member['isActive'] == "Yes"){
						?>
							<select id="isActive" name="isActive">
								<option value="Yes">Yes</option>
								<option value="No">No</option>
							</select>
						<?php
					}

					else{

						?>
							<select id="isActive" name="isActive">
								<option value="No">No</option>
								<option value="Yes">Yes</option>
							</select>
						<?php

					}
				?>

			</div>


			<div id="profile_update_preloader" style="display:none; border-top:0px solid #CDCDCC;">
				<img src="images/loading.gif" /> <p style="margin-left:30px; margin-top:-30px;">Updating details...</p>
			</div>



			<div id="nextbtn">
				<input type="submit" value="SAVE &amp UPDATE GUARDIAN" style="margin-left:0px;" onClick="updateGuard()">
				<input type="submit" value="JUST SAVE" style="margin-left:30px;">
			</div>

		</form>


	</div>

</div>

<script>
	
	var maybe = "0";

	function updateGuard(){

		maybe = "1";
	}
	



</script>


	<script>

		function uploadFile(myFileObject) {
			// Open Our formData Object
			var formData = new FormData();
		 
			// Append our file to the formData object
			// Notice the first argument "file" and keep it in mind
			formData.append('photo', myFileObject);
			formData.append('thescoutid', "<?php echo $curr_id;?>");
		 
			// Create our XMLHttpRequest Object
			var xhr = new XMLHttpRequest();
		 
			// Open our connection using the POST method
			xhr.open("POST", 'update_photo_script.php');
		 
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

		     $('#profile_update_preloader').show();

		    // fire off the request to /form.php
		    var request = $.ajax({
		        url: "update_mem_script.php",
		        type: "post",
		        data: serializedData
		    });

		    // callback handler that will be called on success
		    request.done(function (response, textStatus, jqXHR){
		    	response = response.replace(/(\r\n|\n|\r)/gm,"");
		    	if(response === "success"){
		    		if(maybe === "0"){
		    			loadFile();
		    			$('#profile_update_preloader').hide();
			    		$('#member_section_edit').hide();
			    		jAlert($('#firstname').val()+" "+$('#lastname').val()+"'s details updated!", 'DONE!');
						$('#fader').show();


			    		//$('#feedbackmsg').text($('#firstname').val()+" "+$('#lastname').val()+"'s details updated!");
		    		}

		    		else{
		    			loadFile();
		    			$('#parent_section_edit').show();
						document.getElementById('parent_section_edit').scrollIntoView();
		    		}
		    		
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



<div id="parent_section_edit" style="display:none; margin-left:-13px;">

	<div id="title_container" style="background-color:#43bdee;">
		<h1 style="line-height:39px; font-size:20px; color:#000000;">Edit guardian details</h1>	
	</div>


	<div class="module">

		
		
		<form id="addparent">

			<input type="hidden" id="scout_id_p" name = "scout_id_p" value="<?php echo $curr_id;?>">

			<div>
				<label for="input">Parent/Guardian Name*:</label>
				<input placeholder = "1:" type="text" id="parentname1" name = "parentname1" value="<?php echo $guardian['Parent1_Name'];?>">
			</div>

			<div>
				<label for="input">Email:</label>
				<input placeholder = "1:" type="text" id="input" name = "email1" value="<?php echo $guardian['Email1'];?>">
			</div>

			<div>
				<label for="input">Parent/Guardian Name:</label>
				<input placeholder = "2:" type="text" id="parentname2" name = "parentname2" value="<?php echo $guardian['Parent2_Name'];?>">
			</div>

			<div>
				<label for="input">Email:</label>
				<input placeholder = "2:" type="text" id="input" name = "email2" value="<?php echo $guardian['Email2'];?>">
			</div>

			<div>
				<label for="input">Address:</label>
				<input type="text" id="input" name = "parentaddress" value="<?php echo $guardian['Address'];?>">
			</div>

		
			<div>
				<label for="input">Home Contact Number:</label>
				<input type="tel" id="input" name = "homephone" value="<?php echo $guardian['Tel_Home'];?>">
			</div>

			<div>
				<label for="input">Work Contact Number:</label>
				<input type="tel" id="input" name = "workphone" value="<?php echo $guardian['Tel_Work'];?>">
			</div>


			<div id="parentprofile_update_preloader" style="display:none; border-top:0px solid #CDCDCC;">
				<img src="images/loading.gif" /> <p style="margin-left:30px; margin-top:-30px;">Updating details...</p>
			</div>



			<div id="savebtn">
				<input type="submit" value="SAVE" style="margin-left:220px;">
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

		    $('#parentprofile_update_preloader').show();

		    // fire off the request to /form.php
		    var request = $.ajax({
		        url: "update_parent_script.php",
		        type: "post",
		        data: serializedData
		    });

		    // callback handler that will be called on success
		    request.done(function (response, textStatus, jqXHR){

		    	response = response.replace(/(\r\n|\n|\r)/gm,"");
		    	if(response === "success"){
		    		$('#parentprofile_update_preloader').hide();
		    		$('#parent_section_edit').hide();
		    		$('#member_section_edit').hide();

		    		jAlert($('#firstname').val()+" "+$('#lastname').val()+"'s details updated!", 'DONE!');
					$('#fader').show();

		    		//$('#feedbackmsg').text($('#firstname').val()+" "+$('#lastname').val()+"'s details updated!");
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






 <div id="payment_section_edit" style="display:none; margin-left:-13px; height:600px;">

	<div id="title_container" style="background-color:#43bdee;">
		<h1 style="line-height:39px; font-size:20px; color:#000000;">Add a payment</h1>	
	</div>


	<div class="module">

		
		
		<form id="addpayment">

			<input type="hidden" id="scout_id_payment" name="scout_id_payment" value="<?php echo $curr_id;?>">

			<div>
				<label for="input">Date:</label>
				<input type="date" id="paydate" name = "paydate" value="">
			</div>

			<div>
				<label for="input">Amount (numbers only. e.g. 15):</label>
				<input type="tel" id="amount" name = "amount" value="">
			</div>

			<div id="savepaymentbtn">
				<input type="submit" value="SAVE" style="margin-left:220px;">
			</div>

		</form>

	</div>

</div>


<script type="text/javascript">
       
		 // variable to hold request
		var request;
		// bind to the submit event of our form
		$("#addpayment").submit(function(event){

			var pd = $("#paydate").val();
			var am = $("#amount").val();

			if(pd == "" || am == ""){
				jAlert("The date and the amount paid are required.", 'ERROR!');
				$('#fader').show();
				return false;
			}

			if(isNaN(am)){
				jAlert("Correct amount entered. Insert numbers only.", 'ERROR!');
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

		      $('#savepaymentbtn').hide();


		    // fire off the request to /form.php
		    var request = $.ajax({
		        url: "add_payment_script.php",
		        type: "post",
		        data: serializedData
		    });

		  

		    // callback handler that will be called on success
		    request.done(function (response, textStatus, jqXHR){

		    	response = response.replace(/(\r\n|\n|\r)/gm,"");
		    	if(response === "success"){
		    		$('#payment_section_edit').hide();
		    		$('#parent_section_edit').hide();
		    		$('#member_section_edit').hide();

		    		jAlert($('#firstname').val()+" "+$('#lastname').val()+"'s payment updated!", 'DONE!');
					$('#fader').show();



		    		//$('#feedbackmsg2').text($('#firstname').val()+" "+$('#lastname').val()+"'s payment updated!");
		    	}

		    	else{
		    		jAlert(response, 'ERROR! Contact your tech admin.');
					$('#fader').show();
					$('#savepaymentbtn').show();
		    	}

		    });

		    // callback handler that will be called on failure
		    request.fail(function (jqXHR, textStatus, errorThrown){
		        // log the error to the console
		        $('#savepaymentbtn').show();
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

		$("#paymentBtn").click(function() {

			$('#payment_section_edit').show();
			//document.getElementById('member_section_edit').scrollIntoView();
			//$('#profile').scrollTop(800);

			$('#profile').animate({"scrollTop": $('#payment_section_edit').offset().top-100}, 500);
		  	
		});

</script>
