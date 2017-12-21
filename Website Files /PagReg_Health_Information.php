<html>


	<!-- NOT SURE IF I AM KEEPING THESE PAGES -->
	
	
	<head>
		<title> Health Information | Pananche Entertainment </title>
	</head>
	
	<body>
		<!-- <?php
			if ($_SERVER ['REQUEST_METHOD'] == 'POST')
			{
				// Retrieve for mdata
				$error = array();
				
				if (!empty($_POST['foodAllergies']))
				{
					$foodAllergies = $_POST['foodAllergies'];
				}
				else
				{
					$error[] = "Please enter your food allergies, if any.";
				}
				
				if (!empty($_POST['specialDietary']))
				{
					$specialDietary = $_POST['specialDietary'];
				}
				else
				{
					$error[] = "Please enter your special dietary needs, if any.";
				}
				
				if (!empty($_POST['vegetarian']))
				{
					$vegetarian = $_POST['vegetarian'];
				}
				else
				{
					$error[] = "Please choose whether or not you are vegetarian or not.";
				}
				
				if (!empty($_POST['handicaps']))
				{
					$handicaps = $_POST['handicaps'];
				}
				else
				{
					$error[] = "Please enter a list your handicaps, if any.";
				}
				
				if (!empty($_POST['medicine']))
				{
					$medicine = $_POST['medicine'];
				}
				else
				{
					$error[] = "Please enter a list of medicines you are taking, if any.";
				}
				
				if (!empty($_POST['physicianName']))
				{
					$physicianName = $_POST['physicianName'];
				}
				else
				{
					$error[] = "Please enter your physician's name.";
				}

				if (!empty($_POST['physicianPhone']))
				{
					$physicianPhone = $_POST['physicianPhone'];
				}
				else
				{
					$error[] = "Please enter your physician's phone. ";
				}
				
				if (!empty($_POST['healthInsurance']))
				{
					$healthInsurance = $_POST['healthInsurance'];
				}
				else
				{
					$error[] = "Please enter your health insurance provider.";
				}
				
				if (!empty($_POST['policyNumber']))
				{
					$policyNumber = $_POST['policyNumber'];
				}
				else
				{
					$error[] = "Please enter your insurance policy number.";
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
		
		<h1> Health Information </h1>
		
		<!-- Create form that will allow the user to enter their information -->
		<form action = "" method = "post">
			<table>
				<tr>
					<td> Food Allergies: </td>
					<td>
						<input type = "text" name = "foodAllergies">
						<!-- UNCOMMENT BELOW FIELD
						value = <?php if(isset($_POST['foodAllergies'])) echo $_POST['foodAllergies']?>> -->
					</td>
				</tr>
				
				<tr>
					<td> Any special dietary needs: </td>
					<td>
						<input type = "text" name = "specialDietary">
						<!-- UNCOMMENT BELOW FIELD
						value = <?php if(isset($_POST['specialDietary'])) echo $_POST['specialDietary']?>> -->
					</td>

				<tr>
					<td> Are you:</td>
					<td>
						<input type = "radio" name = "vegetarian" value = "vegetarian">Vegetarian
						<br>
						<input type = "radio" name = "vegetarian" value = "Non Vegetarian">Non-Vegetarian
						<br>
					</td>
				</tr>
				
				<tr>
					<td>List any handicaps that apply to you:</td>
					<td>
						<input type = "text" name = "handicaps">
						<!-- UNCOMMENT BELOW FIELD
						value = <?php if(isset($_POST['handicaps'])) echo $_POST['handicaps']?>> -->
					</td>
				</tr>
				
				<tr>
					<td>List any medicines you are taking:</td>
					<td>
						<input type = "text" name = "medicine">
						<!-- UNCOMMENT BELOW FIELD
						value = <?php if(isset($_POST['medicine'])) echo $_POST['medicine']?>> -->
					</td>
				</tr>				

				<tr>
					<td>Your physician's name:</td>
					<td>
						<input type = "text" name = "physicianName">
						<!-- UNCOMMENT BELOW FIELD
						value = <?php if(isset($_POST['physicianName'])) echo $_POST['physicianName']?>> -->
					</td>
				</tr>					
				
				<tr>
					<td>Your physician's phone:</td>
					<td>
						<input type = "text" name = "physicianPhone">
						<!-- UNCOMMENT BELOW FIELD
						value = <?php if(isset($_POST['physicianPhone'])) echo $_POST['physicianPhone']?>> -->
					</td>
				</tr>					
				
				<tr>
					<td>Your health insurance:</td>
					<td>
						<input type = "text" name = "healthInsurance">
						<!-- UNCOMMENT BELOW FIELD
						value = <?php if(isset($_POST['healthInsurance'])) echo $_POST['healthInsurance']?>> -->
					</td>
				</tr>					
				
				<tr>
					<td>Your insurance policy number:</td>
					<td>
						<input type = "text" name = "policyNumber">
						<!-- UNCOMMENT BELOW FIELD
						value = <?php if(isset($_POST['policyNumber'])) echo $_POST['policyNumber']?>> -->
					</td>
				</tr>					
				
			</table>
			
			<input type = "Submit">
			
		</form>
		
	</body>
	
</html>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	