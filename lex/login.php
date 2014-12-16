<?php
	session_start();
?>

<!DOCTYPE HTML>
<html lang="en">

	<head>

		<title>Irish Girl Guides | Admin</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="apple-mobile-web-app-status-bar-style" content="black" />


		<!-- Here I'm #including the CSS file used for styling, and also some Google fonts I used -->
		<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="css/jquery.alerts.css" media="screen" />
		<link rel="stylesheet" type="text/css" href='http://fonts.googleapis.com/css?family=Fjalla+One'>
		<link href='http://fonts.googleapis.com/css?family=Lato:900italic' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css'>


		<script src="http://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/sha1.js"></script>

		<!-- #Including the Javascript files that make everything work -->
		
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script src="includes/slider.js"></script>
		<script src="includes/scripts.js"></script>
		<script src="includes/jquery.alerts.js"></script>

		





	</head>



	<body> <!-- Program body -->



		<div id="wrapper">


			<!-- Main Content Begin -->
			<section id="content">

				<div class="content-scroll">
			
					<!-- Menu button + Girl Guides Logo -->
					<header>

						<div class="controls">
							<a title="Toggle Sidebar"><img src="images/icons/icon-toggle.png" alt="Toggle Sidebar" /></a>
						</div>

						<img src="images/logo.png" alt="Logo" id="logo"/>

					</header>
					
					<div id="loading">
						 <img src="images/loading.gif" /> <p>Please Wait</p>
					</div>
					
					<!-- Main Content Area. 
					The intial mokey will be replaced by external PHP content using the Javascript function below 
					-->
					<section id="main">

					

						<div id="member_section">


							<div id="title_container">
								<p id="title">LOGIN</p>
							</div>


							<div class="module">


								<?php

									if($_SESSION['LOGIN_ERROR'] == "true"){
										?>
											<p style="color:red;"><br>Incorrect name or password.<br>Ask your admin to reset your password if forgotten.</p><br>
										<?php
									}


								?>
								
								<form id="login_form" action="login_script.php" method = "post">

									<div id="theunits">
										<label for="input">Username:</label>
										<input type="text" id="username" name = "username">
									</div>


									<div>
										<label for="input">Password:</label>
										<input type="password" id="password" name = "password">
									</div>

									
									<div id="nextbtn">
										<input type="submit" value="LOGIN" style="margin-left:220px;" onclick="encryptMe()">
									</div>

								</form>


							</div>

						</div>








					</section>

			</section>

			<!-- Main Content End -->

			


		</div>

		
	</body>

</html>








<script>

	function encryptMe(){
		var hash = CryptoJS.SHA1($('#password').val());
		$('#password').val(hash);
	}

</script>