
<?php
	
	//session control
	session_start();
	if(isset($_SESSION['uname']) && ($_SESSION['role'] == 'manager')) //if logged in and is an manager
		$uname = $_SESSION['uname'];
	else
		header('LOCATION: loginPROJECT.php');


	if (isset($_GET['orderID_TBD']))
		$orderID_TBD = $_GET['orderID_TBD'];
	else
		echo "Invalid access.";
			
	//DB connection
	include("includes/db_connection.php");
	
	//delete query
	$q = "DELETE FROM orders WHERE orderID = '$orderID_TBD'";
	
	$r = $conn->query($q);
	if($r === TRUE)
		header('LOCATION: view_orders.php');
	else
		echo "Fail to delete.";
		
?>			
	
