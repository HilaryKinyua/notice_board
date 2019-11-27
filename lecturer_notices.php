<?php
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notices | Online Notice Board</title>

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.min.css"/>
    <!--add a shortcut icon-->
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">

    <link rel="stylesheet" type="text/css" href="css/theme.css"/>
    <link rel="stylesheet" type="text/css" href="css/dashboard.css"/>

    <!--    Calendar-->
    <link rel="stylesheet" href="css/clndr.css" type="text/css"/>
    <script src="js/underscore-min.js" type="text/javascript"></script>
    <script src="js/moment-2.2.1.js" type="text/javascript"></script>
    <script src="js/clndr.js" type="text/javascript"></script>
    <script src="js/site.js" type="text/javascript"></script>
    <!--    Calendar ends-->

    <!--<script src="js/bootstrap.min.js"></script>-->
    <!--    Code to Auto refresh page-->
    <script>
        $(function() {
            var timer = 10;
            var test="";

            function inTimer(inTime,1000);
            $("h1").html("time to refresh is" + timer);
            if (timer == 8) {
                $.post("admin_notices.php", {notice: test}, function (data) {
                    $(".panel-body").html(data);

                })
                timer = 11;
                clearTimeout(inTime);
            }
            time--;
        }


        });
    </script>

    <script>


        //Div auto refresh.


        $(documents).ready(function () {
            var commentsCount = 2;
            $("button").click(function () {
                commentsCount = commentsCount + 2;
                $("#comments").load("load-comments.php", {
                    commentsNewCount: commentsCount
                });
            });
        });


    </script>
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
            <a class="navbar-brand" href="lecturer_notices.php" title="Notice Board">Notice Board</a>
            <i class=" navbar-brand fa fa-comments text-center" style="font-size: 24px;padding-left: 200px;">&nbsp;
                <!--Greetings-->
                <script>
                    var myDate = new Date();
                    var hours = myDate.getHours();
                    var greet;
                    if (hours < 12) {
                        greet = 'Good Morning,';
                    }
                    else if (hours >= 12 && hours < 17) {
                        greet = 'Good Afternoon,';
                    }
                    else if (hours >= 17 && hours <= 24) {
                        greet = 'Good Evening,';
                    }
                    document.write(greet);
                </script>
                <?php echo"Mr Lecturer";
                echo "!"; ?>
            </i>
        </div>


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
                            ctx.arc(0, 0, radius, 0, 2 * Math.PI);
                            ctx.fillStyle = "white";
                            ctx.fill();
                        }

                        function drawClock() {
                            drawFace(ctx, radius);
                        }

                        function drawFace(ctx, radius) {
                            var grad;

                            ctx.beginPath();
                            ctx.arc(0, 0, radius, 0, 2 * Math.PI);
                            ctx.fillStyle = 'white';
                            ctx.fill();

                            grad = ctx.createRadialGradient(0, 0, radius * 0.95, 0, 0, radius * 1.05);
                            grad.addColorStop(0, '#333');
                            grad.addColorStop(0.5, 'white');
                            grad.addColorStop(1, '#333');
                            ctx.strokeStyle = grad;
                            ctx.lineWidth = radius * 0.1;
                            ctx.stroke();

                            ctx.beginPath();
                            ctx.arc(0, 0, radius * 0.1, 0, 2 * Math.PI);
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
                            ctx.font = radius * 0.15 + "px arial";
                            ctx.textBaseline = "middle";
                            ctx.textAlign = "center";
                            for (num = 1; num < 13; num++) {
                                ang = num * Math.PI / 6;
                                ctx.rotate(ang);
                                ctx.translate(0, -radius * 0.85);
                                ctx.rotate(-ang);
                                ctx.fillText(num.toString(), 0, 0);
                                ctx.rotate(ang);
                                ctx.translate(0, radius * 0.85);
                                ctx.rotate(-ang);
                            }
                        }

                        function drawClock() {
                            drawFace(ctx, radius);
                            drawNumbers(ctx, radius);
                            drawTime(ctx, radius);
                        }

                        function drawTime(ctx, radius) {
                            var now = new Date();
                            var hour = now.getHours();
                            var minute = now.getMinutes();
                            var second = now.getSeconds();
                            //hour
                            hour = hour % 12;
                            hour = (hour * Math.PI / 6) + (minute * Math.PI / (6 * 60)) + (second * Math.PI / (360 * 60));
                            drawHand(ctx, hour, radius * 0.5, radius * 0.07);
                            //minute
                            minute = (minute * Math.PI / 30) + (second * Math.PI / (30 * 60));
                            drawHand(ctx, minute, radius * 0.8, radius * 0.07);
                            // second
                            second = (second * Math.PI / 30);
                            drawHand(ctx, second, radius * 0.9, radius * 0.02);
                        }

                        function drawHand(ctx, pos, length, width) {
                            ctx.beginPath();
                            ctx.lineWidth = width;
                            ctx.lineCap = "round";
                            ctx.moveTo(0, 0);
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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i>
                        Notices <span class="label label-danger">
                                 <?php
                                 global $connection;

                                 $today_date = strtotime(date("y-m-d"));

                                 $sql = "SELECT count(id) AS total FROM notice_upload";
                                 $query = mysqli_query($connection, $sql);
                                 $values = mysqli_fetch_assoc($query);
                                 $num_rows = $values['total'];
                                 echo "$num_rows";
                                 ?>
                            </span> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-header">
                            <?php
                            global $connection;
                            $today_date = strtotime(date("y-m-d"));

                            $sql = "SELECT count(id) AS total FROM notice_upload";
                            $query = mysqli_query($connection, $sql);
                            $values = mysqli_fetch_assoc($query);
                            $num_rows = $values['total'];
                            echo "$num_rows";
                            ?>
                            New Notices available
                        </li>
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
                        <?php echo "Mr Lecturer"; ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="profile.php"><i class="fa fa-user"></i> Profile</a></li>
                        <li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h2 class="panel-title text-center"><i class="fa fa-newspaper-o"></i><b
                                style="font-family: arial, sans-serif;font-size: 17pt;"> Notices Available </b>

                            <form method="post" action="#" class=" form-group pull-left"
                                  style="margin-bottom: 20px;padding: 0px;">
                                <Select class="form-control col-sm-10"
                                        style="font-size: 10pt; font-style: normal;background-color: #ffffff; border-radius: 0.25em;"
                                        name="selectionsearch" onchange="this.form.submit()">
                                    <option selected disabled name="sort" id="sort">-Select notice by Category-</option>
                                    <option>Education Notices</option>
                                    <option>Sports</option>
                                    <option>Meetings</option>
                                    <option>Entertainment</option>
                                    <option>Lost And Found Items</option>
                                    <option>Advertisements</option>
                                </Select>


                            </form>


                            <a class="pull-right glyphicon glyphicon-option-horizontal" href="admin_notices.php"
                               style="text-decoration:none;" title="refresh"></a></h2>
                    </div>
                    <div class="panel-body">
                        <div id="chart_live" style="width:100%; height:530px; overflow: scroll;overflow-x: hidden;">
                            <!--                            Display Sorted Notices Here-->
                            <?php
                            include("sortnotices.php");
                            ?>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">Search <i class="fa fa-search"></i> </span>
                                    <input type="text" name="search_text" id="search_text"
                                           placeholder="search for a notice" class="form-control"/>

                                </div>
                            </div>
                            <br>
                            <!--dispaly results here -->
                            <div id="result"></div>

                            <div class="table-responsive">
                                <table class="table table-striped table-responsive table-hover">
                                    <thead style="background-color:#67A9CE;color: #ffffff;">
                                    <tr>
                                        <th>#</th>
                                        <th>Description</th>
                                        <th>Title</th>
                                        <th>Remaining Days</th>
                                        <th>Upload Date/Time</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    global $connection;
                                    $counter=0;
                                    $select_query = mysqli_query($connection, "SELECT * FROM notice_upload");

                                    echo "<div class='container'>";
                                    if (mysqli_num_rows($select_query) > 0) {
                                        while ($row = mysqli_fetch_array($select_query)) {
                                            $title = $row['upload_title'];
                                            $upload_time = $row['upload_time'];
                                            $upload_date = $row['today_date'];
                                            $category = $row['notice_category'];
                                            $notice_description = $row['notice_description'];
                                            $document = $row['document'];
                                            //Count the days remaining for the notice
                                            $exp_date = strtotime($row['expiry_date']);
                                            // $today_date=strtotime($row['today_date']);
                                            $today_date = strtotime(date("y-m-d H:i:s"));
                                            $diff = $today_date - $exp_date;
                                            //$diff=$exp_date-$today_date;
                                            $x = abs(floor($diff / (60 * 60 * 24)));

                                            $counter++;
                                            echo "<tr>";
//                                            echo "<td><button type='button' data-toggle='modal' data-target='#myModal' class='btn btn-primary btn-sm'><i class='fa fa-external-link' style='font-size: large;'></i></button> </td>";
                                            echo"<td><b>$counter</b></td>";
                                            echo "<td>

<button type='button' data-toggle='modal' data-target='#myModal' class='btn btn-primary btn-sm fa fa-external-link'></button>

</td>";

                                            echo "<td>$title</td>";
                                            echo "<td>$x</td>";
                                            echo "<td>$upload_date</td>";
                                            echo "<td>$category</td>";
                                            ?>
                                            <td><a href="<?php echo $document; ?>" class='btn btn-primary '
                                                   title='View Details'
                                                   style='background-color: blue;color: #ffffff;text-decoration: none;border-radius: 50px;'
                                                   download>View</a></td>
                                            <?php
                                            echo "</tr>";
                                        }

                                    } else {
                                        echo "<tr>No data found in the database</tr>";
                                    }

                                    ?>
                                    </tbody>
                                </table>

                                <!-- Modal -->
                                <div id="myModal" class="modal fade" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header" style="background-color: #269abc;color: #ffffff;">
                                                <button type="button" class="close"
                                                        data-dismiss="modal">&times;</button>
                                                <h3 class="modal-title text-center">Notice Description</h3>
                                            </div>
                                            <div class="modal-body">

                                                <?php

                                                $sql = "SELECT * FROM notice_upload ORDER BY id DESC ";
                                                $description_query = mysqli_query($connection, $sql);
                                                if (mysqli_num_rows($description_query) > 0) {

                                                    while ($row = mysqli_fetch_array($description_query)) {
                                                        $id = $row['id'];
                                                        $title=$row['upload_title'];
                                                        $description = $row['notice_description'];
                                                        $image=$row['document'];
                                                        echo"<h4 style='border-bottom: 1px solid #000;'>$title</h4>";
                                                        echo"<img src='$image' class='img-responsive img-thumbnail' width='100%' height='100%'/>";
                                                        echo "$description";
                                                        echo "<br/>";

                                                    }
                                                } else {
                                                    echo "<p class='alert alert-info'>0 results found</p>";
                                                }


                                                ?>
                                            </div>
                                            <div class="modal-footer" style="background-color:  #269abc;;">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                                    Close
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!--                                    Modal ends-->


                            </div>

                        </div>
                    </div>
                </div>


                <!--Code to Automatically delete data from the db after time has Elapsed-->
                <?php
                //Establish a connection
                global $connection;



                $query = "SELECT *FROM notice_upload";
                $result = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_array($result)) {
                    //Checking For time
                    $expiry_time=strtotime($row['upload_time']);
                    $current_time=time();
                    $time_di=$expiry_time-$current_time;



                    $expiry_date = strtotime($row['expiry_date']);
                    // $current_date=strtotime($row['today_date']);
                    $current_date = strtotime(date("y-m-d H:i:s"));
                    if ($current_date > $expiry_date && $current_time>$expiry_time) {
                        $expiry = date("y-m-d", $expiry_date);

                        $sql = "DELETE FROM notice_upload WHERE expiry_date='$expiry' ";
                        //Delete notice documents from the files
                        unlink($row['document']);

                        mysqli_query($connection, $sql);


                    }

                }



                ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-calendar"></i> <?php echo date('d-m-y'); ?>
                                    Notice Statistics</h3>
                            </div>
                            <div class="panel-body text-center">
                                <div id="calendar1" style="font-size: large;">
                                    <!--Show the total number of Notices-->
                                    <?php
                                    global $connection;
                                    $sql = "SELECT count(id) AS total FROM notice_upload";
                                    $query = mysqli_query($connection, $sql);
                                    $values = mysqli_fetch_assoc($query);
                                    $num_rows = $values['total'];
                                    if ($num_rows == 1) {
                                        echo "<i class='glyphicon glyphicon-alert alert-success'></i> <b>$num_rows</b>";
                                        echo " Notice available";
                                    } else {
                                        echo "<i class='glyphicon glyphicon-alert alert-info'></i> <b>$num_rows</b>";
                                        echo " Notices available";
                                    }




                                    ?>
                                    <!--To show the number of viewers of the notices-->
                                    <p>

                                        <i class="glyphicon glyphicon-eye-open alert-info"></i>
                                        <?php
                                        global $connection;
                                        $find_counts = "SELECT *FROM notice_viewers";
                                        $count_query = mysqli_query($connection, $find_counts);
                                        while ($row = mysqli_fetch_assoc($count_query)) {
                                            $current_count = $row['counts'];
                                            $new_count = $current_count + 1;
                                            $update_count = mysqli_query($connection, "UPDATE notice_viewers SET counts=$new_count");
                                            echo $new_count . "&nbsp;Notice Viewers";
                                        }
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-gear"></i> Admin Actions</h3>
                            </div>
                            <div class="panel-body">
                                <ul class="list-group">
                                    <li>
                                        <button class="btn btn-primary" id="deletebtn" name="deletebtn"
                                                onclick="getValue()" style="border-radius: 50px;">Delete
                                        </button>
                                    </li>
                                    <!--Code to delete a notice from the database using the admin-->
                                    <script>
                                        function getValue() {

                                            var getpass = prompt(" Please Enter Admin Password", "Your password Here");

                                            if (getpass == "") {
                                                document.write("Empty string");

                                            } else {
                                                document.write("NOT Deleted");
                                            }
                                        }
                                    </script>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-comments"></i> Live Comments <a
                                class="pull-right fa fa-gear" href="#" style="text-decoration:none;"></a></h3>
                    </div>
                    <div class="panel-body">
                        <div style="width:100%; height:250px;overflow: scroll;overflow-x: visible;" id="comments">
                            <ul class="media-list">
                                <li class="media">
                                    <div class="media-left">
                                        <img class="media-object" src="images/hilary_img.jpg"
                                             style="width:64px; height:64px; border-radius:50%; border:solid 1px #E1E1E1;"/>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">Hilary Kinyua
                                            <small class="pull-right" style="color:#b6b6b6; margin-right:10px;"><i
                                                    class="fa fa-clock-o"></i> 14 min ago
                                            </small>
                                        </h4>
                                        <p>This is the best platform to get every notice at the Campus.Kundos! Good Work
                                            done.</p>
                                    </div>
                                </li>
                                <li class="media">

                                    <div class="media-body">

                                        <?php
                                        global $connection;
                                        //Auto refresh div code
                                        // $commentsNewCount=$_POST['commentNewCount'];

                                        function timeAgo($time_ago)
                                        {
                                            $cur_time = time();
                                            $time_elapsed = $cur_time - $time_ago;
                                            $seconds = $time_elapsed;
                                            $minutes = round($time_elapsed / 60);
                                            $hours = round($time_elapsed / 3600);
                                            $days = round($time_elapsed / 86400);
                                            $weeks = round($time_elapsed / 604800);
                                            $months = round($time_elapsed / 2600640);
                                            $years = round($time_elapsed / 31207680);

                                            //seconds
                                            if ($seconds < 60) {
                                                echo "Just now";
                                            } //minutes
                                            else if ($minutes <= 60) {
                                                if ($minutes == 1) {
                                                    echo "one minute ago";
                                                } else {
                                                    echo "$minutes minutes ago";
                                                }

                                            } //Hours
                                            else if ($hours <= 24) {
                                                if ($hours == 1) {
                                                    echo "an hour ago";
                                                } else {
                                                    echo "$hours hours ago";
                                                }
                                            } //Days
                                            else if ($days <= 7) {
                                                if ($days == 1) {
                                                    echo "yesterday.";
                                                } else {
                                                    echo "$days days ago";
                                                }
                                            } //Weeks
                                            else if ($weeks <= 4.3) { //4.3==52/12
                                                if ($weeks == 1) {
                                                    echo "a week ago";
                                                } else {
                                                    echo "$weeks weeks ago";
                                                }
                                            } //Months
                                            else if ($months <= 12) {
                                                if ($months == 1) {
                                                    echo "a month ago";
                                                } else {
                                                    echo "$months months ago";
                                                }

                                            } //Years
                                            else {
                                                if ($years == 1) {
                                                    echo "one year ago";
                                                } else {
                                                    echo "$years years ago";
                                                }
                                            }//end if


                                        }

                                        $wakati_sasa = date("y-m-d H:i:s");


                                        $sql = "SELECT * FROM table_comments ORDER BY id DESC ";
                                        $query = mysqli_query($connection, $sql);
                                        if (mysqli_num_rows($query) > 0) {
                                            while ($row = mysqli_fetch_assoc($query)) {


                                                $comment = $row['comments'];
                                                $firstname = $row['firstname'];
                                                $lastname = $row['lastname'];
                                                $wakati_sasa = $row['time'];

                                                //    echo"<div class='media-object'> <i class='fa fa-user-circle-o' style='font-size: 30px;color: blueviolet;border-radius: 100px;border-color: red;border: 1px;'></i></div>";


                                                $time_ago = strtotime($wakati_sasa);
                                                $agoo = timeAgo($time_ago);

                                                echo "<div class='media-left'>
                                            <img class='media-object' src='img/profile.png' style='width:64px; height:64px; border-radius:50%; border:solid 1px #E1E1E1;' />
                                           </div>
                                        <div class='media-body'>

                                            <h4 class='media-heading'>$firstname &nbsp; $lastname
                                            <small class='pull-right' style='color:#b6b6b6;margin-right: 10px;'><i class='fa fa-clock-o'></i>$agoo</small></h4>
                                            <p>$comment</p>
                                        </div>";


                                                echo "<hr>";

                                            }
                                        } else {
                                            echo "No Comment";
                                        }
                                        ?>

                                    </div>
                                </li>
                            </ul>
                            <a href="#" class="btn btn-primary pull-right" name="">View All Messages</a>
                        </div>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-keyboard-o"></i> Type your Comments</h3>
                        <!--Code to send messages in comments format-->
                        <?php
                        include("messages_comments.php") ?>
                        <form role="form" method="post" action="#">
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Place your Comments Here" rows="5"
                                          id="comment" name="comment"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class=" btn btn-primary pull-right" id="send_comment"
                                        name="send_comment" style="margin-top: 10px;border-radius: 50px;">Send
                                </button>
                            </div>
                        </form>

                    </div>
                    <div class="panel-body text-center">
                        <div id="tagcloud"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <h2 class="text-center" style="background-color: blue;color:#ffffff;margin-top:0px;">
                                Calendar</h2>


                        </div>

                    </div>


                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<script src="js/jquery.min.js"></script>
<!--    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>-->
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>


<script type="text/javascript" src="js/theme.js"></script>


</body>
</html>


<!--JQUERY-->
<script>
    $(document).ready(function () {
        $('#search_text').keyup(function () {
            var txt = $(this).val();

            if (txt == '') {
                $('#result').html('');

            } else {


                $.ajax({
                    url: "livesearch.php",
                    method: "post",
                    data: {search: txt},
                    dataType: "text",
                    success: function (data) {
                        $('#result').html(data);
                    }
                });
            }
        });
    });
</script>