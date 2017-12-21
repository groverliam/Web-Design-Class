<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
	<title>Monmouth Auto</title>
	<link rel = "stylesheet" href = "includes/admin.css" type = "text/css" media = "screen" />
	<meta http-equiv = "content-type" content = "text/html; charset = utf-8" />
</head>
<body>
	<div id = "container">
	<?php include("includes/header_staff.html");?>
	
	<div id = "content">
		<?php	
		session_start();
		if (!isset($_SESSION['uname'])){
			header('LOCATION: loginPROJECT.php');
		}
		else {
			$customerID = $_GET['customerID'];
			
		}
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {		
			//retreive form data
			$error = array();
						
			if (!empty($_POST['message']))
				$message = $_POST['message'];	
			else 
				$error[] = "Please enter the email message";
						
			if(!empty($error)){
				foreach ($error as $msg){
					echo $msg;
					echo '<br>';
				}
			}
			else {
				include "db_connection.php";
				//define a select query
				$q = "SELECT * FROM customer WHERE customerID = '$customerID'";		
				
				//execute the query
				$result = $conn->query($q);
				
				if ($result->num_rows == 1){
					//one record found. right case.
					$row = $result->fetch_assoc();
					
					//get column values to fill the form
					$email = $row['email'];
					
					$uname = $_SESSION['uname'];
					$customerID = $_GET['customerID'];
					//$email = $_GET['email'];
					
					$to = "$email";
					$from = "akiroha@yahoo.com";
					$subject = "Monmouth Auto";
					$message = $_POST['message'];
					$headers = "From:" .$from;
					
					mail($to,$subject,$message,$headers);
					echo "Mail sent.";
				}
				else {
    				echo $result->num_rows;
    				echo "there is an error in the classes table.";
    			}
			}
		}
		?>
		<h1>Send Email:</h1>
		<center>
		<form action="" method="post">
			<table>
				<tr>
					<td>Message: </td>
					<td><input type="text" name = "message"></td>
				</tr>
			</table>
			<input type="submit" value = "Send">
		</form>
		</center>
		<div id = "footer">
		<p>Copyright 2017 Monmouth Auto Parts</p>
		</div>
	</div>
</body>
</html>