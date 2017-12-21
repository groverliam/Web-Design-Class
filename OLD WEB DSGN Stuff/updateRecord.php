<!DOCTYPE php>
<html>
<head>
	<title> Update Profile </title>
</head>

<body>
<?php	
	if ($_SERVER['REQUEST_METHOD']=='POST')
	{	
		
		//validate form data
		//update record with form data
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
	
	$sql = "SELECT uname, fname, lname, email, address, city, zipCode, role FROM users WHERE uname='$uname'";
	$result = $conn->query($sql); //execute select	
	
		if ($result ->num_rows > 0) {
	
			if ($result->num_rows == 1) {
				$row = $result->fetch_assoc();
				
				$fname = $row['firstname'];
				$lname = $row['lastname'];
				$address = $row['address'];
				$city = $row['city'];
				$email = $row['email'];
				$zipCode = $row['zipCode'];
				$role = $row['role'];
			}
			else
				echo "More than one user found in database. Database is corrupted <br>";
		}
		else
			echo "Error: Username ".$uname." not found in database. <br>";	
	}
	$conn -> close();
	}
		
	else
	{
		
		//check session variable
		//Retrieve from table
		
		
	}
	
	
	?>
	<form action="", method= "post">
		<center>
			<h1>Update Your Profile</h1>
			<table>
				
				<tr>
				<td>Username: </td>
				<td><?php echo $uname ?></td>
				</tr>
				
				<tr>
				<td>Current First Name: </td>
				<td><?php echo $fname ?></td>
				</tr>
				<tr>
				<td>New First Name: </td>
				<td><p> <input type = "text" name = "fname"
  				value=<?php if(isset($_POST['fname'])) echo $_POST['fname'] ?>></td>
				</tr>
				
				<tr>
				<td>Current Last Name: </td><td>
				<?php echo $lname ?></td>
				</tr>
				<tr>
				<td>New Last Name: </td>
				<td><p> <input type = "text" name = "lname"
  				value=<?php if(isset($_POST['lname'])) echo $_POST['lname'] ?>></td>
				</tr>
				
				<tr>
				<td>Current Address: </td><td>
				<?php echo $address ?></td>
				</tr>
				<tr>
				<td><p>New Address:</p></td>
  				<td><p> <input type = "text" name = "address"
  				value=<?php if(isset($_POST['address'])) echo $_POST['address'] ?>></td>
				</tr>
				
				<tr>
				<td>Current City: </td>
				<td><?php echo $city ?></td>
				</tr>
				<tr>
				<td><p>New City:</p></td>
				<td><p> <input type = "text" name = "city"
  				value=<?php if(isset($_POST['city'])) echo $_POST['city'] ?>></td>
				</tr>
								
				<tr>
				<td>Current Email: </td><td>
				<?php echo $email ?></td>
				</tr>
				<tr>	
				<td><p>New Email:</p></td>
  				<td><p> <input type = "email" name = "email"
  				value=<?php if(isset($_POST['email'])) echo $_POST['email'] ?>></td>
				</tr>
				
				<tr>
				<td>Current Zip Code: </td>
				<td><?php echo $zipCode ?></td>
				</tr>
				<tr>
				<td><p>New Zip Cde:</p></td>
				<td><p> <input type = "number" name = "zipCode"
				value=<?php if(isset($_POST['zipCode'])) echo $_POST['zipCode'] ?>></td>
				</tr>
		
		
				<tr>
				<td>Current role: </td>
				<td><?php echo $role ?></td>
				</tr>
				<tr>	
				<td><p>New Role:</p></td>
				<td><input type="radio" name="role" value="student"> Student</td>
				<td><input type="radio" name="role" value="instructor"> Professor</td>
				<td><input type="radio" name="role" value="admin"> Admin</td>
				<br><br> 
				</tr>
				
			</table>
				<input type= "submit" value= "Submit">
			</center>
	</form>
</body>
</html>