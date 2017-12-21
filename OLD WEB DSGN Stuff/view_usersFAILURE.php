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
			$display = 3;
			//$q = "SELECT * FROM users";

			if (isset($_GET['p']) && is_numeric($_GET['p'])) { 
				$pages = $_GET['p'];	
			} else { 
				$q = "SELECT COUNT(uname) FROM users";
				$r = @mysqli_query ($dbc, $q);
				$row = @mysqli_fetch_array ($r, MYSQLI_NUM);
				$records = $row[0];
			if ($records > $display) {
				$pages = ceil ($records/$display);
			} else {
				$pages = 1;
			}
		}
		if (isset($_GET['s']) && is_numeric($_GET['s'])) {
			$start = $_GET['s'];
		} else {
			$start = 0;
			}
		
		$q = "SELECT * FROM users ORDER by uname ASC LIMIT 0, 3";


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
			
			if ($pages > 1) {
				echo '<br /><p>';
				$current_page = ($start/$display) + 1;
				
			if ($current_page != 1) {
				echo '<a href="view_users.php?s=' . ($start - $display) .'&p=' . $pages . '">Previous</a> ';
			}
				
			for ($i = 1; $i <= $pages; $i++) {
				if ($i != $current_page) {
					echo '<a href="view_users.php?s=' . (($display * ($i - 1))) . '&p=' . $pages. '">' . $i . '</a> ';
				} else {
					echo $i . ' ';
				}
			}
			
			if ($current_page != $pages) {
				echo '<a href="view_users.php?s=' . ($start + $display) .'&p=' . $pages . '">Next</a>';
			}
				
				echo '</p>';
				
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