<?php
require_once ('dbhelp.php');
$sql = "SELECT id FROM phuong_xa WHERE ma_phuong_xa = '".$_SESSION['username']."'";
$rs = executeResult($sql);

foreach($rs as $value){
    $idX = $value['id'];
}

?>

<!-- Add A3 -->
<div class="modal" id="addB2">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    <form action="addB2.php" method="post">
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
                    <option value="">--Chọn thôn/bản--</option>
                    <?php
                        require_once ('dbhelp.php');
                        $sql = "select * from thon_ban where ma_thon_ban is not null and id_phuong_xa = $idX and ma_thon_ban not in (SELECT username FROM users)";
                        $rs = executeResult($sql);
                        foreach($rs as $value){
                            $tmp = $value['ma_thon_ban']."-".$value['ten_thon_ban'];
                            echo '<option value="'.$value['ma_thon_ban'].'">'.$tmp.'</option>';
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
<div class="modal" id="editB2">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    <form action="editB2.php" method="post">
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
<div class="modal" id="deleteB2">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    <form action="deleteB2.php" method="post">
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