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
                        <!--                           profile Pic code-->

                        <img src='img/profile.png' class='img-circle' width='25' height='25'>

                        <?php echo "Mr Admin"; ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="profile.php"><i class="fa fa-user"></i>Profile</a></li>
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
            <div class="col-md-12">
                <div id="grid">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="text-center">Welcome to Admin's Panel</h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-sm-6">

                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h5 class="text-default">Delete Notice</h5>
                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-striped table-responsive table-hover">
                                            <thead style="background-color:#67A9CE;color: #ffffff;">
                                            <tr>
                                                <th>Id</th>
                                                <th>Title</th>
                                                <th>Remaining Days</th>
                                                <th>Upload Date/Time</th>
                                                <th>Category</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            global $connection;
                                            $select_query = mysqli_query($connection, "SELECT * FROM notice_upload");

                                            echo "<div class='container'>";
                                            if (mysqli_num_rows($select_query) > 0) {
                                                while ($row = mysqli_fetch_array($select_query)) {
                                                    $id=$row['id'];
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


                                                    echo "<tr>";
//                                            echo "<td><button type='button' data-toggle='modal' data-target='#myModal' class='btn btn-primary btn-sm'><i class='fa fa-external-link' style='font-size: large;'></i></button> </td>";

                                                    echo"<td>$id</td>";
                                                    echo "<td>$title</td>";
                                                    echo "<td>$x</td>";
                                                    echo "<td>$upload_date</td>";
                                                    echo "<td>$category</td>";
                                                    ?>

                                                    <?php
                                                    echo "</tr>";
                                                }

                                            } else {
                                                echo "<tr>No data found in the database</tr>";
                                            }

                                            ?>
                                            </tbody>
                                        </table>
<!--                                       Admin Delete Notices From the database-->
                                        <form method="post" action="#">
                                            <div class="form-group">
                                            <input type="text" name="delete_txt" class="form-control" placeholder="Enter Notice id to delete">
                                            </div>
                                            <button type="submit" class="btn btn-danger pull-right" name="delete"><i class="fa fa-trash"></i> Delete</button>

                                        </form>
                                        <?php
                                        global $connection;
                                        $query = "SELECT *FROM notice_upload";
                                        $result = mysqli_query($connection, $query);
                                        while($row=mysqli_fetch_assoc($result)){
                                            $id=$row['id'];
                                            $title = $row['upload_title'];
                                            $upload_time = $row['upload_time'];
                                            $upload_date = $row['today_date'];
                                            $category = $row['notice_category'];
                                            $notice_description = $row['notice_description'];
                                            $document = $row['document'];


                                        if(isset($_POST['delete'])){
                                            $delete_txt=$_POST['delete_txt'];
                                            $delete_txt=mysqli_real_escape_string($connection,$delete_txt);
                                            if($delete_txt==""){
                                                echo'<div class="alert alert-danger">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Deletion Error!</strong> Input Field Empty.Please Enter What you want to delete.
</div>';

                                            }else{
                               $del_query=mysqli_query($connection,"DELETE FROM notice_upload WHERE id='{$delete_txt}'");
                                            unlink($row['document']);
                                            if($del_query){
                                                echo"<script>alert('Notice no $id  Successfully Deleted')</script>";
                                            }
                                            else{
                                                echo"Not Deleted";
                                            }
                                            }
                                        }
                                        }

                                        ?>
                                    </div>
                                </div>
                            </div>

<!--                            Edit Notices-->
                            <div class="col-sm-6">
                                <div class="panel panel-info">
                                    <div class="panel-heading">

                                        <form method="post" action="">

                                            <div class="input-group">
                                                Edit Notice
                                        <input type="text" placeholder="Search..." name="search_text" class="pull-right" style="color: black;">
                                        <span class="input-group-btn">
                                        <button class="btn btn-primary" type="submit" name="search" id="search">
                                            <span class="glyphicon glyphicon-search"></span>
                                        </button>
                                         </span>

                                            </div>

                                        </form>



                                    </div>
                                    <div class="panel-body">
                                        <?php
                                        global $connection;
                                        if(isset($_POST['search'])){
                                            $search_txt=$_POST['search_text'];
                                            $search_txt=mysqli_real_escape_string($connection,$search_txt);
                                        if($search_txt==""){
                                            echo'<div class="alert alert-danger fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Search Error!</strong> Please Enter What you want to search for.
    </div>';

                                        }
                                        else{

                                            $result=mysqli_query($connection,
                                                "SELECT * FROM notice_upload
 WHERE upload_title LIKE '%$search_txt%' OR expiry_date LIKE '%$search_txt%' OR notice_description LIKE '%$search_txt%' OR notice_category LIKE '%$search_txt%' OR id LIKE '%$search_txt%'");
                                            if(mysqli_num_rows($result)>0){
                                                while($row=mysqli_fetch_array($result)){
                                                    $id=$row['id'];
                                                    $title=$row['upload_title'];
                                                    $exp_date=$row['expiry_date'];
                                                    $description=$row['notice_description'];
                                                    $category=$row['notice_category'];

                                                }?>
                                                <form method="post" action="#">
                                                    <div class="form-group">
                                                        <label>Notice Id</label>
                                                        <input type="text" name="notice_id" placeholder="Notice Id" readonly value="<?php echo $id; ?>" class="form-control">
                                                    </div>
                                                        <label>Notice Title</label>
                                                        <input type="text" name="notice_title" placeholder="Notice Title" value="<?php echo $title; ?>" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Notice Expiry Date</label>
                                                        <input type="date" name="notice_expiry_date" value="<?php echo $exp_date; ?>" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Notice Description</label>
                                                        <input type="text" name="notice_description"  class="form-control" value="<?php echo $description; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Notice Category</label>
                                                        <input type="text" name="notice_category" value="<?php echo $category; ?>" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" name="update_notice" class="btn btn-primary pull-right">Update Notice</button>
                                                    </div>
                                                </form>
                                        <?php



                                            }else{
                                                echo'<div class="alert alert-danger fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Search Results Found!</strong> No such results found.
  </div>
</div>';
                                            }
                                        }

                                        }
                                        ?>

<!--                                        Code to update details-->
                                        <?php
                                        global $connection;
                                        if(isset($_POST['update_notice'])){
                                            $notice_id=$_POST['notice_id'];
                                            $notice_title=$_POST['notice_title'];
                                            $notice_category=$_POST['notice_category'];
                                            $notice_description=$_POST['notice_description'];
                                            $notice_expiry_date=$_POST['notice_expiry_date'];
                                            $notice_title=mysqli_real_escape_string($connection,$notice_title);
                                            $notice_id=mysqli_real_escape_string($connection,$notice_id);
                                            $update_query=mysqli_query($connection,"UPDATE notice_upload SET upload_title='$notice_title',notice_category='$notice_category',notice_description='$notice_description',expiry_date='$notice_expiry_date' WHERE id='$notice_id'");
                                            if($update_query){
                                                echo'<div class="alert alert-success fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Notice Update!</strong> Notice Updated successfully.
    </div>';
                                               // header("Location: admin_manage_notices.php");
                                               // echo"<script>window.location='admin_manage_notices.php'</script>";

                                            }
                                            else{
                                                echo'<div class="alert alert-danger fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Notice Update Error!</strong> Notice Not Updated.
    </div>';
                                            }

                                        }
                                        ?>

                                    </div>
                                </div>

                            </div>



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

<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>


<script type="text/javascript" src="js/theme.js"></script>
<script type="text/javascript" src="js/gridData.js"></script>

</body>
</html>
