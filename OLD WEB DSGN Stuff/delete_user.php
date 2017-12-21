
<?php
	
	//session control
	session_start();
	if(isset($_SESSION['uname']) && ($_SESSION['role'] == 'admin'))
		$uname = $_SESSION['uname'];
	else
		header('LOCATION: login.php');


	if (isset($_GET['uname_TBD']))
		$uname_TBD = $_GET['uname_TBD'];
	else
		echo "Invalid access.";
			
	//DB connection
	include("includes/db_connection.php");
	
	//delete query
	$q = "DELETE FROM users WHERE uname = '$uname_TBD'";
	
	$r = $conn->query($q);
	if($r === TRUE)
		header('LOCATION: view_users.php');
	else
		echo "Fail to delete.";
		
?>			
	
