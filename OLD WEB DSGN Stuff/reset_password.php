<!DOCTYPE html>
<html>
<head>
	<title> MU Registration </title>

	<link rel="stylesheet" type="text/css" href="landingPage.css">
</head>

<body>
<?php	
	if ($_SERVER['REQUEST_METHOD']=='POST'){		
		//retrieve form data
		$error = array();
		
		if (!empty($_POST['uname']))
			$uname = $_POST['uname'];
		else 
			$error[] = "Please enter user name.";
			
			
		if(!empty($error)){
			foreach ($error as $msg){
				echo $msg;
				echo '<br>';
			}
		}
		else {
			include ("includes/db_connection.php");
			
			$q = "SELECT * FROM users WHERE uname = '$uname'";
			
			$result = $conn->query($q); //execute select
			if ($result->num_rows > 0) {
				if ($result->num_rows == 1){
					//one record found. right case.
					$row = $result->fetch_assoc();
					if ($row['uname'] == $uname){
						
							$psword = sha1((rand(100000,999999)));
							
							$update = "UPDATE users SET psword = '$psword', 
							WHERE email = '$email'"; 
							$r= $conn->query($update);
							if ($r) echo "Successful!";
							else echo "Update failed";
							$email = $row['email'];
							$message = "Go to http://localhost:8888/login.php. Your password has been temporarily changed to" . $psword;
							$header = "From s1004312@monmouth.edu"; 
							if(mail($email, "password", $message, $header)){
								echo "Your Password has been sent to your email id";
							}else{
								echo "Failed to Recover your password, try again";
							}
							}
					else {
						echo "No username that matches.";
						
						}	
						
					}		
				
				else {
					echo "More than one record found with the same user name. DB corrupted.";
				}

			} 
			else {
				echo "User name not found in database.";
			}
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
  				<p> <input type = "uname" name = "uname">
    				
  				<p> <input type = "submit" value = "Login">
  			</form>		
	<br><p>Forgot your password? <a href="reset_password.php"><font color="black"> Click here</font></a></p>
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
