<option value="">--Chọn phường/xã--</option>

<?php

require_once ('dbhelp.php');
$sql = "select * from phuong_xa where id_quan_huyen = ".$_POST['districtid']." and ma_phuong_xa is not null";
$rs = executeResult($sql);
foreach($rs as $value){
    $tmp = $value['id'].$value['ma_phuong_xa'];
    echo '<option value="'.$tmp.'">'.$value['ten_phuong_xa'].'</option>';
    // echo '<option value="'.$tmp.'">'.$tmp.'</option>';
}

?>