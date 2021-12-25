<?php
require_once ('dbhelp.php');
session_start(); 
$username = "";

if(!empty($_POST)){
    $username = $_POST['username'];
    $sql = "DELETE FROM users WHERE username = '$username'";
    execute($sql);
    $_SESSION['success'] = 'Delete Success';
}

header('location: createB1.php');

?>