<?php
require_once('dbhelp.php');
session_start();

?>

<?php
// include_once 'head.php';
?>

<body>
    <?php
    // include_once 'layout/navbar.php';
    ?>
    <?php
    // include_once 'layout/menubar.php';
    ?>

    <main class="mt-4 pt-5">
        <!-- <h3 class="p-2">Citizen</h3> -->
        <div class="container-fluid card shadow-sm p-3 mb-5 bg-body rounded fs-6">
            <div class="card-header">
                <form action="">
                    <label for="">Phường/Xã</label>
                    <select id="ward" name="ward">
                        <option value="">--Chọn phường/xã--</option>
                        <?php
                        $sql = "select * from phuong_xa where ma_phuong_xa is not null and ma_phuong_xa like '".$_SESSION['username']."%'";
                        $rs = executeResult($sql);
                        foreach ($rs as $value) {
                            // var_dump($value['ten_tinh']);
                            $tmp = $value['id'] . $value['ma_phuong_xa'];
                            echo '<option value="' . $tmp . '">' . $value['ten_phuong_xa'] . '</option>';
                        }
                        ?>
                    </select>
                    <label for="village">Thôn/Bản</label>
                    <select id="village" name="village">
                        <option value="">--Chọn thôn/bản--</option>
                    </select>
                </form>

    <form action="" method="get">
        <input type="text" name="s" class="form-control" placeholder="Tìm kiếm theo số CMND/CCCD hoặc tên">
        <button>Search</button>
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
        <tbody id="bodydata">
            <?php
                if (isset($_GET['s']) && $_GET['s'] != '') {
                    $sql = "SELECT * FROM person WHERE (cccd LIKE '".$_GET['s']."%' OR ho_ten LIKE '%".$_GET['s']."%') AND ma_khu_vuc LIKE '".$_SESSION['username']."%'";
                } else {
                    $sql = "SELECT * FROM person WHERE ma_khu_vuc LIKE '".$_SESSION['username']."%'";
                }
                $rs = executeResult($sql);

                        foreach ($rs as $vl) {
                            echo '<tr>
                            <td>' . $vl['cccd'] . '</td>
                            <td>' . $vl['ho_ten'] . '</td>
                            <td>' . $vl['ngay_sinh'] . '</td>
                            <td>' . $vl['gioi_tinh'] . '</td>
                            <td>' . $vl['que_quan'] . '</td>
                            <td>' . $vl['thuong_tru'] . '</td>
                            <td>' . $vl['tam_tru'] . '</td>
                            <td>' . $vl['ton_giao'] . '</td>
                            <td>' . $vl['hoc_van'] . '</td>
                            <td>' . $vl['nghe_nghiep'] . '</td>
                        </tr>';
                        }
                        ?>
                    </tbody>
                </table>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $("#ward").change(function(event) {
            makhuvuc = '';
            val = $("#ward").val();
            makhuvuc += val.slice(-6);
            wardId = val.slice(0, -6);
            console.log(val);
            console.log(makhuvuc);
            console.log(wardId);
            $.post("village.php", {"wardid":wardId}, function(data) {
                $("#village").html(data);
            });
            $.post("citizendata.php", {"makhuvuc":makhuvuc}, function(data) {
                $("#bodydata").html(data);
            });
        });

        $("#village").change(function(event) {
            val = $("#village").val();
            makhuvuc += val.slice(-2);
            $.post("citizendata.php", {"makhuvuc":makhuvuc}, function(data) {
                $("#bodydata").html(data);
            });
        });
    </script>
</body>

</html>