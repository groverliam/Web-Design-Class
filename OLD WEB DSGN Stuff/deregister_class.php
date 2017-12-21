
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
	
	//delete query
	$q = "DELETE FROM registration WHERE classID = '$classID' AND uname = '$uname'";
	
	$r = $conn->query($q);
	if($r === TRUE)
		header('LOCATION: unreg.php');
	else
		echo "Fail to delete.";
?>