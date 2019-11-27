<?php include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notice Board App | Contact us</title>

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.min.css" />
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">

    <link rel="stylesheet" type="text/css" href="css/theme.css" />
    <link rel="stylesheet" type="text/css" href="css/dashboard.css" />


</head>
<body>

<div id="wrapper">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="notices.php" title="Notice Board">Notice Board</a>
            <i class=" navbar-brand fa fa-comments text-center" style="font-size: 24px;padding-left: 200px;">&nbsp;
                <!--Greetings-->
                <script>
                    var myDate= new Date();
                    var hours=myDate.getHours();
                    var greet;
                    if(hours<12){
                        greet='Good Morning,';
                    }
                    else if(hours>=12 && hours<17){
                        greet='Good Afternoon,';
                    }
                    else if(hours>=17 && hours<=24){
                        greet='Good Evening,';
                    }
                    document.write(greet);
                </script>
                <?php echo $_SESSION['firstname'];echo"!";?>
            </i>
        </div>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li><a href="notices.php" title="notices"><i class="glyphicon glyphicon-th"></i> Notices</a></li>
                    <li class="nav nav-list nav-list-expandable nav-list-expanded">
                        <a><i class="fa fa-user"></i>Users Activities <span class="caret"></span></a>
                        <ul class="nav navbar-nav">
                            <li><a href="notice_gallery.php"><i class="fa fa-picture-o"></i> Notice Gallery</a></li>
                            <li><a href="upload.php"><i class="fa fa-upload"></i> Upload Notice</a></li>

                        </ul>
                    </li>
                    <li class="active"><a href="chatbotpage.php" title="Chat Bot"><i class="fa fa-comments"></i> Chat Bot</a></li>
                    <li class="nav nav-list nav-list-expandable">
                        <a><i class="fa fa-location-arrow"></i>Get In Touch<span class="caret"></span></a>
                        <ul class="nav navbar-nav">
                            <li><a href="help.php"><i class="fa fa-question"></i> Help</a></li>
                            <li><a href="contacts.php"><i class="fa fa-phone">  Contacts</i> </a></li>
                        </ul>
                    <li>

                        <!--                    Canvas Here-->
                        <canvas id="canvas" width="200px" height="200px" title="Notice Board Clock"></canvas>

                        <script>
                            var canvas = document.getElementById("canvas");
                            var ctx = canvas.getContext("2d");
                            var radius = canvas.height / 2;
                            ctx.translate(radius, radius);
                            radius = radius * 0.90;
                            drawClock();

                            function drawClock() {
                                ctx.arc(0, 0, radius, 0 , 2*Math.PI);
                                ctx.fillStyle = "white";
                                ctx.fill();
                            }

                            function drawClock() {
                                drawFace(ctx, radius);
                            }

                            function drawFace(ctx, radius) {
                                var grad;

                                ctx.beginPath();
                                ctx.arc(0, 0, radius, 0, 2*Math.PI);
                                ctx.fillStyle = 'white';
                                ctx.fill();

                                grad = ctx.createRadialGradient(0,0,radius*0.95, 0,0,radius*1.05);
                                grad.addColorStop(0, '#333');
                                grad.addColorStop(0.5, 'white');
                                grad.addColorStop(1, '#333');
                                ctx.strokeStyle = grad;
                                ctx.lineWidth = radius*0.1;
                                ctx.stroke();

                                ctx.beginPath();
                                ctx.arc(0, 0, radius*0.1, 0, 2*Math.PI);
                                ctx.fillStyle = '#333';
                                ctx.fill();
                            }

                            function drawClock() {
                                drawFace(ctx, radius);
                                drawNumbers(ctx, radius);
                            }

                            function drawNumbers(ctx, radius) {
                                var ang;
                                var num;
                                ctx.font = radius*0.15 + "px arial";
                                ctx.textBaseline="middle";
                                ctx.textAlign="center";
                                for(num= 1; num < 13; num++){
                                    ang = num * Math.PI / 6;
                                    ctx.rotate(ang);
                                    ctx.translate(0, -radius*0.85);
                                    ctx.rotate(-ang);
                                    ctx.fillText(num.toString(), 0, 0);
                                    ctx.rotate(ang);
                                    ctx.translate(0, radius*0.85);
                                    ctx.rotate(-ang);
                                }
                            }

                            function drawClock() {
                                drawFace(ctx, radius);
                                drawNumbers(ctx, radius);
                                drawTime(ctx, radius);
                            }

                            function drawTime(ctx, radius){
                                var now = new Date();
                                var hour = now.getHours();
                                var minute = now.getMinutes();
                                var second = now.getSeconds();
                                //hour
                                hour=hour%12;
                                hour=(hour*Math.PI/6)+(minute*Math.PI/(6*60))+(second*Math.PI/(360*60));
                                drawHand(ctx, hour, radius*0.5, radius*0.07);
                                //minute
                                minute=(minute*Math.PI/30)+(second*Math.PI/(30*60));
                                drawHand(ctx, minute, radius*0.8, radius*0.07);
                                // second
                                second=(second*Math.PI/30);
                                drawHand(ctx, second, radius*0.9, radius*0.02);
                            }

                            function drawHand(ctx, pos, length, width) {
                                ctx.beginPath();
                                ctx.lineWidth = width;
                                ctx.lineCap = "round";
                                ctx.moveTo(0,0);
                                ctx.rotate(pos);
                                ctx.lineTo(0, -length);
                                ctx.stroke();
                                ctx.rotate(-pos);
                            }

                            //drawClock();
                            setInterval(drawClock, 1000);

                        </script>



                </ul>
                <ul class="nav navbar-nav navbar-right navbar-user">
                    <li class="dropdown messages-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> Notices <span class="label label-danger">
                                                           <?php
                                                           global $connection;

                                                           $today_date=strtotime(date("y-m-d"));

                                                           $sql="SELECT count(id) AS total FROM notice_upload";
                                                           $query=mysqli_query($connection,$sql);
                                                           $values=mysqli_fetch_assoc($query);
                                                           $num_rows=$values['total'];
                                                           echo"$num_rows";
                                                           ?>
                            </span> <b class="caret"></b></a>

                        <ul class="dropdown-menu">
                            <li class="dropdown-header">2 New Messages</li>
                            <li class="message-preview">
                                <a href="#">
                                    <span class="avatar"><i class="fa fa-bell"></i></span>
                                    <span class="message">Security alert</span>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li class="message-preview">
                                <a href="#">
                                    <span class="avatar"><i class="fa fa-bell"></i></span>
                                    <span class="message">Security alert</span>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="#">Go to Inbox <span class="badge">2</span></a></li>
                        </ul>
                    </li>
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!--                           profile Pic code-->
                            <?php
                            global $connection;
                            $userfirstname=$_SESSION['firstname'];
                            $query=mysqli_query($connection,"SELECT * FROM profile_pic WHERE name='$userfirstname'");
                            if(mysqli_num_rows($query)>0){
                                while($row=mysqli_fetch_assoc($query)){
                                    $pic=$row['profileimage'];
                                    echo"<img src='$pic' class='img-circle' width='25' height='25' style='border: 2px solid gold;'>";
                                }

                            }
                            else{
                                echo"<img src='img/profile.png' class='img-circle' width='25' height='25'>";
                            }
                            ?>

                            <?php echo $_SESSION['firstname']; ?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="profile.php"><i class="fa fa-user"></i> Profile</a></li>
                            <li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>
                            <li class="divider"></li>
                            <li><a href="logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="page-wrapper">
        <!-- sample templates start -->
        <div class="container col-sm-12">
            <div class="well"> <h3 class="text-center" style="font-family: arial, sans-serif;font-size: 30px;">Contact Us</h3></div>
            <p class="text-center"><em>We love our fans!</em></p>
            <div class="row test">
                <div class="col-sm-4">
                    <p>Did You enjoy our service? Drop a note.</p>
                    <p><span class="glyphicon glyphicon-map-marker" style="color: blue;"></span> Chuka University, KE</p>
                    <p><span class="glyphicon glyphicon-phone" style="color: blue;"></span> Phone: +254 707136832</p>
                    <p><span class="glyphicon glyphicon-envelope" style="color: blue;"></span> Email: kinyualary@gmail.com</p>
                </div>
                <div class="col-sm-8" style="border-style: solid; color:#5bc0de; border-right: none;border-top: none;border-bottom: none;">
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
                        </div>
                        <div class="col-sm-6 form-group">
                            <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
                        </div>
                    </div>
                    <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <button class="btn pull-right btn-primary" type="submit">Send</button>
                        </div>
                    </div>

                </div>
                <div class="col-sm-12" style="height: 350px;">
                    <div class="well text-center"><span class="glyphicon glyphicon-map-marker" style="font-size: large;color: blue;">  Our Location</span>  </div>
                    <iframe class="frame" height="100" width="100" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.7564817943007!2d37.65526014949732!3d-0.31900043542258766!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1827b892813e10f7%3A0xec0f5cfbc84c391c!2sChuka+University!5e0!3m2!1sen!2s!4v1487529375164" style="height: 400px;width: 100%;">
                    </iframe>
                </div>
            </div>
        </div>
        <!-- sample templates end -->
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->

<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>


<script type="text/javascript" src="js/theme.js"></script>
<script type="text/javascript">
    jQuery(function ($) {
        $('[data-toggle="popover"]').popover();
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

</body>
</html>
