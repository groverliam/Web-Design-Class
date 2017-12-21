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
	if ($role == 'admin')
					include("includes/header_adminPROJECT.html");
	else       
					include("includes/header_staff.html");


	if (isset($_GET['orderID_TBD']))
		$orderID_TBD = $_GET['orderID_TBD'];
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
	$q = "SELECT * FROM orders WHERE orderID = '$orderID_TBD'";
	
	$r = $conn->query($q);
	//$row = $r->fetch_assoc();
	while ($row = $r->fetch_assoc()){
		echo "<tr>";
			echo "<td>Order ID:<td>";
			echo "<td>".$row['orderID']."</td>";
		echo "</tr>"; 
		echo "<tr>";
			echo "<td>Product ID:<td>";
			echo "<td>".$row['productID']."</td>";
		echo "</tr>"; 
		echo "<tr>";
			echo "<td>Unit Price:<td>";
			echo "<td>".$row['unitPrice']."</td>";
		echo "</tr>"; 
		echo "<tr>";
			echo "<td>Quantity:<td>";
			echo "<td>".$row['quantity']."</td>";
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