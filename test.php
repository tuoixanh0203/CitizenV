<?php
session_start();
require_once ('dbhelp.php');
$usn = $_SESSION['username'];
// $usn = "28040311";

$sql = "SELECT (CURRENT_DATE() >= start AND CURRENT_DATE <= end) as ena FROM users WHERE username = '$usn'";
$rs = executeResult($sql);
foreach($rs as $value){
    $ena = $value['ena'];
}

$sql = "SELECT (CURRENT_DATE() >= start AND CURRENT_DATE <= end) as enaProvince FROM users WHERE username = substring('$usn', 1, 2)";
$r = executeResult($sql);
foreach($r as $value){
    $enaPro = $value['enaProvince'];
}

$sql = "SELECT (CURRENT_DATE() >= start AND CURRENT_DATE <= end) as enaDis FROM users WHERE username = substring('$usn', 1, 4)";
$r = executeResult($sql);
foreach($r as $value){
    $enaDis = $value['enaDis'];
}

$sql = "SELECT (CURRENT_DATE() >= start AND CURRENT_DATE <= end) as enaWard FROM users WHERE username = substring('$usn', 1, 6)";
$r = executeResult($sql);
foreach($r as $value){
    $enaWard = $value['enaWard'];
}

if($ena && $enaPro && $enaDis && $enaWard) {
    $sql = "UPDATE users SET enable=true WHERE username LIKE '$usn%'";
    $qr = execute($sql);
    // echo "true";
} else {
    $sql = "UPDATE users SET enable=false WHERE username LIKE '$usn%'";
    $qr = execute($sql);
    echo "false";
}

?>