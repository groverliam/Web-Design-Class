<html>

	<head>
		<title> Login | Pananche Entertainment</title>
	</head>

	<body>
	<!--
		<?php	
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
			
				if (!empty($_POST['password']))
				{
					$password = sha1($_POST['password']);
				}
				else 
				{
					$error[] = "Please enter password.";
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
					// Connection to the DB
					include("DB_Connection.php");
			
					// SQL statement to select the user with the given username
					$sql = "SELECT * FROM user WHERE Username = '$username'";
			
					// Executes SQL select statement
					$result = $conn->query($sql);
					
					// Checks to see if there is at least one record of the user in the DB
					if ($result->num_rows > 0) 
					{
						// Checks to see if the number of users for the username is only one 
						if ($result->num_rows == 1)
						{
							// One record found - checks role to bring up correct page
							$row = $result->fetch_assoc();
	
							// Checks to see if the password entered matches the one for the user
							if ($row['password'] == $password)
							{
								// Update the user's last login time 
								$update = "UPDATE user SET LastLogin = now() WHERE Username = '$Username'";
									
								$res = $conn->query($update); 
						
								// Lets the user login 
								// Starts the session
								session_start();
						
								// Sets the session varables
								$_SESSION['Username'] = $Username;
								$_SESSION['FirstName'] = $row['FirstName'];			
								$_SESSION['Role'] = $row['Role'];				
						
								// Checks the role
								if ($row['Role'] == 'Admin')
								{
									header('LOCATION: Admin_Page.php');
								}
								else if($row['Role'] == 'Actor')
								{
									header('LOCATION: Actor_Page.php');
								}
								else if ($row['Role'] == 'Actress')
								{
									header('LOCATION: Actress_Page.php');
								}
								else if ($row['Role'] == 'Model')
								{
									header('LOCATION: Model_Page.php');
								}					
								else 
								{
									header('LOCATION: Director_Page.php');
								}
								
							}
							else 
							{
								echo "Either username or password does not match.";
							}		
						}
						else 
						{
							echo "More than one record found with the same user name. DB corrupted.";
						}

					} 
					else 
					{
						echo "User name not found in database.";
					}
				}
			}

		?> 
		-->

    		<form action = "" method = "post">
			
  				<p> Username:</p>
  				<p> <input type = "text" name = "usernmame">
				
    			<p> Password:</p>
  				<p> <input type = "password" name = "password">	
				
  				<p> <input type = "submit" value = "Login">
				
  			</form>		
  			
  			<br><p>Forgot your Password? <a href="Reset_Password.php"><font color="black"> Click here</font></a></p>

	</body>
	
</html>
