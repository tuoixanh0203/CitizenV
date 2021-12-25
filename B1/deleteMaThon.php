<?php
require_once ('dbhelp.php');

if(!empty($_POST)){
    $ma_thon_ban = $_POST['ma_thon_ban'];
    $sql = "DELETE FROM thon_ban WHERE ma_thon_ban = '$ma_thon_ban'";
    execute($sql);
}

header('location: test.php');

?>