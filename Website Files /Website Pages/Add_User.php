<html>

	<head>
		<title>Add User | Pananche Entertainment</title>
	</head>
	
	<body>
	
		<div id = "container">
		
		<?php include("includes/Admin_Header.html"); ?>
	
		<div id = "content">
		
			<?php
				if ($_SERVER['REQUEST_METHOD'] == 'POST') 
				{		
					// Retreive form data
					$error = array();
						
					if (!empty($_POST['FirstName']))
					{
						$FirstName = $_POST['FirstName'];
					}
					else 
					{
						$error[] = "Please enter the first name.";
					}
							
					if (!empty($_POST['LastName']))
					{
						$LastName = $_POST['LastName'];
					}						
					else 
					{
						$error[] = "Please enter the last name.";
					}
							
					if (!empty($_POST['Email']))
					{
						$Email = $_POST['Email'];
					}
					else 
					{
						$error[] = "Please enter the email.";
					}
					
					
					// Add more user information
					
					
					if (!empty($_POST['Role']))
					{
						$Role = $_POST['Role'];
					}
					else
					{
						$error[] = "Please enter a role.";
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
						// DB Connection
						include "DB_Connection.php";
							
						// SQL statement to insert data into table

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

			<h1>Add Customer:</h1>
			
			<center>
			
				<form action="" method="post">
				
					<table>
						<tr>
							<td>First Name: </td>
							<td>
								<input type = "text" name = "FirstName" 
									value = <?php if (isset($_POST['FirstName'])) echo $FirstName ?>>
							</td>
						</tr>
						
						<tr>
							<td>Last Name: </td>
							<td>
								<input type = "text" name = "LastName" 
									value = <?php if (isset($_POST['LastName'])) echo $LastName ?>>
							</td>
						</tr>
						
						<tr>
							<td>Email: </td>
							<td>
								<input type = "text" name = "Email" 
									value = <?php if (isset($_POST['Email'])) echo $Email ?>>
							</td>
						</tr>
						
						
						<!-- Add more user information here -->
						
						
						<tr>
							<td>Role: </td>
							<td>
								<input type = "text" name = "Role" 
									value = <?php if (isset($_POST['Role'])) echo $Role ?>>
							</td>
						</tr>
						
					</table>
					
					<input type = "Submit" value = "Add">
					
				</form>
				
			</center>
			
		</div>
		
		</div>
		
	</body>

</html>