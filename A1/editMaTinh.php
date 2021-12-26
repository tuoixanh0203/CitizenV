<?php 
session_start(); 
require_once ('dbhelp.php');

if(!empty($_POST)){
    $idTinh = $_POST['idTinh'];
    $ma_tinh = $_POST['ma_tinh'];

    $sql = "UPDATE tinh SET ma_tinh='$ma_tinh' WHERE id = '$idTinh'";
    execute($sql);
    $_SESSION['success'] = 'Edit Success';
}

header('location: test.php');

?>