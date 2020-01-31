<?php include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notice Board APP| Notice Upload</title>

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
            <a class="navbar-brand" href="admin_notices.php" title="Notice Board App">Notice Board</a>
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
                <?php echo "Mr Admin";echo"!";?>
            </i>
        </div>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li><a href="admin_notices.php"><i class="glyphicon glyphicon-th"></i>Admin Notices</a></li>
                <li class="nav nav-list nav-list-expandable nav-list-expanded">
                    <a><i class="fa fa-user"></i> Admin's Activities <span class="caret"></span></a>
                    <ul class="nav navbar-nav">
                        <li><a href="admin_notice_gallery.php"><i class="fa fa-picture-o"></i>Admin Notice Gallery</a></li>
                        <li><a href="admin_upload_notices.php"><i class="fa fa-upload"></i>Admin Notice Upload</a></li>

                    </ul>
                </li>
                <li><a href="admin_chat_bot.php"><i class="fa fa-comments"></i>Admin Chat Bot</a></li>
                <li class="nav nav-list nav-list-expandable">
                    <a><i class="fa fa-location-arrow"></i> Admin's Actions<span class="caret"></span></a>
                    <ul class="nav navbar-nav">
                        <li><a href="admin_manage_notices.php"><i class="fa fa-file-photo-o"></i>Manage Notices</a></li>
                        <li><a href="admin_manage_users.php"><i class="fa fa-user-times"></i> Manage Users</a></li>
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

                        <img src='img/profile.png' class='img-circle' width='25' height='25'>
                        <?php echo "Mr Admin" ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="profile.php"><i class="fa fa-user"></i>Profile</a></li>
                        <li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>
                        <li class="divider"></li>
                        <li><a href="index.html"><i class="fa fa-power-off"></i> Log Out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h1 class="text-center" style="border-style: outset;border-color: blue; border-top: none;">Upload New Notices Here</h1>

                </div>

                <div id="grid">
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped active" role="progressbar"
                             aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">
                            40%
                        </div>
                    </div>


                    <?php
                    include("upload_documents.php");
                    ?>
                    <form role="form" method="post" action="#" enctype="multipart/form-data">
                        <div class="form-group col-sm-10">
                            <label for="upload_title"> Upload Title</label><label style="color: red;font-size: 20px;">*</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-pencil"></i>
                                </div>
                                <input type="text" class="form-control" id="upload_title" name="upload_title" autocomplete="off" title="Please Enter Upload Title" required="">
                            </div>
                        </div>
                        <div class="form-group col-sm-10">
                            <label for="upload_time">Notice Expiry Time</label><label style="color: red;font-size: 20px;">*</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                <input type="time" class="form-control"  id="upload_time" name="upload_time" title="Please Select Upload time" required="">
                            </div>
                        </div>
                        <div class="form-group col-sm-10">
                            <label for="upload_date">Notice Expiry Date</label><label style="color: red;font-size: 20px;">*</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar-check-o"></i>
                                </div>
                                <input type="date" class="form-control"  id="upload_date" name="upload_date" required="">
                            </div>
                        </div>
                        <div class="form-group col-sm-10">
                            <label for="notice_description">Notice Description</label><label style="color: red;font-size: 20px;">*</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-keyboard-o"></i>
                                </div>
                                <textarea class="form-control" rows="3"id="notice_description" name="notice_description" placeholder="Your Notice Description" ></textarea>
                            </div>
                        </div>
                        <div class="form-group col-sm-10">
                            <label for="notice_category">Notice Category</label><label style="color: red;font-size: 20px;">*</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-id-card"></i>
                                </div>
                                <select class="form-control" id="notice_category" name="notice_category">
                                    <option selected disabled>-Select notice Category-</option>
                                    <option>Education</option>
                                    <option>Sports</option>
                                    <option>Meetings</option>
                                    <option>Entertainment</option>
                                    <option>Lost and Found Items</option>
                                    <option>Advertisements</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-sm-10">
                            <label for="Browse_ducument">Browse Notice</label><label style="color: red;font-size: 20px;">*</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-image"></i>
                                </div>
                                <input type="file" class="form-control" id="selected_file" name="file" title="Browse an image or a document from your Computer"  >
                            </div>
                        </div>
                        <div class="form-group col-sm-5 text-center">
                            <button type="submit" class="form-control btn-primary" name="upload" id="upload">Upload</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->

<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/sweetalert.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>


<script type="text/javascript" src="js/theme.js"></script>
<script type="text/javascript" src="js/gridData.js"></script>

</body>
</html>
