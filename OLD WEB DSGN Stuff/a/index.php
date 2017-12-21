<!DOCTYPE html>
<html>
<head>
	<title> MU Registration </title>
	<link rel="stylesheet" href="landingPage.css" type="text/css" media="screen" />
</head>

<body>

<?php
	//clean up all session variables
	//session_start();
	//$_SESSION = array();
?>
<div id = "container">
	<div class="header">
		<h1>Monmouth University Class Registration System</h1>
	</div>

	<div class="clearfix">
		<div class="column menu">
    		<ul>
      			<li>View Classes</li>
    			<li><a href="login.php">Log in</a></li>
    			<li><a href="sign_up.php">Sign up</a></li>
      			<li>About</li>
    		</ul>
  		</div>

  		<div class="column content">
  			<img src = "includes/MU.JPG" width = "800">
  		</div>
	</div>

	<div class="footer">
  		<p>&copy SE357 | 2017 | 400 Cedar Ave, West Long Branch, New Jersey</p>
	</div>
</div>
</body>
</html>
