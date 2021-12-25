<?php 
require_once ('conn.php');
    if(!empty($_POST)){
		$id = $_POST['ma_quan_huyen'];
		$sql = "SELECT * FROM quan_huyen WHERE ma_quan_huyen = '$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
    // var_dump(empty($_POST));
?>