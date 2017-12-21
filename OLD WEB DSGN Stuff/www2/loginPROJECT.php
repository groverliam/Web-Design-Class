<!DOCTYPE html>
<html>
<head>
	<title> Monmouth Auto Parts Sales System </title>

	<link rel="stylesheet" type="text/css" href="landingPagePROJECT.css">
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
			
		if(!empty($error)){
			foreach ($error as $msg){
				echo $msg;
				echo '<br>';
			}
		}
		else {
			//connect to db
			include("db_connection.php");
			
			$q = "SELECT * FROM user WHERE uname = '$uname'";
			
			$result = $conn->query($q); //execute select
			if ($result->num_rows > 0) {
				if ($result->num_rows == 1){
					//one record found. right case.
					$row = $result->fetch_assoc();
	
					if ($row['pword'] == $pword){
						
						//update user last-login time
						$update = "UPDATE user SET llogin = now() WHERE uname = '$uname'";
						$res = $conn->query($update); 
					
						//let user log in
						//set session variable
						session_start();
					
						//set session variables
						$_SESSION['uname'] = $uname;
						$_SESSION['fname'] = $row['fname'];			
						$_SESSION['role'] = $row['role'];				
					
						//check the role
						if($row['role'] == 'admin'){
							//jump to admin.php
							header('LOCATION: adminPROJECT.php');
						}
						else if ($row['role'] == 'staff'){
							//jump to admin.php
							header('LOCATION: staff.php');
						}
						else {
							//jump to instructor.php
							header('LOCATION: manager.php');
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
		<h1>Monmouth Auto Parts Sales System</h1>
	</div>

	<div class="clearfix">
		<div class="column menu">
    		<ul>
    			<li><a href="indexPROJECT.php">Home</a></li>
      			<li>View Catalog</li>
      			<li><a href="sign_upPROJECT.php">Sign up</a></li>
      			<li>About</li>
    		</ul>
    		<br><br>
    		
    		<form action = "" method = "post">
  				<p> User name:</p>
  				<p> <input type = "text" name = "uname">
    			<p> Password:</p>
  				<p> <input type = "password" name = "pword">	
  				<p> <input type = "submit" value = "Login">
  			</form>		
  			
  			<br><p>Forgot your Password? <a href="reset_passwordPROJECT.php"><font color="black"> Click here</font></a></p>

  		</div>
  		

  		<div class="column content">
  			<img src = "includes/AutoParts.JPG" width = "800">
  		</div>
	</div>

	<div class="footer">
  		<p>&copy SE357 | 2017 | 400 Cedar Ave, West Long Branch, New Jersey</p>
	</div>
	</div>
</body>
</html>
