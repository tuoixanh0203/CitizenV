<?php
require_once ('dbhelp.php');
session_start(); 

if(!empty($_POST)){
    $idXa = $_POST['idXa'];
    $ma_phuong_xa = $_POST['ma_phuong_xa'];

    $sql = "UPDATE phuong_xa SET ma_phuong_xa='$ma_phuong_xa' WHERE id = '$idXa'";
    execute($sql);
    $_SESSION['success'] = 'Edit Success';
}

header('location: test.php');

?>