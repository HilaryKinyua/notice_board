<?php
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Notice Board App | Login</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords"
          content="Transparent Sign In Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements"/>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);
        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!-- Meta tag Keywords -->
    <!-- css files -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Font-Awesome-Icons-CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all"/>
    <!-- Style-CSS -->

    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">

</head>
<body>
<!--header-->
<div class="header-w3l">
    <h1>Notice Board App</h1>
</div>
<!--//header-->
<!--main-->
<div class="main-content-agile">
    <div class="sub-main-w3">
        <h2><i class="fa fa-user"></i> Sign In</h2>
        <?php include("login_user.php") ?>
        <form action="#" method="post">

            <div class="icon1 form-group">
                <div class="input-group">
                    <div class="input-group-addon" style="background-color:rgba(255, 255, 255, 0.08);color:#3498db; ">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <span id="erroremail" class="text-center"></span>
                    <input placeholder="Email" class="form-control" name="email" id="email" type="email" required=""
                           autocomplete="off">
                </div>
            </div>

            <div class="icon2 form-group">
                <div class="input-group">
                    <div class="input-group-addon" style="background-color:rgba(255, 255, 255, 0.08);color:#3498db;">
                        <i class="fa fa-lock"></i>
                    </div>
                    <span id="errorpassword" class="text-center"></span>
                    <input placeholder="Password" class="form-control" name="password" id="password" type="password"
                           required="">
                </div>
            </div>
            <label class="anim">

                <a href="forgotpass.php">Forgot Password?</a>
            </label>

            <div class="clear"></div>
            <input type="submit" value="Login" name="login" id="login" style="background-color: #1da1f2 !important;">


        </form>
    </div>
</div>
<!--//main-->
<!--footer-->
<div class="footer">
    <h4 style="color: white;">&copy; 2018. Hilary Kinyua. | &nbsp;&nbsp;<i class="fa fa-phone" style="color: blue;"></i>
        Contacts:&nbsp;0707136832 &nbsp;| &nbsp;<i class="fa fa-envelope" style="color:blue;"> </i> Email:
        kinyualary@gmail.com</h4>

</div>
<!--//footer-->
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>

<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.vide.min.js"></script>
<script src="login_validation.js"></script>
<script src="js/sweetalert.min.js"></script>
<!-- //js -->
</body>
</html>