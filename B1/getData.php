<?php 
require_once ('conn.php');
    if(!empty($_POST)){
		$id = $_POST['ma_thon_ban'];
		$sql = "SELECT * FROM users WHERE username = '$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>