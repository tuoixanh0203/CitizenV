<?php 
session_start(); 
require_once ('dbhelp.php');

if(!empty($_POST)){
    $ten_tinh = $_POST['ten_tinh'];
    $ma_tinh = $_POST['ma_tinh'];

    $sql = "UPDATE tinh SET ma_tinh='$ma_tinh' WHERE ten_tinh = '$ten_tinh'";
    execute($sql);
    $_SESSION['success'] = 'Edit Success';
}

header('location: test.php');

?>