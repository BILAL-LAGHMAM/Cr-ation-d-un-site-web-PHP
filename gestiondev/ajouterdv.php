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
$massage_email = "";

try {
  $cdb = new PDO($dsn, $user, $pass);
  $cdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if (isset($_POST["btn_ajoute"])) {
    $email = $_POST["email"];
    $rqt_email = "SELECT email_developpeurs FROM developpeurs WHERE email_developpeurs = '$email'";
    $resulte = $cdb->query($rqt_email);
    $rslt = $resulte->fetch(PDO::FETCH_NUM);

    if ($rslt == true) {
      $massage_email = "<p style='color:red'>Developpeure déja inserer</p>";
    } elseif (empty($_POST["nom"]) || empty($_POST["prenom"]) || empty($_POST["email"])) {
      $message = "<p style='color:red'>Entrer les données</p>";
    } else {
      $nom = $_POST["nom"];
      $prenom = $_POST["prenom"];
      // $email = $_POST["email"];
      $btn_ajoute = $_POST["btn_ajoute"];

      $requit = "INSERT INTO developpeurs (nom_developpeurs, prenom_developpeurs, email_developpeurs) VALUES ('$nom', '$prenom', '$email')";
      $resulte = $cdb->exec($requit);
    }
  }












  // elseif (isset($_POST["btn_ajoute"])) {
  //   $rct = "SELECT * FROM developpeurs WHERE nom_developpeurs = $nom AND prenom_developpeurs = $prenom AND email_developpeurs = $email";
  //   $resultte = $cdb->exec($rct);
  //   if ($resultte != false) {
  //     echo"ereur";
  //   }
  // }



} catch (PDOException $e) {
  echo "no connect" . $e->getMessage();
}


?>











<body class="user-profile">
<?php
include("pages/dash.php");

?>

    <!-- Navbar -->
    <div class="main-panel" id="main-panel">
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
            <a class="navbar-brand" href="#">Ajouter Developpeure</a>
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
                <h5 class="title">ajouter des develepeures</h5>
              </div>

              <form method="POST">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>nom</label>
                        <input type="text" name="nom" class="form-control" placeholder="nom">
                        <?php
                        if ($message) {
                          echo ($message);
                        }
                        ?>
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>prenom</label>
                        <input type="text" name="prenom" class="form-control" placeholder="prenom">
                        <?php
                        if ($message) {
                          echo ($message);
                        }
                        ?>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 pr-1">
                      <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" placeholder="exeEmail@gmail.com">
                        <?php
                        if ($message) {
                          echo ($message);
                        } elseif ($massage_email) {
                          echo $massage_email;
                        }

                        ?>
                      </div>
                    </div>
                    <button type="submit" name="btn_ajoute" class="btn btn-primary btn-lg btn_linear">Ajouter</button>
              </form>
              
<?php

include_once("pages/codesjs.php");

?>
</body>

</html>