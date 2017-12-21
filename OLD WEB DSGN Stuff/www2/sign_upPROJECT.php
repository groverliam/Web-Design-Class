<!DOCTYPE html>
<html>
<head>
	<title> MU Parts </title>
	<link rel="stylesheet" href="landingPagePROJECT.css" type="text/css" media="screen" />
</head>

<body>
<div id = "container">
	<div class="header">
		<h1>Monmouth University Parts Sale System</h1>
	</div>

	<div class="clearfix">
		<div class="column menu">
    		<ul>
    			<li><a href="indexPROJECT.php">Home</a></li>
      			<li>View Classes</li>
    			<li><a href="loginPROJECT.php">Log in</a></li>
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
  		<p>&copy SE357 | 2017 | 400 Cedar Ave, West Long Branch, New Jersey</p>
	</div>
</div>
</body>
</html>
