<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="style/style.css">
</head>
<body>

<?php

$dsn = 'mysql:host=localhost;dbname=gestiondev';
$user = 'root';
$pass = '';
$message = "";



    
    try {
        $cdb = new PDO($dsn, $user, $pass);
        $cdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       if (isset($_POST["sublogin"])) {
           if (empty($_POST["nom_user"]) || empty($_POST["password_user"])) {
               $message = "<p style='color:red'>Entrer les données</p>";
           }

           elseif (isset($_POST["nom_user"])) {
               $user = $_POST["nom_user"];
               $password = $_POST["password_user"];

               $requite = "SELECT nom_user,password_user FROM user_gestion where nom_user = '$user'";
               $resulte = $cdb->query($requite);
            //    $resulte->execute($requite);
               $user_rslt = $resulte->fetch();

               if (password_verify($password, $user_rslt["password_user"])) {
                   header('location: dashbord');
               }
               else {
                $message =   "<p style='color:red'>NOT FIND</p>";
               }


           }
       }
    }
    catch(PDOException $e){
       $message = $e->getMessage();
    }






?>







    <div class="main">
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="inscription.php" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="nom_user" id="your_name" placeholder="nom user"/>
                                <?php
                                if (isset($message)) {
                                    echo $message;
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password_user" id="your_pass" placeholder="Password"/>
                                <?php
                                if (isset($message)) {
                                    echo $message;
                                }
                                ?>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="sublogin" id="signin" class="form-submit" value="Log in"/>
                            </div>
                        </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>