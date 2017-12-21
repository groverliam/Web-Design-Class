<?php

	// Create session variables
	$servername = "localhost";
	$username = "username";
	$password = "password";
	$dbname = "Pananche_Entertainment";
	
	// Create database connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	// Check database connection
	if ($conn->connect_error)
	{
		die("Connection failed: " . $conn->connect_error);
	}

?>