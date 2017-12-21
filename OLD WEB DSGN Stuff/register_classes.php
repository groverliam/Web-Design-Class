<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SE357</title>
<link rel="stylesheet" href="includes/admin.css" type="text/css" media="screen" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>

<body>
	<div id = "container">
	<?php include("includes/header_student.html");?>
	<?php 
		session_start();
		if (isset($_SESSION['uname']) && ($_SESSION['role']=='student') )
			$uname=$_SESSION['uname'];		
		else
			header('LOCATION:index.php');
	?>
	
	<div id="content" >	
		<h1>Register Classes</h1>		

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
				$major = $_POST['major'];
			}	
		?>

		<form action="" method="post"> 
			<center><table style="padding: 10px 0px">
				<tr><td>
				<?php 
					$sub = array("CS", "SE", "EN", "MA", "HS");
					menu($sub, 'major', $_POST['major']);
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
			<col width="150">
			<col width="120">
			<col width="80">	
			<col width="60">
			<col width="50">
			<col width="50">
		<tr>
			<th> Major </th>
			<th> Code </th>
			<th> Section </th>
			<th> Name </th>
			<th> Schedule </th>
			<th> Room </th>
			<th> Instructor </th>
			<th> Edit </th>
			<th> Delete </th>
		</tr>

		<?php 
			//connect to DB
			include("includes/db_connection.php");

			if(($major == 'ALL') OR (empty($major))
				$q = "SELECT * FROM classes ORDER by instructor";
			else
				$q = "SELECT * FROM classes WHERE major = '$major' ORDER by instructor";
				
			$r = $conn->query($q);
			
			while ($row = $r->fetch_assoc()){
				echo "<tr>";
					echo "<td>".$row['major']."</td>";
					echo "<td>".$row['code']."</td>";
					echo "<td>".$row['section']."</td>";
					echo "<td>".$row['name']."</td>";
					echo "<td>".$row['schedule']."</td>";
					echo "<td>".$row['room']."</td>";
					echo "<td>".$row['instructor']."</td>";
					echo "<td><a href='register_class.php?classID=".$row['classID']."'>Register</td>";
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