<?php 
session_start(); 
require_once ('dbhelp.php');

if (!empty($_POST)) {
    if (isset($_POST['idTinh'])) {
        $idTinh = $_POST['idTinh'];
    }
    if (isset($_POST['maTinh'])) {
        $maTinh = $_POST['maTinh'];
    }

    $sql = "UPDATE tinh SET ma_tinh='$maTinh' WHERE id = '$idTinh'";
    execute($sql);
    $_SESSION['success'] = 'Add Success';
}

header('location: test.php');

?>