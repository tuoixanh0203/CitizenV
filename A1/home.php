<?php
require_once ('dbhelp.php');
 $sql = "SELECT COUNT(*) as total FROM person";
 $rs = executeResult($sql);
 foreach($rs as $value){
     $totalPerson = $value['total'];
 }

 $sql = "SELECT COUNT(*) as total FROM person WHERE gioi_tinh = 'Nam'";
 $rs = executeResult($sql);
 foreach($rs as $value){
     $totalMale = $value['total'];
 }

 $malePercent = ($totalMale / $totalPerson) * 100;
 $femalePercent = 100 - $malePercent;

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
            <div class="card-body py-5">Tổng số dân <br>
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
              <div id="myPlot" style="width:100%;max-width:700px"></div>
            </div>
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
        ['Nữ',<?php echo $femalePercent; ?>],
      ]);

      var options = {
        title:'Tỉ lệ nam nữ'
      };

      var chart = new google.visualization.PieChart(document.getElementById('genderPercent'));
      chart.draw(data, options);
    }
</script>
<script>
var xArray = ["Dưới độ tuổi lao động", "Trong độ tuổi lao động", "Trên độ tuổi lao động"];
var yArray = [55, 49, 44];

var data = [{
  x:xArray,
  y:yArray,
  type:"bar"
}];

var layout = {title:"Quy mô dân số theo độ tuổi lao động"};

Plotly.newPlot("myPlot", data, layout);
</script>
</body>
</html>