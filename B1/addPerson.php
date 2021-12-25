<?php
require_once ('dbhelp.php');
session_start();

$cccd = '';
if(!empty($_POST)){
    $ma_khu_vuc = $_POST['ma_thon_ban'];
    if(isset($_POST['cccd'])) {
        $cccd = $_POST['cccd'];
    }
    $ho_ten = $_POST['ho_ten'];
    $ngay_sinh = $_POST['ngay_sinh'];
    $gioi_tinh = $_POST['gioi_tinh'];
    $que_quan = $_POST['que_quan'];
    $thuong_tru = $_POST['thuong_tru'];
    $tam_tru = $_POST['tam_tru'];
    $ton_giao = $_POST['ton_giao'];
    $hoc_van = $_POST['hoc_van'];
    $nghe_nghiep = $_POST['nghe_nghiep'];
    
    $sql = "INSERT INTO person(ma_khu_vuc, cccd, ho_ten, ngay_sinh, gioi_tinh, que_quan, thuong_tru, tam_tru, ton_giao, hoc_van, nghe_nghiep) VALUES ('$ma_khu_vuc','$cccd','$ho_ten','$ngay_sinh','$gioi_tinh','$que_quan','$thuong_tru','$tam_tru','$ton_giao','$hoc_van','$nghe_nghiep')";
    // echo $sql;
    execute($sql);
}

header('location: citizen.php');

?>