<html>

	<body>
		<div id = "container">
		
			<?php include("Header_Admin.html"); ?>
	
			<div id = "content">

				<?php
					session_start();
					
					if(!isset($_SESSION['username']))
					{						
						header('LOCATION: index.html#signup');
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

		<?php include("Footer.html"); ?>
		
	</body>
		
</html>