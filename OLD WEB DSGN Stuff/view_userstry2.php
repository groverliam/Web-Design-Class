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
	
$page_title = 'View the Current Users';
include ('includes/header_admin.html');
	 echo '<h1>Registered Users</h1>';
	
	 include("includes/db_connection.php");
	
 $display = 3;
	
 if (isset($_GET['p']) && is_numeric($_GET['p'])) {
	
 $pages = $_GET['p'];
	
 } else { 
$q = "SELECT COUNT(uname) FROM
 users";
 $r = @mysqli_query ($dbc, $q);
 $row = @mysqli_fetch_array ($r,
 MYSQLI_NUM);
 $records = $row[0];
	
 if ($records > $display) { 
 $pages = ceil ($records/$display);
 } else {
 $pages = 1;
 }
	 	
 } 
 if (isset($_GET['s']) && is_numeric()) {
 $start = $_GET['s'];
 } else {
 $start = 0;
 }
	 	 	
 $q = "SELECT * FROM users ORDER BY uname ASC LIMIT $start, $display";
	 $r = @mysqli_query ($dbc, $q);
	
	 echo '<table align="center" cellspacing="0" cellpadding="5" width="75%">
	 <tr>
	 	 <td align="left"><b>Username</b></td>
	 	 <td align="left"><b>Last Name</b></td>
	 	 <td align="left"><b>First Name</b></td>
	 	 <td align="left"><b>Address</b></td>
	 	 <td align="left"><b>City</b></td>
	 	 <td align="left"><b>Zipcode</b></td>
	 	 <td align="left"><b>Role</b></td>
	 	 <td align="left"><b>Status</b></td>
	 	 <<td align="left"><b>Delete</b></td>
	 </tr>';
	$bg = '#eeeeee'; 
	
	 while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
	
 $bg = ($bg=='#eeeeee' ? '#ffffff' :
 '#eeeeee'); 
	 	
 echo '<tr bgcolor="' . $bg . '">
 	 	 	<td align="left">' . $row['uname'] . '</td>
	 	 	<td align="left">' . $row['fname'] . $row['lname'] . '</td>
	 	 	<td align="left">' . $row['address'] . '</td>
	 	 	<td align="left">' . $row['city'] . '</td>
	 	 	<td align="left">' . $row['zipcode'] . '</td>
	 	 	<td align="left">' . $row['uname'] . '</td>
	 	 	<td align="left"><a href="delete_user.php?uname_TBD='.$row['uname'] .'">Delete</a></td>

	 	 </tr>';
	 	
	 } // End of WHILE loop.
	
	 echo '</table>';
	 mysqli_free_result ($r);
	 mysqli_close($dbc);
	

 if ($pages > 1) {
	 	
	 	 echo '<br /><p>';

 $current_page = ($start/$display)+ 1;
	 	
 if ($current_page != 1) {
 	echo '<a href="view_users.php?s=' . ($start - $display) .'&p=' . $pages . '">Previous</a> ';
 }
 
 for ($i = 1; $i <= $pages; $i++) {
 if ($i != $current_page) {
 echo '<a href="view_users.php?s=' . (($display *($i - 1))) . '&p=' . $pages .'">' . $i . '</a> ';
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
 
 <div id="footer">
		<p>Copyright 2017 Monmouth University</p>
	</div>
	</div> <!--container -->
</body>
</html>
 
 
 
 
 
 
 
 
 
 
 
 
