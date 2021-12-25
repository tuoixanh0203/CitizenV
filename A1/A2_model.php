<!-- Add A2 -->
<div class="modal" id="addA2">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    <form action="addA2.php" method="post">
            <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Add account</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
            <div class="row mb-2">
                <label for="" class="col-sm-6 col-form-label">Username:</label>
                <select required="true" id="username" name="username" class="col-sm-5">
                    <option value="" >--Chọn tỉnh--</option>
                    <?php
                        require_once ('dbhelp.php');
                        $sql = "select * from tinh where ma_tinh is not null and ma_tinh not in (SELECT username FROM users)";
                        $rs = executeResult($sql);
                        foreach($rs as $value){
                            $tmp = $value['ma_tinh']."-".$value['ten_tinh'];
                            echo '<option value="'.$value['ma_tinh'].'">'.$tmp.'</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="row mb-2">
                <label for="password" class="col-sm-6 col-form-label">Mật khẩu:</label>
                <input required="true" type="password" id="password" name="password" class="col-sm-5">
            </div>
            <div class="row mb-2">
                <label for="time_start" class="col-sm-6 col-form-label">Thời gian bắt đầu khai báo:</label>
                <input type="date" id="time_start" name="time_start" class="col-sm-5">
            </div>
            <div class="row mb-2">
                <label for="time_end" class="col-sm-6 col-form-label">Thời gian kết thúc khai báo:</label>
                <input type="date" id="time_end" name="time_end" class="col-sm-5">
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


<!-- Edit A2 -->
<div class="modal" id="editA2">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    <form action="editA2.php" method="post">
            <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Edit account</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
            <div class="row mb-2">
                <label for="username" class="col-sm-6 col-form-label">Username:</label>
                <select required="true" id="edit_username" name="username" class="col-sm-5">
                    <option id="username_val"></option>
                </select>
            </div>
            <div class="row mb-2">
                <label for="time_start" class="col-sm-6 col-form-label">Thời gian bắt đầu khai báo:</label>
                <input type="date" id="edit_time_start" name="time_start" class="col-sm-5">
            </div>
            <div class="row mb-2">
                <label for="time_end" class="col-sm-6 col-form-label">Thời gian kết thúc khai báo:</label>
                <input type="date" id="edit_time_end" name="time_end" class="col-sm-5">
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


<!-- Delete account A2 -->
<div class="modal" id="deleteA2">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    <form action="deleteA2.php" method="post">
            <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Delete account</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
            <div>
                <label for="username" >Bạn có chắc muốn xoá tài khoản này không?</label>
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