<?php
require_once('dbhelp.php');
session_start();
$usn = $_SESSION['username'];
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
        <!-- <h3 class="p-2">Citizen</h3> -->
        <div class="container-fluid card shadow-sm p-3 mb-5 bg-body rounded fs-6">

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
                <button type="button" class="btn btn-primary khai_bao add">New</button>
            </div>
            <div class="card-body shadow-sm p-3 mb-5 bg-body rounded">
                <table class="table table-bordered table-responsive table-hover text-start" style="font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;
                            font-weight: 400;">
                    <thead class="table-success">
                        <tr>
                            <th>Quận/Huyện</th>
                            <th>Username(Mã quận/huyện)</th>
                            <th>Thời gian bắt đầu khai báo</th>
                            <th>Thời gian kết thúc khai báo</th>
                            <th>Công cụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once('dbhelp.php');
                        $sql = "SELECT * FROM users JOIN quan_huyen on users.username = quan_huyen.ma_quan_huyen AND username LIKE '" . $_SESSION['username'] . "%'";
                        $rs = executeResult($sql);

                        foreach ($rs as $vl) {
                            echo '<tr>
                            <td>' . $vl['ten_quan_huyen'] . '</td>
                            <td>' . $vl['username'] . '</td>
                            <td>' . $vl['start'] . '</td>
                            <td>' . $vl['end'] . '</td>
                            <td><button class="edit khai_bao" data-id="' . $vl['ma_tinh'] . '">Edit</button> 
                                <button class="delete khai_bao" data-id="' . $vl['ma_tinh'] . '">Delete</button>
                            </td>
                        </tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

                <?php include 'A3_model.php'; ?>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                <script>
                    $(function() {
                        $('.khai_bao').click(function(e) {
                            e.preventDefault();
                            if (!<?php echo $enable; ?>) {
                                // alert("Ngoài thời hạn khai báo");
                                <?php $_SESSION['success'] = 'Ngoài thời hạn khai báo!'; ?>
                                location.reload();
                            }
                        });
                        $('.add').click(function(e) {
                            e.preventDefault();
                            $('#addA3').modal('show');
                        });
                        $('.edit').click(function(e) {
                            e.preventDefault();
                            $('#editA3').modal('show');
                            var ma_quan_huyen = $(this).data('id');
                            getData(ma_quan_huyen);
                        });
                        $('.delete').click(function(e) {
                            e.preventDefault();
                            $('#deleteA3').modal('show');
                            var ma_quan_huyen = $(this).data('id');
                            getData(ma_quan_huyen);
                        });
                    });

                    function getData(ma_quan_huyen) {
                        $.ajax({
                            type: 'POST',
                            url: 'getData.php',
                            data: {
                                ma_quan_huyen: ma_quan_huyen
                            },
                            dataType: 'json',
                            success: function(response) {
                                $('#username_val').val(response.username).html(response.username);
                                $('#del_username_val').val(response.username);
                                $('#del_username_val').val(response.username).html(response.username);
                                $('#edit_time_start').val(response.start);
                                $('#edit_time_end').val(response.end);
                                // $('#del_username').html(response.username);
                            }
                        });
                    }
                </script>
    </main>

</body>

</html>