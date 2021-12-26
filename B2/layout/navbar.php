<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand me-auto ms-lg-0 ms-3 mt-2 text-uppercase fw-bold" href="home.php">citizenv</a>

    <div class="collapse navbar-collapse" id="topNavBar">
      <li class="navbar-nav nav-item dropdown d-flex ms-auto my-3 my-lg-0">
        <a class="nav-link dropdown-toggle ms-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <?php
        require_once ('dbhelp.php');
        $sql = "SELECT ten_thon_ban FROM thon_ban WHERE ma_thon_ban = '".$_SESSION['username']."'";
        $rs = executeResult($sql);
        foreach($rs as $value){
            $ten_thon_ban = $value['ten_thon_ban'];
        }
        echo $ten_thon_ban;
        ?>    
        <i class="fas fa-user"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
          <li>
            <a href="http://localhost/CitizenV/A1/changepw.php" class=" px-4 dropdown-item">
              <span class="me-2"><i class="fas fa-user-edit"></i></span>
              <span>Update</a></span>
            </a>
          </li>
          <li>
            <a href="http://localhost/CitizenV/logout.php" class=" px-4 dropdown-item">
              <span class="me-2"><i class="fas fa-sign-out-alt"></i></span>
              <span>Sign out</a></span>
            </a>
          </li>
        </ul>
      </li>
    </div>
  </div>
</nav>