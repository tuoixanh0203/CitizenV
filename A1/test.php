<?php 
session_start(); 
require_once('dbhelp.php');
$sql = "select * from tinh where ma_tinh is null";
$rs = executeResult($sql);
$sql = "select * from tinh where ma_tinh is not null";
$rsMaTinh = executeResult($sql);

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
        <h3 class="p-2">Cấp mã tỉnh</h3>
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
                <form action="addMaTinh.php" method="post">
                    <label for="">Tỉnh</label>
                    <select id="tenTinh" name="tenTinh">
                        <option value="">--Chọn tỉnh--</option>
                        <?php
                        foreach ($rs as $value) {
                            var_dump($value['ten_tinh']);
                            echo '<option value="' . $value['ten_tinh'] . '">' . $value['ten_tinh'] . '</option>';
                        }
                        ?>
                    </select>
                    <label for="cars">Mã:</label>
                    <input required="true" type="text" id="maTinh" name="maTinh">
                    <button>Save</button>
                </form>
            </div>
            
            <div class="card-body shadow-sm p-3 mb-5 bg-body rounded">
                <form class="d-flex ms-auto  justify-content-end  py-1">
                    <div class="row">
                        <div class="input-group  col-xs-2">
                            <input class="form-control  mw-20" type="search" placeholder="Search" aria-label="Search" />
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <div class="">
                    <table class="table table-bordered table-responsive table-hover ">
                        <tr class="table-success">
                            <th>Mã tỉnh</th>
                            <th>Tên tỉnh</th>
                            <th>Công cụ</th>
                        </tr>

                        <?php
                        foreach ($rsMaTinh as $vl) {
                            echo '<tr>
                        <td>' . $vl['ma_tinh'] . '</td>
                        <td>' . $vl['ten_tinh'] . '</td>
                        <td><button class="edit" data-id="' . $vl['ma_tinh'] . '">Edit</button> <button class="delete" data-id="' . $vl['ma_tinh'] . '">Delete</button></td>
                    </tr>';
                        }
                        ?>
                    </table>
                </div>
            </div>
            <div class="modal" id="editProvince">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form action="editMaTinh.php" method="post">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Chỉnh sửa mã tỉnh</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                <div>
                                    <label for="ten_tinh">Tỉnh:</label>
                                    <input type="text" id="edit_ten_tinh" name="ten_tinh" readonly>
                                </div>
                                <div>
                                    <label for="ma_tinh">Mã tỉnh:</label>
                                    <input type="text" id="edit_ma_tinh" name="ma_tinh">
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
            <div class="modal" id="deleteProvince">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form action="deleteMaTinh.php" method="post">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Delete</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                <div>
                                    <label for="ten_tinh">Bạn có chắc muốn xoá mã của tỉnh</label>
                                    <!-- <input type="text" id="del_ten_tinh" name="ten_tinh"> -->
                                    <span id="del_ten_tinh"></span>
                                </div>
                                <input type="hidden" id="del_ma_tinh" name="ma_tinh">
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
        </div>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        $('.edit').click(function(e) {
            e.preventDefault();
            $('#editProvince').modal('show');
            var ma_tinh = $(this).data('id');
            getData(ma_tinh);
        });
        $('.delete').click(function(e) {
            e.preventDefault();
            $('#deleteProvince').modal('show');
            var ma_tinh = $(this).data('id');
            getData(ma_tinh);
        });

        function getData(ma_tinh) {
            $.ajax({
                type: 'POST',
                url: 'getProvinceInfo.php',
                data: {
                    ma_tinh: ma_tinh
                },
                dataType: 'json',
                success: function(response) {
                    $('#edit_ten_tinh').val(response.ten_tinh);
                    $('#edit_ma_tinh').val(response.ma_tinh);
                    $('#del_ten_tinh').html(response.ten_tinh);
                    $('#del_ma_tinh').val(response.ma_tinh);
                }
            });
        }
    </script>
</body>

</html>