<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
	<title>SE357</title>
	<link rel = "stylesheet" href = "includes/admin.css" type = "text/css" media = "screen" />
	<meta http-equiv = "content-type" content = "text/html; charset = utf-8" />
</head>

<body>
	<div id = "container">
	<?php include("includes/header_manager.html"); ?>
	
	<div id = "content">
		<?php
		
			include("includes/db_connection.php");
			
			if (isset($_GET['code']))
				$classID = $_GET['code'];
			

			

			//page loaded either because: case 1: you hit the Edit Prifle command
			//or case 2: you hit the Update command after you work on the profile form
			echo '<h1>Edit Price of Goods</h1>';

			if ($_SERVER['REQUEST_METHOD']=='POST'){  //case 2
				//step 1: validate form data
				$errors = array(); // Initialize an error array.

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
					foreach ($error as $msg)
						echo $msg.'<br>';
				}
				else{
					//step 2: update record
					//define an update query
					$q = "UPDATE pofgoods SET 
						customerID='$customerID',
						customerCode='$customerCode',
						priceTerm='$priceTerm',
						currency='$currency',
						unitPrice='$unitPrice',
						WHERE code = '$code'"; 
						
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
				$q = "SELECT * FROM pofgoods WHERE code = '$code'";		
				
				//execute the query
				$result = $conn->query($q);
				
				//shoud return only one record
				if ($result->num_rows == 1){
					//one record found. right case.
					$row = $result->fetch_assoc();
					
					//get column values to fill the form
					$customerID = $row['customerID'];
					$customerCode = $row['customerCode'];
					$priceTerm = $row['priceTerm'];
					$currency = $row['currency'];
					$unitPrice = $row['unitPrice'];
					
    			}
    			else {
    				echo $result->num_rows;
    				echo "there is an error in the pofgoods table.";
    			}
    		}
		?>
		
		<!-- create a form for modifiable user info -->
		<form action = "" method = "post">
			<center><table>
			<tr>
				<td>Customer ID:</td>
				<td><input type="text" name=customerID
				       value=<?php echo $customerID ?> ></td>
			</tr>
			<tr>
				<td>Last Name:</td>
				<td><input type="text" name=customerCode
				       value=<?php echo $customerCode ?> ></td>
			</tr>
			<tr>
				<td>Price Term: </td>
				<td><input type="radio" name="priceTerm" value = "FOB">Free On Board<br>
			 	<input type="radio" name="priceTerm" value = "CIF">Cost of Insurance and Freight<br>
			</tr>
			<tr>
				<td>Currency:</td>
				<td><input type="text" name=currency
				       value=<?php echo $currency ?> ></td>
			</tr>
			<tr>
				<td>Unit Price:</td>
				<td><input type="text" name=unitPrice
				       value=<?php echo $unitPrice ?> ></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Update"></td>
			</table></center>
		</form>
	</div>
	<div id = "footer">
		<p>Copyright 2017 Monmouth University</p>
	</div>
	</div>
</body>
</html>





