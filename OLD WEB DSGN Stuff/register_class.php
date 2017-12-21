
<?php
	//session control
	session_start();
	if(isset($_SESSION['uname']) && ($_SESSION['role']=='student') )
		$uname = $_SESSION['uname'];
	else
		header('LOCATION: login.php');

	if (isset($_GET['classID']))
			$classID = $_GET['classID'];
	else
			echo "Invalid access.";
	
	include("includes/db_connection.php");
			
			
	//check to see if the class is already registered.
	$q = "SELECT * From registration WHERE classID = '$classID' AND uname = '$uname' ";
	
	$r = $conn->query($q);
	
	if($r->num_rows > 0) {
		header('LOCATION: register_classes.php');
	}
	
	else
	{
	//define a query
	$q = "INSERT INTO registration (uname, classID, date) 
						 	VALUES	('$uname', '$classID', now())";

	$r= $conn->query($q);
		
	if ($r) 
		header("LOCATION: register_classes.php");
	else
		echo "insert record failed";
	}
?>