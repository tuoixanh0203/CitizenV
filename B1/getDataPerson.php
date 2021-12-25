<?php
require_once ('conn.php');
if(!empty($_POST)){
    $id = $_POST['id'];
    $sql = "SELECT * FROM person WHERE id = '$id'";
    $query = $conn->query($sql);
    $row = $query->fetch_assoc();

    echo json_encode($row);
}
?>