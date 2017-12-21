<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
	<title>Monmouth Auto Parts</title>
	<link rel = "stylesheet" href = "includes/admin.css" type = "text/css" media = "screen" />
	<meta http-equiv = "content-type" content = "text/html; charset = utf-8" />
</head>

<body>
	<div id = "container">
			<?php
			//session variable check, to ensured page can only be accessed after login.
			session_start();
			if (!isset($_SESSION['uname'])){
				header('LOCATION: loginPROJECT.php');
			}
			else {
				$customerID = $_GET['customerID'];
				
			}
			
			//connect to DB
			//first define database connection parameters
			include("db_connection.php");
			
			//create connection
			$conn = new mysqli($servername, $username, $password, $dbname);

			//check connection
			if ($conn->connect_error) {
    			//die("Connection failed: " . $conn->connect_error);
			} 

			//page loaded either because: case 1: you hit the Edit Prifle command
			//or case 2: you hit the Update command after you work on the profile form
			

			if ($_SERVER['REQUEST_METHOD']=='POST'){  //case 2
				//step 1: validate form data
				$errors = array(); // Initialize an error array.

				if (empty($_POST['companyName']))
					$errors[] = 'You forgot to enter the Company Name.';
				else
					$companyName = $_POST['companyName'];

				if (empty($_POST['mailingAddress']))
					$errors[] = 'You forgot to enter the Mailing Address.';
				else
					$mailingAddress = $_POST['mailingAddress'];
					
				if (empty($_POST['phoneNumber']))
					$errors[] = 'You forgot to enter the Phone Number';
				else{
					$phoneNumber = $_POST['phoneNumber'];
				}
				
				if (empty($_POST['email']))
					$errors[] = 'You forgot to enter the Company email.';
				else
					$email = $_POST['email'];

				if(!empty($error)){
					foreach ($error as $msg)
						echo $msg.'<br>';
				}
				else{
					//step 2: update record
					//define an update query
					$q = "UPDATE customer SET 
						companyName='$companyName',
						mailingAddress='$mailingAddress',
						phoneNumber='$phoneNumber',
						email='$email',
						WHERE customerID = '$customerID'"; 
						
					//execute the query 
					$result = $conn->query($q);
					if ($result === TRUE)
    					echo "Record updated successfully";
					else 
    					echo "Error updating record: ".$conn->error;
				}
			}
			else {   //case 1
				//retrieve user info from table
				//define a select query
				$q = "SELECT * FROM customer WHERE customerID = '$customerID'";		
				
				//execute the query
				$result = $conn->query($q);
				
				//shoud return only one record
				if ($result->num_rows == 1){
					//one record found. right case.
					$row = $result->fetch_assoc();
					
					//get column values to fill the form
					$companyName = $row['companyName'];
					$mailingAddress = $row['mailingAddress'];
					$phoneNumber = $row['phoneNumber'];
					$email = $row['email'];
    			}
    			else {
    				echo $result->num_rows;
    				echo "there is an error in the classes table.";
    			}
    		}
		?>
	
	<div id = "content">

		<?php include("includes/header_staff.html"); 
		echo '<h1>Edit Customer</h1>';
		?>
		<!-- create a form for modifiable user info -->
		<form action = "" method = "post">
			<center><table>
			<tr>
				<td>Company Name:</td>
				<td><input type="text" name=companyName
				       value=<?php echo $companyName ?> ></td>
			</tr>
			<tr>
				<td>Mailing Address:</td>
				<td><input type="text" name=mailingAddress
				       value=<?php echo $mailingAddress ?> ></td>
			</tr>
			<tr>
				<td>Phone Number:</td>
				<td><input type="text" name=phoneNumber
				       value='<?php echo $phoneNumber ?>' ></td> <!-- note the quotes -->
			</tr>
			<tr>
				<td>Email: </td>
				<td><input type="text" name=email
				       value=<?php echo $email ?> ></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Update"></td>
			</table></center>
		</form>
	</div>
	<div id = "footer">
		<p>Copyright 2017 Monmouth Auto Parts</p>
	</div>
	</div>
</body>
</html>





