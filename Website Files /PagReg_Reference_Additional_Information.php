<html>

	<head>
		<title> Reference Information | Pananche Entertainment </title>
	</head>
	
	<body>
		<?php
			if ($_SERVER ['REQUEST_METHOD'] == 'POST')
			{
				// Retrieve for mdata
				$error = array();
				
				if (!empty($_POST['ref1FirstLast']))
				{
					$ref1FirstLast = $_POST['ref1FirstLast'];
				}
				else
				{
					$error[] = "Please enter your references first and last name.";
				}
				
				if (!empty($_POST['ref1Relationship']))
				{
					$ref1Relationship = $_POST['ref1Relationship'];
				}
				else
				{
					$error[] = "Please enter your relationship to your reference.";
				}
				
				if (!empty($_POST['ref1PhoneNum']))
				{
					$ref1PhoneNum = $_POST['ref1PhoneNum'];
				}
				else
				{
					$error[] = "Please enter your reference's phone number.";
				}
				
				if (!empty($_POST['ref1Email']))
				{
					$ref1Email = $_POST['ref1Email'];
				}
				else
				{
					$error[] = "Please enter your reference's email.";
				}
				
				if (!empty($_POST['ref2FirstLast']))
				{
					$ref2FirstLast = $_POST['ref2FirstLast'];
				}
				else
				{
					$error[] = "Please enter your references first and last name.";
				}
				
				if (!empty($_POST['ref2Relationship']))
				{
					$ref2Relationship = $_POST['ref2Relationship'];
				}
				else
				{
					$error[] = "Please enter your relationship to your reference.";
				}
				
				if (!empty($_POST['ref2PhoneNum']))
				{
					$ref2PhoneNum = $_POST['ref2PhoneNum'];
				}
				else
				{
					$error[] = "Please enter your reference's phone number.";
				}
				
				if (!empty($_POST['ref2Email']))
				{
					$ref2Email = $_POST['ref2Email'];
				}
				else
				{
					$error[] = "Please enter your reference's email.";
				}
				
								
				if (!empty($_POST['additionalInformation']))
				{
					$additionalInformation = $_POST['additionalInformation'];
				}
				else
				{
					$additonalInformation = NULL;
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
					$sql  = "INSERT INTO PagReg_References_Additional_Info (Ref1_FirstLast, Ref1_Relationship, Ref1_PhoneNumber, Ref1_Email, 
																			Ref2_FirstLast, Ref2_Relationship, Ref2_PhoneNumber, Ref2_Email,
																			Additional_Info)
																	VALUES('$ref1FirstLast', '$ref1Relationship', '$ref1PhoneNum', '$ref1Email',
																			'$ref2FirstLast', '$ref2Relationship', '$ref2PhoneNum', '$ref2Email',
																			'$additionalInformation')";				
				
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
		?>
		
		<h1> Reference Information </h1>
		
		<!-- Create form that will allow the user to enter their information -->
		<form action = "" method = "post">
			<h3> Reference 1 </h3>
			
			<table>
				<tr>
					<td> First and Last Name:</td>
					<td>
						<input type = "text" name = "ref1FirstLast"
						value = <?php if(isset($_POST['ref1FirstLast'])) echo $_POST['ref1FirstLast']?>>
					</td>
				</tr>

				<tr>
					<td> Relationship:</td>
					<td>
						<input type = "text" name = "ref1Relationship"
						value = <?php if(isset($_POST['ref1Relationship'])) echo $_POST['ref1Relationship']?>>
					</td>
				</tr>				

				<tr>
					<td> Phone Number:</td>
					<td>
						<input type = "text" name = "ref1PhoneNum"
						value = <?php if(isset($_POST['ref1PhoneNum'])) echo $_POST['ref1PhoneNum']?>>
					</td>
				</tr>	
				
				<tr>
					<td> Email:</td>
					<td>
						<input type = "email" name = "ref1Email"
						value = <?php if(isset($_POST['ref1Email'])) echo $_POST['ref1Email']?>> 
					</td>
				</tr>

			</table>
			
			
			<h3> Reference 2 </h3>
			
			<table>
				<tr>
					<td> First and Last Name:</td>
					<td>
						<input type = "text" name = "ref2FirstLast"
						value = <?php if(isset($_POST['ref2FirstLast'])) echo $_POST['ref2FirstLast']?>>
					</td>
				</tr>

				<tr>
					<td> Relationship:</td>
					<td>
						<input type = "text" name = "ref2Relationship"
						value = <?php if(isset($_POST['ref2Relationship'])) echo $_POST['ref2Relationship']?>>
					</td>
				</tr>				

				<tr>
					<td> Phone Number:</td>
					<td>
						<input type = "text" name = "ref2PhoneNum"
						value = <?php if(isset($_POST['ref2PhoneNum'])) echo $_POST['ref2PhoneNum']?>> 
					</td>
				</tr>	
				
				<tr>
					<td> Email:</td>
					<td>
						<input type = "email" name = "ref2Email"
						value = <?php if(isset($_POST['ref2Email'])) echo $_POST['ref2Email']?>>
					</td>
				</tr>

			</table>
			
			
			<h3> Additional Information </h3>
				<tr>
					<td> Any additional information that was not included in the application may be stated here.</td>
					<td>
						<input type = "text" name = "additionalInformation"
						value = <?php if(isset($_POST['additionalInformation'])) echo $_POST['additionalInformation']?>>
						<br>
					</td>
				</tr>

			</table>			
			
			<input type = "Submit">
			
		</form>		
		
	</body>
	
</html>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	