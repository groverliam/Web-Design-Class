<html>

	<head>
		<title>Pananche Entertainment</title>
	</head>

	<body>	
	
		<div id = "container">	
		
			<?php
				// Session control
				session_start();
				
				if (!isset($_SESSION['username']))
				{
					header('LOCATION: Login.php');
				}
				else 
				{
					$username = $_SESSION['username'];
					$FirstName = $_SESSION['FirstName'];
					$Role = $_SESSION['Role'];
				}
			
				if ($Role == 'Admin')
				{
					include("includes/Admin_Header.html"); 
				}
				else 
				{					
					include("includes/.html"); // Add basic header for users 
				}
			?>

 
		<div id = "content">
		
		<?php
			
			// DB connection
			include("DB_Connection.php");
			
			if ($_SERVER['REQUEST_METHOD'] == 'POST')  
			{	
				$old = $_POST['old'];
				$new = $_POST['new'];
				$new2= $_POST['new2'];
			
				// Define an array of error
				$error = array();

				if (empty($old)) 
				{
					$error[] = "Please input your old password!";
				}
				
				if (empty($new)) 
				{
					$error[] = "Please enter a new password!";
				}
				
				if (empty($new2)) 
				{
					$error[] = "Please confirm new password!";
				}
				
				if ($new != $new2)
				{
					$error[] = "New password does not match confirm password.";
				}
				
				if (empty($error)) 
				{	
					$sql = "SELECT * FROM Users WHERE username = '$username'";
					
					$r = $conn->query($q);
				
					$row = $r->fetch_assoc();

					$old = sha1($old);
					$new = sha1($new);

					if ($row['pword']== $old)
					{
						// Define an update query
						$update = "UPDATE user SET password = '$new'
									WHERE username = '$username'"; 
						
						$r= $conn->query($update);
					
						if ($r) 
						{
							echo "Password updated!";
						}
						
						else 
						{
							echo "Update failed";
						}
					}
					else 
					{
						echo 'You entered wrong password.';
					}
				}
				else 
				{
					foreach($error as $msg) 
					{
						echo $msg;
					}
				}	
			}
		?>

		<h1> Change Password: </h1>
		
			<form action = "" method = "POST">
			
				<br>
				<center>
				<table>
				
					<tr>
						<td>Old Password:</td>
						<td>
							<input type = "password" name = "old">
						</td>					
					</tr>
					
					<tr>
						<td>New Password:</td>
						<td>
							<input type = "password" name = "new">
						</td>
					</tr>
					
					<tr>
						<td>Confirm Password:</td>
						<td>
							<input type = "password" name = "new2">
						</td>
					</tr>
					
				</table>
				</center>
				
				<p>
					<center>
				
						<input type = "submit" value = "Update">
				
					</center>
				</p>
				
			</form>
	
		</div> 
  
		</div>

	</body>
	
</html>