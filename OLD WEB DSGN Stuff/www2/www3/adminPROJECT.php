<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
	<title>Admin Home</title>
	<link rel = "stylesheet" href = "includes/admin.css" type = "text/css" media = "screen" />
	<meta http-equiv = "content-type" content = "text/html; charset = utf-8" />
</head>

<body>
	<div id = "container">
	<?php include("includes/header_adminPROJECT.html"); ?>
	
	<div id = "content">

		<?php
			session_start();
			if(!isset($_SESSION['uname'])) 
				header('LOCATION: loginPROJECT.php');
			else {
			    $uname = $_SESSION['uname'];
			    $fname = $_SESSION['fname'];
			}
			
		?>
		<h1>Welcome, <?php echo   $fname ?></h1>
		
		<p>
		At Monmouth Auto Sales, we look to provide the best service. Working closely
		with distinguished managers, customers are getting the attention and support they 
		need to prepare for their auto projects. In fact, this strong, personalized assistance
		 continues to lead customers to let their friends know of their auto success.</p>

		<p>That’s part of why every year customers choose Monmouth Auto from a variety of top 
		auto providers and east coast providers. Monmouth Auto attracts customers 
		from around the world with a concentration in the northeast. Our diverse customer 
		body consists of approximately 10,000 buyers – 7,400 in country and 2,600 overseas. 
		We’re large enough to have dozens of warehouses and import docks and a breadth of 
		auto resources, yet we’re still small enough to boast low manager-to-customer 
		ratios.</p>
		
	</div>
	
	<div id = "footer">
		<p>Copyright 2017 Monmouth Auto Parts</p>
	</div>
	</div>
</body>
</html>