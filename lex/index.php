<?php session_start(); ?>

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

			<?php

				$ADMIN = 2;
				$LEADER = 1;
				$userLevel = $_SESSION['level'];
				$userUnit = $_SESSION['unitid'];
				$firstname = "Admin";
				$fullname = "Admin";

				if($userLevel == $LEADER || $userLevel == $ADMIN){

					include('db_config_loader.php');

					if($userLevel == $LEADER){
						$con = mysql_connect(HOST, USER, PASS) or die(mysql_error());
						mysql_select_db(DB) or die("Database... ".mysql_error());
						$temp = mysql_query("SELECT * FROM leader WHERE Unit_id = $userUnit");
						$leader = mysql_fetch_assoc($temp);

						$firstname = $leader['FirstName'];
						$fullname = $leader['FirstName']." ".$leader['SurName'];
					}

					else{
						$userUnit = "X";
					}

				}

				else{

					?>
						<h2>You must be loged in to access this page</h2>
						<a href="login.php"> -> Click here to login</a>

					<?php

					die();

				}

				include('sidebar_admin.php');

			?>

			<!-- Main Content Begin -->
			<section id="content">
				<div class="content-scroll">
					<!-- Menu button + Girl Guides Logo -->
					<header>
						<div class="controls">
							<a title="Toggle Sidebar"><img src="images/icons/icon-toggle.png" alt="Toggle Sidebar" /></a>
						</div>
						<div id = "logininas"><?php echo " ".$fullname." -> unit ".$userUnit.""; ?> </div>
						<input type="submit" id = "logout_btn" value="LOGOUT">
					</header>
					
					<div id="loading">
						 <img src="images/loading.gif" /> <p>Please Wait</p>
					</div>
					
					<!-- Main Content Area. 
					The intial mokey will be replaced by external PHP content using the Javascript function below 
					-->
					<section id="main">

						<section id="left"> 
							<div id="userStats" class="">

								<div class="pic">
									<a href="#"><img src="images/user_avatar.jpg" width="80" height="80" /></a>
								</div>

								<div class="data">
									<div>Hey <?php echo $firstname; ?>!</div>
									<p>Click the menu above (top left corner) to begin.</p>
								</div>

							</div>
						</section>

					</section>

			</section>

			<!-- Main Content End -->

			


		</div>


		<script>
			var level = "<?php echo $userLevel; ?>"
			if(level == 2){
				
			}

			else{
				$('#add_unit_leader').hide();
			}
		</script>




		<script>

			/* 	When we click on the menu. This function gets called.

				I'm simply loading external PHP files into the main section 
				right above. */

			$("li").click(function(){

				$('#main').html("");
				
				$('#loading').show();

				$("li.active").removeClass("active");
			    $(this).addClass("active");
			    $("#content").toggleClass("open"); //hide menu

			    //check which button user is clicking; load PHP file
			    if($(this).attr('id') == 'att'){
			    	$('#main').load('attendance.php');
			    }
			    
			    else if($(this).attr('id') == 'mem'){
			    	$('#main').load('members.php');
			    }
			    
			    else if($(this).attr('id') == 'prog'){
			    	$('#main').load('programs.php');
			    }
			    
			    else if($(this).attr('id') == 'badge'){
			    	$('#main').load('badge.php');
			    }

			    else if($(this).attr('id') == 'sugg'){
			    	$('#main').load('sugg.php');
			    }


			    else if($(this).attr('id') == 'pat_gr'){
			    	$('#main').load('pat_groups.php');
			    }

			     else if($(this).attr('id') == 'add_mem'){
			    	$('#main').load('add_mem.php');
			    }

			    else if($(this).attr('id') == 'add_unit_leader'){
			    	$('#main').load('add_unit_leader.php');
			    	//$('#loading').hide();
			    	
			    }

			    else if($(this).attr('id') == 'view_unit_leaders'){
			    	$('#main').load('unit_leaders.php');
			    }

			});
			
		</script>


		<script>

			$("#logout_btn").click(function(){
				window.location="logout.php";
			});

		</script>












		<!-- Fades everything when a popup window appears -->
		<div id="fader"></div>

		
	</body>

</html>