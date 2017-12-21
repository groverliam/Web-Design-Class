 <html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>MU Parts</title>
<link rel="stylesheet" href="includes/admin.css" type="text/css" media="screen" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>

<body>
	<div id = "container">
	<?php 
		include("includes/header_manager.html");

		session_start();
		if (isset($_SESSION['uname']) && ($_SESSION['role'] == 'manager')) 	
		$uname=$_SESSION['uname'];	
		else
			header('LOCATION:indexPROJECT.php');
			
			
			
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
			<col width="50">
			<col width="100">	
			<col width="100">
			<col width="50">
			<col width="50">
			
		<tr>
			<th> Code </th>
			<th> Customer ID </th>
			<th> Customer Code  </th>
			<th> Price Term </th>
			<th> Currency </th>
			<th> Unit Price </th>
			<th> Sale Price Date </th>
			<th> Update </th>
			
		</tr>

		<?php 
			//connect to DB
			include("includes/db_connection.php");

			if(!empty($code))
			{
				$q = "SELECT * FROM pofgoods WHERE code = '$code' ORDER by customerID";
			}
			else
			{
				$q = "SELECT * FROM pofgoods ORDER by customerID";
			}
			//$q = "SELECT * FROM goods";
			$r = $conn->query($q);
			
			while ($row = $r->fetch_assoc()){
				echo "<tr>";
					echo "<td>".$row['code']."</td>";
					echo "<td>".$row['customerID']."</td>";
					echo "<td>".$row['customerCode']."</td>";
					echo "<td>".$row['priceTerm']."</td>";
					echo "<td>".$row['currency']."</td>";
					echo "<td>".$row['unitPrice']."</td>";
					echo "<td>".$row['salesPriceDate']."</td>";
					echo "<td><a href='edit_pof.php?code=".$row['code']."'>Update</td>";
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