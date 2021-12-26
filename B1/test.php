<?php
session_start();
$usn = $_SESSION['username'];
require_once('dbhelp.php');
$sql = "SELECT id FROM phuong_xa WHERE ma_phuong_xa = '" . $_SESSION['username'] . "'";
$rs = executeResult($sql);

foreach ($rs as $value) {
    $idX = $value['id'];
}

$sql = "select * from thon_ban where ma_thon_ban is not null and id_phuong_xa = $idX";
$rsMaThon = executeResult($sql);

$sql = "SELECT enable FROM users WHERE username = '$usn'";
$qr = executeResult($sql);
foreach ($qr as $value) {
    $enable = $value['enable'];
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
        <h3 class="p-2">Cấp mã thôn/bản</h3>
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
                <form action="addMaThon.php" method="post">
                    <label for="">Thôn/Bản</label>
                    <input required="true" type="text" id="tenThon" name="tenThon">
                    <label for="">Mã:</label>
                    <input required="true" type="text" id="maThon" name="maThon" placeholder="<?php echo $usn; ?>xx" pattern="<?php echo $usn; ?>[0-9]{2}">
                    <button class="khai_bao">Save</button>
                </form>
            </div>
            <div class="card-body shadow-sm p-3 mb-5 bg-body rounded">
                <table class="table table-bordered table-responsive table-hover ">
                    <tr class="table-success">
                            <th>Mã thôn/bản</th>
                            <th>Tên thôn/bản</th>
                            <th>Công cụ</th>
                        </tr>

                        <?php

                        foreach ($rsMaThon as $vl) {
                            echo '<tr>
        <td>' . $vl['ma_thon_ban'] . '</td>
        <td>' . $vl['ten_thon_ban'] . '</td>
        <td><button class="edit khai_bao" data-id="' . $vl['ma_thon_ban'] . '">Edit</button> <button class="delete khai_bao" data-id="' . $vl['ma_thon_ban'] . '">Delete</td>
    </tr>';
                        }

                        ?>
                    </table>
                </div>

                <div class="modal" id="editVillage">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <form action="editMaThon.php" method="post">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Chỉnh sửa mã thôn/bản</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div>
                                        <label for="ten_thon_ban">Thôn/Bản:</label>
                                        <input type="text" id="edit_ten_thon_ban" name="ten_thon_ban" readonly>
                                    </div>
                                    <div>
                                        <label for="ma_thon_ban">Mã thôn/bản:</label>
                                        <input type="text" id="edit_ma_thon_ban" name="ma_thon_ban">
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

                <div class="modal" id="deleteVillage">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <form action="deleteMaThon.php" method="post">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Delete</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div>
                                        <label for="">Bạn có chắc muốn xoá mã của thôn/bản</label>
                                        <!-- <input type="text" id="del_ten_tinh" name="ten_tinh"> -->
                                        <span id="del_ten_thon_ban"></span>
                                    </div>
                                    <input type="hidden" id="del_ma_thon_ban" name="ma_thon_ban">
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
                        $('#editVillage').modal('show');
                        var ma_thon_ban = $(this).data('id');
                        getData(ma_thon_ban);
                    });
                    $('.delete').click(function(e) {
                        e.preventDefault();
                        $('#deleteVillage').modal('show');
                        var ma_thon_ban = $(this).data('id');
                        getData(ma_thon_ban);
                    });

                    function getData(ma_thon_ban) {
                        $.ajax({
                            type: 'POST',
                            url: 'getVillageInfo.php',
                            data: {
                                ma_thon_ban: ma_thon_ban
                            },
                            dataType: 'json',
                            success: function(response) {
                                $('#edit_ten_thon_ban').val(response.ten_thon_ban);
                                $('#edit_ma_thon_ban').val(response.ma_thon_ban);
                                $('#del_ten_thon_ban').html(response.ten_thon_ban);
                                $('#del_ma_thon_ban').val(response.ma_thon_ban);
                            }
                        });
                    }
                </script>
</body>

</html>