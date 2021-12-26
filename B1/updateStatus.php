<?php
require_once('dbhelp.php');
session_start();
$usn = $_SESSION['username'];

$sql = "SELECT status FROM users WHERE username = '$usn'";
$qr = executeResult($sql);
foreach ($qr as $value) {
    $status = $value['status'];
}
if($status) {
    $sql = "UPDATE users SET status = false WHERE username = '$usn'";
    execute($sql);
} else {
    $sql = "UPDATE users SET status = true WHERE username = '$usn'";
    execute($sql);
}

header('location: citizen.php');

?>