<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SE357</title>
<link rel="stylesheet" href="includes/admin.css" type="text/css" media="screen" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>

<body>
	<div id = "container">
	<?php include("includes/header_staff.html");?>
	<?php 
		session_start();
		if (isset($_SESSION['uname'])) 
			$uname=$_SESSION['uname'];		
		else
			header('LOCATION:indexPROJECT.php');
	?>
	
	<div id="content" >	
		<h1>Edit Customers</h1>		

		<?php 
			function menu ($arr, $name, $value) {
				echo '<select name='.$name.'>';
				foreach ($arr as $ar) {
					echo '<option value = "'.$ar.'"';
					if ($ar==$value) echo 'selected="selected"';
						echo '>'.$ar.'</option>';
					}	
				echo '</select>';
			}
		?>		
			
		<?php
			$subject = "";
	
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$origin = $_POST['origin'];
			}	
		?>

		<form action="" method="post"> 
			<center><table style="padding: 10px 0px">
				<tr><td>
				<?php 
					$sub = array("national", "international");
					menu($sub, 'origin', $_POST['origin']);
				?>
				</td><td>
					<input type="submit" name="search" value="Display">
				</td>
			</table></center>
		</form>


		<center><table>
			<col width="65">
			<col width="65">
			<col width="65">
			<col width="65">
			<col width="65">
			<col width="65">	
			<col width="65">
			<col width="65">
		<tr>
			<th> Origin </th>
			<th> Company Name </th>
			<th> Phone Number </th>
			<th> Email </th>
			<th> Address </th>
			<th> Send Email </th>
			<th> Edit </th>
			<th> Delete </th>
		</tr>

		<?php 
			//connect to DB
			include("db_connection.php");

			$q = "SELECT * FROM customer WHERE origin = '$origin' order by staff";
			$r = $conn->query($q); //r variable is an object reference that stores connection of query
			
			while ($row = $r->fetch_assoc()) { //puts one record r in row, making sure its not null 
				echo "<tr>";
					echo "<td>".$row['origin']."</td>";
					echo "<td>".$row['companyName']."</td>";
					echo "<td>".$row['phoneNumber']."</td>";
					echo "<td>".$row['email']."</td>";
					echo "<td>".$row['mailingAddress']."</td>";
					echo "<td><a href='send_email.php?customerID=".$row['customerID']."'>Edit</td>";
					echo "<td><a href='edit_customer.php?customerID=".$row['customerID']."'>Edit</td>";
					echo "<td><a href='delete_customer.php?customerID=".$row['customerID']."'>Delete</td>";
				echo "</tr>";
			}
		?>					
		</table><center> 
	</div> <!--content -->

	<div id="footer">
		<p>Copyright 2017 Monmouth Auto Parts</p>
	</div>
	</div> <!--container -->
</body>
</html>