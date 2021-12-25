<?php
require_once ('dbhelp.php');

if(!empty($_POST)){
    $ten_thon_ban = $_POST['ten_thon_ban'];
    $ma_thon_ban = $_POST['ma_thon_ban'];

    // echo $ten_tinh;
    // echo $ma_tinh;
    $sql = "UPDATE thon_ban SET ma_thon_ban='$ma_thon_ban' WHERE ten_thon_ban = '$ten_thon_ban'";
    // echo $sql;
    execute($sql);
}

header('location: test.php');

?>