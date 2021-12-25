<?php 
session_start(); 
require_once ('dbhelp.php');

if (!empty($_POST)) {
    if (isset($_POST['tenXa'])) {
        $tenXa = $_POST['tenXa'];
    }
    if (isset($_POST['maXa'])) {
        $maXa = $_POST['maXa'];
    }

    $sql = "UPDATE phuong_xa SET ma_phuong_xa='$maXa' WHERE ten_phuong_xa = '$tenXa'";
    execute($sql);
    $_SESSION['success'] = 'Add Success';
}

header('location: test.php');

?>