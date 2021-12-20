<?php 
require_once ('conn.php');
    if(!empty($_POST)){
		$id = $_POST['ma_tinh'];
		$sql = "SELECT * FROM users WHERE username = '$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
    // var_dump(empty($_POST));
?>