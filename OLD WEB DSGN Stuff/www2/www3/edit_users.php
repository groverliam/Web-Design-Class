<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Monmouth Auto Parts Sales</title>
<link rel="stylesheet" href="includes/admin.css" type="text/css" media="screen" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>

<body>
	<div id = "container">
	<?php 
	
		include("includes/header_adminPROJECT.html"); 
			
	?>
	<?php 
		session_start();
		if (isset($_SESSION['uname'])) 
			$uname=$_SESSION['uname'];		
		else
			header('LOCATION:indexPROJECT.php');
	?>
	
	<div id="content" >	
		<h1>View Users</h1>		

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
				$role = $_POST['role'];
			}	
		?>

		<form action="" method="post"> 
			<center><table style="padding: 10px 0px">
				<tr><td>
				<?php 
					$sub = array("admin", "staff", "manager");
					menu($sub, 'role', $_POST['role']);
				?>
				</td><td>
					<input type="submit" name="search" value="Display">
				</td>
			</table></center>
		</form>


		<center><table>
			<col width="50">
			<col width="50">
			<col width="50">
			<col width="100">
			<col width="80">
			<col width="80">	
			<col width="60">
			<col width="50">
			<col width="50">
		<tr>
			<th> Role </th>
			<th> Username </th>
			<th> First </th>
			<th> Last </th>
			<th> Email </th>
			<th> Address </th>
			<th> Zipcode </th>
			<th> Last Login </th>
			<th> Delete </th>
		</tr>

		<?php 
			//connect to DB
			include("db_connection.php");

			$q = "SELECT * FROM user WHERE role = '$role' order by instructor";
			$r = $conn->query($q); //r variable is an object reference that stores connection of query
			
			while ($row = $r->fetch_assoc()) { //puts one record r in row, making sure its not null 
				echo "<tr>";
					echo "<td>".$row['role']."</td>";
					echo "<td>".$row['uname']."</td>";
					echo "<td>".$row['fname']."</td>";
					echo "<td>".$row['lname']."</td>";
					echo "<td>".$row['email']."</td>";
					echo "<td>".$row['address']."</td>";
					echo "<td>".$row['zipcode']."</td>";
					echo "<td>".$row['llogin']."</td>";
					echo "<td><a href='delete_userPROJECT.php?uname=".$row['uname']."'>Delete</td>";
				echo "</tr>";
			}
		?>					
		</table><center> 
	</div> <!--content -->

	<div id="footer">
		<p>Copyright 2017 Monmouth Auto Parts/p>
	</div>
	</div> <!--container -->
</body>
</html>