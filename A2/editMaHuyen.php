<?php
require_once ('dbhelp.php');

if(!empty($_POST)){
    $ten_quan_huyen = $_POST['ten_quan_huyen'];
    $ma_quan_huyen = $_POST['ma_quan_huyen'];

    // echo $ten_tinh;
    // echo $ma_tinh;
    $sql = "UPDATE quan_huyen SET ma_quan_huyen='$ma_quan_huyen' WHERE ten_quan_huyen = '$ten_quan_huyen'";
    // echo $sql;
    execute($sql);
}

header('location: test.php');

?>