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
		
		if (!empty($_POST['code']))
			$code = $_POST['code'];
		else 
			$error[] = "Please enter code.";
		if (!empty($_POST['description']))
			$description = $_POST['description'];
		else 
			$error[] = "Please enter description.";
			
		if (!empty($_POST['specification']))
			$specification = $_POST['specification'];
		else 
			$error[] = "Please enter specification.";
			
		if (!empty($_POST['unit']))
			$unit = $_POST['unit'];
		else 
			$error[] = "Please enter the unit.";
			
		if (!empty($_POST['purchasePrice']))
			$purchasePrice = $_POST['purchasePrice'];
		else 
			$error[] = "Please enter the purchase price.";		
				
		if (!empty($_POST['quantityPerContainer']))
			$quantityPerContainer = $_POST['quantityPerContainer'];
		else 
			$error[] = "Please enter the quantity.";
			
		if (!empty($_POST['containerSize']))
			$containerSize = $_POST['containerSize'];
		else 
			$error[] = "Please enter the container size.";
		
		if (!empty($_POST['grossWeight']))
			$grossWeight = $_POST['grossWeight'];
		else 
			$error[] = "Please enter the gross weight.";
			
		if (!empty($_POST['netWeight']))
			$netWeight = $_POST['netWeight'];
		else 
			$error[] = "Please enter the net weight.";

		if(!empty($error)){
			foreach ($error as $msg){
				echo $msg;
				echo '<br>';
			}
		}
		else {
			include ("includes/db_connection.php");

			// sql to insert data to table
			$sql = "INSERT INTO goods (code, description, specification, unit, purchasePrice, purchaseDate, quantityPerContainer, containerSize, grossWeight, netWeight)
					VALUES ('$code', '$description', '$specification', '$unit', '$purchasePrice', now(), '$quantityPerContainer', '$containerSize', '$grossWeight', '$netWeight')";

			if ($conn->query($sql) === TRUE) {
    			echo "New record created successfully";
			} else {
    			echo "Error: " . $sql . "<br>" . $conn->error;
			}

			$conn->close();	
		}
	}
?>

<h1>Please Fill Out Form</h1>

<form action="" method="post">
	<table>
		<tr>
			<td>Code: </td>
			<td><input type="text" name="code" 
				value=<?php if(isset($_POST['code'])) echo $_POST['code'] ?>></td>
		</tr>
		<tr>
			<td>Description: </td>
			<td><input type="text" name="description" 
				value=<?php if(isset($_POST['description'])) echo $_POST['description'] ?>></td>
		</tr>
		<tr>
			<td>Specification: </td>
			<td><input type="text" name="specification" 
				value=<?php if(isset($_POST['specification'])) echo $_POST['specification'] ?>></td>
		</tr>
		<tr>
			<td>Unit: </td>
			<td><input type="text" name="unit" 
				value=<?php if(isset($_POST['unit'])) echo $_POST['unit'] ?>></td>
		</tr>
		<tr>
			<td>Purchase Price: </td>
			<td><input type="float" name="purchasePrice" 
				value=<?php if(isset($_POST['purchasePrice'])) echo $_POST['purchasePrice'] ?>></td>
		</tr>
		<tr>
			<td>Quantity: </td>
			<td><input type="int" name="quantityPerContainer" 
				value=<?php if(isset($_POST['quantityPerContainer'])) echo $_POST['quantityPerContainer'] ?>></td>
		</tr>
		<tr>
			<td>Container Size: </td>
			<td><input type="text" name="containerSize" 
				value=<?php if(isset($_POST['containerSize'])) echo $_POST['containerSize'] ?>></td>
		</tr>
		<tr>
			<td>Gross Weight: </td>
			<td><input type="int" name="grossWeight" 
				value=<?php if(isset($_POST['grossWeight'])) echo $_POST['grossWeight'] ?>></td>
		</tr>
		<tr>
			<td>Net Weight: </td>
			<td><input type="int" name="netWeight" 
				value=<?php if(isset($_POST['netWeight'])) echo $_POST['netWeight'] ?>></td>
		</tr>
		
		
	</table>
	<input type="Submit">
</form>

</body>
</html>