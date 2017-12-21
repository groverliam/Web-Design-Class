<html>
	<head>
		<title> Admin Login </title>
	</head>

	<body>
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
					$password= $_POST['password'];
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
					
					// Create session variables
					$servername = "localhost";
					$username = "root";
					$password = "root";
					$dbname = "Pananche_Entertainment";
	
					// Create database connection
					$conn = new mysqli($servername, $username, $password, $dbname);
	
					// Check database connection
					if ($conn->connect_error)
					{
						die("Connection failed: " . $conn->connect_error);
					}
					
					// SQL Statement
					$sql = "SELECT * FROM Users WHERE username = '$username'";

					// Executes query statement
					$result = $conn->query($sql);
					
					if ($result->num_rows > 0) 
					{
						if ($result->num_rows == 1)
						{
							// One record is found, which will be the admin login
							$row = $result->fetch_assoc();
	
							if ($row['password'] == $password)
							{
								// Let user login 
								// Set session start
								session_start();
						
								// Set session variables
								$_SESSION['username'] = $username;
								header('testAdminPage.php');
							}
							else 
							{
								echo "Only admins are allowed to log in.";
							}		
						}
						else 
						{
							echo "More than one record found with the same user name. DB corrupted.";
						}

					} 
					else 
					{
						echo "Only admins are allowed to log in.";
					}
				}
			}

		?>

		<h1> Administration Login </h1>
		
		<form action = "" method = "post">
  				<p> User Name:</p>
					<p> <input type = "text" name = "username">
    			<p> Password:</p>
					<p> <input type = "password" name = "password">	
  				<p> 
					<input type = "submit" value = "Login">
  		</form>		

	</body>
	
</html>
