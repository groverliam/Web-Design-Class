<!DOCTYPE html>
<html lang="en">

	<body>
		<?php
			include ("Header_Main.html");
			
			if ($_SERVER['REQUEST_METHOD']=='POST')
			{
				//retrieve form data
				$error = array();
			
				if (!empty($_POST['username']))
				{
					$username = $_POST['username'];
				}
				else 
				{
					$error[] = "Please enter user name.";
				}
				
				if(!empty($error))
				{
					foreach ($error as $msg)
					{
						echo $msg;
						echo '<br>';
					}
				}
				else
				{
					// Connect to db
					include ("DB_Connection.php");
					
					$sql = "SELECT * FROM Users WHERE username = '$username'";
					
					$result = $conn->query($sql); //execute select
			
					if ($result->num_rows == 1)
					{
						// One record found --> right case.
						$row = $result->fetch_assoc();
			
						// Get column values to use in the form
						$Email = $row['Email'];
						
						// Generate random string
						$temp = rand();
						$temp2 = sha1($temp);
				
						//Update the users table with the temporal password (be sure to apply sha1()) for the user.
						$update = "UPDATE user SET password = '$temp2' 
										WHERE username = '$username'";
						
						// Execute the query
						$res = $conn->query($update);
						
						if ($result === TRUE)
						{
							echo "Password Reset";
						}
						else
						{
							//Compose an email that contains: 
								//a. The URL of the login page
								//b. The temporal password (the 6-digit plan text)
							//The user’s email address can be retrieved from the users table.
							
							$to = "$Email";
							$from = "robertdavidthompson632@gmail.com"; // CHANGE EMAIL TO COMPANY EMAIL AT LATER DATE
							$subject = "Password Reset";
							
							// Change link to login page of OUR website
							
							$message = "Click this link to log in: http://aristotleii.monmouth.edu/~s0969691/login.php
									This is your new password: $temp";
							$headers = "From:" .$from;
					
							mail($to, $subject, $message, $headers);
							
							echo "Email sent successfully.";
						}
					}
					else 
					{
						echo "Record: " .$result->num_rows;
						echo "<br>";
						echo "There is an error in the users table.";
					}
				}
			}
		?>
		
		
		
		<div id = "container">
		
		<div class="clearfix">
		
			<!-- Going to delete this menu as we will have a header for all basic users to have when resetting password
			<div class="column menu">
			
				<ul>
					<li><a href="Index.html">Home</a></li>
					<li>View Classes</li>
					<li><a href="sign_upPROJECT.php">Sign up</a></li>
					<li>About</li>
				</ul>
				
				<br><br>
			</div>
			-->
			<br><br><br><br><br><br><br><br>
			
			<form action = "" method = "post">
				<center>
				
				<h1> Reset Password </h1>
				
				<p> Username:</p>
				<p> <input type = "text" name = "username">	
				<p> <input type = "submit" value = "Reset">
				
				</center>
				
			</form>
  		
		</div>

		</div>
		
		<?php include("Footer.html"); ?>
		
	</body>

</html>
