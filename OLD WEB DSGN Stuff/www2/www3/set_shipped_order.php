 
<?php
	
	//session control
	session_start();
	if(isset($_SESSION['uname']) && ($_SESSION['role'] == 'staff'))
		$uname = $_SESSION['uname'];
	else
		header('LOCATION: loginPROJECT.php');


	if (isset($_GET['orderID_TBD']))
		$orderID_TBD = $_GET['orderID_TBD'];
	else
		echo "Invalid access.";
			
	//DB connection
	include("db_connection.php");
	
	//delete query
	$q = "SELECT * FROM orders WHERE orderID = '$orderID_TBD'";
	
	$r = $conn->query($q);
	$row = $r->fetch_assoc();
	if ($row['status']=='processing'){
		$u = "UPDATE orders SET status = 'shipped' WHERE orderID = '$orderID_TBD'";
		$ur = $conn->query($u);
	}
	else {
		echo "Order already shipped";
	}
	if($ur === TRUE)
		header('LOCATION: view_orders.php');
	else
		echo "Fail to update.";
		
?>			
	
