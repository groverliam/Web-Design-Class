<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Set Price</title>
	<link rel="stylesheet" href="includes/admin.css" type="text/css" media="screen" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<body>
<?php
	include("includes/header_manager.html");

	if ($_SERVER['REQUEST_METHOD']=='POST'){		
		//retrieve form data
		$error = array();
		
		if (!empty($_POST['code']))
			$code = $_POST['code'];
		else 
			$error[] = "Please enter code.";
		if (!empty($_POST['customerID']))
			$customerID = $_POST['customerID'];
		else 
			$error[] = "Please enter customer ID.";
			
		if (!empty($_POST['customerCode']))
			$customerCode = $_POST['customerCode'];
		else 
			$error[] = "Please enter customer code.";
			
		if (!empty($_POST['priceTerm']))
			$priceTerm = $_POST['priceTerm'];
		else 
			$error[] = "Please enter the price term.";
			
		if (!empty($_POST['currency']))
			$currency = $_POST['currency'];
		else 
			$error[] = "Please enter the currency.";		
				
		if (!empty($_POST['unitPrice']))
			$unitPrice = $_POST['unitPrice'];
		else 
			$error[] = "Please enter the unit price.";
			
		if(!empty($error)){
			foreach ($error as $msg){
				echo $msg;
				echo '<br>';
			}
		}
		else {
			include ("includes/db_connection.php");

			// sql to insert data to table
			$sql = "INSERT INTO pofgoods (code, customerID, customerCode, priceTerm, currency, unitPrice, salesPriceDate)
					VALUES ('$code', '$customerID', '$customerCode', '$priceTerm', '$currency', '$unitPrice' , now())";

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
			<td>Code: </td>
			<td><input type="text" name="code" 
				value=<?php if(isset($_POST['code'])) echo $_POST['code'] ?>></td>
		</tr>
		<tr>
			<td>Customer ID: </td>
			<td><input type="text" name="customerID" 
				value=<?php if(isset($_POST['customerID'])) echo $_POST['customerID'] ?>></td>
		</tr>
		<tr>
			<td>Customer Code: </td>
			<td><input type="text" name="customerCode" 
				value=<?php if(isset($_POST['customerCode'])) echo $_POST['customerCode'] ?>></td>
		</tr>
		<tr>
			<td>Price Term: </td>
			<td><input type="radio" name="priceTerm" value = "FOB">Free On Board<br>
			 <input type="radio" name="priceTerm" value = "CIF">Cost of Insurance and Freight<br>
		</tr>
		<tr>
			<td>Currency: </td>
			<td><input type="float" name="currency" 
				value=<?php if(isset($_POST['currency'])) echo $_POST['currency'] ?>></td>
		</tr>
		<tr>
			<td>Unit Price: </td>
			<td><input type="int" name="unitPrice" 
				value=<?php if(isset($_POST['unitPrice'])) echo $_POST['unitPrice'] ?>></td>
		</tr>
		
		
		
	</table>
	<input type="Submit">
</form>

</body>
</html>