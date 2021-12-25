<?php
require_once ('dbhelp.php');
session_start();

if(!empty($_POST)){
    $ten_thon_ban = $_POST['ten_thon_ban'];
    $ma_thon_ban = $_POST['ma_thon_ban'];

    $sql = "UPDATE thon_ban SET ma_thon_ban='$ma_thon_ban' WHERE ten_thon_ban = '$ten_thon_ban'";
    execute($sql);
    $_SESSION['success'] = 'Edit Success';
}

header('location: test.php');

?>