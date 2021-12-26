<?php
session_start();
$usn = $_SESSION['username'];
require_once ('dbhelp.php');
$sql = "SELECT id FROM quan_huyen WHERE ma_quan_huyen = '".$_SESSION['username']."'";
$rs = executeResult($sql);

foreach($rs as $value){
    $idH = $value['id'];
}

$sql = "select * from phuong_xa where ma_phuong_xa is null and id_quan_huyen = $idH";
$rs = executeResult($sql);

$sql = "SELECT enable FROM users WHERE username = '$usn'";
$qr = executeResult($sql);
foreach($qr as $value){
    $enable = $value['enable'];
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
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

                <form action="addMaXa.php" method="post">
                    <label for="">Phường/Xã</label>
                    <select id="idXa" name="idXa">
                        <option value="">--Chọn phường/xã--</option>
                        <?php
                        foreach ($rs as $value) {
                            echo '<option value="' . $value['id'] . '">' . $value['ten_phuong_xa'] . '</option>';
                        }
                        ?>
                    </select>
                    <label for="cars">Mã:</label>
                    <input required="true" type="text" id="maXa" name="maXa" placeholder="<?php echo $usn; ?>xx">
                    <button class="khai_bao">Save</button>
                </form>

    <div>
        <table>
            <tr>
                <th>Mã phường/xã</th>
                <th>Tên phường/xã</th>
                <th></th>
                <th></th>
            </tr>
            
<?php
$sql = "select * from phuong_xa where ma_phuong_xa is not null and id_quan_huyen = $idH";
$rsMaXa = executeResult($sql);

foreach($rsMaXa as $vl) {
    echo '<tr>
        <td>'.$vl['ma_phuong_xa'].'</td>
        <td>'.$vl['ten_phuong_xa'].'</td>
        <td><button class="edit khai_bao" data-id="'.$vl['ma_phuong_xa'].'">Edit</button></td>
        <td><button class="delete khai_bao" data-id="'.$vl['ma_phuong_xa'].'">Delete</button></td>
    </tr>';
}

?>
        </table>
    </div>

<div class="modal" id="editWard">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    <form action="editMaXa.php" method="post">
            <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Chỉnh sửa mã phường/xã</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
            <div>
                <input type="hidden" id="edit_id_xa" name="idXa">
            </div>
            <div>
                <label for="ten_phuong_xa">Phường/Xã:</label>
                <input type="text" id="edit_ten_phuong_xa" name="ten_phuong_xa" readonly>
            </div>
            <div>
                <label for="ma_phuong_xa">Mã Phường/Xã:</label>
                <input type="text" id="edit_ma_phuong_xa" name="ma_phuong_xa">
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

<div class="modal" id="deleteWard">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    <form action="deleteMaXa.php" method="post">
            <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Delete</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
            <div>
                <label for="">Bạn có chắc muốn xoá mã của phường/xã</label>
                <!-- <input type="text" id="del_ten_tinh" name="ten_tinh"> -->
                <span id="del_ten_phuong_xa"></span>
            </div>
            <input type="hidden" id="del_ma_phuong_xa" name="ma_phuong_xa">
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
    $('.khai_bao').click(function(e){
        // e.preventDefault();
        if(!<?php echo $enable; ?>) {
            alert("Ngoài thời hạn khai báo");
            location.reload();
        }
    });
    $('.edit').click(function(e){
        e.preventDefault();
        $('#editWard').modal('show');
        var ma_phuong_xa = $(this).data('id');
        getData(ma_phuong_xa);
    });
    $('.delete').click(function(e){
        e.preventDefault();
        $('#deleteWard').modal('show');
        var ma_phuong_xa = $(this).data('id');
        getData(ma_phuong_xa);
    });

    function getData(ma_phuong_xa){
        $.ajax({
        type: 'POST',
        url: 'getWardInfo.php',
        data: {ma_phuong_xa:ma_phuong_xa},
        dataType: 'json',
        success: function(response){
            $('#edit_id_xa').val(response.id);
            $('#edit_ten_phuong_xa').val(response.ten_phuong_xa);
            $('#edit_ma_phuong_xa').val(response.ma_phuong_xa);
            $('#del_ten_phuong_xa').html(response.ten_phuong_xa);
            $('#del_ma_phuong_xa').val(response.ma_phuong_xa);
        }
        });
    }
</script>
</body>
</html>