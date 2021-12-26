<?php
session_start();
$usn = $_SESSION['username'];
require_once ('dbhelp.php');
$sql = "SELECT id FROM tinh WHERE ma_tinh = '".$_SESSION['username']."'";
$rs = executeResult($sql);

foreach($rs as $value){
    $idT = $value['id'];
}

$sql = "select * from quan_huyen where ma_quan_huyen is null and id_tinh = $idT";
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

                <form action="addMaHuyen.php" method="post">
                    <label for="">Quận/Huyện</label>
                    <select id="idHuyen" name="idHuyen">
                        <option value="">--Chọn quận/huyện--</option>
                        <?php
                        foreach ($rs as $value) {
                            echo '<option value="' . $value['id'] . '">' . $value['ten_quan_huyen'] . '</option>';
                        }
                        ?>
                    </select>
                    <label for="">Mã:</label>
                    <input required="true" type="text" id="maHuyen" name="maHuyen" placeholder="<?php echo $_SESSION['username']; ?>xx">
                    <button class="khai_bao">Save</button>
                </form>

    <div>
        <table>
            <tr>
                <th>Mã quận/huyện</th>
                <th>Tên quận/huyện</th>
                <th></th>
                <th></th>
            </tr>
            
<?php
$sql = "select * from quan_huyen where ma_quan_huyen is not null and id_tinh = $idT";
$rsMaHuyen = executeResult($sql);

foreach($rsMaHuyen as $vl) {
    echo '<tr>
        <td>'.$vl['ma_quan_huyen'].'</td>
        <td>'.$vl['ten_quan_huyen'].'</td>
        <td><button class="edit khai_bao" data-id="'.$vl['ma_quan_huyen'].'">Edit</button></td>
        <td><button class="delete khai_bao" data-id="'.$vl['ma_quan_huyen'].'">Delete</button></td>
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
                <input type="hidden" id="edit_id_huyen" name="idHuyen">
            </div>
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
    $('.khai_bao').click(function(e){
            e.preventDefault();
            if(!<?php echo $enable; ?>) {
                alert("Ngoài thời hạn khai báo");
                location.reload();
            }
    });
    $('.edit').click(function(e){
        e.preventDefault();
        $('#editDistrict').modal('show');
        var ma_quan_huyen = $(this).data('id');
        getData(ma_quan_huyen);
    });
    $('.delete').click(function(e){
        e.preventDefault();
        $('#deleteDistrict').modal('show');
        var ma_quan_huyen = $(this).data('id');
        getData(ma_quan_huyen);
    });

    function getData(ma_quan_huyen){
        $.ajax({
        type: 'POST',
        url: 'getDistrictInfo.php',
        data: {ma_quan_huyen:ma_quan_huyen},
        dataType: 'json',
        success: function(response){
            $('#edit_id_huyen').val(response.id);
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