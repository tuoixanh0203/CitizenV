<?php
require_once ('dbhelp.php');

if(!empty($_POST)){
    $ten_tinh = $_POST['ten_tinh'];
    $ma_tinh = $_POST['ma_tinh'];

    // echo $ten_tinh;
    // echo $ma_tinh;
    $sql = "UPDATE tinh SET ma_tinh='$ma_tinh' WHERE ten_tinh = '$ten_tinh'";
    // echo $sql;
    execute($sql);
}

header('location: test.php');

?>