<?php
require_once ('dbhelp.php');

if(!empty($_POST)){
    $ma_quan_huyen = $_POST['ma_quan_huyen'];
    // echo $ma_tinh;
    $sql = "UPDATE quan_huyen SET ma_quan_huyen=null WHERE ma_quan_huyen = '$ma_quan_huyen'";
    // echo $sql;
    execute($sql);
}

header('location: test.php');

?>