<!DOCTYPE html>
<html>
<head>
	<title> MU Registration </title>
	<link rel="stylesheet" href="landingPage.css" type="text/css" media="screen" />
</head>

<body>

<?php
	setcookie('mycookie', '', time()-3600);
	//clean up all session variables
	session_start();
	$_SESSION = array();
?>
<div id = "container">
	<div class = "header">
		<h1>Monmouth Auto Parts Sales System</h1>
	</div>
	
	<div class="clearfix">
		<div class="column menu">
			<ul>
				<li>View Classes</li>
				<li><a href="loginPROJECT.php">Log in</a></li>
				<li><a href="signupPROJECT.php">Sign up</a></li>
				<li>About</li>
			</ul>
		</div>
		
		<div class ="column content">
			<img src = "includes/AutoParts.JPG" width = "800">
		</div>
	</div>
	
	<div class="footer">
		<p>&copy MUAuto | 2017 | 400 Cedar Ave, West Long Branch, New Jersey</p>
	</div>
</div>
</body>
</html>