<?php
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notice Board App | ChatBot</title>

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
            <a class="navbar-brand" href="lecturer_notices.php" title="Notice Board App">Notice Board</a>
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
                <?php echo "Mr Lecturer";echo"!";?>
            </i>
        </div>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li><a href="lecturer_notices.php"><i class="glyphicon glyphicon-th"></i>Lecturer Notices</a></li>
                    <li class="nav nav-list nav-list-expandable nav-list-expanded">
                        <a><i class="fa fa-user"></i> Lecturer's Activities <span class="caret"></span></a>
                        <ul class="nav navbar-nav">
                            <li><a href="lecturer_notice_gallery.php"><i class="fa fa-picture-o"></i>Lecturer Notice Gallery</a></li>
                            <li><a href="lecturer_upload_notices.php"><i class="fa fa-upload"></i>Lecturer Notice Upload</a></li>

                        </ul>
                    </li>
                    <li><a href="lecturer_chat_bot.php"><i class="fa fa-comments"></i>Lecturer Chat Bot</a></li>
                    <li class="nav nav-list nav-list-expandable">
                        <a><i class="fa fa-location-arrow"></i> Lecturer's Actions<span class="caret"></span></a>
                        <ul class="nav navbar-nav">
                            <li><a href="lecturer_manage_notices.php"><i class="fa fa-file-photo-o"></i>Manage Notices</a></li>

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
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> Notices <span class="label   label-danger">
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

                            <img src='img/profile.png' class='img-circle' width='25' height='25'>
                            <?php
                            echo "Mr Lecturer";
                            ?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="profile.php"><i class="fa fa-user"></i> Profile</a></li>
                            <li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>
                            <li class="divider"></li>
                            <li><a href="lecturer_login.php"><i class="fa fa-power-off"></i> Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="page-wrapper">
        <!-- sample templates start -->
        <div class="col-sm-3 col-sm-offset-4 frame">
            <h2>Get Online Help | Notice Board Bot</h2>

            <div class="col-sm-12" style="height: 440px;border-style: solid;overflow:scroll;overflow-x: hidden;font-family: Arial, Helvetica, sans-serif;">
                I am mr Notice bot
                <div class="speech-wrapper">
                    <div class="bubble"
                         style="width:240px;height: auto;display: block;background: #f5f5f5;border-radius: 4px;box-shadow:2px 8px 5px #000;position: relative;margin: 0 0 25px;">
                        <div class="txt" style="padding: 8px;55px;8px;14px;">
                            <p class="name" style="font-weight: 600;font-size: 12px;margin: 0 0 4px; color: #3498db;"><?php
                                echo  $_SESSION['name'];
                                ?></p>
                            <p class="well" style="font-size: 12px;color: #2b2b2b;">
                                <?php
                                $username= "Lecturer";

                                if(isset($_POST['send_comments'])) {
                                    $comment = $_POST['comment'];


                                    if ($comment == "Hello" | $comment=="hello") {
                                        echo "Hello too  $username , How are you?";
                                    } else if ($comment == "Hey" | $comment=="hey") {
                                        echo "Hey too $username, How are you?";
                                    }else if($comment=="i am fine" | $comment=="I am fine"){
                                        echo"Ok.How do you want me to help you?";
                                    }
                                    else if($comment=="i want to know how to view notices"){
                                        echo"Just click on the following link <a href='notices.php' class='btn btn-primary'>Notices</a> to view the notices";
                                    }
                                    else if($comment=="i want to know how to upload notices"){
                                        echo"Just click on the following link <a href='upload.php' class='btn btn-primary'>Upload Notices</a> to upload the notices";

                                    }
                                    else if($comment=="i want to know how to view notice gallery"){
                                        echo"Just click on the following link <a href='notice_gallery.php' class='btn btn-primary'>Notice Gallery</a> to view the notices gallery";
                                    }

                                    else {
                                        echo "Leave  a comment or wait for a moment";
                                    }
                                }
                                ?>
                            </p>
                            <span class="timestamp" style="font-size: 11px;position:static; bottom: 8px;right: 10px;text-transform: uppercase;color: #999;"><?php echo  date("h:i:a") ?></span>
                            <div class="bubble-arrow" style="position: absolute;width: 0;bottom: 42px;left: -16px;height: 0; transform: rotate(145deg);">       </div>
                        </div>
                    </div>
                </div>





            </div>

            <form method="post" action="">
                <div class="form-group">
                    <textarea class="form-control" rows="=1" name="comment" id="comment" placeholder="Type a Message" style="border-radius: 10px;font-size: 14pt;"></textarea>
                    <button class="btn btn-primary pull-right btn-sm" type="submit" name="send_comments" id="send_comments">comment</button>




                    <!--Javascript code to listen to enter key click event-->
                    <!--                    <script>-->
                    <!--                        var textarea=document.getElementById("comment");-->
                    <!--                        try{-->
                    <!--                            textarea.addEventListener("keydown", keyPress,false);-->
                    <!--                        }catch(e){-->
                    <!--                            textarea.attachEvent("onkeydown", keyPress);-->
                    <!--                        }-->
                    <!--                        function keyPress(e){-->
                    <!--                            if(e.keyCode==13){-->
                    <!--                                alert("Enter Key Was pressed");-->
                    <!--                            }-->
                    <!--                            else{-->
                    <!---->
                    <!--                            }-->
                    <!---->
                    <!---->
                    <!--                        }-->
                    <!--                    </script>-->

                </div>
            </form>
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
