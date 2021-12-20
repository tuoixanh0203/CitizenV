<?php
require_once ('dbhelp.php');
$username = $time_start = $time_end = "";

if(!empty($_POST)){
    $username = $_POST['username'];
    if(isset($_POST['time_start'])) {
        $time_start = $_POST['time_start'];
    }
    if(isset($_POST['time_end'])) {
        $time_end = $_POST['time_end'];
    }

    // echo $username;
    // echo $time_start;
    // echo $time_end;
    $sql = "UPDATE users SET start='$time_start',end='$time_end' WHERE username = '$username'";
    // echo $sql;
    execute($sql);
}

header('location: createA2.php');

?>