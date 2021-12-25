<?php 
session_start(); 
require_once ('dbhelp.php');

$sql = "SELECT id FROM phuong_xa WHERE ma_phuong_xa = '".$_SESSION['username']."'";
$rs = executeResult($sql);

foreach($rs as $value){
    $idX = $value['id'];
}

if(!empty($_POST)) {
    if(isset($_POST['tenThon'])) {
        $tenThon = $_POST['tenThon'];
    }

    if(isset($_POST['maThon'])) {
        $maThon = $_POST['maThon'];
    }

    $sql = "INSERT INTO thon_ban(ma_thon_ban, ten_thon_ban, id_phuong_xa) VALUES ('$maThon','$tenThon', $idX)";
    // echo $sql;
    execute($sql);
    $_SESSION['success'] = 'Add Success';
}

header('location: test.php');

?>