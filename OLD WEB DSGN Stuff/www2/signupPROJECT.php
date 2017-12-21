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
			
		if (!empty($_POST['pword']))
			$pword= sha1($_POST['pword']);
		else 
			$error[] = "Please enter password.";
			
		if (!empty($_POST['pword2']))
			$pword2= sha1($_POST['pword2']);
		else 
			$error[] = "Please confirm password.";
			
		if ($pword != $pword2)
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
		
		if (!empty($_POST['city']))
			$city = $_POST['city'];
		else 
			$error[] = "Please enter city.";
			
		if (!empty($_POST['address']))
			$address = $_POST['address'];
		else 
			$error[] = "Please enter address.";
			
		if (!empty($_POST['zipcode']))
			$zipcode = $_POST['zipcode'];
		else 
			$error[] = "Please enter zipcode.";
		
		if (!empty($_POST['role']))
			$role = $_POST['role'];
		else 
			$error[] = "Please choose role.";

		if(!empty($error)){
			foreach ($error as $msg){
				echo $msg;
				echo '<br>';
			}
		}
		else {
			include "db_connection.php";

			// sql to insert data to table
			$sql = "INSERT INTO user (uname, pword, fname, lname, email, address, city, zipcode, role, llogin)
					VALUES ('$uname', '$pword', '$fname', '$lname', '$email', '$address', '$city', '$zipcode', '$role', now())";

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
			<td><input type="password" name="pword"></td>
		</tr>
		<tr>
			<td>Confirm Password: </td>
			<td><input type="password" name="pword2"></td>
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
			<td>Address: </td>
			<td><input type="text" name="address" 
				value=<?php if(isset($_POST['address'])) echo $_POST['address'] ?>></td>
		</tr>
		<tr>
			<td>City: </td>
			<td><input type="text" name="city" 
				value=<?php if(isset($_POST['city'])) echo $_POST['city'] ?>></td>
		</tr>
		<tr>
			<td>Zipcode: </td>
			<td><input type="text" name="zipcode" 
				value=<?php if(isset($_POST['zipcode'])) echo $_POST['zipcode'] ?>></td>
		</tr>
		<tr>
			<td>Role: </td>
			<td><input type="radio" name="role" value = "manager">manager<br>
			 <input type="radio" name="role" value = "staff">staff<br>
			 <input type="radio" name="role" value = "admin">admin<br></td>
		</tr>
	</table>
	<input type="Submit">
</form>

</body>
</html>