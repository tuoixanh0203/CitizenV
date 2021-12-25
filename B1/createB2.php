<?php
require_once ('dbhelp.php');
session_start();
$usn = $_SESSION['username'];
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
    <button type="button" class="btn btn-primary khai_bao" data-bs-toggle="modal" data-bs-target="#addB2">
    New
    </button>

    <table>
        <thead>
            <tr>
                <th>Thôn/Bản</th>
                <th>Username(Mã thôn/bản)</th>
                <th>Thời gian bắt đầu khai báo</th>
                <th>Thời gian kết thúc khai báo</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
                require_once ('dbhelp.php');
                $sql = "SELECT * FROM users JOIN thon_ban on users.username = thon_ban.ma_thon_ban AND username LIKE '".$_SESSION['username']."%'";
                $rs = executeResult($sql);

                foreach($rs as $vl){
                    echo '<tr>
                            <td>'.$vl['ten_thon_ban'].'</td>
                            <td>'.$vl['username'].'</td>
                            <td>'.$vl['start'].'</td>
                            <td>'.$vl['end'].'</td>
                            <td><button class="edit khai_bao" data-id="'.$vl['ma_thon_ban'].'">Edit</button></td>
                            <td><button class="delete khai_bao" data-id="'.$vl['ma_thon_ban'].'">Delete</button></td>
                        </tr>';
                }
            ?>
        </tbody>
    </table>

    <?php include 'B2_model.php'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
$(function(){
    $('.khai_bao').click(function(e){
        e.preventDefault();
        if(!<?php echo $enable; ?>) {
            alert("Ngoài thời hạn khai báo");
            location.reload();
        }
    });
    $('.edit').click(function(e){
        e.preventDefault();
        $('#editB2').modal('show');
        var ma_thon_ban = $(this).data('id');
        getData(ma_thon_ban);
    });
    $('.delete').click(function(e){
        e.preventDefault();
        $('#deleteB2').modal('show');
        var ma_thon_ban = $(this).data('id');
        getData(ma_thon_ban);
    });
});

function getData(ma_thon_ban){
    $.ajax({
    type: 'POST',
    url: 'getData.php',
    data: {ma_thon_ban:ma_thon_ban},
    dataType: 'json',
    success: function(response){
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
    
</body>
</html>