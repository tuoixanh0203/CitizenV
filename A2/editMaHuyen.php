<?php
session_start(); 
require_once ('dbhelp.php');

if(!empty($_POST)){
    $idHuyen = $_POST['idHuyen'];
    $ma_quan_huyen = $_POST['ma_quan_huyen'];

    $sql = "UPDATE quan_huyen SET ma_quan_huyen='$ma_quan_huyen' WHERE id = '$idHuyen'";
    execute($sql);
    // echo $sql;
    $_SESSION['success'] = 'Edit Success';
}

header('location: test.php');

?>