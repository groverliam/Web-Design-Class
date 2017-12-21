<!DOCTYPE html>
<html>
<head>
	<title> MU Registration </title>

	<link rel="stylesheet" type="text/css" href="landingPage.css">
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
			$password = "root";  //change to your password for the server
			$dbname = "REG";
			
			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);

			// Check connection
			if ($conn->connect_error) {
    			//die("Connection failed: " . $conn->connect_error);
			} 
			
			$q = "SELECT * FROM users WHERE uname = '$uname'";
			
			$result = $conn->query($q); //execute select
			if ($result->num_rows > 0) {
				if ($result->num_rows == 1){
					//one record found. right case.
					$row = $result->fetch_assoc();
					if ($row['psword'] == $psword){
						//let user log in
						//set session variable
						session_start();
						
						//set session variables
						$_SESSION['uname'] = $uname;
						$_SESSION['fname'] = $row['fname'];						
						
						//check the role
						if($row['role'] == 'admin'){
							//jump to admin.php
							header('LOCATION: a/admin.php');
						}
						else if ($row['role'] == 'student'){
							//jump to admin.php
							header('LOCATION: student.php');
						}
						else {
							//jump to instructor.php
							header('LOCATION: instructor.php');
						}
						
					}
					else {
						echo "Either username or password does not match.";
						
						}	
						
					}		
				
				else {
					echo "More than one record found with the same user name. DB corrupted.";
				}

			} 
			else {
				echo "User name not found in database.";
			}
		}
	}

?>
	<div id = "container">
	<div class="header">
		<h1>Monmouth University Class Registration System</h1>
	</div>

	<div class="clearfix">
		<div class="column menu">
    		<ul>
    			<li><a href="index.php">Home</a></li>
      			<li>View Classes</li>
      			<li><a href="sign_up.php">Sign up</a></li>
      			<li>About</li>
    		</ul>
    		<br><br>
    		
    		<form action = "" method = "post">
  				<p> User name:</p>
  				<p> <input type = "text" name = "uname">
    			<p> Password:</p>
  				<p> <input type = "password" name = "psword">	
  				<p> <input type = "submit" value = "Login">
  			</form>		

  		</div>
  		

  		<div class="column content">
  			<img src = "includes/MU.JPG" width = "800">
  		</div>
	</div>

	<div class="footer">
  		<p>&copy SE357 | 2017 | 400 Cedar Ave, West Long Branch, New Jersey</p>
	</div>
	</div>
</body>
</html>
