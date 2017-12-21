<html>

	<head>
	
		<title>Actor Home | Pananche Entertainment</title>
		
	</head>

	<body>
	
			<div id = "header">
		
			<h2>Actor Home</h2>

		</div>
		
		<div id = "navigation">
		
			<ul>
			
				<li><a href = "Actor_Page.php">Home</a></li>
				<li><a href = "Edit_Profile.php">Edit Profile</a></li>
				<li><a href = "Change_Password.php">Change Password</a></li>
				<li><a href = "Edit_Pictures.php">View Pictures</a></li> <!-- ADD PAGE FOR THIS -->
				<li><a href = "Add_Pictures.php">Upload Pictures</a></li> <!-- ADD PAGE FOR THIS -->
				<li><a href = "Edit_Videos.php">View Videos</a></li> <!-- ADD PAGE FOR THIS -->
				<li><a href = "Add_Videos.php">Upload Videos</a></li> <!-- ADD PAGE FOR THIS -->
				<li><a href = "Opportunities.php">View Opportunities</a></li> <!-- ADD PAGE FOR THIS (Payment feature will be included on this page) -->
				<li><a href = "Upcoming_Events.php">View Upcoming Events</a></li> <!-- ADD PAGE FOR THIS (ONLY CAN ACCESS ONCE ACTIVE ACCOUNT) -->
				<li><a href = "Index.html">Logout</a></li>
				
			</ul>
			
		</div>
		
		<div id = "container">
		
			<?php include("Actor_Header.html"); ?>
	
			<div id = "content">

				<?php
					session_start();
					if(!isset($_SESSION['username']))
					{						
						header('LOCATION: Login.php');
					}
					else 
					{
						$username = $_SESSION['username'];
					}
			
				?>
				
				<h1>Welcome, <?php echo   $username ?> </h1>
		
				<p>
					Actor basic functionality information will go here. Keep simple and understandable
					Make sure header lines up correctly.
				</p>

			</div>
	
		</div>

	</body>
		
</html>