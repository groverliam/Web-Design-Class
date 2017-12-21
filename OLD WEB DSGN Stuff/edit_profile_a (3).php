<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
	<title>SE357</title>
	<link rel = "stylesheet" href = "includes/admin.css" type = "text/css" media = "screen" />
	<meta http-equiv = "content-type" content = "text/html; charset = utf-8" />
</head>

<body>
	<div id = "container">
	<?php 
			//session variable check, to ensured page can only be accessed after login.
			session_start();
			if (!isset($_SESSION['uname'])){
				header('LOCATION: login.php');
			}
			else {
				$uname = $_SESSION['uname'];
				$fname = $_SESSION['fname'];
				$role = $_SESSION['role'];
			}
			
			if ($role == 'admin')
				include("includes/header_admin.html"); 
			else if ($role == 'student')	
				include("includes/header_student.html"); 
			else
				include("includes/header_faculty.html"); 
	?>
	
	<div id = "content">
		<?php

			
			//connect to DB
			include("includes/db_connection.php");

			//page loaded either because: case 1: you hit the Edit Prifle command
			//or case 2: you hit the Update command after you work on the profile form
			echo '<h1>Edit Your Profile</h1>';

			if ($_SERVER['REQUEST_METHOD']=='POST'){  //case 2
				//step 1: validate form data
				$errors = array(); // Initialize an error array.

				if (empty($_POST['fname']))
					$errors[] = 'You forgot to enter your first name.';
				else
					$fname = $_POST['fname'];

				if (empty($_POST['lname']))
					$errors[] = 'You forgot to enter your first name.';
				else
					$lname = $_POST['lname'];
					
				if (empty($_POST['address']))
					$errors[] = 'You forgot to enter your first name.';
				else{
			
					$address = $_POST['address'];
							echo $address;
				}

				if (empty($_POST['city']))
					$errors[] = 'You forgot to enter your first name.';
				else
					$city = $_POST['city'];

				if (empty($_POST['zipcode']))
					$errors[] = 'You forgot to enter your first name.';
				else
					$zipcode = $_POST['zipcode'];

				if (empty($_POST['email']))
					$errors[] = 'You forgot to enter your first name.';
				else
					$email = $_POST['email'];
										
				//add checks for other fields here
				//address, city, zipcode, email
				
				if(!empty($error)){
					foreach ($error as $msg)
						echo $msg.'<br>';
				}
				else{
					//step 2: update record
					//define an update query
					$q = "UPDATE users SET 
						fname='$fname',
						lname='$lname',
						address='$address',
						city='$city',
						zipcode='$zipcode',
						email='$email'
						WHERE uname = '$uname'"; 
						
					//execute the query 
					$result = $conn->query($q);
					if ($result === TRUE)
    					echo "Record updated successfully";
					else 
    					echo "Error updating record: ".$conn->error;
				}
			}
			else {   //case 1
				//retrieve user info from table
				//define a select query
				$q = "SELECT * FROM users WHERE uname = '$uname'";		
				
				//execute the query
				$result = $conn->query($q);
				
				//shoud return only one record
				if ($result->num_rows == 1){
					//one record found. right case.
					$row = $result->fetch_assoc();
					
					//get column values to fill the form
					$fname = $row['fname'];
					$lname = $row['lname'];
					$address = $row['address'];
					$city = $row['city'];
					$zipcode = $row['zipcode'];
					$email = $row['email'];
    			}
    			else {
    				echo $result->num_rows;
    				echo "there is an error in the users table.";
    			}
    		}
		?>
		
		<!-- create a form for modifiable user info -->
		<form action = "" method = "post">
			<br><br><center><table>
			<tr>
				<td>First Name:</td>
				<td><input type="text" name=fname
				       value=<?php echo $fname ?> ></td>
			</tr>
			<tr>
				<td>Last Name:</td>
				<td><input type="text" name=lname
				       value=<?php echo $lname ?> ></td>
			</tr>
			<tr>
				<td>Address:</td>
				<td><input type="text" name=address
				       value='<?php echo $address ?>' ></td> <!-- note the quotes -->
			</tr>
			<tr>
				<td>City:</td>
				<td><input type="text" name=city
				       value='<?php echo $city ?>'></td>
			</tr>
			<tr>
				<td>Zip Code:</td>
				<td><input type="text" name=zipcode
				       value=<?php echo $zipcode ?> ></td>
			</tr>
			<tr>
				<td>email:</td>
				<td><input type="text" name=email
				       value=<?php echo $email ?> ></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Update"></td>
			</table></center>
		</form>
	</div>
	<div id = "footer">
		<p>Copyright 2017 Monmouth University</p>
	</div>
	</div>
</body>
</html>





