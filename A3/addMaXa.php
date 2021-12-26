<?php 
session_start(); 
require_once ('dbhelp.php');

if (!empty($_POST)) {
    if (isset($_POST['idXa'])) {
        $idXa = $_POST['idXa'];
    }
    if (isset($_POST['maXa'])) {
        $maXa = $_POST['maXa'];
    }

    $sql = "UPDATE phuong_xa SET ma_phuong_xa='$maXa' WHERE id = '$idXa'";
    // echo $sql;
    execute($sql);
    $_SESSION['success'] = 'Add Success';
}
header('location: test.php');
?>