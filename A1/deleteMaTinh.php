<?php
require_once ('dbhelp.php');

if(!empty($_POST)){
    $ma_tinh = $_POST['ma_tinh'];
    echo $ma_tinh;
    $sql = "UPDATE tinh SET ma_tinh=null WHERE ma_tinh = '$ma_tinh'";
    // echo $sql;
    execute($sql);
}

header('location: test.php');

?>