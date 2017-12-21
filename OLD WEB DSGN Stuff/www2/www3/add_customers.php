<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
	<title>Monmouth Auto Parts</title>
	<link rel = "stylesheet" href = "includes/admin.css" type = "text/css" media = "screen" />
	<meta http-equiv = "content-type" content = "text/html; charset = utf-8" />
</head>
<body>
	<div id = "container">
	<?php include("includes/header_staff.html"); ?>
	
	<div id = "content">
		<?php
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {		
						//retreive form data
						$error = array();
						
						if (!empty($_POST['companyName']))
							$companyName = $_POST['companyName'];
						else 
							$error[] = "Please enter Company Name";
							
						if (!empty($_POST['mailingAddress']))
							$mailingAddress = $_POST['mailingAddress'];	
						else 
							$error[] = "Please enter the Mailing Address";
							
						if (!empty($_POST['phoneNumber']))
							$phoneNumber = $_POST['phoneNumber'];
						else 
							$error[] = "Please enter the company Phone Number";
						
						if (!empty($_POST['email']))
							$email = $_POST['email'];
						else 
							$error[] = "Please enter the company Email";
						
						if (!empty($_POST['origin']))
							$origin = $_POST['origin'];
						else 
							$error[] = "Please enter the company Origin";
						
						if(!empty($error)){
							foreach ($error as $msg){
								echo $msg;
								echo '<br>';
							}
						}
						else {
							include "db_connection.php";
							
							// sql to insert data to table
							$sql = "INSERT INTO customer (companyName, mailingAddress, phoneNumber, email, origin)
									VALUES ('$companyName', '$mailingAddress', '$phoneNumber', '$email', '$origin')";

							if ($conn->query($sql) === TRUE) {
								echo "New record created successfully";
							} else {
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
					<td>Company Name: </td>
					<td><input type="text" name="companyName" 
						value = <?php if (isset($_POST['companyName'])) echo $companyName ?>></td>
				</tr>
				<tr>
					<td>Mailing Address: </td>
					<td><input type = "text" name = "mailingAddress" 
						value = <?php if (isset($_POST['mailingAddress'])) echo $mailingAddress ?>></td>
				</tr>
				<tr>
					<td>Phone Number: </td>
					<td><input type = "text" name = "phoneNumber" 
						value = <?php if (isset($_POST['phoneNumber'])) echo $phoneNumber ?>></td>
				</tr>
				<tr>
					<td>Email: </td>
					<td><input type = "text" name = "email" 
						value = <?php if (isset($_POST['email'])) echo $email ?>></td>
				</tr>
				<tr>
					<td>Origin: </td>
					<td><input type="radio" name="origin" value = "national">national<br>
					 <input type="radio" name="origin" value = "international">international<br>
				</tr>
			</table>
			<input type="Submit">
		</form>
		</center>
		<div id = "footer">
		<p>Copyright 2017 Monmouth Auto Parts</p>
	</div>
	</div>
</body>
</html>