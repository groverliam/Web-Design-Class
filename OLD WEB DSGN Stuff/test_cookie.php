<?php
	if(!isset($_COOKIE['myCookie']))
		header('LOCATION: login.php');
	else
		echo "Cookie is set";
?>