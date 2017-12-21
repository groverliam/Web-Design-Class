<?php

	// Create session variables
	$servername = "localhost";
	$uname = "root";
	$pword = "root";
	$dbname = "pananche_entertainment";
	
	// Create database connection
	$conn = new mysqli($servername, $uname, $pword, $dbname);
	
	// Check database connection
	if ($conn->connect_error)
	{
		die("Connection failed: " . $conn->connect_error);
	}

?>