<?php
	setcookie('myCookie','mu',time()+30);
	
	header('LOCATION: test_cookie.php');
?>