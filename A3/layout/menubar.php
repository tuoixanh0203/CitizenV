<div class="offcanvas offcanvas-start sidebar-nav bg-dark" tabindex="-1" id="sidebar">
    <!-- .offcanvas-start đặt offcanvas ở bên trái khung nhìn (được hiển thị ở trên)
         .offcanvas-end đặt offcanvas ở bên phải khung nhìn
         .offcanvas-top đặt offcanvas trên đỉnh của khung nhìn
         .offcanvas-bottom đặt offcanvas ở cuối khung nhìn -->
    <div class="menubar offcanvas-body p-0 navbar-dark mt-2" style="background-color: #222d32;">
      <ul class="navbar-nav">
        <li>
          <div class="text-muted small fw-bold text-uppercase px-3 py-2 ">
            <!-- px-, py- là padding  -->
            báo cáo
          </div>
        </li>
        <li>
          <a href="home.php" class="nav-link px-4 active">
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
          <a class="nav-link px-4 sidebar-link" data-bs-toggle="collapse" data-toggle="collapse" href="#more">
            <!-- collapse: Dùng để hiển thị và ẩn nội dung-
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
          <div class="collapse" id="more">
            <ul class="navbar-nav ps-3">
              <li>
                <a href="test.php" class="nav-link px-4">
                  <span class="me-2"><i class="fas fa-qrcode"></i></span>
                  <span>Cấp mã phường/xã</span>
                </a>
              </li>
              <li>
                <a href="createB1.php" class="nav-link px-4">
                  <span class="me-2"><i class="fas fa-users-cog"></i></span>
                  <span>Cấp tài khoản</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li>
          <a href="citizen.php" class="nav-link px-4">
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