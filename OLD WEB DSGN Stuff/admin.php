<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
	<title>Admin Home</title>
	<link rel = "stylesheet" href = "admin.css" type = "text/css" media = "screen" />
	<meta http-equiv = "content-type" content = "text/html; charset = utf-8" />
</head>

<body>
	<div id = "container">
	<?php include("includes/header_admin.html"); ?>
	
	<div id = "content">

		<?php
			session_start();
			if(!isset($_SESSION['uname'])) 
				header('LOCATION: login.php');
			else {
			    $uname = $_SESSION['uname'];
			    $fname = $_SESSION['fname'];
			}
			
		?>
		<h1>Welcome, <?php echo   $fname ?></h1>
		
		<p>
		At Monmouth University, everyone and everything is on the rise. Working closely
		with distinguished faculty, students are getting the attention and support they 
		need to prepare for the road ahead. In fact, this strong, personalized education
		 continues to lead students to successful careers and further academic pursuits.</p>

		<p>That’s part of why every year students choose Monmouth from a variety of top 
		private universities and east coast universities. Monmouth attracts students 
		from around the U.S. with a concentration in the northeast. Our diverse student 
		body consists of approximately 6,300 students – 4,600 undergrads and 1,700 grads. 
		We’re large enough to have dozens of majors and degree programs and a breadth of 
		student resources, yet we’re still small enough to boast low faculty-to-student 
		ratios.</p>
		
	</div>
	
	<div id = "footer">
		<p>Copyright 2015 Monmouth University</p>
	</div>
	</div>
</body>
</html>