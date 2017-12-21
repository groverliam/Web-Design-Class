<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>MU Parts</title>
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
			
			
			
		//if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		//		$code = $_POST['code'];
		//	}	
	?>
	
	<div id="content" >	
		<h1>View Goods</h1>		
		
		<form action="" method="post"> 
			<center><table style="padding: 10px 0px">
				<tr>
					<td>Search by code: </td>
					<td><input type="text" name="code" 
					value=<?php if(isset($_POST['code'])) echo $_POST['code'] ?>></td>
					<td><input type="submit" name="search" value="Search"></td>
				</tr>
			</table></center>
		</form>

		
		
		<center><table>
			<col width="50">
			<col width="100">
			<col width="100">
			<col width="50">
			<col width="50">
			<col width="100">
			<col width="100">	
			<col width="100">
			<col width="50">
			<col width="50">
			
		<tr>
			<th> Code </th>
			<th> Description </th>
			<th> Specification  </th>
			<th> Unit </th>
			<th> Purchase Price </th>
			<th> Purchase Date </th>
			<th> Quantity Per Container </th>
			<th> Container Size </th>
			<th> Gross Weight </th>
			<th> Net Weight </th>
			<th> Update </th>
			
		</tr>

		<?php 
			//connect to DB
			include("includes/db_connection.php");

			if(!empty($code))
			{
				$q = "SELECT * FROM goods WHERE code = '$code' ORDER by description";
			}
			else
			{
				$q = "SELECT * FROM goods ORDER by description";
			}
			//$q = "SELECT * FROM goods";
			$r = $conn->query($q);
			
			while ($row = $r->fetch_assoc()){
				echo "<tr>";
					echo "<td>".$row['code']."</td>";
					echo "<td>".$row['description']."</td>";
					echo "<td>".$row['specification']."</td>";
					echo "<td>".$row['unit']."</td>";
					echo "<td>".$row['purchasePrice']."</td>";
					echo "<td>".$row['purchaseDate']."</td>";
					echo "<td>".$row['quantityPerContainer']."</td>";
					echo "<td>".$row['containerSize']."</td>";
					echo "<td>".$row['grossWeight']."</td>";
					echo "<td>".$row['netWeight']."</td>";
					echo "<td><a href='update_goods.php?code=".$row['code']."'>Update</td>";
					//echo "<td><a onClick=\"javascript: return confirm('Do you really want to remove this item?');\" 
					//           href='delete_user.php?uname_TBD=".$row['uname']."'>Delete</a></td>";
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