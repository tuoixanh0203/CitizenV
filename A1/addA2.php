<?php
session_start();
?>
<?php 
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

    // echo $username;
    // echo $password;
    $_SESSION['success'] = 'Create Success';
    $sql = "INSERT INTO users(username, password, role, start, end) VALUES ('".$username."','".$password."',2,'".$time_start."','".$time_end."')";
    // echo $sql;
    execute($sql);
}

header('location: createA2.php');

?>