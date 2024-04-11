<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (isset($_POST['signup'])) {

    //Code for student ID
    $count_my_page = ("studentid.txt");
    $hits = file($count_my_page);
    $hits[0]++;
    $fp = fopen($count_my_page, "w");
    fputs($fp, "$hits[0]");
    fclose($fp);
    $StudentId = $hits[0];
    $fname = $_POST['fullanme'];
    $mobileno = $_POST['mobileno'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $status = 1;
    $sql = "INSERT INTO  tblstudents(StudentId,FullName,MobileNumber,EmailId,Password,Status) VALUES(:StudentId,:fname,:mobileno,:email,:password,:status)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':StudentId', $StudentId, PDO::PARAM_STR);
    $query->bindParam(':fname', $fname, PDO::PARAM_STR);
    $query->bindParam(':mobileno', $mobileno, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->bindParam(':status', $status, PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if ($lastInsertId) {
        echo '<script>alert("Your Registration successfull and your student id is  "+"' . $StudentId . '")</script>';
    } else {
        echo "<script>alert('Something went wrong. Please try again');</script>";
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
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Online Library Management System | Student Signup</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <script type="text/javascript">
        function valid() {
            if (document.signup.password.value != document.signup.confirmpassword.value) {
                alert("Password and Confirm Password Field do not match  !!");
                document.signup.confirmpassword.focus();
                return false;
            }
            return true;
        }
    </script>
    <script>
        function checkAvailability() {
            $("#loaderIcon").show();
            jQuery.ajax({
                url: "check_availability.php",
                data: 'emailid=' + $("#emailid").val(),
                type: "POST",
                success: function (data) {
                    $("#user-availability-status").html(data);
                    $("#loaderIcon").hide();
                },
                error: function () { }
            });
        }
    </script>
    <style>
        body {}

        .signup-container {
            margin: auto;
            max-width: 400px;
            width: 100%;
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
            border-radius: 8px 8px 0 0;
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
            box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset;
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
</head>

<body>
    <!------MENU SECTION START-->
    <?php include('includes/header.php'); ?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
                    <h4 class="header-line">User Signup</h4>

                </div>

            </div>
            <div class="row">
                <div class="signup-container">
                    <div class="panel-heading">
                        <h2>SIGNUP FORM</h2>
                    </div>
                    <div class="panel-body">
                        <form name="signup" method="post" onSubmit="return valid();">
                            <div class="form-group">
                                <label>Enter Full Name</label>
                                <input style="border-radius:0;" class="form-control" type="text" name="fullanme"
                                    autocomplete="off" required />
                            </div>

                            <div class="form-group">
                                <label>Mobile Number :</label>
                                <input style="border-radius:0;" class="form-control" type="text" name="mobileno"
                                    maxlength="10" autocomplete="off" required />
                            </div>

                            <div class="form-group">
                                <label>Enter Email</label>
                                <input style="border-radius:0;" class="form-control" type="email" name="email"
                                    id="emailid" onBlur="checkAvailability()" autocomplete="off" required />
                                <span id="user-availability-status" style="font-size: 12px;"></span>
                            </div>

                            <div class="form-group">
                                <label>Enter Password</label>
                                <input style="border-radius:0;" class="form-control" type="password" name="password"
                                    autocomplete="off" required />
                            </div>

                            <div class="form-group">
                                <label>Confirm Password </label>
                                <input style="border-radius:0;" class="form-control" type="password"
                                    name="confirmpassword" autocomplete="off" required />
                            </div>

                            <button type="submit" name="signup" class="btn btn-info" id="submit">Register Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->

    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>

</html>