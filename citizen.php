<?php
require_once ('dbhelp.php');
$sql = "select * from tinh where ma_tinh is not null";
$rs = executeResult($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="">
        <label for="province">Tỉnh</label>
        <select id="province" name="province">
            <option value="">--Chọn tỉnh--</option>
            <?php
                foreach($rs as $value){
                    // var_dump($value['ten_tinh']);
                    $tmp = $value['id'].$value['ma_tinh'];
                    echo '<option value="'.$tmp.'">'.$value['ten_tinh'].'</option>';
                }
            ?>
        </select>

        <label for="district">Quận/Huyện</label>
        <select id="district" name="district">
            <option value="">--Chọn quận/huyện--</option>
        </select>

        <label for="ward">Phường/Xã</label>
        <select id="ward" name="ward">
            <option value="">--Chọn phường/xã--</option>
        </select>

        <label for="village">Thôn/Bản</label>
        <select id="village" name="village">
            <option value="">--Chọn thôn/bản--</option>
        </select>
    </form>

    <table>
        <thead>
            <tr>
                <th>Số CCCD/CMND</th>
                <th>Họ và tên</th>
                <th>Ngày sinh</th>
                <th>Giới tính</th>
                <th>Quê quán</th>
                <th>Địa chỉ thường trú</th>
                <th>Địa chỉ tạm trú</th>
                <th>Tôn giáo</th>
                <th>Trình độ văn hóa</th>
                <th>Nghề nghiệp</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = "SELECT * FROM person";
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
        </tbody>
    </table>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        makhuvuc = '';
        $("#province").change(function(event) {
            val = $("#province").val();
            makhuvuc += val.slice(-2);
            provinceId = val.slice(0, -2);
            $.post("district.php", {"provinceid":provinceId}, function(data) {
                $("#district").html(data);
            });
        });

        $("#district").change(function(event) {
            val = $("#district").val();
            makhuvuc += val.slice(-2);
            districtId = val.slice(0, -4);
            $.post("ward.php", {"districtid":districtId}, function(data) {
                $("#ward").html(data);
            });
        });

        $("#ward").change(function(event) {
            val = $("#ward").val();
            makhuvuc += val.slice(-2);
            wardId = val.slice(0, -6);
            $.post("village.php", {"wardid":wardId}, function(data) {
                $("#village").html(data);
            });
        });

        $("#village").change(function(event) {
            villageId = $("#ward").val();
            makhuvuc += val.slice(-2);
        });
    </script>
</body>
</html>