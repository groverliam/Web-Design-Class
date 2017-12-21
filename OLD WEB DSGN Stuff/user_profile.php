<html>
<title>User Profile Midterm</title>
<body>
<?php
	session_start();
	if(!isset($_SESSION['uname'])) 
		header('LOCATION: login.php');
	else {
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$db = "REG";
		
		$uname = $_SESSION['uname'];
		$error = array();
		
		$conn = new mysqli($servername, $username, $password, $db);
	
	if ($conn->connect_error) 
    	die("Connection failed: " . $conn->connect_error);
	
	$sql = "SELECT username, firstname, lastname, address, city, state, homephone, email FROM users WHERE username='$uname'";
	$result = $conn->query($sql); //execute select	
	
		if ($result ->num_rows > 0) {
	
			if ($result->num_rows == 1) {
				$row = $result->fetch_assoc();
				
				$fname = $row['firstname'];
				$lname = $row['lastname'];
				$addr = $row['address'];
				$city = $row['city'];
				$state = $row['state'];
				$homephone = $row['homephone'];
				$email = $row['email'];
			}
			else
				echo "More than one user found in database. Database is corrupted <br>";
		}
		else
			echo "Error: Username ".$uname." not found in database. <br>";	
	}
	$conn -> close();
	
?>
<center>
<h1>Your Profile</h1>
<table>
	<tr>
	<td>Username: </td><td><?php echo $uname ?></td>
	</tr>
	<tr>
	<td>First Name: </td><td><?php echo $fname ?></td>
	</tr>
	<tr>
	<td>Last Name: </td><td><?php echo $lname ?></td>
	</tr>
	<tr>
	<td>Address: </td><td><?php echo $addr ?></td>
	</tr>
	<tr>
	<td>City: </td><td><?php echo $city ?></td>
	</tr>
	<tr>
	<td>State: </td><td><?php echo $state ?></td>
	</tr>
	<tr>
	<td>Home phone: </td><td><?php echo $homephone ?></td>
	</tr>
	<tr>
	<td>Email: </td><td><?php echo $email ?></td>
	</tr>
</table>
</center>
</body>
</html>