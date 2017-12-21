
<?php
	//session control
	session_start();
		

	if (isset($_GET['code']))
			$classID = $_GET['code'];
	else
			echo "Invalid access.";
			header('LOCATION: loginPROJECT.php');
	
	include("includes/db_connection.php");
			
			
	//check to see if the class is already registered.
	//$q = "SELECT * From goods WHERE code = '$code'";
	
	echo '<h1>Edit Good</h1>';

			if ($_SERVER['REQUEST_METHOD']=='POST'){  //case 2
				//step 1: validate form data
				$errors = array(); // Initialize an error array.

				if (empty($_POST['description']))
					$errors[] = 'You forgot to enter desciptiom.';
				else
					$description = $_POST['description'];

				if (empty($_POST['specification']))
					$errors[] = 'You forgot to enter specification.';
				else
					$specification = $_POST['specification'];
					
				if (empty($_POST['unit']))
					$errors[] = 'You forgot to enter unit.';
				else{
			
					$unit = $_POST['unit'];
							echo $address;
				}

				if (empty($_POST['purchasePrice']))
					$errors[] = 'You forgot to enter purchase price.';
				else
					$purchasePrice = $_POST['purchasePrice'];

				if (empty($_POST['quantityPerContainer']))
					$errors[] = 'You forgot to enter quanitity.';
				else
					$quantityPerContainer = $_POST['quantityPerContainer'];

				if (empty($_POST['containerSize']))
					$errors[] = 'You forgot to enter container size.';
				else
					$containerSize = $_POST['containerSize'];
				
				if (empty($_POST['grossWeight']))
					$errors[] = 'You forgot to enter gross weight.';
				else
					$grossWeight = $_POST['grossWeight'];
										
				if (empty($_POST['netWeight']))
					$errors[] = 'You forgot to enter net weight.';
				else
					$netWeight = $_POST['netWeight'];
															

				if(!empty($error)){
					foreach ($error as $msg)
						echo $msg.'<br>';
				}
				else{
					//step 2: update record
					//define an update query
					$q = "UPDATE goods SET 
						description='$description',
						specification='$specification',
						unit='$unit',
						purchasePrice='$purchasePrice',
						quantityPerContainer='$quantityPerContainer',
						containerSize='$containerSize'
						grossWeight='$grossWeight',
						netWeight='$netWeight'
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
				$q = "SELECT * FROM goods WHERE code = '$code'";		
				
				//execute the query
				$result = $conn->query($q);
				
				//shoud return only one record
				if ($result->num_rows == 1){
					//one record found. right case.
					$row = $result->fetch_assoc();
					
					//get column values to fill the form
					$description = $row['description'];
					$specification = $row['specification'];
					$unit = $row['unit'];
					$purchasePrice = $row['purchasePrice'];
					$quantityPerContainer = $row['quantityPerContainer'];
					$containerSize = $row['containerSize'];
					$grossWeight = $row['grossWeight'];
					$netWeight = $row['netWeight'];
    			}
    			else {
    				echo $result->num_rows;
    				echo "there is an error in the users table.";
    			}
    		}
?>
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
