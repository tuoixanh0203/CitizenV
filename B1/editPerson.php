<?php
require_once ('dbhelp.php');
session_start();

$cccd = '';
if(!empty($_POST)){
    $id = $_POST['id'];
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
    
    $sql = "UPDATE person SET cccd='$cccd',ho_ten='$ho_ten',ngay_sinh='$ngay_sinh',gioi_tinh='$gioi_tinh',que_quan='$que_quan',thuong_tru='$thuong_tru',tam_tru='$tam_tru',ton_giao='$ton_giao',hoc_van='$hoc_van',nghe_nghiep='$nghe_nghiep' WHERE id=$id";
    // echo $sql;
    execute($sql);
}

header('location: citizen.php');

?>