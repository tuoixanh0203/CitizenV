<?php
require_once ('dbhelp.php');
// echo $usn;

?>

<!-- Add Person -->
<div class="modal" id="addPerson">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    <form action="addPerson.php" method="post">
            <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Add Person</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
            <div>
                <label for="">Thôn/Bản</label>
                <select id="ma_thon_ban" name="ma_thon_ban">
                    <option value="">--Chọn thôn/bản--</option>
                    <?php
                    $sql = "select * from thon_ban where ma_thon_ban is not null and ma_thon_ban like '$usn%'";
                    $rs = executeResult($sql);
                    foreach ($rs as $value) {
                        $tmp = $value['ma_thon_ban'];
                        echo '<option value="' . $tmp . '">' . $value['ten_thon_ban'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div>
                <label for="cccd">Số CMND/CCCD(nếu có):</label>
                <input type="text" id="cccd" name="cccd">
            </div>
            <div>
                <label for="ho_ten">Họ và tên:</label>
                <input required="true" type="text" id="ho_ten" name="ho_ten">
            </div>
            <div>
                <label for="ngay_sinh">Ngày sinh:</label>
                <input required="true" type="date" id="ngay_sinh" name="ngay_sinh">
            </div>
            <div>
                <label for="gioi_tinh">Giới tính:</label>
                <input type="radio" id="nam" name="gioi_tinh" value="Nam">
                <label for="nam">Nam</label>
                <input type="radio" id="nu" name="gioi_tinh" value="Nữ">
                <label for="nu">Nữ</label>
            </div>
            <div>
                <label for="que_quan">Quê quán:</label>
                <input required="true" type="text" id="que_quan" name="que_quan">
            </div>
            <div>
                <label for="thuong_tru">Địa chỉ thường trú:</label>
                <input required="true" type="text" id="thuong_tru" name="thuong_tru">
            </div>
            <div>
                <label for="tam_tru">Địa chỉ tạm trú:</label>
                <input required="true" type="text" id="tam_tru" name="tam_tru">
            </div>
            <div>
                <label for="ton_giao">Tôn giáo:</label>
                <input required="true" type="text" id="ton_giao" name="ton_giao">
            </div>
            <div>
                <label for="hoc_van">Trình độ văn hoá:</label>
                <input required="true" type="text" id="hoc_van" name="hoc_van">
            </div>
            <div>
                <label for="nghe_nghiep">Nghề nghiệp:</label>
                <input required="true" type="text" id="nghe_nghiep" name="nghe_nghiep">
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


<!-- Edit Person -->
<div class="modal" id="editPerson">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    <form action="editPerson.php" method="post">
            <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Edit Person</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
            <div>
                <input type="hidden" id="edit_id" name="id">
            </div>
            <div>
                <label for="cccd">Số CMND/CCCD(nếu có):</label>
                <input type="text" id="edit_cccd" name="cccd">
            </div>
            <div>
                <label for="ho_ten">Họ và tên:</label>
                <input required="true" type="text" id="edit_ho_ten" name="ho_ten">
            </div>
            <div>
                <label for="ngay_sinh">Ngày sinh:</label>
                <input required="true" type="date" id="edit_ngay_sinh" name="ngay_sinh">
            </div>
            <div>
                <label for="gioi_tinh">Giới tính:</label>
                <input type="radio" class="edit_gioi_tinh" id="nam" name="gioi_tinh" value="Nam">
                <label for="nam">Nam</label>
                <input type="radio" class="edit_gioi_tinh" id="nu" name="gioi_tinh" value="Nữ">
                <label for="nu">Nữ</label>
            </div>
            <div>
                <label for="que_quan">Quê quán:</label>
                <input required="true" type="text" id="edit_que_quan" name="que_quan">
            </div>
            <div>
                <label for="thuong_tru">Địa chỉ thường trú:</label>
                <input required="true" type="text" id="edit_thuong_tru" name="thuong_tru">
            </div>
            <div>
                <label for="tam_tru">Địa chỉ tạm trú:</label>
                <input required="true" type="text" id="edit_tam_tru" name="tam_tru">
            </div>
            <div>
                <label for="ton_giao">Tôn giáo:</label>
                <input required="true" type="text" id="edit_ton_giao" name="ton_giao">
            </div>
            <div>
                <label for="hoc_van">Trình độ văn hoá:</label>
                <input required="true" type="text" id="edit_hoc_van" name="hoc_van">
            </div>
            <div>
                <label for="nghe_nghiep">Nghề nghiệp:</label>
                <input required="true" type="text" id="edit_nghe_nghiep" name="nghe_nghiep">
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


<!-- Delete Person -->
<div class="modal" id="deletePerson">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    <form action="deletePerson.php" method="post">
        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Delete Person</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
            <div>
                <input type="hidden" id="del_id" name="id">
            </div>
            <div>
                <label for="username">Bạn có chắc muốn xoá </label>
                <span id="del_ho_ten"></span>
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