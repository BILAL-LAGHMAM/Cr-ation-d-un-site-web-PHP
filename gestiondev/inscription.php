<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <?php
    
    $dsn = 'mysql:host=localhost;dbname=gestiondev';
    $user = 'root';
    $pass = '';

      if (isset($_POST["signup"])) {
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $email = $_POST["email"];
        $pas = $_POST["password"];
        $password_hashing = password_hash($pas, PASSWORD_DEFAULT);
        $signup = $_POST["signup"];
        if (isset($_POST["signup"])) {
            if (empty($_POST["nom"]) || empty($_POST["prenom"]) || empty($_POST["email"]) || empty($_POST["password"])){
                $message = "<p style='color:red'>Entrer les données</p>";
            }

        else {
            try {
                $cdb = new PDO($dsn, $user, $pass);
                $cdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $insert = "INSERT INTO user_gestion (nom_user, prenom_user, email_user, password_user) VALUES ('$nom', '$prenom', '$email', '$password_hashing')";
                $cdb->exec($insert);
                header("location:login.php");
            }
            catch(PDOException $e){
                echo "filed" . $e->getMessage();
            }
        }
        }

}


    
    
    ?>









    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">inscription</h2>
                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="nom" id="name" placeholder="nom"/>
                                <?php
                                    if (isset($message)) {
                                       echo $message;
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="prenom" id="name" placeholder="prenom"/>
                                <?php
                                    if (isset($message)) {
                                       echo $message;
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email"/>
                                <?php
                                    if (isset($message)) {
                                       echo $message;
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="pass" placeholder="Password"/>
                                <?php
                                    if (isset($message)) {
                                       echo $message;
                                    }
                                ?>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="login.php" class="signup-image-link">déja un compte</a>
                    </div>
                </div>
            </div>
        </section>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>