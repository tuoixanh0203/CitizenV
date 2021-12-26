<?php
require_once('dbhelp.php');
session_start();
$usn = $_SESSION['username'];
$sql = "SELECT enable FROM users WHERE username = '$usn'";
$qr = executeResult($sql);
foreach ($qr as $value) {
    $enable = $value['enable'];
}

$sql = "SELECT status FROM users WHERE username = '$usn'";
$query = executeResult($sql);
foreach ($query as $value) {
    $status = $value['status'];
}

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
        <div class="container-fluid card shadow-sm p-3 mb-5 bg-body rounded fs-6">
            <form action="updateStatus.php">
                <button class="btn btn-success"><span class="update"></span></button>
            </form>
            <div class="card-header">
                <button type="button" class="btn btn-primary khai_bao add">New</button>
            </div>
            <?php
                if (isset($_SESSION['success'])) {
                    echo "
                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                <h4><i class='icon fas fa-check'></i> Success!</h4> " . $_SESSION['success'] . "
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
                    unset($_SESSION['success']);
                }
                ?>
            <div class="card-body shadow-sm p-3 mb-5 bg-body rounded">
                <form action="">
                    <label for="">Thôn/Bản</label>
                    <select id="village" name="village">
                        <option value="">--Chọn thôn/bản--</option>
                        <?php
                        $sql = "select * from thon_ban where ma_thon_ban is not null and ma_thon_ban like '" . $_SESSION['username'] . "%'";
                        $rs = executeResult($sql);
                        foreach ($rs as $value) {
                            $tmp = $value['id'] . $value['ma_thon_ban'];
                            echo '<option value="' . $tmp . '">' . $value['ten_thon_ban'] . '</option>';
                        }
                        ?>
                    </select>
                </form>
                <form action="" method="get" class="d-flex ms-auto  justify-content-end  py-2">
                    <div class="row">
                        <div class="input-group ">
                            <input type="text" name="s" class="form-control" placeholder="CMND/CCCD hoặc tên">
                            <button class="btn btn-primary " type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>

               

                <table class="table table-bordered table-responsive table-hover text-start" style="font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;
                            font-weight: 400;">
                    <thead class="table-success">
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
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="bodydata">
                        <?php
                        if (isset($_GET['s']) && $_GET['s'] != '') {
                            $sql = "SELECT * FROM person WHERE (cccd LIKE '" . $_GET['s'] . "%' OR ho_ten LIKE '%" . $_GET['s'] . "%') AND ma_khu_vuc LIKE '" . $_SESSION['username'] . "%'";
                        } else {
                            $sql = "SELECT * FROM person WHERE ma_khu_vuc LIKE '" . $_SESSION['username'] . "%'";
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
                            <td><button class="edit khai_bao" data-id="' . $vl['id'] . '">Edit</button></td>
                            <td><button class="delete khai_bao" data-id="' . $vl['id'] . '">Delete</button></td>
                        </tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <?php include 'person_modal.php'; ?>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script>
                $(document).ready(() => {
                    if(!<?php echo $status; ?>) {
                        $(".update").html("Đã hoàn thành");
                    } else {
                        $(".update").html("Hoàn tác");
                    }
                    
                });

                $(function() {
                    $('.khai_bao').click(function(e) {
                        e.preventDefault();
                        if (!<?php echo $enable; ?>) {
                            alert("Ngoài thời hạn khai báo");
                            location.reload();
                        }
                    });
                    $('.add').click(function(e) {
                        e.preventDefault();
                        $('#addPerson').modal('show');
                    });
                    $('.edit').click(function(e) {
                        e.preventDefault();
                        $('#editPerson').modal('show');
                        var id = $(this).data('id');
                        getData(id);
                    });
                    $('.delete').click(function(e) {
                        e.preventDefault();
                        $('#deletePerson').modal('show');
                        var id = $(this).data('id');
                        getData(id);
                    });
                    $("#village").change(function(event) {
                        makhuvuc = '';
                        val = $("#village").val();
                        makhuvuc += val.slice(-8);
                        $.post("citizendata.php", {
                            "makhuvuc": makhuvuc
                        }, function(data) {
                            $("#bodydata").html(data);
                        });
                    });
                });

                function getData(id) {
                    $.ajax({
                        type: 'POST',
                        url: 'getDataPerson.php',
                        data: {
                            id: id
                        },
                        dataType: 'json',
                        success: function(response) {
                            $('#edit_id').val(response.id);
                            $('#del_id').val(response.id);
                            $('#edit_cccd').val(response.cccd);
                            $('#edit_ho_ten').val(response.ho_ten);
                            $('#del_ho_ten').html(response.ho_ten);
                            $('#edit_ngay_sinh').val(response.ngay_sinh);
                            if (response.gioi_tinh == "Nam") {
                                $('input:radio[name="gioi_tinh"]').filter('[value="Nam"]').attr('checked', true);
                            } else {
                                $('input:radio[name="gioi_tinh"]').filter('[value="Nữ"]').attr('checked', true);
                            }
                            $('#edit_que_quan').val(response.que_quan);
                            $('#edit_thuong_tru').val(response.thuong_tru);
                            $('#edit_tam_tru').val(response.tam_tru);
                            $('#edit_ton_giao').val(response.ton_giao);
                            $('#edit_hoc_van').val(response.hoc_van);
                            $('#edit_nghe_nghiep').val(response.nghe_nghiep);
                        }
                    });
                }
            </script>
</body>

</html>