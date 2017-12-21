 
<?php
	
	//session control
	session_start();
	if(isset($_SESSION['uname']) && ($_SESSION['role'] == 'staff'))
		$uname = $_SESSION['uname'];
	else
		header('LOCATION: loginPROJECT.php');


	if (isset($_GET['shipID_TBD']))
		$shipID_TBD = $_GET['shipID_TBD'];
	else
		echo "Invalid access.";
			
	//DB connection
	include("db_connection.php");
	
	//delete query
	$q = "SELECT * FROM shipment WHERE shipID = '$shipID_TBD'";
	
	$r = $conn->query($q);
	$row = $r->fetch_assoc();
	if ($row['status']=='processing'){
		$u = "UPDATE shipment SET status = 'shipped' WHERE shipID = '$shipID_TBD'";
		$ur = $conn->query($u);
	}
	else {
		echo "Shipment already shipped";
	}
	if($ur === TRUE)
		header('LOCATION: view_shipments.php');
	else
		echo "Fail to update.";
		
?>			
	
