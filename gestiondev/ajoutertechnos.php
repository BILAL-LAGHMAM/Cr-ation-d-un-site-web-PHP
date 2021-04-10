<!--

=========================================================
* Now UI Dashboard - v1.5.0
=========================================================

* Product Page: https://www.creative-tim.com/product/now-ui-dashboard
* Copyright 2019 Creative Tim (http://www.creative-tim.com)

* Designed by www.invisionapp.com Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Now UI Dashboard by Creative Tim
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="style/dashbordbootmin.css" rel="stylesheet" />
  <link href="style/now-ui-dash.css" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="style/demodash.css" rel="stylesheet" />
</head>

<?php

$dsn = 'mysql:host=localhost;dbname=gestiondev';
$user = 'root';
$pass = '';
$message = "";

try {
  $cdb = new PDO($dsn, $user, $pass);
  $cdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if (isset($_POST["btn_ajoute"])) {

    $select = $_POST["select"];
    $html = $_POST["html"];
    $cgi = $_POST["cgi"];
    $js = $_POST["js"];
    $ajax = $_POST["ajax"];
    $php = $_POST["php"];

    $requit = "INSERT INTO technos_developpeurs (id_developpeurs, html, cgi, js, ajax, php) VALUES ('$select', '$html', '$cgi', '$js', '$ajax', '$php')";
    $resulte = $cdb->exec($requit);
    $message = "";
  } else {

    $requet = "SELECT nom_developpeurs , id_developpeurs FROM developpeurs";
    $resultte = $cdb->query($requet);
    if (!$resultte) {
      echo "erour";
    } else {
      
      $tst = $resultte->rowCount();
    }
  }
} catch (PDOException $e) {
  echo "no connect" . $e->getMessage();
}


?>











<body class="user-profile">
<?php
include("pages/dash.php");
?>    <div class="main-panel" id="main-panel">
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
            <a class="navbar-brand" href="#pablo">ajouter des technos</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>

        </div>
      </nav>
      <!-- End Navbar -->
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="title">ajouter des technos</h5>
              </div>
              <div class="card-body">
                <form method="POST">
                  <div class="row">
                    <div class="col-md-12 pr-1">
                      <div class="form-group">
                        <select style="width:100%" name="select">
                          <?php
                          // var_dump($resultte->fetchAll());

                          $r  = $resultte->fetchAll();
                          foreach ($r as $a) {
                            // var_dump($a["nom_developpeurs"]);
                            // var_dump($a['id_developpeurs']);
                            echo "<option value ='".$a['id_developpeurs'] . "'  >" . $a["nom_developpeurs"] . "</option>";
                          }
                          // while ($ligne = $resultte->fetch(PDO::FETCH_NUM)) {

                          // foreach ($ligne as $value) {
                          // echo"<option value ='".$value['id_developpeurs']."' >$value</option>";
                          // }

                          // }
                          ?>
                          <?php
                          $resultte->closeCursor();
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>html</label>
                        <input type="text" name="html" class="form-control" placeholder="html">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>cgi</label>
                        <input type="text" name="cgi" class="form-control" placeholder="cgi">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>js</label>
                        <input type="text" name="js" class="form-control" placeholder="js">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>ajax</label>
                        <input type="text" name="ajax" class="form-control" placeholder="ajax">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 pr-1">
                      <div class="form-group">
                        <label>php</label>
                        <input type="text" name="php" class="form-control" placeholder="php">
                      </div>
                    </div>
                  </div>

                  <button type="submit" name="btn_ajoute" class="btn btn-primary btn-lg btn_linear">Ajouter technos</button>

                  <?php
                  if (isset($message)) {
                    echo $message;
                  }

                  ?>

                </form>
                <!--   Core JS Files   -->
<?php

include("pages/codesjs.php");

?>
</body>

</html>