<?php
session_start();
require_once ('dbhelp.php');
$usn = $_SESSION['username'];

$sql = "SELECT (CURRENT_DATE() >= start AND CURRENT_DATE <= end) as ena FROM users WHERE username = '$usn'";
$rs = executeResult($sql);

foreach($rs as $value){
    $ena = $value['ena'];
}

$sql = "SELECT (CURRENT_DATE() >= start AND CURRENT_DATE <= end) as enaPre FROM users WHERE username = substring('$usn', 1, 6)";
$r = executeResult($sql);

foreach($r as $value){
    $enaPre = $value['enaPre'];
}

if($ena && $enaPre) {
    $sql = "UPDATE users SET enable=true WHERE username LIKE '$usn%'";
    $qr = execute($sql);
} else {
    $sql = "UPDATE users SET enable=false WHERE username LIKE '$usn%'";
    $qr = execute($sql);
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
</body>
</html>