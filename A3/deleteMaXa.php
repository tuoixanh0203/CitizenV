<?php
require_once ('dbhelp.php');

if(!empty($_POST)){
    $ma_phuong_xa = $_POST['ma_phuong_xa'];
    // echo $ma_tinh;
    $sql = "UPDATE phuong_xa SET ma_phuong_xa=null WHERE ma_phuong_xa = '$ma_phuong_xa'";
    // echo $sql;
    execute($sql);
}

header('location: test.php');

?>