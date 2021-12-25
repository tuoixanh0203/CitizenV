<?php
require_once ('dbhelp.php');

    $sql = "SELECT * FROM person WHERE ma_khu_vuc LIKE '".$_POST['makhuvuc']."%';";
    // $sql = "SELECT * FROM person WHERE ma_khu_vuc LIKE '24%';";
    $rs = executeResult($sql);

    foreach($rs as $vl){
        echo '<tr>
            <td>'.$vl['cccd'].'</td>
            <td>'.$vl['ho_ten'].'</td>
            <td>'.$vl['ngay_sinh'].'</td>
            <td>'.$vl['gioi_tinh'].'</td>
            <td>'.$vl['que_quan'].'</td>
            <td>'.$vl['thuong_tru'].'</td>
            <td>'.$vl['tam_tru'].'</td>
            <td>'.$vl['ton_giao'].'</td>
            <td>'.$vl['hoc_van'].'</td>
            <td>'.$vl['nghe_nghiep'].'</td>
        </tr>';
    }

?>