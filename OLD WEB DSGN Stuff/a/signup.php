<html>

<head>
	<title>Sign up</title>
</head>
<body>
<?php
	if ($_SERVER['REQUEST_METHOD']=='POST'){		
		//retrieve form data
		$error = array();
		
		if (!empty($_POST['uname']))
			$uname = $_POST['uname'];
		else 
			$error[] = "Please enter user name.";
			
		if (!empty($_POST['psword']))
			$psword= sha1($_POST['psword']);
		else 
			$error[] = "Please enter password.";
			
		if (!empty($_POST['psword2']))
			$psword2= sha1($_POST['psword2']);
		else 
			$error[] = "Please confirm password.";
			
		if ($psword != $psword2)
			$error[] = "Passwords do not match.";
			
		if (!empty($_POST['fname']))
			$fname = $_POST['fname'];
		else 
			$error[] = "Please enter first name.";
			
		if (!empty($_POST['lname']))
			$lname = $_POST['lname'];
		else 
			$error[] = "Please enter last name.";
			
		if (!empty($_POST['email']))
			$email = $_POST['email'];
		else 
			$error[] = "Please enter email.";		
			
		if (!empty($_POST['role']))
			$role = $_POST['role'];
		else 
			$error[] = "Please enter email.";		

		if(!empty($error)){
			foreach ($error as $msg){
				echo $msg;
				echo '<br>';
			}
		}
		else {
			//define database connection parameters
			$servername = "localhost";
			$username = "root";
			$password = "root";
			$dbname = "REG";
			
			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);

			// Check connection
			if ($conn->connect_error) {
    			die("Connection failed: " . $conn->connect_error);
			} 

			// sql to insert data to table
			$sql = "INSERT INTO users (uname, psword, fname, lname, email, role, llogin)
					VALUES ('$uname', '$psword', '$fname', '$lname', '$email', '$role', now())";

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
			<td>User Name: </td>
			<td><input type="text" name="uname" 
				value=<?php if(isset($_POST['uname'])) echo $_POST['uname'] ?>></td>
		</tr>
		<tr>
			<td>Password: </td>
			<td><input type="password" name="psword"></td>
		</tr>
		<tr>
			<td>Confirm Password: </td>
			<td><input type="password" name="psword2"></td>
		</tr>
		<tr>
			<td>First Name: </td>
			<td><input type="text" name="fname" 
				value=<?php if(isset($_POST['fname'])) echo $_POST['fname'] ?>></td>
		</tr>
		<tr>
			<td>Last Name: </td>
			<td><input type="text" name="lname" 
				value=<?php if(isset($_POST['lname'])) echo $_POST['lname'] ?>></td>
		</tr>
		<tr>
			<td>Email: </td>
			<td><input type="email" name="email" 
				value=<?php if(isset($_POST['email'])) echo $_POST['email'] ?>></td>
		</tr>
		<tr>
			<td>Role: </td>
			<td><input type="radio" name="role" value = "student">Student<br>
			 <input type="radio" name="role" value = "instructor">Instructor<br>
			 <input type="radio" name="role" value = "admin">Admin<br></td>
		</tr>
	</table>
	<input type="Submit">
</form>

</body>
</html>