<?php
	// Session control
	session_start();
	
	if(isset($_SESSION['username']) && ($_SESSION['Role'] == 'Admin'))
	{
		$username = $_SESSION['username'];
	}
	else
	{
		header('LOCATION: Login.php');
	}


	if (isset($_GET['username_TBD']))
	{
		$username_TBD = $_GET['username_TBD'];
	}
	else
	{
		echo "Invalid access.";
	}
			
	//DB connection
	include("DB_Connection.php");
	
	// Delete query
	$sql = "SELECT * FROM Users WHERE username = '$username_TBD'";
	
	$r = $conn->query($sql);
	
	$row = $r->fetch_assoc();
	
	if ($row['Status'] == 'Blocked')
	{
		$u = "UPDATE Users SET Status = 'Active' WHERE username = '$username_TBD'";
		
		$ur = $conn->query($u);
	}
	else 
	{
		$u = "UPDATE Users SET status = 'Blocked' WHERE username = '$username_TBD'";
		
		$ur = $conn->query($u);
	}
	
	if($ur === TRUE)
	{
		header('LOCATION: Edit_Users.php');
	}
	else
	{
		echo "Failed to update.";
	}
		
?>			
	
