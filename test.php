<?php
require_once ('dbhelp.php');
$sql = "select * from tinh where ma_tinh is null";
$rs = executeResult($sql);

$sql = "select * from tinh where ma_tinh is not null";
$rsMaTinh = executeResult($sql);

if(!empty($_POST)) {
    if(isset($_POST['tenTinh'])) {
        $tenTinh = $_POST['tenTinh'];
    }

    if(isset($_POST['maTinh'])) {
        $maTinh = $_POST['maTinh'];
    }

    // echo $tenTinh;
    // echo $maTinh;

    $sql = "UPDATE tinh SET ma_tinh='$maTinh' WHERE ten_tinh = '$tenTinh'";
    execute($sql);
    header("Refresh:0");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="">Tỉnh</label>
        <select id="tenTinh" name="tenTinh">
            <option value="">--Chọn tỉnh--</option>
            <?php
                foreach($rs as $value){
                    var_dump($value['ten_tinh']);
                    echo '<option value="'.$value['ten_tinh'].'">'.$value['ten_tinh'].'</option>';
                }
            ?>
        </select>
        <label for="cars">Mã:</label>
        <input required="true" type="text" id="maTinh" name="maTinh">
        <button>Save</button> 
    </form>

    <div>
        <table>
            <tr>
                <th>Mã tỉnh</th>
                <th>Tên tỉnh</th>
                <th></th>
                <th></th>
            </tr>
            
<?php

foreach($rsMaTinh as $vl) {
    echo '<tr>
        <td>'.$vl['ma_tinh'].'</td>
        <td>'.$vl['ten_tinh'].'</td>
        <td><button>Edit</button></td>
        <td><button onclick="deleteT('.$vl['id'].')">Delete</button></td>
    </tr>';
}

?>
        </table>
    </div>

    <script type="text/javascript">
		function deleteT(id) {
			option = confirm('Bạn có chắc muốn xoá mã của tỉnh này không?')
			if(!option) {
				return;
			}

            console.log(id);

            $.post('delete.php', {'id':id}, function() {
                location.reload();
            });
		}
	</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>