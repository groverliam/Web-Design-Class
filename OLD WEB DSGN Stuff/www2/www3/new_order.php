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
			$error[] = "Please enter order ID.";
		if (!empty($_POST['productID']))
			$productID = $_POST['productID'];
		else 
			$error[] = "Please enter product ID.";
			
		if (!empty($_POST['unitPrice']))
			$unitPrice = $_POST['unitPrice'];
		else 
			$error[] = "Please enter unit price.";
			
		if (!empty($_POST['quantity']))
			$quantity = $_POST['quantity'];
		else 
			$error[] = "Please enter the quantity.";
			

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
			$sql = "INSERT INTO orders (productID, unitPrice, quantity, status, companyName)
					VALUES ('$productID', '$unitPrice', '$quantity', 'processing', '$companyName')";

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
			<td>Product ID: </td>
			<td><input type="text" name="productID" 
				value=<?php if(isset($_POST['productID'])) echo $_POST['productID'] ?>></td>
		</tr>
		<tr>
			<td>Unit Price: </td>
			<td><input type="text" name="unitPrice" 
				value=<?php if(isset($_POST['unitPrice'])) echo $_POST['unitPrice'] ?>></td>
		</tr>
		<tr>
			<td>Quantity: </td>
			<td><input type="text" name="quantity" 
				value=<?php if(isset($_POST['quantity'])) echo $_POST['quantity'] ?>></td>
		</tr>
		
		
		
	</table>
	<input type="Submit">
</form>

</body>
</html>