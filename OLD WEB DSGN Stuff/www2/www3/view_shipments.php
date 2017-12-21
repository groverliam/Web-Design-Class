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
		

		session_start();
		if ($role == 'admin')
								include("includes/header_adminPROJECT.html");
				else       
								include("includes/header_staff.html");
	?>
	
	<div id="content" >	
		<h1>View Orders</h1>		

		<center><table>
			<col width="100">
			<col width="100">
			<col width="50">
			<col width="100">
			<col width="50">
			<col width="100">
			<col width="50">
			<col width="100">
			<col width="50">
			<col width="75">
			<col width="50">
			<col width="50">
			
			
		<tr>
			<th> Shipment ID </th>
			<th> Good 1 </th>
			<th> Quantity  </th>
			<th> Good 2 </th>
			<th> Quantity </th>
			<th> Good 3 </th>
			<th> Quantity  </th>
			<th> Good 4 </th>
			<th> Quantity </th>
			<th> Status </th>
			<th> Change </th>
			<th> Invoice </th>

		</tr>

		<?php 
			//connect to DB
			include("includes/db_connection.php");

			$q = "SELECT * FROM shipment";
			$r = $conn->query($q);
			
			while ($row = $r->fetch_assoc()){
				echo "<tr>";
					echo "<td>".$row['shipID']."</td>";
					echo "<td>".$row['good1']."</td>";
					echo "<td>".$row['quantity1']."</td>";
					echo "<td>".$row['good2']."</td>";
					echo "<td>".$row['quantity2']."</td>";
					echo "<td>".$row['good3']."</td>";
					echo "<td>".$row['quantity3']."</td>";
					echo "<td>".$row['good4']."</td>";
					echo "<td>".$row['quantity4']."</td>";
					echo "<td>".$row['status']."</td>";
					echo "<td><a href='set_shipped.php?shipID_TBD=".$row['shipID']."'>Ship</a></td>";
					echo "<td><a href='ship_invoice.php?shipID_TBD=".$row['shipID']."'>Invoice</a></td>";
					
				echo "</tr>";
			}
		?>					
		</table><center> 
	</div> <!--content -->

	<div id="footer">
		<p>Copyright 2017 Monmouth University</p>
	</div>
	</div> <!--container -->
</body>
</html>