<html>

	<body>
		<div id = "container">
		
		<?php include("Header_Admin.html");?>
		
		<?php 
			session_start();
			
			if (isset($_SESSION['username']) && ($_SESSION['Role'] == 'Admin'))
			{
				$username = $_SESSION['username'];	
			}				
			else
			{
				header('LOCATION: index.html');
			}
		?>
	
		<div id="content" >	
			<h1>View Users</h1>		

			<?php 
				function menu ($arr, $name, $value) 
				{
					echo '<select name='.$name.'>';
					
					foreach ($arr as $ar) 
					{
						echo '<option value = "'.$ar.'"';
						if ($ar==$value) 
						{
							echo 'selected = "selected"';
							echo '>'.$ar.'</option>';
						}	
					echo '</select>';
				}
			?>		
			
			<?php
				$subject = "";
				
				if ($_SERVER['REQUEST_METHOD'] == 'POST')
				{
					$Role = $_POST['Role'];
				}
			?>
			
			<form action = "" method = "post">
			
				<center>
				<table style = "padding: 10px 0 px">
					
					<tr>
						<td>
							<?php
								$sub = array("Admin", "Actor", "Actress", "Director", "Model");
								menu ($sub, 'Role', $_POST['Role']);
							?>
						</td>
						
						<td>
							<input type = "submit" name = "search" value = "Display">
						</td>
					</tr>
					
				</table
				</center>
				
			</form>
			
			<center>
			<table>
			
				<col width="65">
				<col width="65">
				<col width="65">
				<col width="65">
				<col width="65">
				<col width="65">	
				<col width="65">
				<col width="65">
				
				<tr>
					<th> Role </th>
					<th> First Name </th>
					<th> Last Name </th>
					<th> Email  </th>
					
					<!-- Add other column fields before "Send Email" -->
					
					<th> Send Email </th>
					<th> Edit </th>
					<th> Delete </th>
				</tr>

				<?php 
					// Conenct to DB
					include ("DB_Connection.php");

					$sql = "SELECT * FROM Users WHERE Role = '$Role'";
				
					// R variable is an object reference that stores the connection of the query
					$r = $conn->query($sql);
			
					while ($row = $r->fetch_assoc()) 
					{ 
						// Puts one record r in row, making sure its not null 
						echo "<tr>";
							echo "<td>".$row['Role']."</td>";
							echo "<td>".$row['First Name']."</td>";
							echo "<td>".$row['Last Name']."</td>";
							echo "<td>".$row['Email']."</td>";
					
							// Add other column fields before "Send Email" 
					
							echo "<td><a href='Send_Email.php?UserID=".$row['UserID']."'>Send</td>";
							echo "<td><a href='Edit_User.php?UserID=".$row['UserID']."'>Edit</td>";
							echo "<td><a href='Delete_User.php?UserID=".$row['UserID']."'>Delete</td>";
						echo "</tr>";
					}
				?>	
			
			</table>
			</center>

		</div> <!--content -->

		</div> <!--container -->
		
		<?php include("Footer.html"); ?>
		
	</body>

</html>