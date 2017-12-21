
<html>
<head>
	<title>Monmouth Auto Parts</title>
	<link rel = "stylesheet" href = "includes/admin.css" type = "text/css" media = "screen" />
</head>

<body>	

	<?php
	function menu($array, $name, $value) {
		echo '<select name ='. $name . '>';
			foreach ($array as $ar) {
				echo '<option value = "' .$ar. '"';
				if ($ar == $value)
					echo 'selected = "selected"';
				echo '>'.$ar.'</option>';
			}
		echo '</select>';
	}
	
	
	//session control
	session_start();
	if(isset($_SESSION['uname']))
		$uname = $_SESSION['uname'];
	else
		header('LOCATION: loginPROJECT.php');
	?>

  <div id = "container">
	<?php include("includes/header_staff.html"); ?>
	
	<div id = "content">
	<?php
		if (isset($_GET['customerID']))
			$customerID = $_GET['customerID'];
		else if (isset($_POST['customerID']))
			$customerID = $_POST['customerID'];
		else
			echo "invalid access.";
			
		//DB connection
		include("includes/db_connection.php");
			
		if ($_SERVER['REQUEST_METHOD'] == 'POST')  {	
				$origin = $_POST['origin'];
				$companyName = $_POST['companyName'];
				$phoneNumber = $_POST['phoneNumber'];
				$email = $_POST['email'];
				$mailingAddress = $_POST['mailingAddress'];

				//define an array of error
				$error = array();

				if (empty($origin)) {
					$error[] = "Please enter company origin!";
				}
				if (empty($companyName)) {
					$error[] = "Please enter company Name!";
				}
				if (empty($phoneNumber)) {
					$error[] = "Please enter company Phone Number!";
				}
				if (empty($email)) {
					$error[] = "Please enter company email!";
				}
				if (empty($mailingAddress)) {
					$error[] = "Please enter company Mailing Address!";
				}
			}

			if (empty($error)) {	

				//define a query
				$update = "UPDATE customer SET origin = '$origin', 
											companyName = '$companyName', 
											phoneNumber = '$phoneNumber',
											email = '$email', 
											mailingAddress = '$mailingAddress',
							WHERE customerID = '$customerID'"; 
				$r= $conn->query($update);
				if ($r) echo "Successful!";
				else echo "Update failed";
			}
			
			else {
				foreach($error as $msg) {
					echo $msg;
				}
			}
			
		}
		else {

			$q = "SELECT * FROM customer WHERE customerID= '$customerID'";
			
			$r = $conn->query($q);
			
			if ($r->num_rows == 1){
				$row = $r->fetch_assoc();
			
				$origin = $row['origin'];
				$companyName = $row['companyName'];
				$phoneNumber = $row['phoneNumber'];
				$email = $row['email'];
				$mailingAddress = $row['mailingAddress'];
			}
			else
				echo "error in the customer table.";
		}
	?>

	<h1>Edit Class: <?php echo $origin ?></h1>	
		<form action = "" method = "POST"><center>
			<center><table>
				<tr>
					<td>Origin:</td>
					<td> 
						<?php
							$sub = array("national", "international");
							menu($sub, 'origin', $_POST['origin']);
						?>
					</td>
				</tr>
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
						value = <?php if (isset($_POST['section'])) echo $section ?>></td>
				</tr>
				<tr>
					<td>Email: </td>
					<td><input type = "text" name = "email" 
						value = <?php if (isset($_POST['email'])) echo $email ?>></td>
				</tr>
					</table></center>
					<p><center>
					<input type = "hidden" name = "role" value = <?php echo $role; ?> >
					<input type = "submit" name = "edit" value = "Update" />
					</center></p>
		</form>
	
	</div>

	<div id = "footer">
		<p>Copyright 2017 Monmouth Auto Parts</p>
	</div>
  </div>

</body>
</html>