  <html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Add Goods</title>
	<link rel="stylesheet" href="includes/admin.css" type="text/css" media="screen" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<body>
<?php
	include("includes/header_staff.html");
	
	if ($_SERVER['REQUEST_METHOD']=='POST'){		
		//retrieve form data
		$error = array();
		
		if (!empty($_POST['companyName']))
			$companyName = $_POST['companyName'];
		else 
			$error[] = "Please enter shipment ID.";
		if (!empty($_POST['good1']))
			$good1 = $_POST['good1'];
		else 
			$error[] = "Please enter good.";
			
		if (!empty($_POST['quantity1']))
			$quantity1 = $_POST['quantity1'];
		else 
			$error[] = "Please enter quantity.";
			
		if (!empty($_POST['good2']))
			$good2 = $_POST['good2'];
		else
			$good2 = null;
			
		if (!empty($_POST['quantity2']))
			$quantity2 = $_POST['quantity2'];
		else
			$quantity2 = null;
			
		if (!empty($_POST['good3']))
			$good3 = $_POST['good3'];
		else
			$good3 = null;
			
		if (!empty($_POST['quantity3']))
			$quantity3 = $_POST['quantity3'];
		else
			$quantity3 = null;
			
		if (!empty($_POST['good4']))
			$good4 = $_POST['good4'];
		else
			$good4 = null;
			
		if (!empty($_POST['quantity4']))
			$quantity4 = $_POST['quantity4'];
		else
			$quantity4 = null;
			
		if(!empty($error)){
			foreach ($error as $msg){
				echo $msg;
				echo '<br>';
			}
		}
		else {
			include ("includes/db_connection.php");
			
			$q = "SELECT * FROM customer WHERE companyName = '$companyName'";
			$result = $conn->query($q); //execute select
			
			if ($result->num_rows == 1){
				//one record found. right case.
				$row = $result->fetch_assoc();
			
				//get column values to use in the form
				$email = $row['email'];
						
				//Compose an email that contains: 
					//a. The URL of the login page
					//b. The temporal password (the 6-digit plan text)
				//The user’s email address can be retrieved from the users table.
				$to = "$email";
				$from = "akiroha@yahoo.com";
				$subject = "Shipment Confirmation";
				$message = "Your order has been shipped.";
				$headers = "From:" .$from;
				
				mail($to,$subject,$message,$headers);
				echo "Mail sent.";
				}
			
				else {
					echo $result->num_rows;
					echo "there is an error in the customers table.";
				}
			
			// sql to insert data to table
			$sql = "INSERT INTO shipment (good1, quantity1, good2, quantity2, good3, quantity3, good4, quantity4, status, companyName)
					VALUES ('$good1', '$quantity1', '$good2', '$quantity2', '$good3', '$quantity3', '$good4', '$quantity4', 'processing', 'companyName')";

			if ($conn->query($sql) === TRUE) {
    			echo "New record created successfully";
			} else {
    			echo "Error: " . $sql . "<br>" . $conn->error;
			}

			$conn->close();	
		}
	}
?>
<br><br><br>
<h1>Please Fill Out Form</h1>

<form action="" method="post">
	<table>
		<tr>
			<td>Company Name: </td>
			<td><input type="text" name="companyName" 
				value=<?php if(isset($_POST['companyName'])) echo $_POST['companyName'] ?>></td>
		</tr>
		<tr>
			<td>Good: </td>
			<td><input type="text" name="good1" 
				value=<?php if(isset($_POST['good1'])) echo $_POST['good1'] ?>></td>
		</tr>
		<tr>
			<td>Quantity: </td>
			<td><input type="text" name="quantity1" 
				value=<?php if(isset($_POST['quantity1'])) echo $_POST['quantity1'] ?>></td>
		</tr>
		<tr>
			<td>Good: </td>
			<td><input type="text" name="good2" 
				value=<?php if(isset($_POST['good2'])) echo $_POST['good2'] ?>></td>
		</tr>
		<tr>
			<td>Quantity: </td>
			<td><input type="text" name="quantity2" 
				value=<?php if(isset($_POST['quantity2'])) echo $_POST['quantity2'] ?>></td>
		</tr>
		<tr>
			<td>Good: </td>
			<td><input type="text" name="good3" 
				value=<?php if(isset($_POST['good3'])) echo $_POST['good3'] ?>></td>
		</tr>
		<tr>
			<td>Quantity: </td>
			<td><input type="text" name="quantity3" 
				value=<?php if(isset($_POST['quantity3'])) echo $_POST['quantity3'] ?>></td>
		</tr>
		<tr>
			<td>Good: </td>
			<td><input type="text" name="good4" 
				value=<?php if(isset($_POST['good4'])) echo $_POST['good4'] ?>></td>
		</tr>
		<tr>
			<td>Quantity: </td>
			<td><input type="text" name="quantity4" 
				value=<?php if(isset($_POST['quantity4'])) echo $_POST['quantity4'] ?>></td>
		</tr>
		
		
		
	</table>
	<input type="Submit">
</form>

</body>
</html>