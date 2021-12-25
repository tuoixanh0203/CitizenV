<option value="">--Chọn thôn/bản--</option>

<?php

require_once ('dbhelp.php');
$sql = "select * from thon_ban where id_phuong_xa = ".$_POST['wardid']." and ma_thon_ban is not null";
$rs = executeResult($sql);
foreach($rs as $value){
    $tmp = $value['id'].$value['ma_thon_ban'];
    echo '<option value="'.$tmp.'">'.$value['ten_thon_ban'].'</option>';
}

?>