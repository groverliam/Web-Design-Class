<!DOCTYPE html>
<html>
<body>
<?php	
	session_start();
			
			if (!isset($_SESSION['uname'])){
				header('LOCATION: login.php');
			}
			else {
				$uname = $_SESSION['uname'];
				$fname = $_SESSION['fname'];
			}
			
			//connect to DB
			//first define database connection parameters
			include("includes/db_connection.php");

			$q = "SELECT * FROM users WHERE uname = '$uname'";
			
			$result = $conn->query($q); //execute select
			if ($result->num_rows > 0) {
				if ($result->num_rows == 1)
				{
					//one record found. right case.
					$row = $result->fetch_assoc();
					if ($row['psword'] == $psword)
					{
				
					}
					else 
					{
						echo "Either username or password does not match.";
						
					}	
				}
				else
				{
					echo "More than one user found in database. Database is corrupted <br>";
				}
			}
			else
			{
				echo "Error: Username ".$uname." not found in database. <br>";	
			}
		}
	$conn -> close();
	
?>
<form action = "" method = "post">
    <p> Password:</p>
  	<p> <input type = "password" name = "psword">
  	<p> New Password:</p>
  	<p> <input type = "password" name = "psword2">
  	<p> Comfirm Password:</p>
  	<p> <input type = "password" name = "psword3">			
  				
</form>	
  				
  				
  				
  				
  				
  				
  				
  				
  				
  				
  				
  				
  				
  				
  				
  				
  				
  				