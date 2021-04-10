<!--

=========================================================
* Now UI Dashboard - v1.5.0
=========================================================

* Product Page: https://www.creative-tim.com/product/now-ui-dashboard
* Copyright 2019 Creative Tim http://www.creative-tim.com)

* Designed by www.invisionapp.com Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

-->





<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="style/nv.css">


<?php

include("pages/header.php");
?>

<?php

$dsn = 'mysql:host=localhost;dbname=gestiondev';
$user = 'root';
$pass = '';
$message = "";
try {
  $cdb = new PDO($dsn, $user, $pass);
  $cdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $requetall = "SELECT COUNT(*) FROM developpeurs";
  $resulteall = $cdb->query($requetall);

  $requet_html = "SELECT COUNT(*) FROM technos_developpeurs WHERE html=5";
  $resulthtml = $cdb->query($requet_html);

  $requet_cgi = "SELECT COUNT(*) FROM technos_developpeurs WHERE cgi=5";
  $result_cgi = $cdb->query($requet_cgi);

  $requet_js = "SELECT COUNT(*) FROM technos_developpeurs WHERE js = 5";
  $result_js = $cdb->query($requet_js);

  $requet_ajax = "SELECT COUNT(*) FROM technos_developpeurs WHERE ajax = 5";
  $result_ajax = $cdb->query($requet_ajax);

  $requet_php = "SELECT COUNT(*) FROM technos_developpeurs WHERE php = 5";
  $result_php = $cdb->query($requet_php);
} catch (PDOException $e) {
  echo "filed" . $e->getMessage();
}



?>




<body class="">
  
<?php
include("pages/dash.php");

?>
  
  <div class="main-panel" id="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
      <div class="container-fluid">
        <div class="navbar-wrapper">
          <div class="navbar-toggle">
            <button type="button" class="navbar-toggler">
              <span class="navbar-toggler-bar bar1"></span>
              <span class="navbar-toggler-bar bar2"></span>
              <span class="navbar-toggler-bar bar3"></span>
            </button>
          </div>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar navbar-kebab"></span>
          <span class="navbar-toggler-bar navbar-kebab"></span>
          <span class="navbar-toggler-bar navbar-kebab"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
          <h1 class="Statistice">Statistice</h1>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="panel-header panel-header-lg div_header">
      <canvas id="bigDashboardChart"></canvas>
    </div>
    <div class="content">
      <div class="row div_row">
        <div class="col-lg-4">
          <div class="card card-chart statistic">
            <div class="card-header">
              <h5 class="card-category">nombre total de développeurs</h5>
              <i class="fas fa-user-friends"></i>
              <?php
              while ($ligneall = $resulteall->fetch(PDO::FETCH_NUM)) {

                foreach ($ligneall as $valueall) {
                  echo "<h4 class='card-title'>$valueall</h4>";
                }
              }
              ?>
              <?php
              $resulteall->closeCursor();
              ?>

              <div class="dropdown">
                
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                  <a class="dropdown-item text-danger" href="#">Remove Data</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="chart-area">
                <canvas id="lineChartExample"></canvas>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="card statistic">
            <div class="card-header">
              <h5 class="card-category">nombre d'experts en html</h5>
              <i class="fab fa-html5"></i>
              <?php
              while ($lignehtml  = $resulthtml->fetch(PDO::FETCH_NUM)) {
                foreach ($lignehtml as $value_html) {
                  echo "<h4 class='card-title'>$value_html</h4>";
                }
              }

              ?>
              <?php
              $resulthtml->closeCursor();
              ?>
              <h4 class="card-title"></h4>
              <div class="dropdown">
                
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                  <a class="dropdown-item text-danger" href="#">Remove Data</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="chart-area">
                <canvas id="lineChartExampleWithNumbersAndGrid"></canvas>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="card card-chart statistic">
            <div class="card-header">
              <h5 class="card-category">nombre d'experts en cgi</h5>

              <?php

              while ($ligne_cgi = $result_cgi->fetch(PDO::FETCH_NUM)) {
                foreach ($ligne_cgi as $value_cgi) {
                  echo "<h4 class='card-title'>$value_cgi</h4>";
                }
              }
              ?>
              <?php
              $result_cgi->closeCursor();
              ?>
            </div>
            <div class="card-body">
              <div class="chart-area">
                <canvas id="barChartSimpleGradientsNumbers"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
      


      <div class="row">
        <div class="col-lg-4 col-md-4">
          <div class="card card-chart statistic">
            <div class="card-header">
              <h5 class="card-category">nombre d'experts en js</h5>
              <i class="fab fa-js"></i>

              <?php

              while ($ligne_js = $result_js->fetch(PDO::FETCH_NUM)) {
                foreach ($ligne_js as $value_js) {
                  echo "<h4 class='card-title'>$value_js</h4>";
                }
              }

              ?>
              <div class="dropdown">
                
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                  <a class="dropdown-item text-danger" href="#">Remove Data</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="chart-area">
                <canvas id="lineChartExampleWithNumbersAndGrid"></canvas>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4">
          <div class="card card-chart statistic">
            <div class="card-header">
              <h5 class="card-category">Nombre D'experts En ajax</h5>
              <?php

              while ($ligne_ajax = $result_ajax->fetch(PDO::FETCH_NUM)) {
                foreach ($ligne_ajax as $value_ajax) {
                  echo "<h4 class='card-title'>$value_ajax</h4>";
                }
              }

              ?>
            </div>
            <div class="card-body">
              <div class="chart-area">
                <canvas id="barChartSimpleGradientsNumbers"></canvas>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4">
          <div class="card card-chart statistic">
            <div class="card-header">
              <h5 class="card-category">Nombre D'experts En php<i class="fab fa-php"></i></h5>
              

              <?php
              while ($ligne_php = $result_php->fetch(PDO::FETCH_NUM)) {
                foreach ($ligne_php as $value_php) {
                  echo "<h4 class='card-title'>$value_php</h4>";
                }
              }

              ?>
            </div>
            <div class="card-body">
              <div class="chart-area">
                <canvas id="barChartSimpleGradientsNumbers"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php
include("pages/footer.php");

?>

  </div>
  </div>
<?php

include("pages/codesjs.php");

?>
</body>

</html>