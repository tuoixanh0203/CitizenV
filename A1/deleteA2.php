<?php 
session_start(); 
?>
<?php
require_once ('dbhelp.php');
$username = "";

if(!empty($_POST)){
    $username = $_POST['username'];
    // echo $username;
    $sql = "DELETE FROM users WHERE username = '$username'";
    // echo $sql;
    execute($sql);
    $_SESSION['success'] = 'Delete Success';

}

header('location: createA2.php');

?>