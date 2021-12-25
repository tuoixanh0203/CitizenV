<?php
// session_start();
require_once ('dbhelp.php');
$sql = "SELECT id FROM quan_huyen WHERE ma_quan_huyen = '".$_SESSION['username']."'";
$rs = executeResult($sql);

foreach($rs as $value){
    $idH = $value['id'];
}

?>

<!-- Add A3 -->
<div class="modal" id="addB1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    <form action="addB1.php" method="post">
            <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Add account</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
            <div>
                <label for="">Username:</label>
                <select required="true" id="username" name="username">
                    <option value="">--Chọn phường/xã--</option>
                    <?php
                        require_once ('dbhelp.php');
                        $sql = "select * from phuong_xa where ma_phuong_xa is not null and id_quan_huyen = $idH and ma_phuong_xa not in (SELECT username FROM users)";
                        $rs = executeResult($sql);
                        foreach($rs as $value){
                            $tmp = $value['ma_phuong_xa']."-".$value['ten_phuong_xa'];
                            echo '<option value="'.$value['ma_phuong_xa'].'">'.$tmp.'</option>';
                        }
                    ?>
                </select>
            </div>
            <div>
                <label for="password">Mật khẩu:</label>
                <input required="true" type="password" id="password" name="password">
            </div>
            <div>
                <label for="time_start">Thời gian bắt đầu khai báo:</label>
                <input type="date" id="time_start" name="time_start">
            </div>
            <div>
                <label for="time_end">Thời gian kết thúc khai báo:</label>
                <input type="date" id="time_end" name="time_end">
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


<!-- Edit A3 -->
<div class="modal" id="editB1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    <form action="editB1.php" method="post">
            <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Edit account</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
            <div>
                <label for="username">Username:</label>
                <select required="true" id="edit_username" name="username">
                    <option id="username_val"></option>
                </select>
            </div>
            <div>
                <label for="time_start">Thời gian bắt đầu khai báo:</label>
                <input type="date" id="edit_time_start" name="time_start">
            </div>
            <div>
                <label for="time_end">Thời gian kết thúc khai báo:</label>
                <input type="date" id="edit_time_end" name="time_end">
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


<!-- Delete account A3 -->
<div class="modal" id="deleteB1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    <form action="deleteB1.php" method="post">
        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Delete account</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
            <div>
                <label for="username">Bạn có chắc muốn xoá tài khoản này không?</label>
                <select required="true" id="edit_username" name="username">
                    <option id="del_username_val"></option>
                </select>
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