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
			<col width="50">
			<col width="100">
			<col width="100">
			<col width="50">
			<col width="75">
			<col width="50">
			<col width="50">
			<col width="50">
			
		<tr>
			<th> Order ID </th>
			<th> Product ID </th>
			<th> Unit Price  </th>
			<th> Quantity </th>
			<th> Status </th>
			<th> Change </th>
			<th> View Invoice </th>
			<th> Delete </th>
		</tr>

		<?php 
			//connect to DB
			include("includes/db_connection.php");

			$q = "SELECT * FROM orders";
			$r = $conn->query($q);
			
			while ($row = $r->fetch_assoc()){
				echo "<tr>";
					echo "<td>".$row['orderID']."</td>";
					echo "<td>".$row['productID']."</td>";
					echo "<td>".$row['unitPrice']."</td>";
					echo "<td>".$row['quantity']."</td>";
					echo "<td>".$row['status']."</td>";
					echo "<td><a href='set_shipped_order.php?orderID_TBD=".$row['orderID']."'>Ship</a></td>";
					echo "<td><a href='view_invoice.php?orderID_TBD=".$row['orderID']."'>Invoice</a></td>";
					echo "<td><a onClick=\"javascript: return confirm('Do you really want to remove this item?');\" 
					           href='delete_order.php?orderID_TBD=".$row['orderID']."'>Delete</a></td>";
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