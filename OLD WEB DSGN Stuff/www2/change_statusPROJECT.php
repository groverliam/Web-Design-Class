
<?php
	
	//session control
	session_start();
	if(isset($_SESSION['uname']) && ($_SESSION['role'] == 'admin'))
		$uname = $_SESSION['uname'];
	else
		header('LOCATION: loginPROJECT.php');


	if (isset($_GET['uname_TBD']))
		$uname_TBC = $_GET['uname_TBD'];
	else
		echo "Invalid access.";
			
	//DB connection
	include("db_connection.php");
	
	//delete query
	$q = "SELECT * FROM user WHERE uname = '$uname_TBD'";
	
	$r = $conn->query($q);
	$row = $r->fetch_assoc();
	if ($row['status']=='blocked'){
		$u = "UPDATE user SET status = 'approved' WHERE uname = '$uname_TBD'";
		$ur = $conn->query($u);
	}
	else {
		$u = "UPDATE user SET status = 'blocked' WHERE uname = '$uname_TBD'";
		$ur = $conn->query($u);
	}
	if($ur === TRUE)
		header('LOCATION: view_usersPROJECT.php');
	else
		echo "Fail to update.";
		
?>			
	
