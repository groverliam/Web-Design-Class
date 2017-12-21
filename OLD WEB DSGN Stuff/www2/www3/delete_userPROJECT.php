
<?php
	
	//session control
	session_start();
	if(isset($_SESSION['uname']) && ($_SESSION['role'] == 'admin')) //if logged in and is an admin
		$uname = $_SESSION['uname'];
	else
		header('LOCATION: loginPROJECT.php');


	if (isset($_GET['uname_TBD']))
		$uname_TBD = $_GET['uname_TBD'];
	else
		echo "Invalid access.";
			
	//DB connection
	include("includes/db_connection.php");
	
	//delete query
	$q = "DELETE FROM user WHERE uname = '$uname_TBD'";
	
	$r = $conn->query($q);
	if($r === TRUE)
		header('LOCATION: view_usersPROJECT.php');
	else
		echo "Fail to delete.";
		
?>			
	
