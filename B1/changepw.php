<?php
    session_start();
    require_once ('dbhelp.php');
    include 'conn.php';
    //echo $_SESSION['username'];
    //echo $_SESSION['password'];
    $usn = $_SESSION['username'];
    $psw = $_SESSION['password'];

    function password_verify_custom($pwInput, $pwDB) {
        return strcmp($pwInput, $pwDB)==0;
    } 
    $oldPass = $newPass = $newPassAgain = '';
    if(!empty($_POST)){
        $oldPass = md5($_POST['oldPass']);
        $newPass = $_POST['newPass'];
        $newPassAgain = $_POST['newPassAgain'];
    }
    $sql = "";
    if($psw == $oldPass && $newPass == $newPassAgain){
        // update
        $newPass = md5($newPass);
        $sql = "UPDATE users SET username = '$usn', password = '$newPass' WHERE username = '$usn'";
        $_SESSION['password'] = $newPass;
        execute($sql);
        header('Location: http://localhost/CitizenV/B1/home.php');
	    die();
    }


?>
<?php
include_once 'head.php';
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
    <?php
    include_once 'layout/navbar.php';
    ?>
    <?php
    include_once 'layout/menubar.php';
    ?>
    <div class="panel-body">
        <br><br><br><br>
                    <form method="post">
                        <div class="form-group"  style="width: 60%; margin: auto;">
                             <label for="oldPass">Mật khẩu cũ:</label>
                             <input required="true" type="password" class="form-control" id="oldPass" name="oldPass">
                        </div>
                        <div class="form-group"  style="width: 60%; margin: auto;">
                            <label for="newPass">Mật khẩu mới:</label>
                            <input required="true" type="password" class="form-control" id="newPass" name="newPass">
                        </div>
                        <div class="form-group"  style="width: 60%; margin: auto;">
                            <label for="newPassAgain">Nhập lại mật khẩu mới:</label>
                            <input required="true" type="password" class="form-control" id="newPassAgain" name="newPassAgain">
                        </div>
                        <div style="width: 60%; margin: auto; margin-top: 10px">
                            <button class="btn btn-success">Save</button>
                        </div>
                    </form>
                </div>
    </body>
    </html>