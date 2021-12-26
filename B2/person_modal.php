<?php
require_once('dbhelp.php');
// $sql = "SELECT id FROM phuong_xa WHERE ma_phuong_xa = '".$_SESSION['username']."'";
// $rs = executeResult($sql);

// foreach($rs as $value){
//     $idX = $value['id'];
// }

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
                    <div class="row mb-2">
                        <label for="cccd" class="col-sm-6 col-form-label">Số CMND/CCCD(nếu có):</label>
                        <input type="text" id="cccd" name="cccd" class="col-sm-5">
                    </div>
                    <div class="row mb-2">
                        <label for="ho_ten" class="col-sm-6 col-form-label">Họ và tên:</label>
                        <input required="true" type="text" id="ho_ten" name="ho_ten" class="col-sm-5">
                    </div>
                    <div class="row mb-2">
                        <label for="ngay_sinh" class="col-sm-6 col-form-label">Ngày sinh:</label>
                        <input required="true" type="date" id="ngay_sinh" name="ngay_sinh" class="col-sm-5">
                    </div>
                    <div>
                        <label for="gioi_tinh" class="col-sm-6 col-form-label">Giới tính:</label>
                        <!-- <div class="px-5 mx-2"> -->
                            <input type="radio" id="nam" name="gioi_tinh" value="Nam" class="form-check-input">
                            <label for="nam" class="form-check-label">Nam</label>
                        <!-- </div> -->
                        <!-- <div class="px-5 mx-2"> -->
                            <input type="radio" id="nu" name="gioi_tinh" value="Nữ" class="form-check-input">
                            <label for="nu" class="form-check-label">Nữ</label>
                        <!-- </div> -->

                    </div>
                    <div class="row mb-2">
                        <label for="que_quan" class="col-sm-6 col-form-label">Quê quán:</label>
                        <input required="true" type="text" id="que_quan" name="que_quan" class="col-sm-5">
                    </div>
                    <div class="row mb-2">
                        <label for="thuong_tru" class="col-sm-6 col-form-label">Địa chỉ thường trú:</label>
                        <input required="true" type="text" id="thuong_tru" name="thuong_tru" class="col-sm-5">
                    </div>
                    <div class="row mb-2">
                        <label for="tam_tru" class="col-sm-6 col-form-label">Địa chỉ tạm trú:</label>
                        <input required="true" type="text" id="tam_tru" name="tam_tru" class="col-sm-5">
                    </div>
                    <div class="row mb-2">
                        <label for="ton_giao" class="col-sm-6 col-form-label">Tôn giáo:</label>
                        <input required="true" type="text" id="ton_giao" name="ton_giao" class="col-sm-5">
                    </div>
                    <div class="row mb-2">
                        <label for="hoc_van" class="col-sm-6 col-form-label">Trình độ văn hoá:</label>
                        <input required="true" type="text" id="hoc_van" name="hoc_van" class="col-sm-5">
                    </div>
                    <div class="row mb-2">
                        <label for="nghe_nghiep" class="col-sm-6 col-form-label">Nghề nghiệp:</label>
                        <input required="true" type="text" id="nghe_nghiep" name="nghe_nghiep" class="col-sm-5">
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
                    <div class="row mb-2">
                        <label for="cccd" class="col-sm-6 col-form-label">Số CMND/CCCD(nếu có):</label>
                        <input type="text" id="edit_cccd" name="cccd" class="col-sm-5">
                    </div>
                    <div class="row mb-2">
                        <label for="ho_ten" class="col-sm-6 col-form-label">Họ và tên:</label>
                        <input required="true" type="text" id="edit_ho_ten" name="ho_ten" class="col-sm-5">
                    </div>
                    <div class="row mb-2">
                        <label for="ngay_sinh" class="col-sm-6 col-form-label">Ngày sinh:</label>
                        <input required="true" type="date" id="edit_ngay_sinh" name="ngay_sinh" class="col-sm-5">
                    </div>
                    <div >
                        <label for="gioi_tinh" class="col-sm-6 col-form-label">Giới tính:</label>
                        <input type="radio" class="edit_gioi_tinh" id="nam" name="gioi_tinh" value="Nam" class="col-sm-5">
                        <label for="nam">Nam</label>
                        <input type="radio" class="edit_gioi_tinh" id="nu" name="gioi_tinh" value="Nữ" class="col-sm-5">
                        <label for="nu">Nữ</label>
                    </div>
                    <div class="row mb-2">
                        <label for="que_quan" class="col-sm-6 col-form-label">Quê quán:</label>
                        <input required="true" type="text" id="edit_que_quan" name="que_quan" class="col-sm-5">
                    </div>
                    <div class="row mb-2">
                        <label for="thuong_tru" class="col-sm-6 col-form-label">Địa chỉ thường trú:</label>
                        <input required="true" type="text" id="edit_thuong_tru" name="thuong_tru" class="col-sm-5">
                    </div>
                    <div class="row mb-2">
                        <label for="tam_tru" class="col-sm-6 col-form-label">Địa chỉ tạm trú:</label>
                        <input required="true" type="text" id="edit_tam_tru" name="tam_tru" class="col-sm-5">
                    </div>
                    <div class="row mb-2">
                        <label for="ton_giao" class="col-sm-6 col-form-label">Tôn giáo:</label>
                        <input required="true" type="text" id="edit_ton_giao" name="ton_giao" class="col-sm-5">
                    </div>
                    <div class="row mb-2">
                        <label for="hoc_van" class="col-sm-6 col-form-label">Trình độ văn hoá:</label>
                        <input required="true" type="text" id="edit_hoc_van" name="hoc_van" class="col-sm-5">
                    </div>
                    <div class="row mb-2">
                        <label for="nghe_nghiep" class="col-sm-6 col-form-label">Nghề nghiệp:</label>
                        <input required="true" type="text" id="edit_nghe_nghiep" name="nghe_nghiep" class="col-sm-5">
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