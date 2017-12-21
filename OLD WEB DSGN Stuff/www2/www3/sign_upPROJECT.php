<!DOCTYPE html>
<html>
<head>
	<title> Monmouth Auto </title>
	
	<link rel="stylesheet" type="text/css" href="landingPage.css">
</head>

<body>
	<div id = "container>
	<div class = "header">
		<h1>Monmouth Auto Parts Registration System</h1>
	</div>
	
	</div>
		<div class = "clearfix">
			<div class = "column menu">
				<ul>
					<li><a href ="indexPROJECT.php">Home</a></li>
					<li>View Classes</li>
					<li><a href="sign_upPROJECT.php">Log in</a></li>
					<li>About</li>
				</ul>
			</div>
			<div class="column content">
				<?php
					include "signupPROJECT.php";
				?>
			</div>
		</div>
		
		<div class="footer">
  		<p>Monmouth Auto Parts Sales</p>
		</div>
	</div>
</body>
</html>