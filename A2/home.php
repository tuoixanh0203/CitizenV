<?php
session_start();
require_once ('dbhelp.php');
$usn = $_SESSION['username'];

$sql = "SELECT (CURRENT_DATE() >= start AND CURRENT_DATE <= end) as ena FROM users WHERE username = '$usn'";
$rs = executeResult($sql);

foreach($rs as $value){
    $ena = $value['ena'];
}

$sql = "SELECT (CURRENT_DATE() >= start AND CURRENT_DATE <= end) as enaPre FROM users WHERE username = substring('$usn', 1, 2)";
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

$sql = "SELECT COUNT(*) as total FROM person WHERE ma_khu_vuc like '$usn%'";
 $rs = executeResult($sql);
 foreach($rs as $value){
     $totalPerson = $value['total'];
 }

 $sql = "SELECT COUNT(*) as total FROM person WHERE gioi_tinh = 'Nam' AND ma_khu_vuc like '$usn%'";
 $rs = executeResult($sql);
 foreach($rs as $value){
     $totalMale = $value['total'];
 }
 if($totalPerson > 0) {
  $malePercent = ($totalMale / $totalPerson) * 100;
  $femalePercent = 100 - $malePercent;
 }

 $sql = "SELECT COUNT(*) as total FROM person WHERE year(CURRENT_DATE()) - year(ngay_sinh) < 15 AND ma_khu_vuc like '$usn%'";
 $rs = executeResult($sql);
 foreach($rs as $value){
     $duoild = $value['total'];
 }
 $sql = "SELECT COUNT(*) as total FROM person WHERE year(CURRENT_DATE()) - year(ngay_sinh) >= 15 AND year(CURRENT_DATE()) - year(ngay_sinh) <= 59 AND ma_khu_vuc like '$usn%'";
 $rs = executeResult($sql);
 foreach($rs as $value){
     $trongld = $value['total'];
 }
 $sql = "SELECT COUNT(*) as total FROM person WHERE year(CURRENT_DATE()) - year(ngay_sinh) >= 60 AND ma_khu_vuc like '$usn%'";
 $rs = executeResult($sql);
 foreach($rs as $value){
     $trenld = $value['total'];
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
          <div class="card bg-success text-white h-100">
            <div class="card-body py-5">T???ng s??? d??n <br>
              <?php echo $totalPerson; ?>
            </div>
            <div class="card-footer d-flex">
              View Details
              <span class="ms-auto">
                <i class="fas fa-chevron-right"></i>
              </span>
            </div>
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <div class="card bg-primary text-white h-100">
              <div id="genderPercent"></div>
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
          <div class="card h-100">
            <div class="card-header">
              <span class="me-2"><i class="fas fa-analytics"></i></span>
              Area Chart Example
            </div>
            <div class="card-body">
              <div id="myPlot"></div>
            </div>
          </div>
      </div>
    </div>
    </div>
  </main>

  <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script>
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Gender', 'Mhl'],
        ['Nam', <?php echo $malePercent; ?>],
        ['N???',<?php echo $femalePercent; ?>],
      ]);

      var options = {
        title:'T??? l??? nam n???'
      };

      var chart = new google.visualization.PieChart(document.getElementById('genderPercent'));
      chart.draw(data, options);
    }
</script>
<script>
var xArray = ["D?????i ????? tu???i lao ?????ng(0-14 tu???i)", "Trong ????? tu???i lao ?????ng(15-59 tu???i)", "Tr??n ????? tu???i lao ?????ng(60 tu???i tr??? l??n)"];
var yArray = [<?php echo $duoild; ?>, <?php echo $trongld; ?>, <?php echo $trenld; ?>];

var data = [{
  x:xArray,
  y:yArray,
  type:"bar"
}];

var layout = {title:"Quy m?? d??n s??? theo ????? tu???i lao ?????ng"};

Plotly.newPlot("myPlot", data, layout);
</script>
</body>
</html>