<?php
session_start();
error_reporting(0);
include('includes/config.php');
if ($_SESSION['login'] != '') {
    $_SESSION['login'] = '';
}
if (isset($_POST['login'])) {

    $email = $_POST['emailid'];
    $password = md5($_POST['password']);
    $sql = "SELECT EmailId,Password,StudentId,Status FROM tblstudents WHERE EmailId=:email and Password=:password";
    $query = $dbh->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);

    if ($query->rowCount() > 0) {
        foreach ($results as $result) {
            $_SESSION['stdid'] = $result->StudentId;
            if ($result->Status == 1) {
                $_SESSION['login'] = $_POST['emailid'];
                echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
            } else {
                echo "<script>alert('Your Account Has been blocked .Please contact admin');</script>";

            }
        }

    } else {
        echo "<script>alert('Invalid Details');</script>";
    }
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Library Management System | </title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

</head>
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        align-items: center;
        justify-content: center;
    }

    .login-container {
        max-width: 400px;
        width: 100%;
        margin: auto;
        background-color: #ffffff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset;
    }

    .panel-heading {
        background-color: #3498db;
        color: #ffffff;
        text-align: center;

        padding: 15px;
        /* border-radius: 8px 8px 0 0; */
        border-radius: 5px;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 8px;
        color: #555;
    }

    .form-control {
        width: 100%;
        padding: 12px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        transition: border-color 0.3s;
    }

    .form-control:focus {
        border-color: #3498db;
        outline: none;
    }

    .help-block {
        margin-top: 8px;
        margin-bottom: 20px;
        color: #777;
    }

    .btn-info {
        background-color: #3498db;
        color: #ffffff;
        border: none;
        padding: 12px;
        border-radius: 0px;
        box-shadow: 0px 0px 4px black;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s;
    }

    .btn-info:hover {
        background-color: #2980b9;
    }

    .signup-link {
        display: block;
        text-align: center;
        margin-top: 15px;
        color: #3498db;
        text-decoration: none;
        font-size: 14px;
        transition: color 0.3s;
    }

    .signup-link:hover {
        color: #2980b9;
    }
</style>

<body>
    <!------MENU SECTION START-->
    <?php include('includes/header.php'); ?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            <!--Slider---->
            <div class="row">
                <!-- <div class="col-md-10 col-sm-8 col-xs-12 col-md-offset-1">
                    <div id="carousel-example" class="carousel slide slide-bdr" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active">
                                <img src="assets/img/1.jpg" alt="" />
                            </div>
                            <div class="item">
                                <img src="assets/img/2.jpg" alt="" />
                            </div>
                            <div class="item">
                                <img src="assets/img/3.jpg" alt="" />
                            </div>
                        </div>
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example" data-slide-to="1"></li>
                            <li data-target="#carousel-example" data-slide-to="2"></li>
                        </ol>
                        <a class="left carousel-control" href="#carousel-example" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                    </div>
                </div> -->
                <!-- Swiper -->
                <div class="col-12">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <h3>Library</h3>
                                <img src="img/library-2.jpg" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img src="img/library-3.jpg" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img src="img/library-1.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr />



            <div class="row pad-botm">
                <div class="col-md-12">
                    <h4 class="header-line">USER LOGIN FORM</h4>
                </div>
            </div>
            <a name="ulogin"></a>
            <!--LOGIN PANEL START-->
            <div class="row">
                <div class="login-container">
                    <div class="panel-heading">
                        <h2>Login Form</h2>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post">

                            <div class="form-group">
                                <label for="emailid">Enter Email id</label>
                                <input style="border-radius:0px;" class="form-control" type="text" id="emailid"
                                    name="emailid" required autocomplete="off" />
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input style="border-radius:0px;" class="form-control" type="password" id="password"
                                    name="password" required autocomplete="off" />
                                <p class="help-block"><a href="user-forgot-password.php">Forgot Password</a></p>
                            </div>

                            <button type="submit" name="login" class="btn btn-info">LOGIN</button>
                            <a href="signup.php" class="signup-link">Not Registered Yet? Sign Up</a>
                        </form>
                    </div>
                </div>
            </div>
            <!---LOGIN PABNEL END-->


        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
    <!-- FOOTER SECTION END-->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            autoplay: {
                delay: 1200,
                disableOnInteraction: false
            },
            loop: true
        });
    </script>
</body>

</html>