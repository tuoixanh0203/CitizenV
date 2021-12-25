<?php
require_once ('dbhelp.php');
$username = "";

if(!empty($_POST)){
    $username = $_POST['username'];
    // echo $username;
    $sql = "DELETE FROM users WHERE username = '$username'";
    // echo $sql;
    execute($sql);
}

header('location: createB2.php');

?>