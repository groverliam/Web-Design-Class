
<?php
	
	//session control
	session_start();
	if(isset($_SESSION['uname']) && ($_SESSION['role'] == 'admin'))
		$uname = $_SESSION['uname'];
	else
		header('LOCATION: login.php');


	if (isset($_GET['uname_TBC']))
		$uname_TBC = $_GET['uname_TBC'];
	else
		echo "Invalid access.";
			
	//DB connection
	include("includes/db_connection.php");
	
	//delete query
	$q = "SELECT * FROM users WHERE uname = '$uname_TBC'";
	
	$r = $conn->query($q);
	$row = $r->fetch_assoc();
	if ($row['status']=='blocked'){
		$u = "UPDATE users SET status = 'approved' WHERE uname = '$uname_TBC'";
		$ur = $conn->query($u);
	}
	else {
		$u = "UPDATE users SET status = 'blocked' WHERE uname = '$uname_TBC'";
		$ur = $conn->query($u);
	}
	if($ur === TRUE)
		header('LOCATION: view_users.php');
	else
		echo "Fail to update.";
		
?>			
	
