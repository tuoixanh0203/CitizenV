<option value="">--Chọn quận/huyện--</option>

<?php

require_once ('dbhelp.php');
$sql = "select * from quan_huyen where id_tinh = ".$_POST['provinceid']." and ma_quan_huyen is not null";
$rs = executeResult($sql);
foreach($rs as $value){
    $tmp = $value['id'].$value['ma_quan_huyen'];
    echo '<option value="'.$tmp.'">'.$value['ten_quan_huyen'].'</option>';
    // echo '<option value="'.$tmp.'">'.$tmp.'</option>';
}

?>