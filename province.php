<body>

    <?php
    require_once('dbhelp.php');
    $sql = "select * from tinh where ma_tinh is null";
    $rs = executeResult($sql);

    $sql = "select * from tinh where ma_tinh is not null";
    $rsMaTinh = executeResult($sql);

    if (!empty($_POST)) {
        if (isset($_POST['tenTinh'])) {
            $tenTinh = $_POST['tenTinh'];
        }

        if (isset($_POST['maTinh'])) {
            $maTinh = $_POST['maTinh'];
        }

        // echo $tenTinh;
        // echo $maTinh;

        $sql = "UPDATE tinh SET ma_tinh='$maTinh' WHERE ten_tinh = '$tenTinh'";
        execute($sql);
        header("Refresh:0");
    }

    ?>


    <?php
    include_once 'head.php';
    ?>

    <body>
    <?php
      include_once 'layout/navbar.php';
  ?>
   <?php
      include_once 'layout/menubar.php';
  ?>
        <main class="mt-4 pt-5">
            <h3 class="p-2">Cấp mã tỉnh</h3>
            <div class="container-fluid card shadow-sm p-3 mb-5 bg-body rounded ">
                <div class="card-header">
                    <form action="" method="post">
                        <label for="">Tỉnh:</label>
                        <select id="tenTinh" name="tenTinh">
                            <option value="">--Chọn tỉnh--</option>
                            <?php
                            foreach ($rs as $value) {
                                var_dump($value['ten_tinh']);
                                echo '<option value="' . $value['ten_tinh'] . '">' . $value['ten_tinh'] . '</option>';
                            }
                            ?>
                        </select>
                        <label for="cars">Mã:</label>
                        <input required="true" type="text" id="maTinh" name="maTinh">
                        <button class="btn btn-success">Save</button>
                    </form>
                </div>

                <div class="card-body shadow-sm p-3 mb-5 bg-body rounded">
                    <form class="d-flex ms-auto  justify-content-end  py-0.5">
                        <div class="row">
                            <div class="input-group  col-xs-2">
                                <input class="form-control  mw-20" type="search" placeholder="Search" aria-label="Search" />
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="">
                        <table class="table table-bordered table-responsive table-hover ">
                            <tr class="table-success">
                                <th>Mã tỉnh</th>
                                <th>Tên tỉnh</th>
                                <th>Tools</th>
                            </tr>

                            <?php

                            foreach ($rsMaTinh as $vl) {
                                echo '<tr>
        <td>' . $vl['ma_tinh'] . '</td>
        <td>' . $vl['ten_tinh'] . '</td>
        <td><button>Edit</button> <button onclick="deleteT(' . $vl['id'] . ')">Delete</button></td>
    </tr>';
                            }

                            ?>
                        </table>
                    </div>
                </div>


                <script type="text/javascript">
                    function deleteT(id) {
                        option = confirm('Bạn có chắc muốn xoá mã của tỉnh này không?')
                        if (!option) {
                            return;
                        }

                        console.log(id);

                        $.post('delete.php', {
                            'id': id
                        }, function() {
                            location.reload();
                        });
                    }
                </script>
            </div>
        </main>
    </body>

    </html>