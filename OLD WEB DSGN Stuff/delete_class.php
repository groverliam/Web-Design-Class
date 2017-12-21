 <?php
 	if(isset($_SESSION['uname']))
 		header('LOCATION: login.php');
 	else
 		$classID = $_GET['classID'];
 	include("includes/db_connection.php");
 	$q = "DELETE FROM classes WHERE classID = '$classID'";
 	$r = $conn -> query($q);
 	
 	if(r === TRUE)
 		echo "class ".$classID." removed."
 ?>