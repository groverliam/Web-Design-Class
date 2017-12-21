<html>

	<head>
		<title> Signup | Pananche Entertainment </title>
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
					$password= sha1($_POST['password']);
				}
				else
				{
					$error[] = "Please enter password.";
				}
			
				if (!empty($_POST['password2']))
				{
					$password2= sha1($_POST['password2']);
				}
				else 
				{
					$error[] = "Please confirm password.";
				}
				
				if ($password != $password2)
				{
					$error[] = "Passwords do not match.";
				}
				
				if (!empty($_POST['FirstName']))
				{
					$FirstName = $_POST['FirstName'];
				}
				else
				{
					$error[] = "Please enter first name.";
				}
			
				if (!empty($_POST['LastName']))
				{
					$LastName = $_POST['LastName'];
				}
				else
				{
					$error[] = "Please enter last name.";
				}
			
				if (!empty($_POST['Email']))
				{
					$Email = $_POST['Email'];
				}
				else 
				{
					$error[] = "Please enter email.";
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
					// Defines DB
					include "DB_Connection.php";

					// SQL Insert Statement
					

					if ($conn->query($sql) === TRUE) 
					{
						echo "New record created successfully";
					} 
					else 
					{
						echo "Error: " . $sql . "<br>" . $conn->error;
					}

					$conn->close();	
				}
			}
		?> 
		
		
			<form action="" method="post">
			
				<table>
				
					<tr>
						<td>User Name: </td>
						<td>
							<input type="text" name="username"
								value= <?php if(isset($_POST['username'])) echo $_POST['username'] ?>>
						</td>
					</tr>
					
					<tr>
						<td>Password: </td>
						<td>
							<input type="password" name="password">
						</td>
					</tr>
					
					<tr>
						<td>Confirm Password: </td>
						<td>
							<input type="password" name="password2">
						</td>
					</tr>
					
					<tr>
						<td>First Name: </td>
						<td>
							<input type="text" name="FirstName"
								value=<?php if(isset($_POST['FirstName'])) echo $_POST['FirstName'] ?>>
						</td>
					</tr>
					
					<tr>
						<td>Last Name: </td>
						<td>
							<input type="text" name="LastName"
								value=<?php if(isset($_POST['LastName'])) echo $_POST['LastName'] ?>>
						</td>
					</tr>
					
					<tr>
						<td>Email: </td>
						<td>
							<input type = "email" name = "Email"
								value= <?php if(isset($_POST['Email'])) echo $_POST['Email'] ?>>
						</td>
					</tr>
					
					<tr>
						<td>Role: </td>
						<td>
							<input type="radio" name="Role" value = "Actor">Actor<br>
							<input type="radio" name="Role" value = "Actress">Actress<br>
							<input type="radio" name="Role" value = "Director">Director<br>
							<input type="radio" name="Role" value = "Model">Model<br>
						</td> <!-- In DB, make role of admin.. "Admin" so that the admin can login to their specific page -->
					</tr>
					
				</table>
				
				<input type="Submit">
				
			</form>

	</body>
	
</html>