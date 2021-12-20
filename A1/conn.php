<?php
	$conn = new mysqli('localhost', 'root', '', 'citizen');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	// mysql_query("SET NAMES 'utf8'");
?>