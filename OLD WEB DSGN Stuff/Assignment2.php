<!-SignupLogin.php>
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

		"INSERT INTO users (uname, psword, fname, lname, email, address, city, role, lLogin)
		VALUES ('$uname', '$psword', '$fname' , '$lname', '$email', '$address', '$city' ,'$role', now())";

		if ($conn->query($sql) === TRUE) {
    		echo "New record created successfully";
		} else {
  			echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();

		}
		
		?>
		<br>
		<br>
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
		
	</table>	
	<input type= "submit" value= "Submit">
	</center>
</form>
		
</body>
	
</html>