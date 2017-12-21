<html>
<head>
	<title> Monmouth Auto </title>

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
		else{
			//connect to db
			include("db_connection.php");
			$q = "SELECT * FROM user WHERE uname = '$uname'";
			$result = $conn->query($q); //execute select
			
			if ($result->num_rows == 1){
				//one record found. right case.
				$row = $result->fetch_assoc();
			
				//get column values to use in the form
				$email = $row['email'];
						
				//Generate random string
				$temp = rand();
				$temp2 = sha1($temp);
				
				//Update the users table with the temporal password (be sure to apply sha1()) for the user.
				$update = "UPDATE user SET pword = '$temp2' 
								WHERE uname = '$uname'";
						
				//execute the query
				$res = $conn->query($update);	
				if ($result === TRUE){
					echo "Password Reset";
				}
				else{
					//Compose an email that contains: 
						//a. The URL of the login page
						//b. The temporal password (the 6-digit plan text)
					//The user’s email address can be retrieved from the users table.
					$to = "$email";
					$from = "akiroha@yahoo.com";
					$subject = "Password Reset";
					$message = "Click this link to log in: http://aristotleii.monmouth.edu/~s0969691/login.php
							This is your new password: $temp";
					$headers = "From:" .$from;
					
					mail($to,$subject,$message,$headers);
					echo "Mail sent.";
				}
			}
			else {
				echo $result->num_rows;
    			echo "there is an error in the users table.";
			}
		}
	}
?>
	<div id = "container">
	<div class="header">
		<h1>Monmouth Auto Parts Sales System</h1>
	</div>
		
	<div class="clearfix">
		<div class="column menu">
			<ul>
				<li><a href="indexPROJECT.php">Home</a></li>
				<li>View Classes</li>
				<li><a href="sign_upPROJECT.php">Sign up</a></li>
				<li>About</li>
			</ul>
			<br><br>
		
			<form action = "" method = "post">
					<p> Reset Password </p>
					<p> User name:</p>
					<p> <input type = "text" name = "uname">	
					<p> <input type = "submit" value = "Reset">
				</form>
		</div>
  		

  		<div class="column content">
  			<img src = "includes/AutoParts.JPG" width = "800">
  		</div>
	</div>

	<div class="footer">
  		<p>Copyright 2017 Monmouth Auto Parts</p>
	</div>
	</div>
</body>
</html>
