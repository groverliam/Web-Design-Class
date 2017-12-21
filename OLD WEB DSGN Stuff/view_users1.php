<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SE357</title>
<link rel="stylesheet" href="includes/admin.css" type="text/css" media="screen" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>

<body>
	<div id = "container">
	<?php 
		include("includes/header_admin.html");

		session_start();
		if (isset($_SESSION['uname']) && ($_SESSION['role'] == 'admin')) 
			$uname=$_SESSION['uname'];		
		else
			header('LOCATION:index.php');
	?>
	
	<div id="content" >	
		<h1>View Users</h1>		

		<center><table>
			<col width="50">
			<col width="100">
			<col width="100">
			<col width="50">
			<col width="50">
			<col width="50">
			<col width="100">	
			<col width="100">
			<col width="50">
			<col width="50">
			<col width="50">
		<tr>
			<th> Username </th>
			<th> Name </th>
			<th> Address  </th>
			<th> City </th>
			<th> Zipcode </th>
			<th> Role </th>
			<th> Email </th>
			<th> Last Login </th>
			<th> Status </th>
			<th> Change Status </th>
			<th> Delete </th>
		</tr>

		<?php 
			//connect to DB
			include("includes/db_connection.php");

			$q = "SELECT * FROM users";
			$r = $conn->query($q);
			
			while ($row = $r->fetch_assoc()){
				echo "<tr>";
					echo "<td>".$row['uname']."</td>";
					echo "<td>".$row['fname']." ".$row['lname']."</td>";
					echo "<td>".$row['address']."</td>";
					echo "<td>".$row['city']."</td>";
					echo "<td>".$row['zipcode']."</td>";
					echo "<td>".$row['role']."</td>";
					echo "<td>".$row['email']."</td>";
					echo "<td>".$row['llogin']."</td>";
					echo "<td>".$row['status']."</td>";
					echo "<td><a href='change_status.php?uname=".$uname."'>Change</a></td>";
					echo "<td><a onClick=\"javascript: return confirm('Do you really want to remove this item?');\" 
					           href='delete_user.php?uname_TBD=".$row['uname']."'>Delete</a></td>";
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