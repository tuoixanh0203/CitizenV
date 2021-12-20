
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
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addA2">
    New
    </button>

    <table>
        <thead>
            <tr>
                <th>Tỉnh</th>
                <th>Username(Mã tỉnh)</th>
                <th>Thời gian bắt đầu khai báo</th>
                <th>Thời gian kết thúc khai báo</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
                require_once ('dbhelp.php');
                $sql = "SELECT * FROM users JOIN tinh on users.username = tinh.ma_tinh";
                $rs = executeResult($sql);

                foreach($rs as $vl){
                    echo '<tr>
                            <td>'.$vl['ten_tinh'].'</td>
                            <td>'.$vl['username'].'</td>
                            <td>'.$vl['start'].'</td>
                            <td>'.$vl['end'].'</td>
                            <td><button class="edit" data-id="'.$vl['ma_tinh'].'">Edit</button></td>
                            <td><button class="delete" data-id="'.$vl['ma_tinh'].'">Delete</button></td>
                        </tr>';
                }
            ?>
        </tbody>
    </table>

    <?php include 'A2_model.php'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
$(function(){
  $('.edit').click(function(e){
    e.preventDefault();
    $('#editA2').modal('show');
    var ma_tinh = $(this).data('id');
    // console.log(id);
    getData(ma_tinh);
  });
  $('.delete').click(function(e){
    e.preventDefault();
    $('#deleteA2').modal('show');
    var ma_tinh = $(this).data('id');
    // console.log(id);
    getData(ma_tinh);
  });
});

function getData(ma_tinh){
    $.ajax({
    type: 'POST',
    url: 'getData.php',
    data: {ma_tinh:ma_tinh},
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