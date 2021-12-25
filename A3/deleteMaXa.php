<?php
require_once ('dbhelp.php');
session_start(); 

if(!empty($_POST)){
    $ma_phuong_xa = $_POST['ma_phuong_xa'];
    $sql = "UPDATE phuong_xa SET ma_phuong_xa=null WHERE ma_phuong_xa = '$ma_phuong_xa'";
    execute($sql);
    $_SESSION['success'] = 'Delete Success';
}

header('location: test.php');

?>