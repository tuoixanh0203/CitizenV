<?php
require_once ('dbhelp.php');
session_start();

$cccd = '';
if(!empty($_POST)){
    $id = $_POST['id'];
    
    $sql = "DELETE FROM person WHERE id='$id'";
    // echo $sql;
    execute($sql);
}

header('location: citizen.php');

?>