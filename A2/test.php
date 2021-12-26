<?php
session_start();
$usn = $_SESSION['username'];
require_once('dbhelp.php');
$sql = "SELECT id FROM tinh WHERE ma_tinh = '" . $_SESSION['username'] . "'";
$rs = executeResult($sql);
foreach ($rs as $value) {
    $idT = $value['id'];
}

// echo $_SESSION['username'];
$sql = "select * from quan_huyen where ma_quan_huyen is null and id_tinh = $idT";
$rs = executeResult($sql);

$sql = "select * from quan_huyen where ma_quan_huyen is not null and id_tinh = $idT";
$rsMaHuyen = executeResult($sql);

$sql = "SELECT enable FROM users WHERE username = '$usn'";
$qr = executeResult($sql);
foreach ($qr as $value) {
    $enable = $value['enable'];
}

if (!empty($_POST)) {
    if (isset($_POST['tenHuyen'])) {
        $tenHuyen = $_POST['tenHuyen'];
    }

    if (isset($_POST['maHuyen'])) {
        $maHuyen = $_POST['maHuyen'];
    }

    $sql = "UPDATE quan_huyen SET ma_quan_huyen='$maHuyen' WHERE ten_quan_huyen = '$tenHuyen'";
    execute($sql);
    header("Refresh:0");
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
        <h3 class="p-2">Cấp mã huyện</h3>
        <div class="container-fluid card shadow-sm p-3 mb-5 bg-body rounded ">
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
            <div class="card-header">
                <form action="" method="post">
                    <label for="">Huyện</label>
                    <select id="tenHuyen" name="tenHuyen">
                        <option value="">--Chọn huyện--</option>
                        <?php
                        foreach ($rs as $value) {
                            var_dump($value['ten_quan_huyen']);
                            echo '<option value="' . $value['ten_quan_huyen'] . '">' . $value['ten_quan_huyen'] . '</option>';
                        }
                        ?>
                    </select>
                    <label for="cars">Mã:</label>
                    <input required="true" type="text" id="maHuyen" name="maHuyen" placeholder="<?php echo $usn; ?>xx">
                    <button class="khai_bao">Save</button>
                </form>
            </div>
            <div class="card-body shadow-sm p-3 mb-5 bg-body rounded">
                <table class="table table-bordered table-responsive table-hover ">
                    <tr class="table-success">
                        <th>Mã quận/huyện</th>
                        <th>Tên quận/huyện</th>
                        <th>Công cụ</th>
                    </tr>

                    <?php

                    foreach ($rsMaHuyen as $vl) {
                        echo '<tr>
        <td>' . $vl['ma_quan_huyen'] . '</td>
        <td>' . $vl['ten_quan_huyen'] . '</td>
        <td><button class="edit khai_bao" data-id="' . $vl['ma_tinh'] . '">Edit</button> <button class="delete khai_bao" data-id="' . $vl['ma_tinh'] . '">Delete</button></td>
    </tr>';
                    }

                    ?>
                </table>
            </div>

            <div class="modal" id="editDistrict">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form action="editMaHuyen.php" method="post">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Chỉnh sửa mã quận/huyện</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                <div>
                                    <label for="ten_quan_huyen">Quận/Huyện:</label>
                                    <input type="text" id="edit_ten_quan_huyen" name="ten_quan_huyen" readonly>
                                </div>
                                <div>
                                    <label for="ma_quan_huyen">Mã quận/huyện:</label>
                                    <input type="text" id="edit_ma_quan_huyen" name="ma_quan_huyen">
                                </div>
                            </div>
                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal" id="deleteDistrict">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form action="deleteMaHuyen.php" method="post">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Delete</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                <div>
                                    <label for="ten_tinh">Bạn có chắc muốn xoá mã của quạn/huyện</label>
                                    <!-- <input type="text" id="del_ten_tinh" name="ten_tinh"> -->
                                    <span id="del_ten_quan_huyen"></span>
                                </div>
                                <input type="hidden" id="del_ma_quan_huyen" name="ma_quan_huyen">
                            </div>
                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script type="text/javascript">
                $('.khai_bao').click(function(e) {
                    // e.preventDefault();
                    if (!<?php echo $enable; ?>) {
                        alert("Ngoài thời hạn khai báo");
                        location.reload();
                    }
                });
                $('.edit').click(function(e) {
                    e.preventDefault();
                    $('#editDistrict').modal('show');
                    var ma_quan_huyen = $(this).data('id');
                    getData(ma_quan_huyen);
                });
                $('.delete').click(function(e) {
                    e.preventDefault();
                    $('#deleteDistrict').modal('show');
                    var ma_quan_huyen = $(this).data('id');
                    getData(ma_quan_huyen);
                });

                function getData(ma_quan_huyen) {
                    $.ajax({
                        type: 'POST',
                        url: 'getDistrictInfo.php',
                        data: {
                            ma_quan_huyen: ma_quan_huyen
                        },
                        dataType: 'json',
                        success: function(response) {
                            $('#edit_ten_quan_huyen').val(response.ten_quan_huyen);
                            $('#edit_ma_quan_huyen').val(response.ma_quan_huyen);
                            $('#del_ten_quan_huyen').html(response.ten_quan_huyen);
                            $('#del_ma_quan_huyen').val(response.ma_quan_huyen);
                        }
                    });
                }
            </script>
</body>

</html>