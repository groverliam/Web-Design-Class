<!DOCTYPE html>
<html>
<head>
	<title> MU Registration </title>

	<link rel="stylesheet" type="text/css" href="landingPage.css">
</head>

<body>
<?php

	if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
		$error = array();

		if(!empty($_POST['uname']))
			$uname = $_POST['uname'];
		else
			$error[] = "Username is not entered.";
			
		if(!empty($_POST['psword']))
			$psword= sha1($_POST['psword']);
		else
			$error[] = "Password is not entered.";
			
			$a = 0;
		$count += 1;
			if(!empty($error))
			foreach($error as $msg) 
			{ 
				echo $msg;
				echo '<br>';
			}
				// Create connection
			
		}
		else
		{
		
		// Define dtabase connection parameters
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "REG";
		
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		if ($conn->connect_error) 
		{
   			die("Connection failed: " . $conn->connect_error);
		} 
		
		$q = "SELECT * FROM users WHERE uname = '$uname'";
		
		$result = $conn->query($q); //execute select
		if ($result->num_rows > 0) 
		{
    		if ($result->num_rows == 1)
    		{
    			//one record found. Right case.
    			$row = $result->fetch_assoc();
    			if ($row['psword'] != $psword)
    			{
    				echo "Either username or password does not match.";
    			}
    			
    			else
    			{
    				
    				//Let user log in.
    				//set session variable
    				session_start();
    				
    				//Start seesion variables
    				$_SESSION['uname'] = $uname;
    				$_SESSION['fname'] = $row['fname'];
					
    				//check role	
    				
    					header('LOCATION: home.php');
    				
    				
    				
    				
    			}
    		}
    		
    		else
    		{
    			echo "More than one record found with the same username. DB corrupted.";
    		}

		}
		else 
		{
  			echo "Username not found in database.";
		}
		
	}
		
		
		
	
?>
	<div id = "container">
	<div class="header">
		<h1>Monmouth University Class Registration System</h1>
	</div>

	<div class="clearfix">
		<div class="column menu">
    		<ul>
    			<li><a href="index.php">Home</a></li>
      			<li>View Classes</li>
      			<li><a href="sign_up.php">Sign up</a></li>
      			<li>About</li>
    		</ul>
    		<br><br>
    		<form action = "" method = "post">
  				<p> User name:</p>
  				<p> <input type = "text" name = "uname"
  				value = <?php if (isset($_POST['uname'])) echo $uname ?>>
    			<p> Password:</p>
  				<p> <input type = "password" name = "psword">	
  				
  				<p> <input type = "submit" value = "Login">
  			</form>		

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
