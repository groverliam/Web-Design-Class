<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
	<title>SE357</title>
	<link rel = "stylesheet" href = "admin.css" type = "text/css" media = "screen" />
	<meta http-equiv = "content-type" content = "text/html; charset = utf-8" />
</head>

<body>
	<div id = "container">
	<?php include("includes/header_admin.html"); ?>
	
	<div id = "content">
		<?php
			//session variable check, to ensured page can only be accessed after login.
			session_start();
			if (!isset($_SESSION['uname'])){
				header('LOCATION: login.php');
			}
			else {
				$classID = $_SESSION[‘classID’];
				
			}
			
			//connect to DB
			//first define database connection parameters
			$servername = "localhost";
			$username = "root";
			$password = "root";  //change to your password for the server
			$dbname = "REG";
			
			//create connection
			$conn = new mysqli($servername, $username, $password, $dbname);

			//check connection
			if ($conn->connect_error) {
    			//die("Connection failed: " . $conn->connect_error);
			} 

			//page loaded either because: case 1: you hit the Edit Prifle command
			//or case 2: you hit the Update command after you work on the profile form
			echo '<h1>Edit Class</h1>';

			if ($_SERVER['REQUEST_METHOD']=='POST'){  //case 2
				//step 1: validate form data
				$errors = array(); // Initialize an error array.

				if (empty($_POST['major']))
					$errors[] = 'You forgot to enter the class major.';
				else
					$major = $_POST['major'];

				if (empty($_POST['code']))
					$errors[] = 'You forgot to enter the course code.';
				else
					$code = $_POST['code'];
					
				if (empty($_POST['section']))
					$errors[] = 'You forgot to enter the class section.';
				else{
					$section = $_POST['section'];
				}
				
				if (empty($_POST['instructor']))
					$errors[] = 'You forgot to enter the class instructor.';
				else
					$instructor = $_POST['instructor'];

				if (empty($_POST['room']))
					$errors[] = 'You forgot to enter the class room.';
				else
					$room = $_POST['room'];
				
				if(!empty($error)){
					foreach ($error as $msg)
						echo $msg.'<br>';
				}
				else{
					//step 2: update record
					//define an update query
					$q = "UPDATE classes SET 
						major='$major',
						code='$code',
						section='$section',
						instructor='$instructor',
						room='$room',
						WHERE classID = '$classID'"; 
						
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
				$q = "SELECT * FROM classes WHERE classID = '$classID'";		
				
				//execute the query
				$result = $conn->query($q);
				
				//shoud return only one record
				if ($result->num_rows == 1){
					//one record found. right case.
					$row = $result->fetch_assoc();
					
					//get column values to fill the form
					$major = $row['major'];
					$code = $row['code'];
					$section = $row['section'];
					$instructor = $row['instructor'];
					$room = $row['room'];
    			}
    			else {
    				echo $result->num_rows;
    				echo "there is an error in the classes table.";
    			}
    		}
		?>
		
		<!-- create a form for modifiable user info -->
		<form action = "" method = "post">
			<center><table>
			<tr>
				<td>Major:</td>
				<td><input type="text" name=major
				       value=<?php echo $major ?> ></td>
			</tr>
			<tr>
				<td>Course Code:</td>
				<td><input type="text" name=code
				       value=<?php echo $code ?> ></td>
			</tr>
			<tr>
				<td>Class Section:</td>
				<td><input type="text" name=section
				       value='<?php echo $section ?>' ></td> <!-- note the quotes -->
			</tr>
			<tr>
				<td>Course Instructor:</td>
				<td><input type="text" name=instructor
				       value=<?php echo $instructor ?> ></td>
			</tr>
			<tr>
				<td>Room:</td>
				<td><input type="text" name=room
				       value=<?php echo $room ?> ></td>
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





