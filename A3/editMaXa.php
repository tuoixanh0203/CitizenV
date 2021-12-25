<?php
require_once ('dbhelp.php');

if(!empty($_POST)){
    $ten_phuong_xa = $_POST['ten_phuong_xa'];
    $ma_phuong_xa = $_POST['ma_phuong_xa'];

    // echo $ten_tinh;
    // echo $ma_tinh;
    $sql = "UPDATE phuong_xa SET ma_phuong_xa='$ma_phuong_xa' WHERE ten_phuong_xa = '$ten_phuong_xa'";
    // echo $sql;
    execute($sql);
}

header('location: test.php');

?>