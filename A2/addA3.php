<?php
session_start(); 
require_once ('dbhelp.php');
$username = $password = $time_start = $time_end = "";

if(!empty($_POST)){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    if(isset($_POST['time_start'])) {
        $time_start = $_POST['time_start'];
    }
    if(isset($_POST['time_end'])) {
        $time_end = $_POST['time_end'];
    }

    $sql = "INSERT INTO users(username, password, role, start, end) VALUES ('".$username."','".$password."',3,'".$time_start."','".$time_end."')";
    execute($sql);
    $_SESSION['success'] = 'Add Success';
}

header('location: createA3.php');

?>