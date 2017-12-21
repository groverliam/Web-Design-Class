<!class_info.php>
<html>

	<title>Add New Class</title>
	
	<body>
	
		<center>
		<h1>Enter the Class Information</h1>
		
		<?php
		if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
		include("includes/db_connection.php");

		if(!empty($_POST['major']))
			$major = $_POST['major'];
		else
			$error[] = "Class major is not entered.";
			
		if(!empty($_POST['code']))
			$code = $_POST['code'];
		else
			$error[] = "Class code is not entered.";
			
		if(!empty($_POST['section']))
			$section = $_POST['section'];
		else
			$error[] = "Class section is not entered.";
			
		if(!empty($_POST['instr']))
			$instr = $_POST['instr'];
		else
			$error[] = "Class instructor is not entered.";
			
		if(!empty($_POST['room']))
			$room = $_POST['room'];
		else
			$error[] = "Class room is not entered.";
		
		if(!empty($error))
			foreach($error as $msg) { 
				echo $msg;
				echo '<br>';
				}
		

		$sql = "INSERT INTO classes (major, code, section, instructor, room)
		VALUES ('$major', '$code', '$section' , '$instructor', '$room')";

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
		<td><p> Major:</p></td>
  		<td><p> <input type = "text" name = "major"
  			value=<?php if(isset($_POST['major'])) echo $_POST['major'] ?>></td>
  		<tr>
		
		<tr>	
		<td><p> Code:</p></td>
  		<td><p> <input type = "text" name = "code"
  			value=<?php if(isset($_POST['code'])) echo $_POST['code'] ?>></td>
		</tr>
		
		<tr>	
		<td><p> Section:</p></td>
  		<td><p> <input type = "text" name = "section"
  			value=<?php if(isset($_POST['section'])) echo $_POST['section'] ?>></td>
		</tr>
			
		<tr>
		<td><p> Instructor:</p></td>
  		<td><p> <input type = "text" name = "instr"
  			value=<?php if(isset($_POST['instr'])) echo $_POST['instr'] ?>></td>
		</tr>
		
		<tr>
		<td><p> Room:</p></td>
  		<td><p> <input type = "text" name = "room"
  			value=<?php if(isset($_POST['room'])) echo $_POST['room'] ?>></td>
		</tr>
		
	</table>	
	<input type= "submit" value= "Submit">
	</center>
</form>
		
</body>
	
</html>