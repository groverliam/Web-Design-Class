 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>MU Auto Parts</title>
<link rel="stylesheet" href="includes/admin.css" type="text/css" media="screen" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>

<body>
	<div id = "container">
	<?php 
		//include("includes/header_staff.html");

	//session control
	session_start();
	if(isset($_SESSION['uname']) && ($_SESSION['role'] == 'staff'))
		$uname = $_SESSION['uname'];
	else
		echo "only staff can view invoices";


	if (isset($_GET['shipID_TBD']))
		$shipID_TBD = $_GET['shipID_TBD'];
	else
		echo "Invalid access.";
		
?>
	<div id="content" >	
	<center>
		<h1>Monmouth Auto Parts</h1>
		<h2>400 Cedar Avenue, West Long Branch, NJ 07764</h2>
		<h3>Invoice</h3>		
	</center>	
		<center><table>
			
<?php	
	//DB connection
	include("db_connection.php");
	
	//delete query
	$q = "SELECT * FROM shipment WHERE shipID = '$shipID_TBD'";
	
	$r = $conn->query($q);
	//$row = $r->fetch_assoc();
	while ($row = $r->fetch_assoc()){
		echo "<tr>";
			echo "<td>Shipment ID:<td>";
			echo "<td>".$row['shipID']."</td>";
		echo "</tr>"; 
		echo "<tr>";
			echo "<td>Good:<td>";
			echo "<td>".$row['good1']."</td>";
		echo "</tr>"; 
		echo "<tr>";
			echo "<td>Quantity:<td>";
			echo "<td>".$row['quantity1']."</td>";
		echo "</tr>";
		echo "<tr>";
			echo "<td>Good:<td>";
			echo "<td>".$row['good2']."</td>";
		echo "</tr>"; 
		echo "<tr>";
			echo "<td>Quantity:<td>";
			echo "<td>".$row['quantity2']."</td>";
		echo "</tr>";
		echo "<tr>";
			echo "<td>Good:<td>";
			echo "<td>".$row['good3']."</td>";
		echo "</tr>"; 
		echo "<tr>";
			echo "<td>Quantity:<td>";
			echo "<td>".$row['quantity3']."</td>";
		echo "</tr>";
		echo "<tr>";
			echo "<td>Good:<td>";
			echo "<td>".$row['good4']."</td>";
		echo "</tr>"; 
		echo "<tr>";
			echo "<td>Quantity:<td>";
			echo "<td>".$row['quantity4']."</td>";
		echo "</tr>";
		}
?>		
		<input type="button" onClick="window.print()" value="Print This Invoice"/>
		</table><center> 
	</div> <!--content -->

	<div id="footer">
		<p>Copyright 2017 Monmouth University</p>
	</div>
	</div> <!--container -->
</body>
</html>