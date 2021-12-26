<?php 
session_start(); 
require_once ('dbhelp.php');

if(!empty($_POST)) {
    if(isset($_POST['idHuyen'])) {
        $idHuyen = $_POST['idHuyen'];
    }

    if(isset($_POST['maHuyen'])) {
        $maHuyen = $_POST['maHuyen'];
    }
    
    $sql = "UPDATE quan_huyen SET ma_quan_huyen='$maHuyen' WHERE id = '$idHuyen'";
    execute($sql);
    $_SESSION['success'] = 'Add Success';
}
header('location: test.php');
// echo empty(!$_POST);

?>