<?php 
session_start(); 
require_once ('dbhelp.php');

if(!empty($_POST)) {
    if(isset($_POST['tenHuyen'])) {
        $tenHuyen = $_POST['tenHuyen'];
    }

    if(isset($_POST['maHuyen'])) {
        $maHuyen = $_POST['maHuyen'];
    }
    
    $sql = "UPDATE quan_huyen SET ma_quan_huyen='$maHuyen' WHERE ten_quan_huyen = '$tenHuyen'";
    execute($sql);
    $_SESSION['success'] = 'Add Success';
}
header('location: test.php');

?>