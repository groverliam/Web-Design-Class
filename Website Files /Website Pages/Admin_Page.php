<html>

	<head>
		<title>Admin Home | Pananche Entertainment</title>

	</head>

	<body>
		<div id = "container">
		
			<?php include("includes/Admin_Header.html"); ?>
	
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
					Admin basic functionality information will go here. Keep simple and understandable
					Make sure header lines up correctly.
				</p>

			</div>
	
		</div>

	</body>
		
</html>