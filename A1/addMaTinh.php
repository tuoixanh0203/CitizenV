<?php 
session_start(); 
require_once ('dbhelp.php');

if (!empty($_POST)) {
    if (isset($_POST['tenTinh'])) {
        $tenTinh = $_POST['tenTinh'];
    }
    if (isset($_POST['maTinh'])) {
        $maTinh = $_POST['maTinh'];
    }

    $sql = "UPDATE tinh SET ma_tinh='$maTinh' WHERE ten_tinh = '$tenTinh'";
    execute($sql);
    $_SESSION['success'] = 'Add Success';
}

header('location: test.php');

?>