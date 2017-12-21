<!SignupLogin.php>
<html>

	<title>Sign Up</title>
	
	<body>
	
		<center>
		<h1>Sign Up</h1>
		
		<?php
		if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "REG";

		if(!empty($_POST['uname']))
			$uname = $_POST['uname'];
		else
			$error[] = "Username is not entered.";
			
		if(!empty($_POST['psword']))
			$psword= sha1($_POST['psword']);
		else
			$error[] = "Password is not entered.";
			
		if (!empty($_POST['psword2']))
			$psword2= sha1($_POST['psword2']);
		else 
			$error[] = "Please confirm password.";
			
		if ($psword != $psword2)
			$error[] = "Passwords do not match.";
			
		if(!empty($_POST['fname']))
			$fname = $_POST['fname'];
		else
			$error[] = "First name is not entered.";
			
		if(!empty($_POST['lname']))
			$lname = $_POST['lname'];
		else
			$error[] = "Last name is not entered.";
			
		if(!empty($_POST['email']))
			$email = $_POST['email'];
		else
			$error[] = "Email is not entered.";
			
		if(!empty($_POST['address']))
			$address = $_POST['address'];
		else
			$error[] = "Address is not entered.";
			
		if(!empty($_POST['city']))
			$city = $_POST['city'];
		else
			$error[] = "City is not entered.";
			
		if(!empty($_POST['zip']))
			$zip = $_POST['zip'];
		else
			$error[] = "Zip code is not entered.";
			
		if(!empty($_POST['attempts']))
			$zip = $_POST['attempts'];
			
		$role = $_POST['role'];
		if(!empty($error))
			foreach($error as $msg) { 
				echo $msg;
				echo '<br>';
				}
				// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		if ($conn->connect_error) {
   			die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "INSERT INTO users (uname, psword, fname, lname, email, address, city, role, lLogin)
		VALUES ('$uname', '$psword', '$fname' , '$lname', '$email', '$address', '$city' ,'$role', now())";

		if ($conn->query($sql) === TRUE) {
    		echo "New record created successfully";
		} else {
  			echo "Error: " . $sql . "<br>" . $conn->error;
		}

			$conn->close();

		}
		
		?>
		
<form action="", method= "post">
	<table>
		
		<tr>	
		<td><p> Username:</p></td>
  		<td><p> <input type = "text" name = "uname"
  			value=<?php if(isset($_POST['uname'])) echo $_POST['uname'] ?>></td>
  		<tr>
		
		<tr>	
		<td><p> Password:</p></td>
  		<td><p> <input type = "password" name = "psword"></td>
		</tr>
		
		<tr>
		<td><p> Confirm Password:</p></td>
  		<td><p> <input type = "password" name = "psword2"></td>
		</tr>
		
		<tr>	
		<td><p> First name:</p></td>
  		<td><p> <input type = "text" name = "fname"
  			value=<?php if(isset($_POST['fname'])) echo $_POST['fname'] ?>></td>
		</tr>
			
		<tr>
		<td><p> Last name:</p></td>
  		<td><p> <input type = "text" name = "lname"
  			value=<?php if(isset($_POST['lname'])) echo $_POST['lname'] ?>></td>
		</tr>
		
		<tr>	
		<td><p> Email:</p></td>
  		<td><p> <input type = "email" name = "email"
  			value=<?php if(isset($_POST['email'])) echo $_POST['email'] ?>></td>
		</tr>
		
		<tr>
		<td><p> Address:</p></td>
  		<td><p> <input type = "text" name = "address"
  			value=<?php if(isset($_POST['address'])) echo $_POST['address'] ?>></td>
		</tr>
			
		<tr>
		<td><p> City:</p></td>
		<td><p> <input type = "text" name = "city"
  			value=<?php if(isset($_POST['city'])) echo $_POST['city'] ?>></td>
		</tr>
			
		<tr>
		<td><p> Zip:</p></td>
  		<td><p> <input type = "number" name = "zip"
  			value=<?php if(isset($_POST['zip'])) echo $_POST['zip'] ?>></td>
		</tr>
		
		<tr>	
		<td><p> Role:</p></td>
  			<td><input type="radio" name="role" value="student"> Student</td>l
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