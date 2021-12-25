<?php
session_start(); 
require_once ('dbhelp.php');

if(!empty($_POST)){
    $ten_quan_huyen = $_POST['ten_quan_huyen'];
    $ma_quan_huyen = $_POST['ma_quan_huyen'];

    $sql = "UPDATE quan_huyen SET ma_quan_huyen='$ma_quan_huyen' WHERE ten_quan_huyen = '$ten_quan_huyen'";
    execute($sql);
    $_SESSION['success'] = 'Edit Success';
}

header('location: test.php');

?>