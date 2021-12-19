<?php
require_once('dbhelp.php');
$sql = "select * from tinh where ma_tinh is not null";
$rs = executeResult($sql);

?>

<?php
include_once 'head.php';
?>

<body>
    <?php
    include_once 'layout/navbar.php';
    ?>
    <?php
    include_once 'layout/menubar.php';
    ?>

    <main class="mt-4 pt-5">
        <h3 class="p-2">Citizen</h3>
        <div class="container-fluid card shadow-sm p-3 mb-5 bg-body rounded fs-6">
            <div class="card-header">
                <form action="">
                    <label for="province">Tỉnh</label>
                    <select id="province" name="province">
                        <option value="">--Chọn tỉnh--</option>
                        <?php
                        foreach ($rs as $value) {
                            // var_dump($value['ten_tinh']);
                            $tmp = $value['id'] . $value['ma_tinh'];
                            echo '<option value="' . $tmp . '">' . $value['ten_tinh'] . '</option>';
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
            </div>
            <div class="card-body shadow-sm p-3 mb-5 bg-body rounded">
                <table class="table table-bordered table-responsive table-hover text-start" style="font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;
                            font-weight: 400;">
                    <thead class="table-success">
                        <tr>
                            <th>Số CCCD/CMND</th>
                            <th>Họ và tên</th>
                            <th>Ngày sinh</th>
                            <th>Giới tính</th>
                            <th>Quê quán</th>
                            <th>Thường trú</th>
                            <th>Tạm trú</th>
                            <th>Tôn giáo</th>
                            <th>Trình độ VH</th>
                            <th>Nghề nghiệp</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM person";
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
                    makhuvuc = '';
                    $("#province").change(function(event) {
                        val = $("#province").val();
                        makhuvuc += val.slice(-2);
                        provinceId = val.slice(0, -2);
                        $.post("district.php", {
                            "provinceid": provinceId
                        }, function(data) {
                            $("#district").html(data);
                        });
                    });

                    $("#district").change(function(event) {
                        val = $("#district").val();
                        makhuvuc += val.slice(-2);
                        districtId = val.slice(0, -4);
                        $.post("ward.php", {
                            "districtid": districtId
                        }, function(data) {
                            $("#ward").html(data);
                        });
                    });

                    $("#ward").change(function(event) {
                        val = $("#ward").val();
                        makhuvuc += val.slice(-2);
                        wardId = val.slice(0, -6);
                        $.post("village.php", {
                            "wardid": wardId
                        }, function(data) {
                            $("#village").html(data);
                        });
                    });

                    $("#village").change(function(event) {
                        villageId = $("#ward").val();
                        makhuvuc += val.slice(-2);
                    });
                </script>
            </div>
        </div>
    </main>
</body>

</html>