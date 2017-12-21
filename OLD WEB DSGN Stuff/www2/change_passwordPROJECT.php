<html>
<head>
	<title>Monmouth Auto Parts Sales</title>
	<link rel = "stylesheet" href = "includes/admin.css" type = "text/css" media = "screen" />
</head>

<body>	
 	<div id = "container">	
		<?php
	
		//session control
			session_start();
			if (!isset($_SESSION['uname'])){
				header('LOCATION: loginPROJECT.php');
			}
			else {
				$uname = $_SESSION['uname'];
				$fname = $_SESSION['fname'];
				$role = $_SESSION['role'];
			}
			
			if ($role == 'admin')
				include("includes/header_adminPROJECT.html"); 
			else if ($role == 'staff')	
				include("includes/header_staff.html"); 
			else
				include("includes/header_manager.html"); 
		?>

 
	<div id = "content">
	<?php
			
		//DB connection
		include("db_connection.php");
			
		if ($_SERVER['REQUEST_METHOD'] == 'POST')  {	
			$old = $_POST['old'];
			$new = $_POST['new'];
			$new2= $_POST['new2'];
			
			//define an array of error
			$error = array();

			if (empty($old)) {
				$error[] = "Please input your old password!";
			}
			if (empty($new)) {
				$error[] = "Please enter a new password!";
			}
			if (empty($new2)) {
				$error[] = "Please confirm new password!";
			}
			if ($new != $new2)
				$error[] = "New password does not match confirm password.";
				
			if (empty($error)) {	
				$q = "SELECT * FROM user WHERE uname = '$uname'";
				$r = $conn->query($q);
				
				$row = $r->fetch_assoc();

				$old = sha1($old);
				$new = sha1($new);

				if ($row['psword']== $old){
					//define a query
					$update = "UPDATE user SET psword = '$new'
								WHERE uname = '$uname'"; 
					$r= $conn->query($update);
					
					if ($r) echo "Password updated!";
					else echo "Update failed";
				}
				else 
					echo 'You entered wrong password.';
			}
			else {
				foreach($error as $msg) {
					echo $msg;
				}
			}	
		}
	?>

	<h1> Change Password: </h1>
		<form action = "" method = "POST">
			<br><center><table>
				<tr>
					<td>Old Password:</td>
					<td><input type = "password" name = "old"></td>					
				</tr>
				<tr>
					<td>New Password:</td>
					<td><input type = "password" name = "new"></td>
				</tr>
				<tr>
					<td>Confirm Password:</td>
					<td><input type = "password" name = "new2"></td>
				</tr>
			</table></center>
			<p><center>
			<input type = "submit" value = "Update">
			</center></p>
		</form>
	
	</div> 

	<div id = "footer">
		<p>Copyright 2017 Monmouth University</p>
	</div>
  
  </div>

</body>
</html>