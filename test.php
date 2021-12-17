<?php
require_once ('dbhelp.php');
$sql = "select * from tinh where ma_tinh is null";
$rs = executeResult($sql);



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
    <form action="" method="get">
        <label for="cars">Tỉnh</label>
        <select id="tinh" name="tinh">
            <option value="">--Chọn tỉnh--</option>
            <?php
                foreach($rs as $value){
                    var_dump($value['ten_tinh']);
                    echo '<option value="">'.$value['ten_tinh'].'</option>';
                }
            ?>
        </select>
        <label for="cars">Mã:</label>
        <input type="text">
        <button>Save</button> 
    </form>
</body>
</html>