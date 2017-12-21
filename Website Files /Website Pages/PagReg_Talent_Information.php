<html>


	<!-- NOT SURE IF I AM KEEPING THESE PAGES -->
	
	
	<head>
		<title> Talent Information | Pananche Entertainment </title>
	</head>
	
	<body>
		<!-- <?php
			if ($_SERVER ['REQUEST_METHOD'] == 'POST')
			{
				// Retrieve for mdata
				$error = array();
				
				if (!empty($_POST['talentInfo']))
				{
					$talentInfo = $_POST['talentInfo'];
				}
				else
				{
					$error[] = "Please enter your talent information";
				}
				
				if (!empty($_POST['specialReqs']))
				{
					$specialReqs = $_POST['specialReqs'];
				}
				else
				{
					$error[] = "Please choose or enter if you need a special requirement";
				}
				
				if (!empty($_POST['music']))
				{
					$music = $_POST['music'];
				}
				else
				{
					$error[] = "Please choose if you are performing your talent to music";
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
		
		<h1> Talent Information </h1>
		
		<!-- Create form that will allow the user to enter their information -->
		<form action = "" method = "post">
			<table>
				<tr>
					<td> Describe the talent you will be performing. Please be specific.</td>
					<td>
						<input type = "text" name = "talentInfo">
						<!-- UNCOMMENT BELOW FIELD
						value = <?php if(isset($_POST['talentInfo'])) echo $_POST['talentInfo']?>> -->
					</td>
				</tr>

				<tr>
					<td> Special Requirements:</td>
					<td>
						<input type = "radio" name = "specialReqs" value = "Microphone">Microphone
						<br>
						<input type = "radio" name = "specialReqs" value = "MicrophonePodium">Microphone and Podium
						<br>
						<input type = "text" name = "SpecialReqs" value = "Other">
						<br>
					</td>
				</tr>
				
				<tr>
					<td>
						I will be performing my talent to recorded music.
						<br>
						(Please bring two copies of the professionally 
						<br>
						recorded music with your name clearly written on them. 
						<br>
						These CD's will become property of IFC.)
					</td>
					<td>
						<input type = "checkbox" name = "music" value = "music">
					</td>
				</tr>

			</table>
			
			<input type = "Submit">
			
		</form>
		
	</body>
	
</html>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	