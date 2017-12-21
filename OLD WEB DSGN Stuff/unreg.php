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
		include("includes/header_student.html");

		session_start();
		if (isset($_SESSION['uname']) && ($_SESSION['role'] == 'student')) 
			$uname=$_SESSION['uname'];		
		else
			header('LOCATION:index.php');
	?>
	
	<div id="content" >	
		<h1>View Classes</h1>		

		<center><table>
			<col width="50">
			<col width="100">
			<col width="100">
			<col width="50">
			<col width="50">
			<col width="50">
			<col width="100">	
	
		<tr>
			<th> Class ID </th>
			<th> Major </th>
			<th> Code  </th>
			<th> Section </th>
			<th> Instructor </th>
			<th> Room </th>
			<th> Unregister </th>

		</tr>

		<?php 
			//connect to DB
			include("includes/db_connection.php");

			$q = "SELECT classes.* FROM classes JOIN registration 
                                            ON classes.classID = registration.classID WHERE uname = '$uname' ORDER by major, code";
			$r = $conn->query($q);
			
			while ($row = $r->fetch_assoc()){
				echo "<tr>";
					echo "<td>".$row['classID']."</td>";
					echo "<td>".$row['major']."</td>";
					echo "<td>".$row['code']."</td>";
					echo "<td>".$row['section']."</td>";
					echo "<td>".$row['instructor']."</td>";
					echo "<td>".$row['room']."</td>";
					echo "<td><a href='deregister_class.php?classID=".$row['classID']."'>Unregister</td>";
					
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