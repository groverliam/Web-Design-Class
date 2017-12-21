<?php
	// Session control
	session_start();
	
	if(isset($_SESSION['username']) && ($_SESSION['Role'] == 'Admin'))
	{
		$username = $_SESSION['username'];
	}
	else
	{
		header('LOCATION: index.html#signup');
	}

	if (isset($_GET['username_TBD']))
	{
		$username_TBD = $_GET['username_TBD'];
	}
	else
	{
		echo "Invalid access.";
	}
		
	// DB connection
	include ("DB_Connection.php");
	
	// Delete query
	$sql = "DELETE FROM Users WHERE username = '$username_TBD'";
	
	$r = $conn->query($sql);
	
	if($r === TRUE)
	{
		header('LOCATION: Edit_Users.php');
	}
	else
	{
		echo "Fail to delete.";
	}
		
?>			
	
