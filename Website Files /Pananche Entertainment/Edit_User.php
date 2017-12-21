<html>

	<body>
	
		<div id = "container">
			<?php 
				if ($Role == 'Admin')
				{
					include("Header_Admin.html"); 
				}
				else if ($Role == 'Actor')
				{
					include("Header_Actor.html"); // Make header for all USERS to have --> makes it easier
				}
				else if ($Role == 'Actress')
				{
					include("Header_Actress.html"); // Make header for all USERS to have --> makes it easier
				}
				else if ($Role == 'Director')
				{
					include("Header_Director.html"); // Make header for all USERS to have --> makes it easier
				}
				else
				{
					include("Header_Model.html"); // Make header for all USERS to have --> makes it easier
				}
			?>
		
		<div id = "content">
		
			<?php
				// Session variable check, to ensured page can only be accessed after login.
				include ("DB_Connection.php");

				// Page loaded either because: 
					// case 1: you hit the Edit Profile command
					// case 2: you hit the Update command after you work on the profile form
					
				echo '<h1>Edit Your Profile</h1>';

				if ($_SERVER['REQUEST_METHOD']=='POST')
				{ 
					//Case 2
					// Step 1: validate form data
					$errors = array(); // Initialize an error array.

					if (empty($_POST['FirstName']))
					{
						$errors[] = 'You forgot to enter your first name.';
					}
					else
					{
						$FirstName = $_POST['FirstName'];
					}

					if (empty($_POST['LastName']))
					{
						$errors[] = 'You forgot to enter your first name.';
					}
					else
					{
						$LastName = $_POST['LastName'];
					}

					if (empty($_POST['Email']))
					{
						$errors[] = 'You forgot to enter your first name.';
					}
					else
					{
						$Email = $_POST['Email'];
					}
										
					// Add checks for other parts of the profile
					// Checks will go before the error if statement 
					
					if (!empty($error))
					{
						
						foreach ($error as $msg)
						{
							echo $msg.'<br>';
						}
					}
					else
					{
						// Step 2: update record
						// Define an update query
						$sql = "UPDATE Users SET 
							FirstName = '$FirstName',
							LastName = '$LastName',
							Email = '$Email'
							WHERE username = '$username'"; 
						
						// Execute the query 
						$result = $conn->query($sql);
						
						if ($result === TRUE)
						{
							echo "Record updated successfully";
						}
						else 
						{
							echo "Error updating record: ".$conn->error;
						}
					}
				}
				else 
				{   
					// Case 1
					// Retrieve user info from table
					// Define a select query
					$sql = "SELECT * FROM user WHERE username = '$username'";		
				
					// Execute the query
					$result = $conn->query($sql);
				
					// Shoud return only one record
					if ($result->num_rows == 1)
					{
						// One record found -> right case.
						$row = $result->fetch_assoc();
					
						// Get column values to fill the form
						$FirstName = $row['FirstName'];
						$LastName = $row['LastName'];
						$Email = $row['Email'];
						
						// Add other column info before this comment
					}
					else 
					{
						echo $result->num_rows;
						echo "There is an error in the users table.";
					}
				}
			?>
		
			<!-- create a form for modifiable user info -->
			<form action = "" method = "post">
				<center>
				
				<table>
				
					<tr>
						<td>First Name:</td>
						<td>
							<input type = "text" name = FirstName
								value=<?php echo $FirstName ?> >
						</td>
					</tr>
					
					<tr>
						<td>Last Name:</td>
						<td>
							<input type = "text" name = LastName
								value=<?php echo $LastName ?> >
						</td>
					</tr>
					
					<tr>
						<td>Email:</td>
						<td>
							<input type = "text" name = Email
								value = <?php echo $Email ?> >
						</td>
					</tr>
					
					<!-- Add other column information for the form below before the update button -->
					
					<tr>
						<td></td>
						<td>
							<input type = "submit" value = "Update">
						</td>
				</table>
				
				</center>
				
			</form>
			
		</div>

		</div>
		
		<?php include("Footer.html"); ?>
		
	</body>
	
</html>





