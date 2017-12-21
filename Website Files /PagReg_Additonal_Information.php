<html>


	<!-- NOT SURE IF I AM KEEPING THESE PAGES -->
	
	
	<head>
		<title> Additonal Information | Pananche Entertainment </title>
	</head>
	
	<body>
		<!-- <?php
			if ($_SERVER ['REQUEST_METHOD'] == 'POST')
			{
				// Retrieve for mdata
				$error = array();
				
				if (!empty($_POST['additionalInformation']))
				{
					$additionalInformation = $_POST['additionalInformation'];
				}
				else
				{
					$error[] = "Please enter any additional information.";
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
					// Define database connection parameters
					$servername = "localhost";
					$username = "root";
					$password = "root";
					$dbname = "Pananche_Entertainment";
				
					// Create connection to database
					$conn = new mysqli($servername, $username, $password, $dbname);
				
					// Check connection
					if ($conn->connect_error)
					{
						die("Connection failed: " . $conn->connect_error);
					}
				
					// SQL to insert data to table 
				
				
					// Run query and output results
					if ($conn->query($sql) === TRUE)
					{
						echo "New record created successfully";
					}
					else
					{
						echo "Error: " . $sql . "<br>" . $conn->error;
					}
				
					// Close database connection
					$conn->close();
				}
			}
		?>-->
		
		<h1> Additonal Information </h1>
		
		<!-- Create form that will allow the user to enter their information -->
		<form action = "" method = "post">
			<table>
				<tr>
					<td> Any additional information that was not included in the application may be stated here.</td>
					<td>
						<input type = "text" name = "additionalInformation">
						<!-- UNCOMMENT BELOW FIELD
						value = <?php if(isset($_POST['additionalInformation'])) echo $_POST['additionalInformation']?>> -->
					</td>
				</tr>

			</table>
			
			<input type = "Submit">
			
		</form>
		
	</body>
	
</html>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	