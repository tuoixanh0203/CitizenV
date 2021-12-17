<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
  <!-- <link rel="stylesheet" href="dataTables.bootstrap5.min.css" /> -->
  <link rel="stylesheet" href="csshome/style.css" />
  <title>CitizenV</title>
</head>

<body>
  <!-- top navigation bar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand me-auto ms-lg-0 ms-3 mt-2 text-uppercase fw-bold " href="#">citizenv</a>
      
      <div class="collapse navbar-collapse" id="topNavBar">
        <form class="d-flex ms-auto my-3 my-lg-0">
          <div class="input-group">
            <input class="form-control" type="search" 
                   placeholder="Search" aria-label="Search" />
            <button class="btn btn-primary" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </form>

        <li class="navbar-nav nav-item dropdown">
          <a class="nav-link dropdown-toggle ms-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-user"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="#">Update</a></li>
            <li><a class="dropdown-item" href="#">Sign out</a></li>
          </ul>
        </li>
      </div>
    </div>
  </nav>

  <!-- offcanvas -->
  <div class="offcanvas offcanvas-start sidebar-nav bg-dark" tabindex="-1" id="sidebar">
    <!-- .offcanvas-start đặt offcanvas ở bên trái khung nhìn (được hiển thị ở trên)
         .offcanvas-end đặt offcanvas ở bên phải khung nhìn
         .offcanvas-top đặt offcanvas trên đỉnh của khung nhìn
         .offcanvas-bottom đặt offcanvas ở cuối khung nhìn -->
    <div class="menubar offcanvas-body p-0 navbar-dark mt-2" style="background-color: #222d32;">
      <ul class="navbar-nav">
        <li>
          <div class="text-muted small fw-bold text-uppercase px-3 py-2 ">
            <!-- px- là padding left, py- là padding top -->
            báo cáo
          </div>
        </li>
        <li>
          <a href="#" class="nav-link px-4 active">
            <span class="me-2"><i class="fas fa-home"></i></span>
            <span>Trang chủ</span>
          </a>
        </li>
        <li class="my-2">
          <hr class="dropdown-divider bg-light" />
        </li>

        <li>
          <div class="text-muted small fw-bold text-uppercase px-3 mb-1">
            <!-- mt- là margin top, mb- là margin bottom -->
            Quản lý
          </div>
        </li>
        <li>
          <a class="nav-link px-4 sidebar-link" data-bs-toggle="collapse" href="#layouts">
            <!-- data-bs-toggle="collapse: Dùng để hiển thị và ẩn nội dung-
                  .collapse ẩn nội dung
                  .collapsing được áp dụng trong quá trình chuyển đổi
                  .collapse.show hiển thị nội dung -->
            <span class="me-2"><i class="fas fa-book-open"></i></span>
            <span>Quản lý</span>
            <span class="ms-auto">
              <span class="right-icon">
                <i class="fas fa-chevron-down"></i>
              </span>
            </span>
          </a>
          <div class="collapse multi-collapse" id="layouts">
            <ul class="navbar-nav ps-3">
              <li>
                <a href="#" class="nav-link px-4">
                  <span class="me-2"><i class="fas fa-qrcode"></i></span>
                  <span>Cấp mã tỉnh</span>
                </a>
              </li>
              <li>
                <a href="#" class="nav-link px-4">
                  <span class="me-2"><i class="fas fa-users-cog"></i></span>
                  <span>Cấp tài khoản</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li>
          <a href="#" class="nav-link px-4">
            <span class="me-2"><i class="fas fa-users"></i></span>
            <span>Công dân</span>
          </a>
        </li>

        <li class="my-2">
          <hr class="dropdown-divider bg-light" />
        </li>
        <li>
          <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
            Bản in
          </div>
        </li>
        <li>
          <a href="#" class="nav-link px-4">
            <span class="me-2"><i class="fas fa-list-alt"></i></span>
            <span>Danh sách công dân</span>
          </a>
        </li>
        <li>
          <a href="#" class="nav-link px-4">
            <span class="me-2"><i class="fas fa-stream"></i></span>
            <span>Danh sách mã tỉnh</span>
          </a>
        </li>
        <li>
          <a href="#" class="nav-link px-4">
            <span class="me-2"><i class="fas fa-th-list"></i></span>
            <span>Danh sách User</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
  <!-- offcanvas -->

  <main class="mt-5 pt-5">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <h4>Dashboard</h4>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3 mb-3">
          <div class="card bg-primary text-white h-100">
            <div class="card-body py-5">Primary Card</div>
            <div class="card-footer d-flex">
              View Details
              <span class="ms-auto">
                <i class="fas fa-chevron-right"></i>
              </span>
            </div>
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <div class="card bg-warning text-dark h-100">
            <div class="card-body py-5">Warning Card</div>
            <div class="card-footer d-flex">
              View Details
              <span class="ms-auto">
                <i class="fas fa-chevron-right"></i>
              </span>
            </div>
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <div class="card bg-success text-white h-100">
            <div class="card-body py-5">Success Card</div>
            <div class="card-footer d-flex">
              View Details
              <span class="ms-auto">
                <i class="fas fa-chevron-right"></i>
              </span>
            </div>
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <div class="card bg-danger text-white h-100">
            <div class="card-body py-5">Danger Card</div>
            <div class="card-footer d-flex">
              View Details
              <span class="ms-auto">
                <i class="fas fa-chevron-right"></i>
              </span>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 mb-3">
          <div class="card h-100">
            <div class="card-header">
              <span class="me-2"><i class="fas fa-analytics"></i></span>
              Area Chart Example
            </div>
            <div class="card-body">
              <canvas class="chart" width="800" height="400"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="./js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
  <script src="./js/jquery-3.5.1.js"></script>
  <script src="./js/jquery.dataTables.min.js"></script>
  <script src="./js/dataTables.bootstrap5.min.js"></script>
  <script src="./js/script.js"></script>
</body>

</html>