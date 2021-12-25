<?php
require_once ('dbhelp.php');
$usn = '2803';

$sql = "SELECT (CURRENT_DATE() >= start AND CURRENT_DATE <= end) as ena FROM users WHERE username = '$usn'";
$rs = executeResult($sql);

foreach($rs as $value){
    $ena = $value['ena'];
}

$sql = "SELECT (CURRENT_DATE() >= start AND CURRENT_DATE <= end) as enaPre FROM users WHERE username = substring('$usn', 1, 2)";
$r = executeResult($sql);

foreach($r as $value){
    $enaPre = $value['enaPre'];
}

echo $ena;
echo $enaPre;

if($ena && $enaPre) {
    $sql = "UPDATE users SET enable=true WHERE username LIKE '$usn%'";
    $qr = execute($sql);
} else {
    $sql = "UPDATE users SET enable=false WHERE username LIKE '$usn%'";
    $qr = execute($sql);
}

?>