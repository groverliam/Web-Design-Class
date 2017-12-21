<?php
if(!isset($_SESSION['uname']))
	header('LOCATION: loginPROJECT.php');
else
	$customerID = $_GET['customerID'];

include("includes/db_connection.php");
$q = "DELETE  FROM customer WHERE customerID = '$customerID'";
$r = $conn -> query($q);

if($r===TRUE)
	echo "customer".$customerID."removed.";
else
	echo "something went wrong.";
?>