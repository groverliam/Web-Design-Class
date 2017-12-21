<html>

	<body>
		<div id = "container">
		
		<?php include("Header_Admin.html");?>
	
		<div id = "content">
		
			<?php	
		
				session_start();
				
				if (!isset($_SESSION['username'])  && ($_SESSION['Role'] == 'Admin'))
				{
					header('LOCATION: index.html#signup');
				}
				else 
				{
					$UserID = $_GET['UserID'];
			
				}

				if ($_SERVER['REQUEST_METHOD'] == 'POST') 
				{		
					// Retreive form data
					$error = array();
						
					if (!empty($_POST['message']))
					{
						$message = $_POST['message'];
					}						
					else 
					{
						$error[] = "Please enter the email message";
					}
						
					if (!empty($error))
					{
						foreach ($error as $msg)
						{
							echo $msg;
							echo '<br>';
						}
					}
					else 
					{
						include ("DB_Connection.php");
						
						// Define a select query
						$sql = "SELECT * FROM Users WHERE username = '$username'";		
				
						// Execute the query
						$result = $conn->query($q);
					
						if ($result->num_rows == 1)
						{
							// One record found. right case.
							$row = $result->fetch_assoc();
					
							// Get column values to fill the form
							$Email = $row['Email'];
					
							$username = $_SESSION['username'];
							$UserID = $_GET['UserID'];
							//$email = $_GET['email'];
					
							$to = "$Email";
							$from = "robertdavidthompson632@gmail.com"; // CHANGE EMAIL TO COMPANY EMAIL AT LATER DATE
							$subject = "Pananche Entertainment";
							$message = $_POST['message'];
							$headers = "From:" .$from;
						
							mail($to, $subject, $message, $headers);
							
							echo "Email sent successfully.";
						}
						else 
						{
							echo $result->num_rows;
							echo "There is an error in the users table.";
						}
					}
				}
			?>
			
		<h1>Send Email:</h1>
		
		<center>
		
			<form action="" method="post">
			
				<table>
					<tr>
						<td>Message: </td>
						<td>
							<input type="text" name = "message">
						</td>
					</tr>
					
				</table>
				
				<input type="submit" value = "Send Email">
			
			</form>
		
		</center>
		
		</div>
		
		<?php include("Footer.html"); ?>
		
	</body>
	
</html>